<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idVenta')->unsigned();
            $table->foreign('idVenta')->references('id')->on('ventas')->onDelete('cascade');
            $table->bigInteger('idProductos')->unsigned();
            $table->foreign('idProductos')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->decimal('precio', 11,2);
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
        Schema::dropIfExists('detalle_ventas');
    }
}
