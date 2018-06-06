<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class EnvioDeGuiasController extends Controller
{
    public function index()
    {
        if (! Gate::allows('envio_de_guia_access')) {
            return abort(401);
        }
        return view('admin.envio_de_guias.index');
    }
}
