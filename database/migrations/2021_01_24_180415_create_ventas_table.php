<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idCliente')->unsigned();
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->bigInteger('idSucursal')->unsigned();
            $table->foreign('idSucursal')->references('id')->on('sucursales');
            $table->dateTime('fecha_venta');
            $table->decimal('total', 11,2);
            $table->string('estado',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
