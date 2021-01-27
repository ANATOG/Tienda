<div class="form-group row">
    <label class="col-md-3 form-control-label" for="text-input">Cliente</label>
    <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Nombre del cliente" id="nombre" name="nombre" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="text-input">Código</label>
    <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Código" id="codigo" name="codigo" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="text-input">Teléfono</label>
    <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Teléfono" id="telefono" name="telefono"
         pattern="[0-9]{8,8}" title="Solo números. Tamaño máximo: 8">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="des">Dirección</label>
    <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion"
            title="Letras y números. Tamaño máximo: 240">
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
    
</div>