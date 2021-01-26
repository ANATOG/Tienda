<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['nombre', 'nit', 'direccion', 'telefono','condicion'];

    public function productos()
    {
        return $this->hasMany('App\Producto', 'idProveedor');
    }
}
