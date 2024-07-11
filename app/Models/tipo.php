<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipo_producto';
    protected $primaryKey = 'cod_tipo';
    public $timestamps = false;

    public function productos()
    {
        return $this->hasMany(Productos::class, 'cod_tipo');
    }
}


