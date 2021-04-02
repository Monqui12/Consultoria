<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadesModel extends Model
{
    use HasFactory;
    protected $table = 'abc_entidades';
    protected $fillable = ['nombre', 'nit', 'contacto','logo'];
}
