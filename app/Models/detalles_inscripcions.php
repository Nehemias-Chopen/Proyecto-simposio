<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalles_inscripcions extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'no_boleta',
        'suvenir',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function inscripcion()
    {
        return $this->belongsTo(inscripciones::class, 'no_boleta', 'no_boleta');
    }

    public function suvenires()
    {
        return $this->belongsTo(suvenires::class, 'suvenir', 'codigo');
    }
}