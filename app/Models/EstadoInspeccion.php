<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoInspeccion extends Model
{
    protected $table = 'estados_inspeccion';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;

    protected $fillable = ['descripcion', 'color'];
}
