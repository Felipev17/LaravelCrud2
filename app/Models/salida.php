<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'existencia',
    ];

    // Relación con el modelo Productos
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id' ,'cod');
    }
}
