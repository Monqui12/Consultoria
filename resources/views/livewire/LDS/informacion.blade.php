@if($cuerpo)
    <div class="m-5">
        <h3 class="flex justify-center mb-3 mt-3">Tablero de Actividades</h3>
        <div class="">
            <label for="">Actividad</label>
            <textarea wire:model="actividad" placeholder="Escribe Actividad" class="form-control" name="" id="" cols="80" rows="3"></textarea>
            @error('actividad')
                <p class="text-xs text-red-500 italic">{{$message}}</p>
            @enderror
        </div>
        <div class="grid grid-cols-4 gap-2">
            <div class="">
                <label for="">Unidad De Medida</label>
                <input wire:model="unidad" placeholder="Unidad" type="text" class="form-control">
                @error('unidad')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="">
            <label for="">Frecuencia</label>
                <select wire:model="frecuencia" name="" id="" class="form-control">
                    <option value="">-- Seleccione Opcion --</option>
                    <option value="2">Semanal</option>
                    <option value="1">Diario</option>
                    <option value="3">Quincenal</option>
                    <option value="4">Mensual</option>
                </select>
                @error('frecuencia')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label for="">Volumen</label>
                <input wire:model="volumen" type="number" placeholder="Cantidad de Veces" class="form-control">
                @error('volumen')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
            <div class="">
                <label  for="">Minutos</label>
                <input placeholder="Minutos por actividad" wire:model="minutos" type="number" class="form-control">
                @error('minutos')
                    <p class="text-xs text-red-500 italic">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="flex justify-self-end">
            <button wire:click="saveActividad()" class=" bg-blue-500 mb-2 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded m-5" >Guardar</button>
        </div>

        <table class="table-auto w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-6">Actividad</th>
                    <th class="px-6 py-6">Unidad Medida</th>
                    <th class="px-6 py-6">Frecuencia</th>
                    <th class="px-6 py-6">Volumen</th>
                    <th class="px-6 py-6">Minutos</th>
                    <th class="px-6 py-6"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                    @foreach($oLevantamientos as $item)
                        <tr class="text-sm text-gray-500">
                            <td class="px-6 py-4">{{$item->actividad}}</td>
                            <td class="px-6 py-4">{{$item->unidad_medida}}</td>
                            <td class="px-6 py-4">{{$item->id_frecuencia}}</td>
                            <td class="px-6 py-4">{{$item->volumen}}</td>
                            <td class="px-6 py-4">{{$item->minutos}}</td>
                            <td class="px-6 py-4"> 
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="bg-gray-100 px-6 py-4 border-gray-200">
            @if(isset($oLevantamientos))
                {{$oLevantamientos->links()}}
            @endif
        </div>
    </div>
@endif

