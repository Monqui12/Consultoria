<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EntidadesModel;
use Livewire\WithPagination;

class Entidades extends Component
{   

    use WithPagination;
    public $nombre, $nit, $contacto, $logo, $hId;
    public $accion = "saveEntidad";
    public $confirmingItemDeletion = false;
    public $confirmingItemAdd = false;
    public  $deleteItem;  
    public $q;

    protected $rules = [
        'nombre' => 'required',
        'nit' => 'required',
        'contacto' => 'required',
        'logo' => 'required',
    ];
    protected $messages = [
        'nombre.required' => 'El Nombres es obligatorio',
        'nit.required' => 'El Nit es obligatorio',
        'contacto.required' => 'El  Contacto es obligatorio',
        'logo.required' => 'El  Logo es obligatorio',
    ];

    public function render()
    {   
        if(!rol(34)){
            abort(403);
        }
        $entidades = EntidadesModel::latest('id')
        ->when( $this->q, function($query) {
                return $query->where('nombre', 'like', '%'.$this->q . '%')
                    ->orWhere('nit', 'like', '%' . $this->q . '%')
                    ->orWhere('contacto', 'like', '%' . $this->q . '%');
            })
        ->paginate(5);
        return view('livewire.entidades', compact('entidades'));
    }
    public function confirmItemAdd(){
        $this->confirmingItemAdd = true;
    }
    
    public function cerrarModal(){
        $this->confirmingItemAdd = false;
        $this->reset(['nombre', 'nit', 'contacto', 'logo', 'hId', 'accion']);
    }
    public function saveEntidad(){
        $this->validate([
            'nombre' => 'required|',
            'nit' => 'required',
            'contacto' => 'required'
        ]);
        EntidadesModel::create([
            'nombre' => $this->nombre,
            'nit' => $this->nit,
            'contacto' => $this->contacto,
            'logo' => '1'
        ]);

        $this->reset(['nombre', 'nit', 'contacto', 'logo', 'hId', 'accion']);
        $this->confirmingItemAdd = false;
    }
    public function edit(EntidadesModel $entidad){
        $this->nombre =  $entidad->nombre;
        $this->nit =  $entidad->nit;
        $this->contacto =  $entidad->contacto;
        $this->hId = $entidad->id;

        $this->accion = "updateEntidad";
        $this->confirmingItemAdd = true;
    }
    public function updateEntidad(){
        $this->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'contacto' => 'required'
        ]);
        $entidad = EntidadesModel::find($this->hId);
        $entidad->update([
            'nombre' => $this->nombre,
            'nit' => $this->nit,
            'contacto' => $this->contacto
        ]);

        $this->reset(['nombre', 'nit', 'contacto', 'logo', 'hId', 'accion']);
        $this->confirmingItemAdd = false;
    }
    public function delete(EntidadesModel $entidad){
        $this->reset('deleteItem');
        $this->deleteItem = $entidad;
        $this->confirmingItemDeletion = true;
    }
    public function deleteItemFinal(EntidadesModel $entidad){
        $entidad->delete();
        $this->reset('deleteItem');
        $this->confirmingItemDeletion = false;
        
    }
}
