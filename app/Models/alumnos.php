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
}