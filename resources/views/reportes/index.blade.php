@extends('prueba')
 @section('contenido')
 <!-- Contenido Principal -->
 <main class="main">
   
    <!-- Breadcrumb -->
    
    <div class="container-fluid">
	 <script>
        if(performance.navigation.type == 2){
            location.reload(true);
         }
        </script>
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
               <h2>Reporte de ganancias y perdidas mensual</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#crearReporte">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Crear reporte
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

   <!--Inicio del modal agregar/-->
   <div class="modal fade" id="crearReporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reporte mensual de ganancias</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('categoria.store')}}" method="post"  class="form-horizontal">
                {{ csrf_field() }} 
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="text-input">Seleccione el mes</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Nombre de categoría" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
                        
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