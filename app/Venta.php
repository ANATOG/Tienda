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
                          'estado',
                          'costo'];

    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function detalles(){
        return $this->hasMany('App\DetalleVenta');
    }

    public function productos(){
        return $this->belongsToMany('App\Producto', 'detalle_ventas', 'idVenta','idProductos')
        ->withPivot('cantidad', 'precio');    
    }
}
