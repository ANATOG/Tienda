<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Sucursal;
use Illuminate\Support\Facades\DB;
use Exception;

class SucursalController extends Controller
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
                $sucursales = Sucursal::where('nombre', 'LIKE', '%'.$consulta.'%')
                                ->orderBy('nombre')
                                ->paginate(15);
                return view('sucursal.index', ["sucursales"=>$sucursales, "buscar"=>$consulta]);
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
            $sucursales= new Sucursal();
            $sucursales->nombre= $request->nombre;
            $sucursales->direccion= $request->direccion;
            $sucursales->condicion='1';
            $sucursales->save();
            DB::commit();
            return Redirect::to('sucursal');//redireccionar al index marca
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
            $sucursales = Sucursal::findOrFail($request->id_sucursal);
            $sucursales->nombre= $request->nombre;
            $sucursales->direccion= $request->direccion;
            $sucursales->condicion='1';
            $sucursales->save();
            DB::commit();
            return Redirect::to('sucursal');
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
        $sucursales  = Sucursal::findOrFail($request->id_sucursal);
        try{
            DB::beginTransaction();
            if($sucursales->condicion=='1')
            {
                $sucursales->condicion='0';
                $sucursales->save();
                
            }else{
                $sucursales->condicion='1';
                $sucursales->save();
            }
            DB::commit();
            return Redirect::to('sucursal');
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al cambiar estado'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }
}
