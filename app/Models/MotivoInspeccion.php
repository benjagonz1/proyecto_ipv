<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoInspeccion extends Model
{
    use HasFactory;

    protected $table = 'motivos_inspeccion';
    protected $primaryKey = 'id_motivo';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'activo',
    ];

    public function inspecciones()
    {
        return $this->hasMany(Inspeccion::class, 'id_motivo', 'id_motivo');
    }
}
