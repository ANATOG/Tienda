<?php

use App\Compra;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Producto;
use App\Proveedor;
use Illuminate\Support\Facades\DB;
use Exception;
use App\DetalleCompra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $compras = Compra::latest()
                ->join('proveedores', 'compras.idProveedor', '=', 'proveedores.id')
                ->select('compras.*', 'proveedores.nombre as proveedor')  
                ->where('compras.estado', '=', '1')
                ->paginate(15);
            $proveedores= Proveedor::select('id','nombre')
                ->where('condicion','=','1')
                ->orderBy('id', 'asc')
                ->get();
            $productos= Producto::join('stocks', 'stocks.idProducto', '=', 'productos.id')
                ->select('productos.*', 'stocks.existencia as existencia')
                ->where('productos.condicion','=','1')
                ->orderBy('productos.nombre', 'asc')
                ->get();
            //$totalMonth= Pedido::totalMonth();
            //$totalMounthCount= Pedido::totalMonthCount();
            return view ('compra.index', ['compras'=>$compras,'proveedores'=>$proveedores,'productos'=>$productos]);
        }catch(Exception $exception) {
            \Session::flash('message', 'Error'.$exception); 
            \Session::flash('alert-class', 'alert-warning'); 
            return redirect()->back();
        }
    }

   /*public function store(Request $request){         
         
        try{
            DB::beginTransaction();
            $tiempo= Carbon::now('America/Guatemala');
            $venta = new Venta();
            $venta->idCliente = $request->idCliente;
            //$venta->idUsuario =\Auth::user()->id;      
            $venta->idSucursal = 1;
            //$venta->numventa = $request->num_ventac;
            $venta->fecha_venta = $tiempo->toDateString();
            $venta->total=$request->total_pagarc;
            $venta->estado = 1;
            $venta->save();
    
            $id_producto=$request->id_productoc;
            $cantidad=$request->cantidadc;
            $precio=$request->precio_ventac;
    
            
            //Recorro todos los elementos
            $cont=0;
    
            while($cont < count($id_producto)){    
                $detalle = new DetalleVenta();
                /*enviamos valores a las propiedades del objeto detalle*/
                /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                /*el id es del registro de la venta*/
               /* $detalle->idVenta = $venta->id;
                if(isset($id_producto[$cont])){
                    $detalle->idProductos = $id_producto[$cont];
                }
                //$detalle->idProductos = $id_producto[$cont];
                if(isset($cantidad[$cont])){
                    $detalle->cantidad = $cantidad[$cont];
                }
                //$detalle->cantidad = $cantidad[$cont];
                if(isset($precio[$cont])){
                    $detalle->precio = $precio[$cont];
                }
                //$detalle->precio = $precio[$cont];         
                $detalle->save();
                $cont=$cont+1;
            }                
            DB::commit();
            return Redirect::to('venta');
    
        }catch(Exception $e){        
            DB::rollBack();
            \Session::flash('message', 'Tu registro no se pudo guardar.'.$e); 
            \Session::flash('alert-class', 'alert-danger'); 
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
                $detalles = DetalleVenta::select('detalle_ventas.*')->where('detalle_ventas.idVenta', '=', $ventas->id)->get();
                foreach($detalles as $d){
                    DB::statement('call devuelve_stocks(?,?)', [$d->idProductos,$d->cantidad]);
                }
                
            }
            DB::commit();
            return Redirect::to("venta");
        

        }catch(Exception $exception) {
            DB::rollBack();
            \Session::flash('message', 'Error'.$exception); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }        
    }*/
}
