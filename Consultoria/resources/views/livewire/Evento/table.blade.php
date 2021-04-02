<div class="m-4">
    <h3 class="flex mx-auto"></h3>
    <table class="table-auto w-full mt-8">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-6">Nombre</th>
                    <th class="px-6 py-6">Consultor</th>
                    <th class="px-6 py-6">Estado</th>
                    <th class="px-6 py-6"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                    @foreach($oEventos as $item)
                        <tr class="text-sm text-gray-500">
                            <td class="px-6 py-4">{{$item->nombre}}</td>
                            <td class="px-6 py-4">{{$item->name}}</td>
                            <td class="px-6 py-4">{{$item->id_estado}}</td>
                            <td class="px-6 py-4">
                            <div class="grid grid-cols-2 gap-x-4">
                                <div>
                                    <button wire:click="edit({{$item}})" class="bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded w-full" >Editar</button>
                                </div>
                                <div>        
                                    <button wire:click="delete({{$item->evento}})" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded w-full" >Eliminar</button>
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="bg-gray-100 px-6 py-4 border-gray-200">
            @if(isset($oEventos))
                {{$oEventos->links()}}
            @endif
        </div>
</div>