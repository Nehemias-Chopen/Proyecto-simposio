<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suvenires extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'precio',
    ];

    protected $primaryKey = 'codigo';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'precio' => 'decimal:2',
    ];

    public function detalles_inscripcions()
    {
        return $this->hasMany(detalles_inscripcions::class, 'suvenir', 'codigo');
    }
}