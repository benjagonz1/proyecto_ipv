<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVivienda extends Model
{
    protected $table = 'tipos_viviendas';
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    public function inspecciones()
    {
        return $this->hasMany(Inspeccion::class, 'tipo_vivienda_id');
    }
}
