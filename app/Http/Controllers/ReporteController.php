<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PDF;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        
         return view('reportes.index');
    } 
    
    public function pdf(Request $request){         
        $pdf= \PDF::loadView('reportes.pdf');
        return $pdf->download('venta-.pdf');
    }
}
