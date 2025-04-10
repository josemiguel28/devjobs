<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'region'];

    public function vacantes()
    {
        return $this->hasMany(Vacante::class);
    }
}
