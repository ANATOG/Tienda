<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Proveedor;
use Illuminate\Support\Facades\DB;
use Exception;

class ProveedorController extends Controller
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
                $proveedores = Proveedor::where('nombre', 'LIKE', '%'.$consulta.'%')
                                ->orWhere('nit', 'LIKE', '%'.$consulta.'%')
                                ->orderBy('nombre')
                                ->paginate(15);
                return view('proveedor.index', ["proveedores"=>$proveedores, "buscar"=>$consulta]);
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
            $proveedores= new Proveedor();
            $proveedores->nombre= $request->nombre;
            $proveedores->nit= $request->nit;
            $proveedores->telefono= $request->telefono;
            $proveedores->direccion= $request->direccion;
            $proveedores->condicion='1';
            $proveedores->save();
            DB::commit();
            return Redirect::to("proveedor");//redireccionar al index marca
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
            $proveedores = Proveedor::findOrFail($request->id_proveedor);
            $proveedores->nombre= $request->nombre;
            $proveedores->nit= $request->nit;
            $proveedores->telefono= $request->telefono;
            $proveedores->direccion= $request->direccion;
            $proveedores->condicion='1';
            $proveedores->save();
            DB::commit();
            return Redirect::to("proveedor");
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al actualizar'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $proveedores  = Proveedor::findOrFail($request->id_proveedor);
        try{
            DB::beginTransaction();
            if($proveedores->condicion=='1')
            {
                $proveedores->condicion='0';
                $proveedores->save();
                
            }else{
                $proveedores->condicion='1';
                $proveedores->save();
            }
            DB::commit();
            return Redirect::to("proveedor");
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al cambiar estado'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }
}
