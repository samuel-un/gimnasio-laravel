<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    use HasFactory;

    protected $table = 'gimnasios';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'provincia',
        'direccion',
        'horario_lectivo',
        'horario_festivo',
    ];

    public function perfiles()
    {
        return $this->hasMany(Perfil::class, 'id_gimnasio');
    }
}
