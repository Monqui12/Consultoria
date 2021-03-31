<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\EventosModel;
use Livewire\WithPagination;

class Eventos extends Component
{   
    use WithPagination;
    public $nombre;
    public $consultor;
    public $accion = 'create';
    public $hId;

    protected $rules = [
        'nombre' => 'required',
        'consultor' => 'required',
    ];
    protected $messages = [
        'nombre.required' => 'El Nombres es obligatorio',
        'consultor.required' => 'El Consultor es obligatorio',
    ];

    public function render()
    {   
        $oConsultores = User::all();
        $oEventos = EventosModel::select('abc_eventos.id as evento','abc_eventos.nombre','abc_eventos.id_estado','users.name','users.id')
                                ->join('users','users.id','abc_eventos.id_consultor')
                                ->orderBy('abc_eventos.created_at','DESC')->paginate(5);
        return view('livewire.eventos',compact('oConsultores','oEventos'));
    }
    public function save(){
        $this->validate([
            'nombre' => 'required',
            'consultor' => 'required'
        ]);
        EventosModel::create([
            'nombre' => $this->nombre,
            'id_entidad' => 1,
            'id_consultor' => $this->consultor,
            'id_estado' => 1
        ]);

        $this->reset(['nombre', 'consultor']);
    }
    public function edit($event)
    {    
        $this->nombre = $event['nombre'];
        $this->consultor = $event['id'];
        $this->hId = $event['evento'];
        $this->accion = "Actualizar";
    }
    public function cancelar(){
        $this->accion = "create";
        $this->reset(['nombre', 'consultor']);
    }
    public function actualizar(){
        $this->validate([
            'nombre' => 'required',
            'consultor' => 'required'
        ]);
        EventosModel::where('id',$this->hId)->update([
            'nombre' => $this->nombre,
            'id_entidad' => 1,
            'id_estado' => 1
        ]);
        $this->accion = "create";
        $this->reset(['nombre', 'consultor']);
    }
    public function delete($id){
        EventosModel::find($id)->delete();
    }
}
