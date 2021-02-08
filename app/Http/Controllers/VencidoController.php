<?php

namespace App\Http\Controllers;

use App\Vencido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class VencidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            try
            {
                $consulta = trim($request->get('buscar'));
                $vencidos = Vencido::join('productos', 'vencidos.idProducto', '=', 'productos.id') 
                                ->select('vencidos.*', 'productos.nombre as producto')                  
                                ->where('productos.nombre', 'LIKE', '%'.$consulta.'%')
                                ->where('vencidos.condicion', '=', '1')
                                ->orderBy('productos.nombre')
                                ->paginate(15);
                                //return view('producto.index');
                $productos = Producto::all();
                return view('vencido.index', ["vencidos"=>$vencidos,"productos"=>$productos, "buscar"=>$consulta]);
            }
            catch(Exception $exception)
            {
                \Session::flash('message', 'Error'.$exception); 
                \Session::flash('alert-class', 'alert-danger'); 
                return redirect()->back();
            }            
        }
    } 

    public function store(Request $request)
    {
        
        try{
            DB::beginTransaction();
            $vencidos= new Vencido();
            $vencidos->idProducto= $request->idProducto;
            $vencidos->caducado= $request->caducado;
            $vencidos->idSucursal= '1';
            $vencidos->condicion='1';
            $vencidos->save();
           // DB::statement('call llenado_stocks(?,?)', [1,$productos->id]);
            DB::commit();
            return Redirect::to("vencido");

        }catch(Exception $exception){
            DB::rollBack();
            \Session::flash('message', 'Tu registro no se pudo guardar.'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();        
        }
    }

    public function destroy(Request $request)
    {
        $vencidos  = Vencido::findOrFail($request->id_vencido);
        try {
            DB::beginTransaction();
            if($vencidos->condicion=='1')
            {
                $vencidos->condicion='0';
                $vencidos->save();
                
            }
            DB::commit();
            return Redirect::to("vencido");
        

        }catch(Exception $exception) {
            DB::rollBack();
            \Session::flash('message', 'Error'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }
}
