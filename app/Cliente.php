<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['codigo', 'nombre', 'direccion', 'telefono', 'tipo', 'condicion'];

    public function ventas()
    {
        return $this->hasMany('App\Venta', 'idCliente');
    }
}
