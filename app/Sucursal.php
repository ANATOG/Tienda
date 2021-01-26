<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    protected $fillable = ['nombre', 'direccion', 'condicion'];

    public function ventas()
    {
        return $this->hasMany('App\Venta', 'idSucursal');
    }

    public function vencidos()
    {
        return $this->hasMany('App\Vencido', 'idSucursal');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock', 'idSucursal');
    }

    public function compras()
    {
        return $this->hasMany('App\Compra', 'idSucursal');
    }
}
