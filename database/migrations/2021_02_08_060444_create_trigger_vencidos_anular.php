<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerVencidosAnular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER stockVencidoAnulado
        before update on vencidos for each row
        BEGIN
            UPDATE stocks SET existencia=existencia+OLD.caducado
            WHERE stocks.idProducto=OLD.idProducto
            AND stocks.idSucursal=1;
        END'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP trigger IF EXISTS stockVencidoAnulado');
    }
}
