<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $fillable= ['idCliente', 
                          'idSucursal',
                          'total',
                          'fecha_venta',
                           'estado'];

    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}
