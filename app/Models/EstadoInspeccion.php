<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoInspeccion extends Model
{
    use HasFactory;

    protected $table = 'estados_inspeccion';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'color',
    ];

    public function inspecciones()
    {
        return $this->hasMany(Inspeccion::class, 'estado_id', 'id_estado');
    }
}
