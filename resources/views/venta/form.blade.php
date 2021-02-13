    <div class="container  justify-content-center align-items-center bg-light">
        <div class="row justify-content-center align-items-center">
            <h3>Datos de venta</h3>
        </div>
        <br>
        <div class="row">        
            <div class="form-group col-md-4">
                 
                <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" id="nombre" name="nombre"  disabled>        
            </div>
            <div class="form-group col-md-8"> 
                <select class="form-control selectpicker" name="idCliente" id="idCliente" required data-live-search="true">                                                            
                    <option value="" selected>Seleccione cliente</option>                            
                        @foreach($clientes as $c)
                            <option value="{{$c->id}}">{{$c->nombre}}</option>    
                        @endforeach
                </select>
            </div>
        </div>    
    </div>                                                

    <hr>
    <div class="container  justify-content-center align-items-center bg-light">
        <div class="row justify-content-center align-items-center">
            <h3>Detalle de venta</h3>
        </div>
        <br>
    
        <div class="row">
            <div class="form-group col-md-4"> 
                
                <select class="form-control selectpicker" name="id_productoc" id="id_productoc" data-live-search="true">                                                            
                    <option value="" selected disabled>Seleccione producto</option>                            
                    @foreach($productos as $prod)                            
                    <option value="{{$prod->id}}_{{$prod->existencia}}_{{$prod->precioVenta}}">{{$prod->nombre}}</option>                                    
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                  
                <input type="number" id="cantidadc" name="cantidadc" class="form-control" placeholder="Cantidad" pattern="[0-9]{0,15}">
            </div>
            <div class="form-group col-md-2">
                
                <input type="number" disabled id="stockc" name="stockc" class="form-control" placeholder="Stock" pattern="[0-9]{0,15}">
            </div>
            <div class="form-group col-md-2">
                
                <input type="number" disabled id="precio_ventac" name="precio_ventac" class="form-control" placeholder="Precio" pattern="[0-9]{0,15}">                        
            </div>
            <div class="form-group col-md-2">   
                <button type="button" id="agregarc" class="btn btn-danger round-button"><i class="fa fa-plus "></i></button>  
            </div>
        </div>
    </div>

    <br/><br/>
    
    <div CLASS="container">
        <table id="detallesc" class="table table-bordered table-striped table-sm">
            <thead class="bg-danger text-white">
                <tr>
                    <th>Eliminar</th>
                    <th>Medicamento</th>
                    <th>Precio(Q.)</th>
                    <th>Cantidad</th>
                    <th>SubTotal (Q.)</th>
                </tr>
            </thead>                                    
            <tfoot class="bg-light">
                <tr>
                    <th  colspan="4"><p align="right">TOTAL:</p></th>
                    <th><p align="right"><span id="totalc">Q. 0.00</span> </p></th>
                </tr>
                <tr>
                    <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                    <th><p align="right"><span align="right" id="total_pagar_htmlc">Q. 0.00</span> <input type="hidden" name="total_pagarc" id="total_pagarc"></p></th>
                </tr> 
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal-footer form-group row" id="guardarc">            
        <div class="col-md">
        <input type="hidden" name="_token" value="{{csrf_token()}}">              
            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Registrar</button>            
        </div>
    </div>
    
   

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
    </div>

<script>
    jQuery(document).ready(function($){
    $(document).ready(function() {
        $('.mi-selector').select2();
    });
});


</script>