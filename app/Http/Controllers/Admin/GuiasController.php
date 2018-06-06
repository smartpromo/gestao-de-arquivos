<?php

namespace App\Http\Controllers\Admin;

use App\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGuiasRequest;
use App\Http\Requests\Admin\UpdateGuiasRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class GuiasController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Guia.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('guia_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Guia.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Guia.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('guia_delete')) {
                return abort(401);
            }
            $guias = Guia::onlyTrashed()->get();
        } else {
            $guias = Guia::all();
        }

        return view('admin.guias.index', compact('guias'));
    }

    /**
     * Show the form for creating new Guia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('guia_create')) {
            return abort(401);
        }
        
        $medicos = \App\Medico::get()->pluck('nome', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $convenios = \App\Convenio::get()->pluck('convenio', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_via = Guia::$enum_via;
                    $enum_tipo_de_guia = Guia::$enum_tipo_de_guia;
                    $enum_acomodacoes = Guia::$enum_acomodacoes;
            
        return view('admin.guias.create', compact('enum_via', 'enum_tipo_de_guia', 'enum_acomodacoes', 'medicos', 'convenios', 'created_bies', 'created_by_teams'));
    }

    /**
     * Store a newly created Guia in storage.
     *
     * @param  \App\Http\Requests\StoreGuiasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuiasRequest $request)
    {
        if (! Gate::allows('guia_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $guia = Guia::create($request->all());



        return redirect()->route('admin.guias.index');
    }


    /**
     * Show the form for editing Guia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('guia_edit')) {
            return abort(401);
        }
        
        $medicos = \App\Medico::get()->pluck('nome', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $convenios = \App\Convenio::get()->pluck('convenio', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $enum_via = Guia::$enum_via;
                    $enum_tipo_de_guia = Guia::$enum_tipo_de_guia;
                    $enum_acomodacoes = Guia::$enum_acomodacoes;
            
        $guia = Guia::findOrFail($id);

        return view('admin.guias.edit', compact('guia', 'enum_via', 'enum_tipo_de_guia', 'enum_acomodacoes', 'medicos', 'convenios', 'created_bies', 'created_by_teams'));
    }

    /**
     * Update Guia in storage.
     *
     * @param  \App\Http\Requests\UpdateGuiasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuiasRequest $request, $id)
    {
        if (! Gate::allows('guia_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $guia = Guia::findOrFail($id);
        $guia->update($request->all());



        return redirect()->route('admin.guias.index');
    }


    /**
     * Display Guia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('guia_view')) {
            return abort(401);
        }
        $guia = Guia::findOrFail($id);

        return view('admin.guias.show', compact('guia'));
    }


    /**
     * Remove Guia from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('guia_delete')) {
            return abort(401);
        }
        $guia = Guia::findOrFail($id);
        $guia->delete();

        return redirect()->route('admin.guias.index');
    }

    /**
     * Delete all selected Guia at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('guia_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Guia::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Guia from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('guia_delete')) {
            return abort(401);
        }
        $guia = Guia::onlyTrashed()->findOrFail($id);
        $guia->restore();

        return redirect()->route('admin.guias.index');
    }

    /**
     * Permanently delete Guia from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('guia_delete')) {
            return abort(401);
        }
        $guia = Guia::onlyTrashed()->findOrFail($id);
        $guia->forceDelete();

        return redirect()->route('admin.guias.index');
    }
}
