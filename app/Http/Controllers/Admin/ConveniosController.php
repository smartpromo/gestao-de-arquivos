<?php

namespace App\Http\Controllers\Admin;

use App\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreConveniosRequest;
use App\Http\Requests\Admin\UpdateConveniosRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ConveniosController extends Controller
{
    /**
     * Display a listing of Convenio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('convenio_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Convenio.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Convenio.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('convenio_delete')) {
                return abort(401);
            }
            $convenios = Convenio::onlyTrashed()->get();
        } else {
            $convenios = Convenio::all();
        }

        return view('admin.convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating new Convenio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('convenio_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.convenios.create', compact('created_bies', 'created_by_teams'));
    }

    /**
     * Store a newly created Convenio in storage.
     *
     * @param  \App\Http\Requests\StoreConveniosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConveniosRequest $request)
    {
        if (! Gate::allows('convenio_create')) {
            return abort(401);
        }
        $convenio = Convenio::create($request->all());



        return redirect()->route('admin.convenios.index');
    }


    /**
     * Show the form for editing Convenio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('convenio_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $convenio = Convenio::findOrFail($id);

        return view('admin.convenios.edit', compact('convenio', 'created_bies', 'created_by_teams'));
    }

    /**
     * Update Convenio in storage.
     *
     * @param  \App\Http\Requests\UpdateConveniosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConveniosRequest $request, $id)
    {
        if (! Gate::allows('convenio_edit')) {
            return abort(401);
        }
        $convenio = Convenio::findOrFail($id);
        $convenio->update($request->all());



        return redirect()->route('admin.convenios.index');
    }


    /**
     * Display Convenio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('convenio_view')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$guias = \App\Guia::where('convenio_id', $id)->get();

        $convenio = Convenio::findOrFail($id);

        return view('admin.convenios.show', compact('convenio', 'guias'));
    }


    /**
     * Remove Convenio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('convenio_delete')) {
            return abort(401);
        }
        $convenio = Convenio::findOrFail($id);
        $convenio->delete();

        return redirect()->route('admin.convenios.index');
    }

    /**
     * Delete all selected Convenio at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('convenio_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Convenio::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Convenio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('convenio_delete')) {
            return abort(401);
        }
        $convenio = Convenio::onlyTrashed()->findOrFail($id);
        $convenio->restore();

        return redirect()->route('admin.convenios.index');
    }

    /**
     * Permanently delete Convenio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('convenio_delete')) {
            return abort(401);
        }
        $convenio = Convenio::onlyTrashed()->findOrFail($id);
        $convenio->forceDelete();

        return redirect()->route('admin.convenios.index');
    }
}
