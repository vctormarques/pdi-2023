<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome', 'imposto'];

    public function categoria(){
        return $this->hasMany('App\Models\Categoria');
    }
}
