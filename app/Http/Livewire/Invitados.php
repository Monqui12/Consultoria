<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\EventosModel;
use Livewire\WithPagination;

class Invitados extends Component
{   
    public $accion = 'create';
    public function render()
    {   
        $oEventos = EventosModel::all();
        return view('livewire.invitados',compact('oEventos'));
    }
}
