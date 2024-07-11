<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    public function rol()
    {
        return $this->belongsTo(Roles::class, 'Rol', 'id_Rol');
    }
    
    protected $table = 'usuarios';
    protected $fillable = ['documento', 'nombres', 'apellidos', 'Telefono', 'Rol', 'password'];
    protected $primaryKey = 'documento';
    public $timestamps = false;
}
