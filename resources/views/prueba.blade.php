<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<title>Tienda</title>
    <style>
        .round-button {
            height: 60px;
            
            margin-right: 65px;
            line-height: 40px;  
            width: 60px;  
            border-radius: 50%;
            
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .boton {
            float: right;
            position: fixed;
            z-index: 2;   
            margin-top:50px;
            margin-left:1000px;
            margin-right: 50px;
        }
        </style>
</head>
<body background="{{ asset('img/Background.jpg') }}" style="background-repeat: no-repeat; " alt="TiendaBanner" class="img-fluid"> 
    <div class="container">    
        
        <div class="banner1 col-md-12 col-sm-12">
            <img src="{{ asset('img/banner1.png') }}" alt="TiendaBanner" class="img-fluid">   
        </div> 
        <div class="boton" >
            
            <a href="{{url('/')}}" style="color: white"  class="btn round-button btn-danger btn-lg " role="button"><i class="fas fa-arrow-left"></i></a> 
                         
        </div>
        @yield('contenido')
        
       
        
    </div>
</body>
</html>

<script>
     /*EDITAR categoria EN VENTANA MODAL*/
     $('#abrirmodalEditar').on('show.bs.modal', function (event) {
        var botoneditar = $(event.relatedTarget) 
        var nombre_modal_editar = botoneditar.data('nombre')
        var id_categoria = botoneditar.data('id_categoria')
        var modal = $(this)
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #id_categoria').val(id_categoria);
    })
    /*INICIO ventana modal para cambiar estado de Categoria*/
        
    $('#cambiarEstado').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_categoria = botoncambiarestado.data('id_categoria')
        var modal = $(this)
        
        modal.find('.modal-body #id_categoria').val(id_categoria);
    })

    /*EDITAR cliente EN VENTANA MODAL*/
    $('#abrirmodalEditarCli').on('show.bs.modal', function (event) {
        var botoneditar = $(event.relatedTarget) 
        var nombre_modal_editar = botoneditar.data('nombre')
        var codigo_modal_editar = botoneditar.data('codigo')
        var telefono_modal_editar = botoneditar.data('telefono')
        var direccion_modal_editar = botoneditar.data('direccion')
        var id_cliente = botoneditar.data('id_cliente')
        var modal = $(this)
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #codigo').val(codigo_modal_editar);
        modal.find('.modal-body #telefono').val(telefono_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_modal_editar);
        modal.find('.modal-body #id_cliente').val(id_cliente);
    })
    /*INICIO ventana modal para cambiar estado de Cliente*/
        
    $('#cambiarEstadoCli').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_cliente = botoncambiarestado.data('id_cliente')
        var modal = $(this)
        
        modal.find('.modal-body #id_cliente').val(id_cliente);
    })

     /*EDITAR proveedor EN VENTANA MODAL*/
     $('#abrirmodalEditarPro').on('show.bs.modal', function (event) {
        var botoneditar = $(event.relatedTarget) 
        var nombre_modal_editar = botoneditar.data('nombre')
        var nit_modal_editar = botoneditar.data('nit')
        var telefono_modal_editar = botoneditar.data('telefono')
        var direccion_modal_editar = botoneditar.data('direccion')
        var id_proveedor = botoneditar.data('id_proveedor')
        var modal = $(this)
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #nit').val(nit_modal_editar);
        modal.find('.modal-body #telefono').val(telefono_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_modal_editar);
        modal.find('.modal-body #id_proveedor').val(id_proveedor);
    })
    /*INICIO ventana modal para cambiar estado de Proveedor*/
        
    $('#cambiarEstadoPro').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_proveedor = botoncambiarestado.data('id_proveedor')
        var modal = $(this)
        
        modal.find('.modal-body #id_proveedor').val(id_proveedor);
    })

    /*EDITAR sucursal EN VENTANA MODAL*/
    $('#abrirmodalEditarSuc').on('show.bs.modal', function (event) {
        var botoneditar = $(event.relatedTarget) 
        var nombre_modal_editar = botoneditar.data('nombre')
        var direccion_modal_editar = botoneditar.data('direccion')
        var id_sucursal = botoneditar.data('id_sucursal')
        var modal = $(this)
        modal.find('.modal-body #nombre').val(nombre_modal_editar);
        modal.find('.modal-body #direccion').val(direccion_modal_editar);
        modal.find('.modal-body #id_sucursal').val(id_sucursal);
    })
    /*INICIO ventana modal para cambiar estado de Sucursal*/
        
    $('#cambiarEstadoSuc').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_sucursal = botoncambiarestado.data('id_sucursal')
        var modal = $(this)
        
        modal.find('.modal-body #id_sucursal').val(id_sucursal);
    })

    /*EDITAR producto EN VENTANA MODAL*/
    $('#editarProducto').on('show.bs.modal', function (event) {
        var botoneditar = $(event.relatedTarget) 
        var id_producto = botoneditar.data('id_producto')
        var precioCosto = botoneditar.data('precio_costo')
        var precioMayorista = botoneditar.data('precio_mayorista')
        var precioVenta = botoneditar.data('precio_venta')
        var idProveedor = botoneditar.data('id_proveedor')
        var idCategoria = botoneditar.data('id_categoria')
        var nombre = botoneditar.data('nombre')
        var descripcion = botoneditar.data('descripcion')
        var modal = $(this)
        modal.find('.modal-body #id_producto').val(id_producto);
        modal.find('.modal-body #precioCosto').val(precioCosto);
        modal.find('.modal-body #precioMayorista').val(precioMayorista);
        modal.find('.modal-body #precioVenta').val(precioVenta);
        modal.find('.modal-body #idCategoria').val(idCategoria);
        modal.find('.modal-body #idProveedor').val(idProveedor);
        modal.find('.modal-body #nombre').val(nombre);
        modal.find('.modal-body #descripcion').val(descripcion);
    })
    /*INICIO ventana modal para cambiar estado de Producto*/
        
    $('#cambiarEstadoProducto').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_producto = botoncambiarestado.data('id_producto')
        var modal = $(this)
        
        modal.find('.modal-body #id_producto').val(id_producto);
    })

    /*INICIO ventana modal para cambiar estado de vencidos*/
        
    $('#cambiarEstadoVencido').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_vencido = botoncambiarestado.data('id_vencido')
        var modal = $(this)
        
        modal.find('.modal-body #id_vencido').val(id_vencido);
    })

    $('#anularventa').on('show.bs.modal', function (event) {
        var botoncambiarestado = $(event.relatedTarget) 
        var id_venta = botoncambiarestado.data('id_venta')
        var modal = $(this)
        
        modal.find('.modal-body #id_venta').val(id_venta);
    })

    $('select').selectize({
          sortField: 'text'
      });
</script>