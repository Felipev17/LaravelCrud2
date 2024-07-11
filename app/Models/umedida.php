<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMedida extends Model
{
    use HasFactory;

    protected $table = 'umedida';

    protected $fillable = ['umedida'];
    protected $primaryKey = 'cod_umedida';
    public $timestamps = false;

    public function productos()
    {
        return $this->hasMany(Productos::class, 'cod_umedida');
    }
}

