<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @yield('contenido')
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
</script>