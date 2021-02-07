<?php

namespace App\Http\Controllers;

use App\Categoria;
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
                                ->select('productos.*', 'categorias.nombre as categoria')                  
                                ->where('productos.nombre', 'LIKE', '%'.$consulta.'%')
                                ->orderBy('productos.nombre')
                                ->paginate(15);
                                //return view('producto.index');
                $categorias = Categoria::all();
                return view('producto.index', ["productos"=>$productos, "buscar"=>$consulta, 'categorias'=>$categorias]);
            }
            catch(Exception $exception)
            {
                \Session::flash('message', 'Error'); 
                \Session::flash('alert-class', 'alert-danger'); 
                return redirect()->back();
            }            
        }
    }   

}
