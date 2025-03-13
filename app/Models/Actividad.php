<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades_grupales';
    protected $primaryKey = 'id_actividad';
    protected $fillable = [
        'id_actividad',
        'nombre_actividad',
        'id_entrenador',
        'id_gimnasio',
        'hora_inicio',
        'hora_fin',
        'foro_actual',
        'foro_limite',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function getNombreAttribute()
    {
        return $this->nombre_actividad;
    }

    public function getMonitorAttribute()
    {
        return $this->id_entrenador;
    }

    public function getHorarioAttribute()
    {
        return $this->hora_inicio . ' - ' . $this->hora_fin;
    }

    public function getInscritosAttribute()
    {
        return $this->foro_actual;
    }

    public function getCapacidadAttribute()
    {
        return $this->foro_limite;
    }
}
