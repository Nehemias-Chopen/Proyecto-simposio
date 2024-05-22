<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;

    protected $fillable = [
        'carnet',
        'nombre',
        'email',
        'telefono',
        'semestre',
    ];

    protected $primaryKey = 'carnet';

    public $incrementing = false;

    protected $keyType = 'string';
    public function inscripciones()
    {
        return $this->hasMany(inscripciones::class, 'estudiante', 'carnet');
    }
    public function asistencia_simposio()
    {
        return $this->hasMany(asistencia_simposio::class, 'carnet', 'carnet');
    }
}