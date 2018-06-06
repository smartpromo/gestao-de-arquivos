<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class CadastrosController extends Controller
{
    public function index()
    {
        if (! Gate::allows('cadastro_access')) {
            return abort(401);
        }
        return view('admin.cadastros.index');
    }
}
