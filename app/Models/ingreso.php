<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'cantidad',
    ];

    // Relación con el modelo Productos
    
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id' ,'cod');
    }
}
