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
            <pre>
                Tienda Chofo
                Terminal zona 5
                codigo tienda:
                Teléfono:
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>Tienda:</strong> Nombre de la tienda</td>
        <td><strong>Cliente:</strong> Nombre Cliente</td>
    </tr>

  </table>

  <br/>

  <table width="100%" class="table table-bordered table-striped table-sm                                                                    ">
    <thead style="background-color:#c82333; color:white;">
      <tr>
        <th>#</th>
        <th>Descripcion</th>  
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody style="background-color:#f1f1f1;">
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot >
        <tr>
            <td colspan="3"></td>
            <td align="right" >Subtotal $</td>
            <td align="right" style="background-color:#a52a36; color:white;">1635.00</td>
        </tr>
        
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right"  style="background-color:#a52a36; color:white;">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>
  <footer>
    <p>Tienda Chofo </p>
</footer>
</body>
</html>