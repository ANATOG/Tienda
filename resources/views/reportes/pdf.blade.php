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
            <h3>Tienda Chofo</h3>
            <h3>Reporte de ganancias y perdidas</h3>
            <pre>
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>Mes:</strong> {{$mes}}</td>
        <td><strong>Año:</strong>{{$anio}}</td>
    </tr>

  </table>

  <br/>

  <table width="100%" class="table table-bordered table-striped table-sm                                                                    ">
    <thead style="background-color:#c82333; color:white;">
      <tr>
        <th>#</th>
        <th>Descripcion</th>  
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody style="background-color:#f1f1f1;">
      <tr>
        <th scope="row">(+)</th>
        <td>Ventas</td>
        <td align="right">Q. {{$vendido}}</td>
      </tr>
      <tr>
          <th scope="row">(-)</th>
          <td>Costo de lo vendido</td>
          <td align="right">Q. {{$costo}}</td>
      </tr>
      <tr>
          <th scope="row">(=)</th>
          <td>Ganancia en ventas</td>
          <td align="right">Q. {{$vendido-$costo}}</td>
      </tr>
      <tr>
        <th scope="row">(-)</th>
        <td>Perdida por vencidos</td>
        <td align="right">Q. {{$vencido}}</td>
    </tr>
    </tbody>

    <tfoot >
        <tr>
            <td colspan="0"></td>
            <td align="right" >Ganancia final</td>
            <td align="right" style="background-color:#a52a36; color:white;">{{($vendido-$costo)-$vencido}}</td>
        </tr>
    </tfoot>
  </table>
  <footer>
    <p>Tienda Chofo </p>
</footer>
</body>
</html>