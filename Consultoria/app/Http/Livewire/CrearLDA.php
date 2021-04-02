<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CargosModel;
use App\Models\AreasModel;
use App\Models\horario;
use App\Models\User;
use App\Models\LevantamientoCuerpoModel;
use DB;

class CrearLDA extends Component
{   
    use WithPagination;
    public $view = 'LDS.create';
    public $nombres;
    public $apellidos;
    public $cedula;
    public $codigo;
    public $area;
    public $cargo;
    public $jefe;
    public $horario;
    public $cuerpo = false;

    public $actividad;
    public $unidad;
    public $frecuencia;
    public $volumen;
    public $minutos;


    public $levantamiento;

    protected $rules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'cedula' => 'required',
        'codigo' => 'required',
        'area' => 'required',
        'cargo' => 'required',
        'jefe' => 'required',
        'horario' => 'required',
        'actividad' => 'required',
        'unidad' => 'required',
        'frecuencia' => 'required',
        'volumen' => 'required',
        'minutos' => 'required',
    ];
    protected $messages = [
        'nombres.required' => 'El Nombre es obligatorio',
        'apellidos.required' => 'El Apellido es obligatorio',
        'cedula.required' => 'La Cedula es obligatorio',
        'codigo.required' => 'El  Codigo es obligatorio',
        'area.required' => 'El  Area es obligatorio',
        'cargo.required' => 'El  Cargo es obligatorio',
        'jefe.required' => 'El  Jefe es obligatorio',
        'horario.required' => 'El  Hoarario es obligatorio',

        'actividad.required' => 'El  Actividad es obligatorio',
        'unidad.required' => 'El  Unidad es obligatorio',
        'frecuencia.required' => 'El  Frecuencia es obligatorio',
        'volumen.required' => 'El  Volumen es obligatorio',
        'minutos.required' => 'El  Minutos es obligatorio',
    ];

    public function render()
    {   
        $areas = AreasModel::all();
        $cargos = CargosModel::all();
        $horarios = horario::all();
        $jefes = CargosModel::all();
        if(auth()->user()->id){
            $oPersona = User::where('id',auth()->user()->id)->first();
            if(!is_null($oPersona)){
                $this->nombres = $oPersona->name;
                $this->codigo = $oPersona->codigo;
                $this->cedula = $oPersona->cedula;
                $this->area = $oPersona->id_area;
                $this->cargo = $oPersona->id_cargo;
            }
            $oLevantamiento = DB::table("abc_levantamiento_cabecero")->where('id_usuario',auth()->user()->id)->first();
            if(!is_null($oLevantamiento)){
                $this->horario = $oLevantamiento->id_horario;
                $this->levantamiento = $oLevantamiento->id;
                $this->cuerpo = true;
                $oLevantamientos = LevantamientoCuerpoModel::where('id_levantamiento',$oLevantamiento->id)->paginate(5);
            }
        }
        return view('livewire.LDS.crear-l-d-a',compact('areas','cargos','horarios','jefes','oLevantamientos'));
    }
    public function save(){
        $this->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cedula' => 'required',
            'codigo' => 'required',
            'area' => 'required',
            'cargo' => 'required',
            'jefe' => 'required',
            'horario' => 'required'
        ]);

        try {
            $sPersona = User::where('cedula', $this->cedula)->first();
            if(is_null($sPersona)){

            }
            User::where('cedula', $this->cedula)->update([
                    'codigo' =>$this->codigo,
                    'id_area' =>$this->area,
                    'id_cargo' =>$this->cargo,
                    'name' => $this->nombres 
            ]);
            $oLevantamiento = DB::table("abc_levantamiento_cabecero")->where('id_usuario',$sPersona->id)->first();
            if(is_null($oLevantamiento)){
                DB::table("abc_levantamiento_cabecero")->insert([
                            'id_estado' => 1,
                            'id_usuario' => $sPersona->id,
                            'id_horario' => $this->horario,
                            'id_tipo' => 2,
                            'fecha'=> DB::raw('CURRENT_TIMESTAMP')
                ]);
                $this->cuerpo = true;
            }else{
                $this->cuerpo = true;
                //DB::table("abc_levantamiento_cabecero")->where('id',$oLevantamiento->id)->update();
            }
        } catch (\Throwable $th) {
            dd(13);
        }
    }
    public function saveActividad(){
        $this->validate([
            'actividad' => 'required',
            'unidad' => 'required',
            'frecuencia' => 'required',
            'volumen' => 'required',
            'minutos' => 'required',
        ]);

        LevantamientoCuerpoModel::create([
            'id_levantamiento' => $this->levantamiento,
            'actividad' => $this->actividad,
            'unidad_medida' => $this->unidad,
            'id_frecuencia' => $this->frecuencia,
            'volumen' => $this->volumen,
            'minutos' => $this->minutos
        ]);
    }
}
