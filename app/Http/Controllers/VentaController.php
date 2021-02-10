<?php

namespace App\Http\Controllers;

use App\Venta;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Producto;
use App\Cliente;
use Illuminate\Support\Facades\DB;
use Exception;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $ventas = Venta::latest()
                ->join('clientes', 'ventas.idCliente', '=', 'clientes.id')
                ->select('ventas.*', 'clientes.nombre as cliente')  
                ->where('ventas.estado', '=', '1')
                ->paginate(15);
            $clientes= Cliente::where('condicion','=','1')
                ->select('id','nombre')
                ->orderBy('nombre', 'asc')
                ->get();
            $productos= Producto::join('stocks', 'stocks.idProducto', '=', 'productos.id')
                ->select('productos.*', 'stocks.existencia as existencia')
                ->where('productos.condicion','=','1')
                ->orderBy('productos.nombre', 'asc')
                ->get();
            //$totalMonth= Pedido::totalMonth();
            //$totalMounthCount= Pedido::totalMonthCount();
            return view ('venta.index', ['ventas'=>$ventas,'clientes'=>$clientes,'productos'=>$productos]);
        }catch(Exception $exception) {
            \Session::flash('message', 'Error'.$exception); 
            \Session::flash('alert-class', 'alert-warning'); 
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $ventas  = Venta::findOrFail($request->id_venta);
        try {
            DB::beginTransaction();
            if($ventas->estado=='1')
            {
                $ventas->estado='0';
                $ventas->save();
                
            }
            DB::commit();
            return Redirect::to("venta");
        

        }catch(Exception $exception) {
            DB::rollBack();
            \Session::flash('message', 'Error'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }

}
