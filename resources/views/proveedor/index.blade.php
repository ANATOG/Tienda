@extends('prueba')
 @section('contenido')
 <!-- Contenido Principal -->
 <main class="main">
   
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-danger">
        <li class="breadcrumb-item active"  ><a style="color: black;" href="/"> <h5>Sistema de Pedidos AmormioShop</h5> </a></li>
    </ol>
    <div class="container-fluid">+
	 <script>
        if(performance.navigation.type == 2){
            location.reload(true);
         }
        </script>
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
               <h2>Listado de Proveedores</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#agregarproveedor">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Agregar Proveedor
                </button>
            </div>
            <div class="card-body">
                @if(Session::has('message'))
				<div class="alert {{ Session::get('alert-class', 'alert-info') }} " role="alert">
					<strong>{{ Session::get('message') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			    @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        {{$buscar=''}}
                        {{Form::open(array('url'=>'proveedor', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
                        <div class="input-group">
                            <input type="search" class="form-control" name="buscar" placeholder="Buscar" value="{{$buscar}}">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-hover table-sm table-responsive">
                    <thead class="bg-dark text-white" >
                        <tr >
                           
                            <th>NIT</th>
                            <th>Nombre</th>                            
                            <th>Dirección</th>
                            <th>Télefono</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $c)
                        <tr>                           
                            <td>{{ $c->nit }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->direccion }}</td>
                            <td>{{ $c->telefono }}</td>

                            <td> 
                                    @if($c->condicion=="1")
                                        <button type="button" class="btn btn-success btn-sm">
                                    
                                          <i class="fa fa-check fa-1x"></i> 
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm">
                                            
                                            <i class="fa fa-check fa-1x"></i> 
                                        </button>
                                    @endif
                                       
                            </td>

                            <td>
                                <button type="button" class="btn btn-secondary btn-md" data-id_proveedor="{{$c->id}}" data-nombre="{{$c->nombre}}" data-nit="{{$c->nit}}" data-direccion="{{$c->direccion}}" data-telefono="{{$c->telefono}}" data-toggle="modal" data-target="#abrirmodalEditarPro">

                                  <i class="fa fa-edit fa-1x"></i> Editar
                                </button> &nbsp;
                            </td>
                            <td>
                            @if($c->condicion)
                                <button type="button" class="btn btn-danger btn-sm" data-id_proveedor="{{$c->id}}" data-toggle="modal" data-target="#cambiarEstadoPro">
                                    <i class="fa fa-times fa-1x"></i>
                                </button>
                             @else
                                <button type="button" class="btn btn-success btn-sm" data-id_proveedor="{{$c->id}}" data-toggle="modal" data-target="#cambiarEstadoPro">
                                    <i class="fa fa-lock fa-1x"></i> 
                                </button>
                            @endif
                            </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
                {{$proveedores->render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>


   <!--Inicio del modal agregar/-->
   <div class="modal fade" id="agregarproveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('proveedor.store')}}" method="post"  class="form-horizontal">
                {{ csrf_field() }} 
                    @include('proveedor.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del modal modificar/-->
<div class="modal fade" id="abrirmodalEditarPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('proveedor.update','test')}}" method="post"  class="form-horizontal">
                    {{method_field('patch')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_proveedor" name="id_proveedor" value="">
                    @include('proveedor.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del cambiar estado/-->
<div class="modal fade" id="cambiarEstadoPro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar estado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('proveedor.destroy','test')}}" method="post"  class="form-horizontal">
                    {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_proveedor" name="id_proveedor" value="">
                    <!--Inicio del cambiar estado/-->
                    <p>Esta seguro de cambiar el estado</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>                                
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->
   
    
</main>
<!-- /Fin del contenido principal -->
 @endsection