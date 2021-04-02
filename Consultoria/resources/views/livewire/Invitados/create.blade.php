<div class="m-4">
    <h3 class="flex justify-center">Agregar Invitados</h3>
    <div class="mt-10">
        <label for="">Selecione Evento</label>
        <select class="form-control" wire:model="evento">
            <option value="">-- Seleccione Evento --</option>
            @foreach($oEventos as $ev)
                <option value="{{$ev->id}}">{{$ev->nombre}}</option> 
            @endforeach
        </select>
        @error('evento')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <label for="">Nombre del Invitado</label>
        <input type="text" wire_model="nombre" class="form-control">
        @error('nombre')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <label for="">Cedula del Invitado</label>
        <input type="number" wire_model="cedula" class="form-control">
        @error('cedula')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <label for="">Correo del Invitado</label>
        <input type="email" wire_model="correo" class="form-control">
        @error('correo')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    @if($accion == 'create')
        <button wire:click="save()" class="container mx-auto mt-3 bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" >Guardar</button>
    @else
        <div class="grid grid-cols-2 gap-x-4">
            <div>
                <button wire:click="actualizar()" class="container mx-auto mt-3 bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" >Actualizar</button>
            </div>
            <div>
                <button wire:click="cancelar()" class="container mx-auto mt-3 bg-red-500 mb-2 hover:bg-red-700 text-white font-bold px-4 py-2 rounded" >Cancelar</button>
            </div>
        </div>
    @endif
</div>