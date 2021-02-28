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
               <h2>Listado de compras</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#nuevaCompra">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Nueva compra
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
                        {{ Form::open(array('url'=>'compra', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
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
                            <th>#Compra</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Total</th>
                            <th>PDF</th>
                            <th>Anular</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $c)
                        <tr>
                            
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->numcompra }}</td>
                            <td>{{ $c->fechacom }}</td>
                            <td>{{ $c->proveedor}}</td>
                            <td>Q.{{ $c->total }}</td>
                            <td>
                                <a href="{{url('pdfcompra',$c->id)}}" target="_blank">                                          
                                    <button type="button" class="btn btn-danger btn-sm">
                                      <i class="fas fa-file-pdf fa-1x"></i>
                                    </button> &nbsp;
                                 </a> 
                            </td>
                            <td>
                            @if($c->estado)
                                <button type="button" class="btn btn-danger btn-sm" data-id_compra="{{$c->id}}" data-toggle="modal" data-target="#anularCompra">
                                    <i class="fa fa-times fa-1x"></i>
                                </button>
                            @endif
                            </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
                {{$compras->render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>

 
   <!--Inicio del modal agregar/-->
   <div class="modal fade bd-example-modal-lg" id="nuevaCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Registrar compra</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close ">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('compra.store')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }} 
                    @include('compra.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del cambiar estado/-->
<div class="modal fade" id="anularCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Anular venta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('compra.destroy','test')}}" method="post"  class="form-horizontal">
                    {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_compra" name="id_compra" value="">
                    <!--Inicio del cambiar estado/-->
                    <p>Esta seguro de anular la compra</p>
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


<!-- JS para venta -->
<script>
    $('#nuevaCompra').on('hidden.bs.modal', function (event) {
        location.reload();
    });
    
    $("#idProveedor").change(function(event)
    {
        $.get("/selectProducto/"+event.target.value+"", function(response, selectProducto){
            $("#id_producto").empty();
            $("#id_producto").append("<option value=''>Seleccione</option>");
            for (i=0;i<response.length;i++){
                $("#id_producto").append("<option value='"+response[i].id+"'>"+response[i].nombre+"</option>");
            }            
        }); 
        $('#idProveedor')[0].selectize.lock(); //bloquear select  
    });

    $("#agregarc").click(function(){
        agregarc();
    });

    var contc=0;
    totalc=0;
    subtotalc=[];    
    $("#guardarc").hide();
    $("#id_producto").change(mostrarValoresc);

    function mostrarValoresc(){
      
        //habilitar el input y select de cantidad y precio
        document.getElementById("cantidad").disabled = false;
        document.getElementById("precio").disabled = false;
    } 

    function agregarc(){
        datosProductoc = document.getElementById('id_producto').value.split('_');
        id_producto= datosProductoc[0];
        productoc= $("#id_producto option:selected").text();
        cantidad= $("#cantidad").val();
        precio= $("#precio").val();

        if (checkId(productoc)) {
            limpiarc();
  	        return alert('El producto ya esta agregado');

        }
        
        if(id_producto !="" && cantidad!="" && cantidad>0  && precio!=""){
                subtotalc[contc]=(cantidad*precio);
                totalc= totalc+subtotalc[contc];
                var filac= '<tr class="selected" id="filac'+contc+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarc('+contc+');"><i class="fa fa-times">      </i></button></td> <td for="id"><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+productoc+'</td> <td><input readonly type="number" class="form-control" name="precio[]" value="'+parseFloat(precio).toFixed(2)+'"></td>  <td><input readonly type="number" class="form-control" name="cantidad[]" value="'+cantidad+'"> </td> <td>Q. '+parseFloat(subtotalc[contc]).toFixed(2)+'</td></tr>';
            
                contc++;
                limpiarc();
                totalesc();   
                evaluarc();
                $('#detallesc').append(filac);            
        }else{
            alert("Rellene todos los campos del detalle de la compra")
        }

    }

    function checkId (id) {
	    let ids = document.querySelectorAll('#detallesc td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    function limpiarc(){
        $("#cantidad").val("");
        $("#precio").val("");      
        document.getElementById("cantidad").disabled = true;
        document.getElementById("precio").disabled = true;
        
    }

    function totalesc(){
        $("#totalc").html("Q. " + totalc.toFixed(2));
        total_pagarc=totalc;
        $("#total_pagar_htmlc").html("Q. " + total_pagarc.toFixed(2));
        $("#total_pagarc").val(total_pagarc.toFixed(2));
    }

    function evaluarc(){
        if(totalc>0){
            $("#guardarc").show();
        } else{            
            $("#guardarc").hide();
        }
    }

    function eliminarc(indexc){
        totalc=totalc-subtotalc[indexc];
        total_pagar_htmlc = totalc;

        $("#totalc").html("Q." + totalc.toFixed(2));
        $("#total_pagar_htmlc").html("Q." + total_pagar_htmlc.toFixed(2));
        $("#total_pagarc").val(total_pagar_htmlc.toFixed(2));

        $("#filac" + indexc).remove();
        evaluarc();
    }

</script>

<!-- /Fin JS venta -->
 @endsection