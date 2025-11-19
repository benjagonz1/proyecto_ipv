<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVivienda extends Model
{
    use HasFactory;

    protected $table = 'tipos_viviendas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function inspecciones()
    {
        return $this->hasMany(Inspeccion::class, 'tipo_vivienda_id', 'id');
    }
}
