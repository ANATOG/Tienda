<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerVencidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER stockVencido
        after insert on vencidos for each row
        BEGIN
            UPDATE stocks SET existencia=existencia-NEW.caducado
            WHERE stocks.idProducto=NEW.idProducto
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
        DB::unprepared('DROP trigger IF EXISTS llenado_stocks');
    }
}
