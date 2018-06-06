<?php

namespace App\Http\Controllers\Admin;

use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMedicosRequest;
use App\Http\Requests\Admin\UpdateMedicosRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class MedicosController extends Controller
{
    /**
     * Display a listing of Medico.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('medico_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Medico.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Medico.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('medico_delete')) {
                return abort(401);
            }
            $medicos = Medico::onlyTrashed()->get();
        } else {
            $medicos = Medico::all();
        }

        return view('admin.medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating new Medico.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('medico_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.medicos.create', compact('created_bies', 'created_by_teams'));
    }

    /**
     * Store a newly created Medico in storage.
     *
     * @param  \App\Http\Requests\StoreMedicosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicosRequest $request)
    {
        if (! Gate::allows('medico_create')) {
            return abort(401);
        }
        $medico = Medico::create($request->all());



        return redirect()->route('admin.medicos.index');
    }


    /**
     * Show the form for editing Medico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('medico_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $medico = Medico::findOrFail($id);

        return view('admin.medicos.edit', compact('medico', 'created_bies', 'created_by_teams'));
    }

    /**
     * Update Medico in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicosRequest $request, $id)
    {
        if (! Gate::allows('medico_edit')) {
            return abort(401);
        }
        $medico = Medico::findOrFail($id);
        $medico->update($request->all());



        return redirect()->route('admin.medicos.index');
    }


    /**
     * Display Medico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('medico_view')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$clientes = \App\Cliente::where('medico_id', $id)->get();$relatorios = \App\Relatorio::where('medico_id', $id)->get();$guias = \App\Guia::where('medico_id', $id)->get();

        $medico = Medico::findOrFail($id);

        return view('admin.medicos.show', compact('medico', 'clientes', 'relatorios', 'guias'));
    }


    /**
     * Remove Medico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('medico_delete')) {
            return abort(401);
        }
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('admin.medicos.index');
    }

    /**
     * Delete all selected Medico at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('medico_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Medico::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Medico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('medico_delete')) {
            return abort(401);
        }
        $medico = Medico::onlyTrashed()->findOrFail($id);
        $medico->restore();

        return redirect()->route('admin.medicos.index');
    }

    /**
     * Permanently delete Medico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('medico_delete')) {
            return abort(401);
        }
        $medico = Medico::onlyTrashed()->findOrFail($id);
        $medico->forceDelete();

        return redirect()->route('admin.medicos.index');
    }
}
