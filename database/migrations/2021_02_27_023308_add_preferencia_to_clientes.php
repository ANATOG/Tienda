<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreferenciaToClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('tipo', 15 )->after('telefono')->nullable;
        });
        
        DB::table('clientes')->insert(['nombre'=>'C/F', 'codigo'=>'11111', 'tipo'=>'Normal']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
}
