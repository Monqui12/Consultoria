<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\horario;
use Livewire\WithPagination;

class Horarios extends Component
{   
    use WithPagination;
    public $nombre, $diasmes, $horasdia, $hId;
    public $accion = "saveHorario";
    public $confirmingItemDeletion = false;
    public $confirmingItemAdd = false;
    public  $deleteItem;  
    public $q;

    protected $rules = [
        'nombre' => 'required',
        'diasmes' => 'required',
        'horasdia' => 'required',
    ];
    protected $messages = [
        'nombre.required' => 'El Nombres es obligatorio',
        'diasmes.required' => 'El Dias Mes es obligatorio',
        'horasdia.required' => 'El Horas Dia es obligatorio',
    ];

    public function render()
    {   
        $horarios = horario::latest('id')
        ->when( $this->q, function($query) {
                return $query->where('nombre', 'like', '%'.$this->q . '%')
                    ->orWhere('dias_mes', 'like', '%' . $this->q . '%')
                    ->orWhere('horas_dia', 'like', '%' . $this->q . '%');
            })
        ->paginate(5);
        return view('livewire.horarios', compact('horarios'));
    }

    public function saveHorario(){
        $this->validate([
            'nombre' => 'required|',
            'diasmes' => 'required',
            'horasdia' => 'required'
        ]);

        
        horario::create([
            'nombre' => $this->nombre,
            'dias_mes' => $this->diasmes,
            'horas_dia' => $this->horasdia
        ]);

        $this->reset(['nombre', 'diasmes', 'horasdia', 'hId']);
        $this->confirmingItemAdd = false;
    }
    public function edit(horario $horario){
        $this->nombre =  $horario->nombre;
        $this->diasmes =  $horario->dias_mes;
        $this->horasdia =  $horario->horas_dia;
        $this->hId = $horario->id;
        

        $this->accion = "updateHorario";
        $this->confirmingItemAdd = true;
    }
    public function updateHorario(){
        $this->validate([
            'nombre' => 'required',
            'diasmes' => 'required',
            'horasdia' => 'required'
        ]);
        $horario = horario::find($this->hId);

        $horario->update([
            'nombre' => $this->nombre,
            'dias_mes' => $this->diasmes,
            'horas_dia' => $this->horasdia
        ]);

        $this->reset(['nombre', 'diasmes', 'horasdia', 'hId', 'accion']);
        $this->confirmingItemAdd = false;
    }
    public function cancel(){   
        $this->reset(['nombre', 'diasmes', 'horasdia', 'hId', 'accion']);
    }
    public function delete(horario $horario){
        $this->reset('deleteItem');
        $this->deleteItem = $horario;
        $this->confirmingItemDeletion = true;
    }
    public function deleteItemFinal(horario $horario){
        $horario->delete();
        $this->reset('deleteItem');
        $this->confirmingItemDeletion = false;
        
    }
    public function confirmItemAdd() 
    {
        $this->confirmingItemAdd = true;
    }
    public function cerrarModal(){
        $this->confirmingItemAdd = false;
        $this->reset(['nombre', 'diasmes', 'horasdia', 'hId', 'accion']);
    }
}
