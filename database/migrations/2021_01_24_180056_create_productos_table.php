<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 170);
            $table->decimal('precioCosto',11,2);
            $table->decimal('precioVenta',11,2);
            $table->decimal('precioMayorista',11,2);
            $table->string('descripcion', 70)->nullable();
            $table->boolean('condicion')->default(1);
            $table->bigInteger('idCategoria')->unsigned();
            $table->foreign('idCategoria')->references('id')->on('categorias');
            $table->bigInteger('idProveedor')->unsigned();
            $table->foreign('idProveedor')->references('id')->on('proveedores');
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
        Schema::dropIfExists('productos');
    }
}
