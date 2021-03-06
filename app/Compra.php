<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable= ['idProveedor', 
                          'idSucursal', 
                          'numcompra',
                          'total',
                          'fechacom',
                           'estado'];

    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor');
    }

    public function detallesCompra(){
        return $this->hasMany('App\DetalleCompra');
    }

    public function productosCompra(){
        return $this->belongsToMany('App\Producto', 'detalle_compras', 'idCompra','idProductos')
        ->withPivot('cantidad', 'precio');    
    }

}
