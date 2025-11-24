<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    protected $table = 'inspecciones';
    protected $primaryKey = 'id_inspeccion';
    public $timestamps = true;

    protected $fillable = [
        'id_motivo',
        'codigo_vivienda',
        'direccion',
        'geolocalizacion',
        'tipo_vivienda_id',
        'estado_id',
        'usuario_id',
        'fecha_inspeccion',
        'observaciones'
    ];

    public function estado()
    {
        return $this->belongsTo(EstadoInspeccion::class, 'estado_id', 'id_estado');
    }

    public function motivo()
    {
        return $this->belongsTo(MotivoInspeccion::class, 'id_motivo', 'id_motivo');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoVivienda::class, 'tipo_vivienda_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id_usuario');
    }

}
