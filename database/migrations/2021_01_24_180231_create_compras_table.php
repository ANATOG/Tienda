<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('idProveedor')->unsigned();
            $table->foreign('idProveedor')->references('id')->on('proveedores');
            $table->integer('idSucursal')->unsigned();
            $table->foreign('idSucursal')->references('id')->on('sucursales');
            $table->string('numcompra',15)->nullable();
            $table->dateTime('fechacom');
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
        Schema::dropIfExists('compras');
    }
}
