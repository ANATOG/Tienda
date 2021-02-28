<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->boolean('condicion')->default(1);
            $table->string('direccion', 200);
            $table->timestamps();
        });
        DB::table('sucursales')->insert(['nombre'=>'Deposito El Carmen', 'direccion'=>'Terminal, zona 5']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
