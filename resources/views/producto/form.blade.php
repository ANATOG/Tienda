
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Nombre</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="nombre"
                required>
        </div>
    </div>

     
    <div class="form-group row">
        <label class="col-md-3 form-control-label"  for="titulo">Categoría</label>
        <div class="col-md-9">
            <select class="form-control" name="idCategoria" id="idCategoria" required>								
                <option value="" selected>Seleccione</option>
                @foreach($categorias as $cat)
                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>    
                @endforeach 
            </select>    
        </div> 							   
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label"  for="titulo">Proveedor</label>
        <div class="col-md-9">
            <select class="form-control" name="idProveedor" id="idProveedor" required>								
                <option value="" selected>Seleccione</option>
                @foreach($proveedores as $p)
                    <option value="{{$p->id}}">{{$p->nombre}}</option>    
                @endforeach 
            </select>    
        </div> 							   
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Precio costo</label>
        <div class="col-md-9">
                <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Ingrese precio" id="precioCosto" name="precioCosto" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Precio venta</label>
        <div class="col-md-9">
                <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Ingrese precio" id="precioVenta" name="precioVenta" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Precio mayorista</label>
        <div class="col-md-9">
                <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Ingrese precio" id="precioMayorista" name="precioMayorista" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Descripción</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese descripción" id="descripcion" name="descripcion">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>

        
    </div>
