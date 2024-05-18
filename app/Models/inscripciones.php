<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_boleta',
        'estudiante',
        'total',
        'estado',
        'imagen',
        'suvenir',
    ];

    protected $primaryKey = 'no_boleta';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'total' => 'decimal:2',
    ];
    protected $table = 'inscripciones';

    public function alumnos()
    {
        return $this->belongsTo(alumnos::class, 'estudiante', 'carnet');
    }
    public function detalles_inscripcions()
    {
        return $this->hasMany(detalles_inscripcions::class, 'no_boleta', 'no_boleta');
    }
}