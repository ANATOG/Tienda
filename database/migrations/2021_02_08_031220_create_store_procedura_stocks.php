<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProceduraStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //DB::unprepared('CREATE PROCEDURE llenado_stocks (IN PidSucursal integer, IN PidProducto integer)
        //BEGIN INSERT INTO stocks (existencia, idSucursal, idProducto) VALUES (0, PidSucursal, PidProducto); END'); cambio

        DB::unprepared('CREATE PROCEDURE llenado_stocks(IN PidSucursal bigint, IN PidProducto bigint) 
        BEGIN  INSERT INTO stocks (existencia, idSucursal, idProducto) VALUES (Pexistencia, PidSucursal, PidProducto); END');
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS llenado_stocks');
    }
}
