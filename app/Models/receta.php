<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'producto_id',
        'existencia',
    ];

    // Relación con el modelo Productos
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }
    
    // Método para actualizar la existencia del producto asociado a la receta
    public function actualizarExistenciaProducto($cantidad)
    {
        // Restar la cantidad utilizada de la existencia del producto asociado
        $this->producto->existencia -= $cantidad;
        // Guardar el cambio en la existencia del producto
        $this->producto->save();
    }
}
