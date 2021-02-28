<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        
         return view('reportes.index');
    }        
}
