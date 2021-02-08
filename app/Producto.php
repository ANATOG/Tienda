<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
                        'nombre',  
                        'precioCosto',
                        'precioVenta', 
                        'precioMayorista',
                        'descripcion',
                        'condicion',
                        'idCategoria',
                        'idProveedor']; 

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function vencidos()
    {
        return $this->hasMany('App\Vencido', 'idProducto');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor');
    }
}
