<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Turno;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'telefono'];

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
