<?php

namespace App\Http\Controllers\Admin;

use App\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRelatoriosRequest;
use App\Http\Requests\Admin\UpdateRelatoriosRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class RelatoriosController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Relatorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('relatorio_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Relatorio.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Relatorio.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('relatorio_delete')) {
                return abort(401);
            }
            $relatorios = Relatorio::onlyTrashed()->get();
        } else {
            $relatorios = Relatorio::all();
        }

        return view('admin.relatorios.index', compact('relatorios'));
    }

    /**
     * Show the form for creating new Relatorio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('relatorio_create')) {
            return abort(401);
        }

        $medicos = \App\Medico::get()->pluck('nome', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        if (auth()->user()->role_id == 1) {
            $teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        } else {
            $teams = [];
        }

        return view('admin.relatorios.create', compact('medicos', 'created_bies', 'teams'));
    }

    /**
     * Store a newly created Relatorio in storage.
     *
     * @param  \App\Http\Requests\StoreRelatoriosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRelatoriosRequest $request)
    {
        if (! Gate::allows('relatorio_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $relatorio = Relatorio::create($request->all());



        return redirect()->route('admin.relatorios.index');
    }


    /**
     * Show the form for editing Relatorio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('relatorio_edit')) {
            return abort(401);
        }

        $medicos = \App\Medico::get()->pluck('nome', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        if (auth()->user()->role_id == 1) {
            $teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        } else {
            $teams = [];
        }

        $relatorio = Relatorio::findOrFail($id);

        return view('admin.relatorios.edit', compact('relatorio', 'medicos', 'created_bies', 'teams'));
    }

    /**
     * Update Relatorio in storage.
     *
     * @param  \App\Http\Requests\UpdateRelatoriosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRelatoriosRequest $request, $id)
    {
        if (! Gate::allows('relatorio_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->update($request->all());



        return redirect()->route('admin.relatorios.index');
    }


    /**
     * Display Relatorio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('relatorio_view')) {
            return abort(401);
        }
        $relatorio = Relatorio::findOrFail($id);

        return view('admin.relatorios.show', compact('relatorio'));
    }


    /**
     * Remove Relatorio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('relatorio_delete')) {
            return abort(401);
        }
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->delete();

        return redirect()->route('admin.relatorios.index');
    }

    /**
     * Delete all selected Relatorio at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('relatorio_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Relatorio::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Relatorio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('relatorio_delete')) {
            return abort(401);
        }
        $relatorio = Relatorio::onlyTrashed()->findOrFail($id);
        $relatorio->restore();

        return redirect()->route('admin.relatorios.index');
    }

    /**
     * Permanently delete Relatorio from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('relatorio_delete')) {
            return abort(401);
        }
        $relatorio = Relatorio::onlyTrashed()->findOrFail($id);
        $relatorio->forceDelete();

        return redirect()->route('admin.relatorios.index');
    }
}
