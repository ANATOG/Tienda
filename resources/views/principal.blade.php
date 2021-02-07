
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tienda</title>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>body { padding-top:40px;  }
          .panel-body .btn:not(.btn-block) { width:200px;margin-bottom:50px; margin-left: 70px; margin-right: 20px;} 
          .round-button {height: 80px;
          float: right;
  line-height: 80px;  
  width: 80px;  
  font-size: 1em;
  font-weight: bold;
  border-radius: 50%;
  background-color: #c82333;
  color: white;
  text-align: center;
  cursor: pointer;}

          
          </style>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    
<body background="{{ asset('img/Background.jpg') }}" style="background-repeat: no-repeat; " alt="TiendaBanner" class="img-fluid">    
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="">
                <div class="banner1 ">
                  <img src="{{ asset('img/banner1.png') }}" alt="TiendaBanner" class="img-fluid">   
                </div>
                <br>
                <br>
                <div class="panel-body ">
                    <div class="row ">
                        <div class="col-xl-4  ">
                          <a href="#" class="btn btn-success btn-lg" role="button"><i class="fas fa-cash-register"></i> <br/>Ventas</a> 
                        </div>
                        <div class="col-xl-4 ">
                          <a href="#" class="btn btn-success btn-lg" role="button"><i class="fas fa-cart-arrow-down"></i> <br/>Compras</a>
                        </div>
                        <div class="col-xl-4 ">
                          <a href="#" class="btn btn-success btn-lg" role="button"><i class="fas fa-shopping-basket"></i><br/>Productos</a>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-4  ">
                        <a href="#" class="btn btn-warning btn-lg" role="button"><i class="fas fa-user-tag"></i> <br/>Clientes</a> 
                      </div>
                      <div class="col-xl-4 ">
                        <a href="#" class="btn btn-warning btn-lg" role="button"><i class="fas fa-users"></i> <br/>Proveedores</a>
                      </div>
                      <div class="col-xl-4 ">
                        <a href="#" class="btn btn-warning btn-lg" role="button"><i class="fas fa-store-alt"></i><br/>Sucursales</a>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-xl-4  ">
                        <a href="#" class="btn btn-danger btn-lg" role="button"><i class="fas fa-file-pdf"></i> <br/>Reportes</a> 
                      </div>
                      <div class="col-xl-4 ">
                        <a href="#" class="btn btn-danger btn-lg" role="button"><i class="fas fa-book-dead"></i> <br/>Vencidos</a>
                      </div>
                      <div class="col-xl-4 ">
                        <a href="#" class="btn btn-danger btn-lg" role="button"><i class="fas fa-bars"></i><br/>Categorias        </a>
                      </div>
                    </div>
                    
                    <div class="round-button "><a href="#" class="round-button">X</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>