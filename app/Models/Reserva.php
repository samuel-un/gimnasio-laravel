<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';
    protected $fillable = [
        'id_instalacion',
        'fecha_reserva',
        'hora_inicio',
        'hora_fin',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}