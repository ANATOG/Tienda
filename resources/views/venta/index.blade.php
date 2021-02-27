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
               <h2>Listado de ventas</h2><br/>
                <button class="btn btn-danger btn-lg" type="button" data-toggle="modal" data-target="#nuevaventa">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Nueva venta
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
                        {{ Form::open(array('url'=>'venta', 'method'=>'GET','autocomplete'=>'off','role'=>'search'))}}
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
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Ver</th>
                            <th>PDF</th>
                            <th>Anular</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $v)
                        <tr>
                            
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->fecha_venta }}</td>
                            <td>{{ $v->cliente}}</td>
                            <td>Q.{{ $v->total }}</td>
                            <td>
                                <a href="{{url('pdfventa',$v->id)}}" target="_blank">                                          
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button> &nbsp;
                                 </a> 
                            </td>
                            <td>
                                <a href="{{url('pdfventa',$v->id)}}" target="_blank">                                          
                                    <button type="button" class="btn btn-danger btn-sm">
                                      <i class="fas fa-file-pdf fa-1x"></i>
                                    </button> &nbsp;
                                 </a> 
                            </td>
                            <td>
                            @if($v->estado)
                                <button type="button" class="btn btn-danger btn-sm" data-id_venta="{{$v->id}}" data-toggle="modal" data-target="#anularventa">
                                    <i class="fa fa-times fa-1x"></i>
                                </button>
                            @endif
                            </td>
                        </tr>
                    @endforeach   
                    </tbody>
                </table>
                {{$ventas->render()}}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>


   <!--Inicio del modal agregar/-->
   <div class="modal fade bd-example-modal-lg" id="nuevaventa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">Registrar venta</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close ">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('venta.store')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }} 
                    @include('venta.form')
                    
                </form>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Fin del modal-->

<!--Inicio del cambiar estado/-->
<div class="modal fade" id="anularventa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Anular venta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="{{route('venta.destroy','test')}}" method="post"  class="form-horizontal">
                    {{method_field('delete')}}<!-- proteger en la modificacion de registro -->
                    {{ csrf_field() }} 
                    <input type="hidden" id="id_venta" name="id_venta" value="">
                    <!--Inicio del cambiar estado/-->
                    <p>Esta seguro de anular la venta</p>
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
    $("#agregarc").click(function(){
        agregarc();
    });

    var contc=0;
    totalc=0;
    subtotalc=[];    
    $("#guardarc").hide();
    $("#id_productoc").change(mostrarValoresc);

    function mostrarValoresc(){
        $("#precio_ventac").empty(); //limpiar el select de precios
        $("#precio_ventac").prepend('<option selected value="" disabled>Precio</option>');
        datosProductoc = document.getElementById('id_productoc').value.split('_');

        //habilitar el input y select de cantidad y precio
        $("#stockc").val(datosProductoc[1]);
        document.getElementById("cantidadc").disabled = false;
        document.getElementById("precio_ventac").disabled = false;

        ///agregar precios al select
        var x = document.getElementById('precio_ventac');
        for ( i = 2; i <= 4; i += 1 ) {
            var option = document.createElement("option");
            option.text = datosProductoc[i];
            option.value = parseFloat(datosProductoc[i]).toFixed(2);
            x.add(option); 
        }
    } 

    function agregarc(){
        datosProductoc = document.getElementById('id_productoc').value.split('_');
        id_productoc= datosProductoc[0];
        productoc= $("#id_productoc option:selected").text();
        cantidadc= $("#cantidadc").val();
        precio_ventac= $("#precio_ventac").val();

        stockc= $("#stockc").val();
        impuestoc=20;

        if (checkId(productoc)) {
  	        return alert('El producto ya esta agregado');
        }
        
        if(id_productoc !="" && cantidadc!="" && cantidadc>0  && precio_ventac!=""){
            if(parseInt(stockc)>=parseInt(cantidadc)){
                subtotalc[contc]=(cantidadc*precio_ventac);
                totalc= totalc+subtotalc[contc];
                //<td><input type="number" class="form-control" name="precio_ventac[]" value="'+parseFloat(precio_ventac).toFixed(2)+'"></td>
                var filac= '<tr class="selected" id="filac'+contc+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarc('+contc+');"><i class="fa fa-times">      </i></button></td> <td for="id"><input type="hidden" name="id_productoc[]" value="'+id_productoc+'">'+productoc+'</td> <td><input readonly type="number" class="form-control" name="precio_ventac[]" value="'+parseFloat(precio_ventac).toFixed(2)+'"></td>  <td><input readonly type="number" class="form-control" name="cantidadc[]" value="'+cantidadc+'"> </td> <td>Q. '+parseFloat(subtotalc[contc]).toFixed(2)+'</td></tr>';
            
                contc++;
                limpiarc();
                totalesc();   
                evaluarc();
                $('#detallesc').append(filac);
            } else{
                alert("La cantidad a vender supera el stock");
            }
            
        }else{
            alert("Rellene todos los campos del detalle de la venta")
        }

    }

    function checkId (id) {
	    let ids = document.querySelectorAll('#detallesc td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    function limpiarc(){
        $("#cantidadc").val("");
        $("#precio_ventac").val("");
        $("#stockc").val("");
        $("#id_productoc")[0].selectize.clear();
        $("#precio_ventac").empty();
        $("#precio_ventac").prepend('<option selected value="" disabled>Precio</option>');
        document.getElementById("cantidadc").disabled = true;
        document.getElementById("precio_ventac").disabled = true;
        
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