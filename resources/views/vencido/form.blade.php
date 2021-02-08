     
    <div class="form-group row">
        <label class="col-md-3 form-control-label"  for="titulo">Producto</label>
        <div class="col-md-9">
            <select class="form-control" name="idProducto" id="idProducto" required>								
                <option value="" selected>Seleccione</option>
                @foreach($productos as $p)
                    <option value="{{$p->id}}">{{$p->nombre}}</option>    
                @endforeach 
            </select>    
        </div> 							   
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Cantidad caducada</label>
        <div class="col-md-9">
                <input type="number"  min="1" class="form-control" placeholder="Ingrese la cantidad caducada" id="caducado" name="caducado" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>

        
    </div>
