<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';
    protected $primaryKey = 'id_perfil';
    public $timestamps = true;
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_usuario',
        'id_gimnasio',
        'plan_membresia',
        'fecha_inicio_membresia',
        'fecha_fin_membresia',
        'estado_membresia',
    ];

    protected $casts = [
        'fecha_inicio_membresia' => 'date',
        'fecha_fin_membresia'    => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class, 'id_gimnasio');
    }
}
