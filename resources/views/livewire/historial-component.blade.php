<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Historial
    </h2>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="px-2 py-3 flex items-center dark:bg-gray-800">
    
            <input wire:model="search" class="block flex-1 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ingrese el código del préstamo a buscar..."/>
            
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap ">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Tiempo</th>
                    <th class="px-4 py-3">Monto</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($loans as $loan)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{$loan->customer->name}}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400"><span class="font-bold">C.I.:</span> {{$loan->customer->dni}}r</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$loan->description}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @switch($loan->payment_type)
                                @case(1)
                                    CORRIENTE
                                    @break
                                @case(2)
                                    DIFERIDO
                                    @break
                                @default
                            @endswitch

                        </td>
                        <td class="px-4 py-3 text-sm">

                            @switch($loan->time)
                                @case(1)
                                    DIARIO
                                    @break
                                @case(2)
                                    SEMANAL
                                    @break
                                @case(3)
                                    MENSUAL
                                    @break
                                @case(4)
                                    ANUAL
                                    @break
                                @default
                                    
                            @endswitch

                        </td>
                        <td class="px-4 py-3 text-sm">
                            ${{$loan->quantity}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            ${{$loan->final_payment}}
                        </td>
                        
                        <td class="px-2 py-3">
                            <div class="flex items-center text-sm">
                                <a href="{{route('detalle.prestamo', $loan)}}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray" aria-label="See">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($loans->hasPages())
            <div class="px-2 py-3 border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                {{$loans->links()}}
            </div>
        @endif
    </div>

</div>

