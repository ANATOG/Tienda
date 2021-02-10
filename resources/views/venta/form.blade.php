
    <h5>Datos venta</h5>
    <div class="row">        
        <div class="form-group col-md-3">
            <label for="inputEmail4">Fecha</label>  
            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" id="nombre" name="nombre"  disabled>        
        </div>
        <div class="form-group col-md-4"> 
            <label class="form-control-label" for="nombre">Cliente</label>
            <select class="form-control selectpicker" name="idCliente" id="idCliente" required data-live-search="true">                                                            
                <option value="0" selected>Seleccione</option>                            
                    @foreach($clientes as $c)
                        <option value="{{$c->id}}">{{$c->nombre}}</option>    
                    @endforeach
            </select>
        </div>
    </div>
        
    <hr>
    <h5>Detalle de productos</h5>
    <div class="row">
        <div class="form-group col-md-4"> 
            <label class="form-control-label" for="nombre">Productos</label>
            <select class="form-control selectpicker" name="id_productoc" id="id_productoc" data-live-search="true">                                                            
                <option value="0" selected>Seleccione</option>                            
                @foreach($productos as $prod)                            
                <option value="{{$prod->id}}_{{$prod->existencia}}_{{$prod->precioVenta}}">{{$prod->nombre}}</option>                                    
                 @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Cantidad</label>  
            <input type="number" id="cantidadc" name="cantidadc" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Stock</label>  
            <input type="number" disabled id="stockc" name="stockc" class="form-control" placeholder="Ingrese stock" pattern="[0-9]{0,15}">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Precio</label>
            <input type="number" disabled id="precio_ventac" name="precio_ventac" class="form-control" placeholder="Ingrese precio" pattern="[0-9]{0,15}">                        
        </div>
        <div class="form-group col-md-6">                        
            <button type="button" id="agregarc" class="btn btn-primary"><i class="fa fa-plus fa-2x"></i> Agregar detalle</button>
        </div>
    </div>

    <br/><br/>
    
    <h3>Detalle de ventas</h3>
    <table id="detallesc" class="table table-bordered table-striped table-sm">
        <thead>
            <tr class="bg-primary">
                <th>Eliminar</th>
                <th>Medicamento</th>
                <th>Precio(Q.)</th>
                <th>Cantidad</th>
                <th>SubTotal (Q.)</th>
            </tr>
        </thead>                                    
        <tfoot>
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

