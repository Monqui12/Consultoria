<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    use HasFactory;
    protected $table = 'abc_horario';
    protected $fillable = ['nombre', 'dias_mes', 'horas_dia'];
}
