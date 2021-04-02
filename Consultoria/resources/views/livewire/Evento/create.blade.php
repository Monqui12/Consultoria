<div class="m-4">
    <h3 class="flex justify-center">Crear Evento</h3>
    <div class="mt-10">
        <label for="">Nombre de Evento</label>
        <input type="text" wire:model='nombre' class="form-control">
        @error('nombre')
            <p class="text-xs text-red-500 italic">{{$message}}</p>
        @enderror
    </div>
    <div class="mt-2">
        <label for="">Asignar Consultor</label>
        <select wire:model='consultor' class="form-control">
            <option value="">-- Seleccione Opcion --</option>
            @foreach($oConsultores as $con)
                <option value="{{$con->id}}">{{$con->name}}</option> 
            @endforeach
        </select>
        @error('consultor')
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