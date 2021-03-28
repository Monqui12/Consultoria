<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CargosModel;
use Livewire\WithPagination;
use App\Models\EntidadesModel;

class Cargos extends Component
{   
    use WithPagination;
    public $nombre, $id_entidad, $hId;
    public $accion = "saveCargo";
    public $confirmingItemDeletion = false;
    public $confirmingItemAdd = false;
    public  $deleteItem;  
    public $q;

    protected $rules = [
        'nombre' => 'required',
        'id_entidad' => 'required',
    ];
    protected $messages = [
        'nombre.required' => 'El Nombres es obligatorio',
        'id_entidad.required' => 'La entidad es obligatorio',
    ];
    public function render()
    {   
        $cargos = CargosModel::latest('id')
        ->when( $this->q, function($query) {
                return $query->where('nombre', 'like', '%'.$this->q . '%')
                    ->orWhere('id_entidad', 'like', '%' . $this->q . '%');
            })
        ->paginate(5);
        $entidades = EntidadesModel::all();
        return view('livewire.cargos', compact('cargos','entidades'));
    }
    public function confirmItemAdd(){
        $this->confirmingItemAdd = true;
    }
    
    public function cerrarModal(){
        $this->confirmingItemAdd = false;
        $this->reset(['nombre', 'id_entidad']);
    }
    public function saveCargo(){
        $this->validate([
            'nombre' => 'required|',
            'id_entidad' => 'required'
        ]);
        CargosModel::create([
            'nombre' => $this->nombre,
            'id_entidad' => $this->id_entidad,
        ]);

        $this->reset(['nombre', 'id_entidad']);
        $this->confirmingItemAdd = false;
    }
    public function edit(CargosModel $cargo){
        $this->nombre =  $cargo->nombre;
        $this->id_entidad =  $cargo->nit;
        $this->hId = $cargo->id;

        $this->accion = "updateCargo";
        $this->confirmingItemAdd = true;
    }
    public function updateCargo(){
        $this->validate([
            'nombre' => 'required|',
            'id_entidad' => 'required'
        ]);

        $cargo = CargosModel::find($this->hId);
        $cargo->update([
            'nombre' => $this->nombre,
            'id_entidad' => $this->id_entidad
        ]);

        $this->reset(['nombre', 'id_entidad']);
        $this->confirmingItemAdd = false;
    }
    public function delete(CargosModel $cargo){
        $this->reset('deleteItem');
        $this->deleteItem = $cargo;
        $this->confirmingItemDeletion = true;
    }
    public function deleteItemFinal(CargosModel $cargo){
        $cargo->delete();
        $this->reset('deleteItem');
        $this->confirmingItemDeletion = false;
        
    }
}
