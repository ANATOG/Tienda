@extends('prueba')
 @section('contenido')
 <!-- Contenido Principal -->
 <main class="main">
    
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-danger">
        <li class="breadcrumb-item active"  ><a style="color: black;" href="/"> <h5>Sistema de Pedidos AmormioShop</h5> </a></li>
    </ol>
    <div class="container-fluid">
	<script>
        if(performance.navigation.type == 2){
            location.reload(true);
         }
        </script>
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
               <h2>Listado de productos</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#agregarproducto">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Agregar producto
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
                        {{ Form::open(array('url'=>'producto', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
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
                           
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Proveedor</th>
                            <th>P.Costo</th>
                            <th>P.Venta</th>
                            <th>P.Mayorista</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $p)
                        <tr>
                            
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td>{{ $p->categoria }}</td>
                            <td>{{ $p->proveedor }}</td>
                            <td>Q.{{ $p->precioCosto }}</td>
                            <td>Q.{{ $p->precioVenta }}</td>
                            <td>Q.{{ $p->precioMayorista }}</td>

                            
                            <td> 
                                    @if($p->condicion=="1")
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
                                <button type="button" class="btn btn-secondary btn-md" 
                                data-id_producto="{{$p->id}}" data-precio_costo="{{$p->precioCosto}}"
                                data-nombre="{{$p->nombre}}" data-descripcion="{{$p->descripcion}}"
                                data-precio_venta="{{$p->precioVenta}}" data-precio_mayorista="{{$p->precioMayorista}}"
                                data-id_proveedor="{{$p->idProveedor}}" data-id_categoria="{{$p->idCategoria}}"
                                data-toggle="modal" data-target="#editarProducto">

                                  <i class="fa fa-edit fa-1x"></i> Editar
                                </button> &nbsp;
                            </td>
                            <td>
                            @if($p->condicion)
                                <button type="button" class="btn btn-danger btn-sm" data-id_producto="{{$p->id}}" data-toggle="modal" data-target="#cambiarEstadoProducto">
                                    <i class="fa fa-times fa-1x"></i>
                                </button>
                             @else
                                <button type="button" class="btn btn-success btn-sm" data-id_producto="{{$p->id}}" data-toggle="modal" data-target="#cambiarEstadoProducto">
                                    <i class="fa fa-lock fa-1x"></i> 
                                </button>
                            @endif
                            </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
                {{$productos->render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>


   <!--Inicio del modal agregar/-->
   <div class="modal fade" id="agregarproducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('producto.store')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }} 
                    @include('producto.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del modal modificar/-->
<div class="modal fade" id="editarProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('producto.update','test')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                    {{method_field('patch')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_producto" name="id_producto" value="">
                    @include('producto.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del cambiar estado/-->
<div class="modal fade" id="cambiarEstadoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar estado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('producto.destroy','test')}}" method="post"  class="form-horizontal">
                    {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_producto" name="id_producto" value="">
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