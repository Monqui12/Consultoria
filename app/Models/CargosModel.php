<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargosModel extends Model
{
    use HasFactory;
    protected $table = 'abc_cargos';
    protected $fillable = ['nombre', 'id_entidad'];
}
