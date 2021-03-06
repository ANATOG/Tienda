<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVencidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vencidos', function (Blueprint $table) {
            $table->id();
            $table->integer('caducado');
            $table->bigInteger('idSucursal')->unsigned();
            $table->foreign('idSucursal')->references('id')->on('sucursales');
            $table->bigInteger('idProducto')->unsigned();
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->boolean('condicion')->default(1);
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
        Schema::dropIfExists('vencidos');
    }
}
