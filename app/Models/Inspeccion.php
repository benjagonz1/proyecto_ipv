<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inspeccion extends Model
{
    use HasFactory;

    protected $table = 'inspecciones';
    protected $primaryKey = 'id_inspeccion';
    public $timestamps = false;

    protected $fillable = [
        'id_motivo',
        'codigo_vivienda',
        'direccion',
        'geolocalizacion',
        'tipo_vivienda_id',
        'estado_id',
        'usuario_id',
        'fecha_inspeccion',
        'observaciones',
        'created_at',
        'updated_at',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id_usuario');
    }

    public function tipoVivienda(): BelongsTo
    {
        return $this->belongsTo(TipoVivienda::class, 'tipo_vivienda_id', 'id');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoInspeccion::class, 'estado_id', 'id_estado');
    }

    public function motivo(): BelongsTo
    {
        return $this->belongsTo(MotivoInspeccion::class, 'id_motivo', 'id_motivo');
    }
}
