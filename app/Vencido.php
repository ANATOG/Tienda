<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vencido extends Model
{
    protected $table = 'vencidos';
    protected $fillable = [
                        'caducado',  
                        'idSucursal',
                        'idProducto',
                        'perdida'];

    public function producto(){
        return $this->belongsTo('App\Producto');
    }
}
