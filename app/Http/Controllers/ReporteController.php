<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PDF;
use App\Venta;
use App\Vencido;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        
         return view('reportes.index');
    } 
    
    public function pdf(Request $request){
        $fecha= strtotime($request->startDate);
        $mes = strftime("%m",$fecha);
        $anio = strftime("%Y",$fecha);
    
        $costo = Venta::where('ventas.estado', '=', 1)
        ->whereMonth('fecha_venta', $mes)
        ->whereYear('fecha_venta', $anio)
        ->sum('costo');

        $vendido = Venta::where('ventas.estado', '=', 1)
        ->whereMonth('fecha_venta', $mes)
        ->whereYear('fecha_venta', $anio)
        ->sum('total');

        $vencido = Vencido::where('vencidos.condicion', '=', 1)
        ->whereMonth('fecha', $mes)
        ->whereYear('fecha', $anio)
        ->sum('perdida');

        $pdf= \PDF::loadView('reportes.pdf',['costo'=>$costo, 'vendido'=>$vendido, 'vencido'=>$vencido,'mes'=>$mes, 'anio'=>$anio ]);
        return $pdf->download('reporte-'.$mes.'-'.$anio.'.pdf');
    }
}
