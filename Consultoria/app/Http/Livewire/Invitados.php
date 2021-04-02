<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\EventosModel;
use App\Models\InvitadosModel;
use Livewire\WithPagination;

class Invitados extends Component
{   
    public $accion = 'create';
    public $evento;
    public $nombres;
    public $cedula;
    public $correo;
    protected $rules = [
    	'evento' => 'required',
        'nombres' => 'required',
        'cedula' => 'required',
        'correo' => 'required',
	];
    protected $messages = [
    	'evento.required' => 'El Evento es requerido'
        'nombre.required' => 'El Nombres es obligatorio',
        'cedula.required' => 'La Cedula es obligatorio',
        'correo.required' => 'El Correo es obligatorio',
    ];
    public function render()
    {   
        $oEventos = EventosModel::all();
        return view('livewire.invitados',compact('oEventos'));
    }
    public function save(){
    	$this->validate([
            'evento' => 'required',
        	'nombres' => 'required',
        	'cedula' => 'required',
        	'correo' => 'required'
        ]);

    }
}
