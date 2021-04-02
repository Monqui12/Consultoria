<div class="container mx-auto">
    <div class="bg-white rounded-lg shadow overflow-hidden max-w-4xl mx-auto">
        <div class="mt-8 text-2xl flex justify-between">
            <div></div> 
            <div class="mr-2">
                <x-jet-button wire:click="confirmItemAdd" class="bg-blue-500 hover:bg-blue-700">
                    Nuevo
                </x-jet-button>
            </div>
        </div>
        <div class="flex justify-between ml-2">
            <div class="mb-2">
                <input wire:model.debounce.500ms="q" type="search" placeholder="Buscar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
        </div>
        <table class="table-auto w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-6">Id</th>
                    <th class="px-6 py-6">Nombre</th>
                    <th class="px-6 py-6">Dias-Mes</th>
                    <th class="px-6 py-6">Horas-Dia</th>
                    <th class="px-6 py-6"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($horarios as $horario)
                    <tr class="text-sm text-gray-500">
                        <td class="px-6 py-4">{{$horario->id}}</td>
                        <td class="px-6 py-4">{{$horario->nombre}}</td>
                        <td class="px-6 py-4">{{$horario->dias_mes}}</td>
                        <td class="px-6 py-4">{{$horario->horas_dia}}</td>
                        <td class="px-6 py-4"> 
                            <button wire:click="edit({{$horario}})" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded w-full" >Editar</button>
                            <button wire:click="delete({{$horario}})" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded w-full" >Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-gray-100 px-6 py-4 border-gray-200">
            {{$horarios->links()}}
        </div>
    </div>
    
    <x-jet-confirmation-modal wire:model="confirmingItemDeletion">
        <x-slot name="title">
            Eliminar
        </x-slot>
 
        <x-slot name="content">
            Desaea Eliminar este Item?
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)">
                Cancelar
            </x-jet-secondary-button>
 
            <x-jet-danger-button class="ml-2" wire:click="deleteItemFinal({{$deleteItem}})">
                Eliminar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
 
    <x-jet-dialog-modal wire:model="confirmingItemAdd">
        <x-slot name="title">
            @if($accion == 'saveHorario')
                Agregar 
            @else
                Actualizar
            @endif
        </x-slot>
 
        <x-slot name="content">
        <div class="mb-3">
                <label for="name" class="form-label mb-2">Nombre</label>
                <input wire:model="nombre"  class="form-control" placeholder="Escribe aqui nombre del horario" type="text">
                @error('nombre')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dias-mes" class="form-label mb-2">Dias Mes</label>
                <input wire:model="diasmes" class="form-control" type="number">
                @error('diasmes')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="horas-dia" class="form-label mb-2">Horas Dia</label>
                <input wire:model="horasdia" class="form-control" type="number">
                @error('horasdia')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            
        </x-slot>
 
        <x-slot name="footer">
            @if($accion == 'saveHorario')
                <button wire:click="saveHorario" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" >Agregar</button>
            @else
                <button wire:click="updateHorario" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" >Actualizar</button>
                <!--<button wire:click="cancel" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded" >Cancelar</button>  -->  
            @endif
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded" wire:click="cerrarModal">Cerrar Modal</button>
        </x-slot>
    </x-jet-dialog-modal>
    
</div>
