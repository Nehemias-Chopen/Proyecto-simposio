<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_inscripcion extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_boleta',
        'suvenir',
    ];

    protected $primaryKey = 'no_boleta';

    public $incrementing = false;

    protected $keyType = 'string';
}