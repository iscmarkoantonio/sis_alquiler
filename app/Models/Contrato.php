<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'propiedad_id',
        'inquilino_id',
        'fecha_inicio',
        'fecha_fin',
        'monto_renta',
        'estado',
    ];  

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }

    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class);
    }
}
