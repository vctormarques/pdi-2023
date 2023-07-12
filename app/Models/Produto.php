<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'valor', 'categoria_id'];

    function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }
}
