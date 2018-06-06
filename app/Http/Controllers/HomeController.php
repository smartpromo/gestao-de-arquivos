<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $guias = \App\Guia::latest()->limit(5)->get(); 
        $medicos = \App\Medico::latest()->limit(5)->get(); 

        return view('home', compact( 'guias', 'medicos' ));
    }
}
