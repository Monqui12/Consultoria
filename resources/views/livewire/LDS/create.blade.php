<div>
    <h3 class="flex justify-center mb-3 mt-3">Datos de Usuario</h3>
    <div class="m-3 ">
        <label for="name" class="form-label mb-2">Nombres</label>
        <input wire:model="nombres"  class="form-control" placeholder="Escribe aqui tu nombre" type="text">
        @error('nombres')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3 ">
        <label for="name" class="form-label mb-2">Apellidos</label>
        <input wire:model="apellidos"  class="form-control" placeholder="Escribe aqui tu apellido" type="text">
        @error('apellidos')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3">
        <label for="name" class="form-label mb-2">Cedula</label>
        <input wire:model="cedula"  class="form-control" placeholder="Escribe aqui tu Numero de cedula" type="text">
        @error('cedula')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3 ">
        <label for="name" class="form-label mb-2">Codigo</label>
        <input wire:model="codigo"  class="form-control" placeholder="Escribe aqui tu apellido" type="text">
        @error('codigo')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3 ">
        <label for="area" class="form-label mb-2">Area</label>
        <select wire:model="area"  class="form-control" >
            <option value="">Seleccione Area</option>
            @foreach($areas as $area)
                <option value="{{$area->id}}">{{$area->nombre}}</option> 
            @endforeach
        </select>
        @error('area')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3 ">
    <label for="area" class="form-label mb-2">Cargo</label>
        <select wire:model="cargo"  class="form-control" >
            <option value="">Seleccione Cargo</option>
            @foreach($cargos as $cargo)
                <option value="{{$cargo->id}}">{{$cargo->nombre}}</option> 
            @endforeach
        </select>
        @error('cargo')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3 ">
    <label for="area" class="form-label mb-2">Jefe</label>
        <select wire:model="jefe"  class="form-control" >
            <option value="">Seleccione Jefe</option>
            @foreach($jefes as $jefe)
                <option value="{{$jefe->id}}">{{$jefe->nombre}}</option> 
            @endforeach
        </select>
        @error('jefe')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="m-3 ">
        <label for="area" class="form-label mb-2"><H1>Horario</H1></label>
        <select wire:model="horario"  class="form-control" >
            <option value="">Seleccione Horario</option>
            @foreach($horarios as $horario)
                <option value="{{$horario->id}}">{{$horario->nombre}}</option> 
            @endforeach
        </select>
        @error('horario')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <button wire:click="save()" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded w-full" >Guardar</button>
</div>
<div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
    <p class="text-grey-darker text-base">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
    </p>
</div>