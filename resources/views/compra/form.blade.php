    <div class="container  justify-content-center align-items-center bg-light">
        <div class="row justify-content-center align-items-center">
            <h3>Datos de compra</h3>
        </div>
        <br>
        <div class="row">             
            <div class="form-group col-md-3">                                                           
                <input type="number"  min="1" class="form-control" placeholder="#Compra" id="numcompra" name="numcompra"> 
            </div>       
            <div class="form-group col-md-3">                 
                <input type="date" class="form-control" value="{{$fecha}}" id="fecha" name="fecha">        
            </div>
            <div class="form-group col-md-6"> 
                <select class="form-control selectpicker" name="idProveedor" id="idProveedor" required data-live-search="true">                                                            
                    <option value="" selected>Seleccione proveedor</option>                            
                        @foreach($proveedores as $p)
                            <option value="{{$p->id}}">{{$p->nombre}}</option>    
                        @endforeach
                </select>
            </div>
        </div>    
    </div>                                                

    <hr>
    <div class="container  justify-content-center align-items-center bg-light">
        <div class="row justify-content-center align-items-center">
            <h3>Detalle de compra</h3>
        </div>
        <br>
    
        <div class="row">
            <div class="form-group col-md-5"> 
                <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true" data-default-value="">                                                            
                    <option value="" selected disabled>Seleccione producto</option>   
                </select>
            </div>
            <div class="form-group col-md-2">                  
                <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad"  min="1" pattern="[0-9]{0,15}" disabled>
            </div>
            <div class="form-group col-md-3">                                                           
                <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Ingrese precio" id="precio" name="precio" disabled> 
            </div>
            <div class="form-group col-md-2">   
                <button type="button" id="agregarc" class="btn btn-danger round-button"><i class="fa fa-plus "></i></button>  
            </div>
        </div>
    </div>

    <br/><br/>
    
    <div CLASS="container">
        <table id="detallesc" class="table table-hover table-sm table-responsive">
            <thead class="bg-danger text-white">
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(Q.)</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
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
            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>            
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    
    
