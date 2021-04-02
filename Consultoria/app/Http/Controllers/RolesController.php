<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function tienePermiso($id){
        return true;
    }
}
