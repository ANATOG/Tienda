<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Compra</title>
   
<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }

    footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            background-color: #c82333; 
            color: white;
            text-align: center;
            line-height: 35px;
        }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{ asset('img/logo.png') }}" alt="logo" class="img-fluid"></td>
        
        <td align="right">
            <h3>Compras Deposito El Carmen</h3>
@foreach($compra as $c)
            <pre>
                Fecha: {{$c->fechacom}}
                Número de compra: {{$c->numcompra}}
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr> 
        <td><strong>NIT proveedor:</strong> {{$c->nit}}</td>       
        <td><strong>Proveedor:</strong> {{$c->proveedor}}</td>
        <td><strong>Dirección:</strong> {{$c->direccion}}</td>
        <td><strong>Teléfono:</strong> {{$c->telefono}}</td>
    </tr>

  </table>
  @endforeach 
  <br/>

  <table width="100%" class="table table-bordered table-striped table-sm                                                                    ">
    <thead style="background-color:#c82333; color:white;">
      <tr>
        <th>#</th>
        <th>Descripcion</th>  
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
        
      </tr>
    </thead>
    <tbody style="background-color:#f1f1f1;">
      @foreach($detalles as $d)
        <tr>
          <th scope="row">{{$d->id}}</th>
          <td>{{$d->producto}}</td>
          <td align="right">{{$d->cantidad}}</td>
          <td align="right">{{$d->precio}}</td>
          <td align="right">Q. {{number_format($d->precio * $d->cantidad,  2, ".", "")}} </td>
        </tr>
      @endforeach      
    </tbody>

    <tfoot >      
        <tr>
            <td colspan="3"></td>
            <td align="right">Total</td>
            <td align="right"  style="background-color:#a52a36; color:white;">Q. {{$c->total}}</td>
        </tr>
    </tfoot>
  </table>
  <footer>
    <p>Deposito El Carmen </p>
</footer>
</body>
</html>