<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de ventas</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
 
 
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
 
        #encabezado{
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
        }
 
        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background:#33AFFF;
        }
 
        section{
        clear: left;
        }
 
        #cliente{
        text-align: left;
        }
 
        #faproveedor{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
 
        #faproveedor thead{
        padding: 20px;
        background:#33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #faccomprador{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #faccomprador thead{
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facproducto thead{
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
    
    </style>

    <body>
    <div class="main"> 
                <div class="container-fluid"> 
                        

                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                          
                                <tr class="bg-primary">

                                    <th>Orden</th>
                                    <th>Estacion</th>
                                    <th>servicio</th>
                                    <th>distancia</th>

                                </tr>
                           
                            </thead>
                            <tbody>
                               
                                <tr>
                                <input type="hidden" >
                                
                                   
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <input type="hidden" >
                                   
                                </tr>
                                
                        </tbody>
                        </table>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                
                                    <tr class="bg-">
                                                <th>Distancia Total de la Linea </th>
                                                
                                    </tr>
                            </thead> 
                            <tbody>
                                    <tr>
                                        <th>mts</th>
                                    </tr>   
                            </tbody>   
                        </table>        
                    </div>
                    </div>
                </div>
        <br>
        <br>
        <footer>
             
             <div >
                <p >
                    <b>Transmetro Guatemala 2019
                </p>
            </div>
        </footer>
    </body>
</html>