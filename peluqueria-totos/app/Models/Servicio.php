<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Turno;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'precio',
        'duracion_minutos',
    ];

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
