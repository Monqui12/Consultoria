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
                    <th class="px-6 py-6">Nit</th>
                    <th class="px-6 py-6">Contacto</th>
                    <th class="px-6 py-6">Logo</th>
                    <th class="px-6 py-6"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($entidades as $entidad)
                    <tr class="text-sm text-gray-500">
                        <td class="px-6 py-4">{{$entidad->id}}</td>
                        <td class="px-6 py-4">{{$entidad->nombre}}</td>
                        <td class="px-6 py-4">{{$entidad->nit}}</td>
                        <td class="px-6 py-4">{{$entidad->contacto}}</td>
                        <td class="px-6 py-4">{{$entidad->logo}}</td>
                        <td class="px-6 py-4"> 
                            <button wire:click="edit({{$entidad}})" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded w-full" >Editar</button>
                            <button wire:click="delete({{$entidad}})" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded w-full" >Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-gray-100 px-6 py-4 border-gray-200">
            {{$entidades->links()}}
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
            @if($accion == 'saveEntidad')
                Agregar 
            @else
                Actualizar
            @endif
        </x-slot>
 
        <x-slot name="content">
        <div class="mb-3">
                <label for="name" class="form-label mb-2">Nombre</label>
                <input wire:model="nombre"  class="form-control" placeholder="Escribe aqui nombre de la Entidad" type="text">
                @error('nombre')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dias-mes" class="form-label mb-2">Nit</label>
                <input wire:model="nit" class="form-control" type="number">
                @error('nit')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="horas-dia" class="form-label mb-2">Contacto</label>
                <input wire:model="contacto" class="form-control" type="number">
                @error('contacto')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="horas-dia" class="form-label mb-2">Logo</label>
                <input wire:model="logo" class="form-control" type="file">
                @error('logo')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            
        </x-slot>
 
        <x-slot name="footer">
            @if($accion == 'saveEntidad')
                <button wire:click="saveEntidad" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" >Agregar</button>
            @else
                <button wire:click="updateEntidad" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded" >Actualizar</button>
                <!--<button wire:click="cancel" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded" >Cancelar</button>  -->  
            @endif
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded" wire:click="cerrarModal">Cerrar Modal</button>
        </x-slot>
    </x-jet-dialog-modal>
    
</div>

