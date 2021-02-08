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
    <title>Tienda</title>
    <style>body { padding-top:40px;  }
        .banner1 .btn:not(.btn-block) { width:200px;margin-bottom:50px; margin-left: 70px; margin-right: 20px;} 
        
        .round-button {height: 60px;
          float: right;
          line-height: 80px;  
          width: 60px;  
          border-radius: 50%;
          background-color: #c82333;
          color: white;
          text-align: center;
          padding-top :  -10px;
          cursor: pointer;}

        
        </style>
</head>
<body background="{{ asset('img/Background.jpg') }}" style="background-repeat: no-repeat; " alt="TiendaBanner" class="img-fluid"> 
    <div class="container">    
        
        <div class="banner1 col-md-12 col-sm-12">
            <img src="{{ asset('img/banner1.png') }}" alt="TiendaBanner" class="img-fluid">   
        </div> 
        <div class="round-button" ><i class="fas fa-arrow-left"></i></a></div>
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
</script>