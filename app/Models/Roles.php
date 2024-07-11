<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
    protected $table = 'roles';
    protected $fillable = ['id_Rol', 'rol'];
    protected $primaryKey = 'id_Rol';
    public $timestamps = false;

    
}

