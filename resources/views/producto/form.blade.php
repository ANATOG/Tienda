
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Código</label>
        <div class="col-md-9">
                <input type="numeric" class="form-control" placeholder="Ingrese código" id="codigo" name="codigo" required>
        </div>
    </div>

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
            <select class="form-control" name="id_categoria" id="id_categoria" required>								
                <option value="" selected>Seleccione</option>
                @foreach($categorias as $cat)
                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>    
                @endforeach 
            </select>    
        </div> 							   
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Precio</label>
        <div class="col-md-9">
                <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Ingrese precio" id="precio" name="precio" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Descripción</label>
        <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Ingrese descripción" id="descripcion" name="descripcion">
        </div>
    </div>

    <div class="form-group">
        {{ Form::file('cover') }}
    </div> 

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>

        
    </div>
