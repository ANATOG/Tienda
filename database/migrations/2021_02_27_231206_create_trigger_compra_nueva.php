<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerCompraNueva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER stockCompra
        after insert on detalle_compras for each row
        BEGIN
            UPDATE stocks SET existencia=existencia+NEW.cantidad
            WHERE stocks.idProducto=NEW.idProducto
            AND (select c.idSucursal from compras  c where c.id=NEW.idCompra)=stocks.idSucursal;
        END'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP trigger IF EXISTS stockCompra');
    }
}
