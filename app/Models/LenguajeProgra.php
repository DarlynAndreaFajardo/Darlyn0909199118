<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LenguajeProgra extends Model
{
    protected $table='lenguaje_programacion';
    public $timestamps=false;
    protected $fillable=[
        'id', 'lenguaje'
    ];

    protected $primaryKey='id';
}
