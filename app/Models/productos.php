<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'cod';
    public $timestamps = false;
    protected $fillable = [
        'cod',
        'nombre',
        'stock_minimo',
        'stock_maximo',
        'fecha_vencimiento',
        'costo',
        'cod_tipo',
        'ubicacion',
        'cod_umedida',
        'precio_venta',
        'existencia',
        'iva'
    ];

    // Relación con la unidad de medida
    public function umedida()
    {
        return $this->belongsTo(Umedida::class, 'cod_umedida');
    }

    // Relación con el tipo
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'cod_tipo');
    }

    // Relación inversa con Salida
    public function salidas()
    {
        return $this->hasMany(Salida::class, 'producto_id');
    }
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'producto_id');
    }

    // Método para actualizar la existencia del producto
    public function retirarCantidad($cantidad)
    {
        $this->existencia -= $cantidad;
        $this->save();
    }
}
