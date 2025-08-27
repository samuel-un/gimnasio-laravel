<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model {
	protected $table = 'gimnasios';
	protected $fillable = ['nombre','provincia','direccion','horario_lectivo','horario_festivo'];
}
