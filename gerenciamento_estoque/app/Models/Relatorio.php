<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{

    use HasFactory;
    protected $casts  = [
        'relatorio_entrada'=>'array'
    ];
    protected $table = "relatorios";
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
