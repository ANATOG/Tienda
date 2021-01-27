<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Cliente;
use Illuminate\Support\Facades\DB;
use Exception;

class ClienteController extends Controller
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
                $clientes = Cliente::where('nombre', 'LIKE', '%'.$consulta.'%')
                                ->orWhere('codigo', 'LIKE', '%'.$consulta.'%')
                                ->orderBy('nombre')
                                ->paginate(15);
                return view('cliente.index', ["clientes"=>$clientes, "buscar"=>$consulta]);
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
            $clientes= new Cliente();
            $clientes->nombre= $request->nombre;
            $clientes->codigo= $request->codigo;
            $clientes->telefono= $request->telefono;
            $clientes->direccion= $request->direccion;
            $clientes->condicion='1';
            $clientes->save();
            DB::commit();
            return Redirect::to("cliente");//redireccionar al index marca
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
            $clientes = Cliente::findOrFail($request->id_cliente);
            $clientes->nombre= $request->nombre;
            $clientes->codigo= $request->codigo;
            $clientes->telefono= $request->telefono;
            $clientes->direccion= $request->direccion;
            $clientes->condicion='1';
            $clientes->save();
            DB::commit();
            return Redirect::to("cliente");
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al actualizar'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $clientes  = Cliente::findOrFail($request->id_cliente);
        try{
            DB::beginTransaction();
            if($clientes->condicion=='1')
            {
                $clientes->condicion='0';
                $clientes->save();
                
            }else{
                $clientes->condicion='1';
                $clientes->save();
            }
            DB::commit();
            return Redirect::to("cliente");
        }catch(Exception $exception){
             DB::rollBack();
            \Session::flash('message', 'Error al cambiar estado'); 
            \Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }
}
