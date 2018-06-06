<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\App\Relatorio::all() as $relatorio) { 
           $crudFieldValue = $relatorio->getOriginal('created_at'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $relatorio->data_final; 
           $prefix         = ''; 
           $suffix         = 'Criado'; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.relatorios.edit', $relatorio->id)
           ]; 
        } 

        foreach (\App\Guia::all() as $guia) { 
           $crudFieldValue = $guia->getOriginal('created_at'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $guia->nome_do_pacinte; 
           $prefix         = ''; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.guias.edit', $guia->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
