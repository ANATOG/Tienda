<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
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
                $productos = Producto::join('categorias', 'productos.idCategoria', '=', 'categorias.id') 
                                ->join('proveedores', 'productos.idProveedor', '=', 'proveedores.id') 
                                ->select('productos.*', 'categorias.nombre as categoria', 'proveedores.nombre as proveedor')                  
                                ->where('productos.nombre', 'LIKE', '%'.$consulta.'%')
                                ->orderBy('productos.nombre')
                                ->paginate(15);
                                //return view('producto.index');
                $categorias = Categoria::all();
                $proveedores = Proveedor::all();
                return view('producto.index', ["productos"=>$productos, "buscar"=>$consulta, 'categorias'=>$categorias, 'proveedores'=>$proveedores]);
            }
            catch(Exception $exception)
            {
                \Session::flash('message', 'Error'); 
                \Session::flash('alert-class', 'alert-danger'); 
                return redirect()->back();
            }            
        }
    } 
    
    public function store(Request $request)
    {
        
        try{
            DB::beginTransaction();
            $productos= new Producto();
            $productos->nombre= $request->nombre;
            $productos->precioCosto= $request->precioCosto;
            $productos->precioVenta= $request->precioVenta;
            $productos->precioMayorista= $request->precioMayorista;
            $productos->descripcion=$request->descripcion;
            $productos->condicion='1';
            $productos->idCategoria=$request->idCategoria;
            $productos->idProveedor=$request->idProveedor;
            $productos->save();
            DB::commit();
            return Redirect::to("producto");

        }catch(Exception $exception){
            DB::rollBack();
            \Session::flash('message', 'Tu registro no se pudo guardar. Verfica que el código no exista'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $productos= Producto::findOrFail($request->id_producto);
        try{
            DB::beginTransaction();
            $productos->nombre= $request->nombre;
            $productos->precioCosto= $request->precioCosto;
            $productos->precioVenta= $request->precioVenta;
            $productos->precioMayorista= $request->precioMayorista;
            $productos->descripcion=$request->descripcion;
            $productos->condicion='1';
            $productos->idCategoria=$request->idCategoria;
            $productos->idProveedor=$request->idProveedor;
            $productos->save();
            DB::commit();
            return Redirect::to("producto");
        }catch(Exception $exception){
            DB::rollBack();
            \Session::flash('message', 'Tu registro no se pudo actualizar. Verfica que el código no exista'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();        
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $productos  = Producto::findOrFail($request->id_producto);
        try {
            DB::beginTransaction();
            if($productos->condicion=='1')
            {
                $productos->condicion='0';
                $productos->save();
                
            }else 
            {
                $productos->condicion='1';
                $productos->save();
            }
            DB::commit();
            return Redirect::to("producto");
        

        }catch(Exception $exception) {
            DB::rollBack();
            \Session::flash('message', 'Error'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }

}
