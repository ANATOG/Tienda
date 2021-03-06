<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProcedureVentaAnulada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE devuelve_stocks(IN DidProducto bigint, IN Dcantidad int) 
        BEGIN  
            UPDATE stocks SET existencia=existencia+Dcantidad
            WHERE idProducto=DidProducto; 
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS devuelve_stocks');
    }
}
