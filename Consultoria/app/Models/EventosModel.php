<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventosModel extends Model
{
    use HasFactory;
    protected $table = 'abc_eventos';
    protected $fillable = ['nombre', 'id_consultor', 'id_entidad','nombre','id_estado'];
}
