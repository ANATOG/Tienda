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
               <h2>Listado de vencidos</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#agregarvencido">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Reportar vencidos
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
                        {{ Form::open(array('url'=>'vencido', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
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
                           
                            <th>No.</th>
                            <th>Producto</th>
                            <th>Vencido</th>
                            <th>Anular</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vencidos as $v)
                        <tr>
                            
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->producto }}</td>
                            <td>{{ $v->caducado }}</td>
                            <td>
                            @if($v->condicion)
                                <button type="button" class="btn btn-danger btn-sm" data-id_vencido="{{$v->id}}" data-toggle="modal" data-target="#cambiarEstadoVencido">
                                    <i class="fa fa-times fa-1x"></i>
                                </button>
                            @endif
                            </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
                {{$vencidos->render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>


   <!--Inicio del modal agregar/-->
   <div class="modal fade" id="agregarvencido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reportar vencidos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('vencido.store')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }} 
                    @include('vencido.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del cambiar estado/-->
<div class="modal fade" id="cambiarEstadoVencido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Anular</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('vencido.destroy','test')}}" method="post"  class="form-horizontal">
                    {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_vencido" name="id_vencido" value="">
                    <!--Inicio del cambiar estado/-->
                    <p>Esta seguro de anular</p>
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