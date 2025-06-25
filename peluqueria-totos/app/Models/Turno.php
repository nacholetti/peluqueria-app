<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Servicio;

class Turno extends Model
{
    protected $table = 'turnos'; // opcional, si sigue la convención

    protected $fillable = [
        'cliente_id',
        'servicio_id',
        'fecha',
        'hora',
        'estado'
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function peluquero()
{
    return $this->belongsTo(Peluquero::class);
}

}
