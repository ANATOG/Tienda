<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Venta</title>
   
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
            <h3>Deposito El Carmen</h3>
@foreach($venta as $v)
            <pre>
                Fecha: {{$v->fecha_venta}}
                Número de venta: {{$v->id}}
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr> 
        <td><strong>Código cliente:</strong> {{$v->codigo}}</td>       
        <td><strong>Cliente:</strong> {{$v->cliente}}</td>
        <td><strong>Dirección:</strong> {{$v->direccion}}</td>
        <td><strong>Teléfono:</strong> {{$v->telefono}}</td>
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
        <th>Descuento</th>
        
      </tr>
    </thead>
    <tbody style="background-color:#f1f1f1;">
      {{$subtotal=0}} {{$descuento=0}}
      @foreach($detalles as $d)
        <tr>
          <th scope="row">{{$d->id}}</th>
          <td>{{$d->producto}}</td>
          <td align="right">{{$d->cantidad}}</td>
          <td align="right">{{$d->precio}}</td>
          <td align="right">Q. {{number_format($d->precio * $d->cantidad,  2, ".", "")}} </td>
          <td align="right">Q. {{$d->descuento}}</td>
        </tr>
        {{$subtotal=$subtotal+($d->precio * $d->cantidad)}}
        {{$descuento=$descuento+$d->descuento}}
      @endforeach      
    </tbody>

    <tfoot >
        <tr>
            <td colspan="4"></td>
            <td align="right" >Subtotal</td>
            <td align="right" style="background-color:#a52a36; color:white;">Q. {{number_format($subtotal,  2, ".", "")}}</td>
        </tr>
        <tr>
          <td colspan="4"></td>
          <td align="right">Descuento</td>
          <td align="right"  style="background-color:#a52a36; color:white;">Q. {{number_format($descuento,  2, ".", "")}}</td>
      </tr>
        
        <tr>
            <td colspan="4"></td>
            <td align="right">Total</td>
            <td align="right"  style="background-color:#a52a36; color:white;">Q. {{$v->total}}</td>
        </tr>
    </tfoot>
  </table>
  <footer>
    <p>Deposito El Carmen </p>
</footer>
</body>
</html>