<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Categoria;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoriaController extends Controller
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
                $categorias = Categoria::where('nombre', 'LIKE', '%'.$consulta.'%')
                                ->orderBy('nombre')
                                ->paginate(15);
                return view('categoria.index', ["categorias"=>$categorias, "buscar"=>$consulta]);
            }
            catch(Exception $exception)
            {
                \Session::flash('message', 'Error'); 
                \Session::flash('alert-class', 'alert-warning'); 
                return redirect()->back();
            }            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $categorias= new Categoria();
            $categorias->nombre= $request->nombre;
            $categorias->condicion='1';
            $categorias->save();
            DB::commit();
            return Redirect::to("categoria");//redireccionar al index marca
        } catch(Exception $exception) {
             DB::rollBack();
            \Session::flash('message', 'Error al guardar'); 
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
        try {
            DB::beginTransaction();
            $categorias = Categoria::findOrFail($request->id_categoria);
            $categorias->nombre= $request->nombre;
            $categorias->condicion='1';
            $categorias->save();
            DB::commit();
            return Redirect::to("categoria");
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al actualizar'); 
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
        $categorias  = Categoria::findOrFail($request->id_categoria);
        try{
            DB::beginTransaction();
            if($categorias->condicion=='1')
            {
                $categorias->condicion='0';
                $categorias->save();
                
            }else{
                $categorias->condicion='1';
                $categorias->save();
            }
            DB::commit();
            return Redirect::to("categoria");
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al cambiar estado'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }
}
