<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades_grupales'; // Nombre de la tabla
    protected $primaryKey = 'id_actividad'; // Clave primaria
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

    // Accesor para mapear 'nombre_actividad' a 'nombre'
    public function getNombreAttribute()
    {
        return $this->nombre_actividad;
    }

    // Accesor para mapear 'id_entrenador' a 'monitor' (puedes necesitar una relación si id_entrenador es una clave foránea)
    public function getMonitorAttribute()
    {
        // Si id_entrenador es una clave foránea, podrías hacer una relación con la tabla de entrenadores
        // Por ahora, devolvemos el ID como placeholder
        return $this->id_entrenador; // Sustituye esto con el nombre real del entrenador si tienes una relación
    }

    // Accesor para mapear 'hora_inicio' y 'hora_fin' a 'horario'
    public function getHorarioAttribute()
    {
        return $this->hora_inicio . ' - ' . $this->hora_fin;
    }

    // Accesor para mapear 'foro_actual' a 'inscritos'
    public function getInscritosAttribute()
    {
        return $this->foro_actual;
    }

    // Accesor para mapear 'foro_limite' a 'capacidad'
    public function getCapacidadAttribute()
    {
        return $this->foro_limite;
    }
}