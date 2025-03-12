<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    protected $table = 'instalaciones';
    protected $primaryKey = 'id_instalacion';
    protected $fillable = [
        'id_gimnasio',
        'nombre_instalacion',
        'horario_lun_vie',
        'horario_sab_dom_fest',
        'aforo_actual',
        'aforo_limite',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}