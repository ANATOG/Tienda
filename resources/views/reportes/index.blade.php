@extends('prueba')
 @section('contenido')
 <!-- Contenido Principal -->
 <main class="main">
   
    <!-- Breadcrumb -->

    <div class="container">
    <div class="container-fluid">
	 <script>
        if(performance.navigation.type == 2){
            location.reload(true);
         }
        </script>
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
               <h2>Reporte mensual</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#agregarcliente">
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
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    </div>


   <!--Inicio del modal agregar/-->
   <div class="modal fade" id="agregarcliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <script type="text/javascript"> 
                $(function() {
                    $('.date-picker').datepicker( {
                        closeText: 'Seleccionar',
                        prevText: '<Ant',
                        nextText: 'Sig>',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                        changeMonth: true,
                        changeYear: true,
                        showButtonPanel: true,
                        dateFormat: 'MM yy',
                        onClose: function(dateText, inst) { 
                            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                        }
                    });
                });
            </script>
                <style> .ui-datepicker-calendar { display: none; } 
            </style>


            <div class="modal-body">
                <form action="{{route('pdf')}}" method="get"  class="form-horizontal">
                {{ csrf_field() }} 
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="text-input">Seleccione mes</label>
                    <div class="col-md-9">
                        <input  name="startDate" id="startDate" class="date-picker form-control" />
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Descargar PDF</button>
                    
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