<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre','condicion'];

    public function productos()
    {
        return $this->hasMany('App\Producto', 'idCategoria');
    }
}
