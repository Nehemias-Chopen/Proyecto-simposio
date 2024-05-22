<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia_simposio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'carnet',
        'nombre',
        'no_boleta',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function alumnos()
    {
        return $this->belongsTo(alumnos::class, 'carnet', 'carnet');
    }

    public function inscripciones()
    {
        return $this->belongsTo(inscripciones::class, 'no_boleta', 'no_boleta');
    }
}
