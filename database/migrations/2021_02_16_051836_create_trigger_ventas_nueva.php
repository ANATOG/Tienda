<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerVentasNueva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER stockVenta
        after insert on detalle_ventas for each row
        BEGIN
            UPDATE stocks SET existencia=existencia-NEW.cantidad
            WHERE stocks.idProducto=NEW.idProductos
            AND (select v.idSucursal from ventas  v where v.id=NEW.idVenta)=stocks.idSucursal;
        END'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP trigger IF EXISTS stockVenta');
    }
}
