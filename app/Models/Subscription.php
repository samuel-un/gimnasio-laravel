<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'subscriptions';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'plan',
        'gimnasio',
    ];

    // Relación con el modelo de Usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}