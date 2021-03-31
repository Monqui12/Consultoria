<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevantamientoCuerpoModel extends Model
{
    use HasFactory;
    protected $table = 'abc_levantamiento_cuerpo';
    protected $fillable = ['id_levantamiento','actividad', 'unidad_medida', 'id_frecuencia','volumen','minutos'];
}
