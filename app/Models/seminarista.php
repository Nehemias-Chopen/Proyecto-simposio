<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seminarista extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_seminarista',
        'nombres',
        'apellidos',
        'tema',
        'telefono',
        'viaticos',
        'hoja_vida',
    ];

    protected $primaryKey = 'id_seminarista';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'viaticos' => 'decimal:2',
    ];
}
