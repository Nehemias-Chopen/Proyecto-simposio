<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simposio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tema',
        'costo',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'costo' => 'decimal:2',
    ];
}