<?php 
function rol($id){
    $roles = new \App\Http\Controllers\RolesController();
    return $roles->tienePermiso($id);
}