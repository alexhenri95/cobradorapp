<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Préstamos
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
                            <div class="flex items-center  text-sm">
                                <a href="{{route('editar.prestamo', $loan)}}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit" >
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <button wire:click="destroy({{$loan->id}})" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
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

    {{-- Eliminar --}}
    <x-jet-dialog-modal wire:model="open_delete" maxWidth="lg">
        <x-slot name="title">
            <h1 class="text-center text-lg font-bold dark:text-gray-200">Eliminar préstamo</h1>
        </x-slot>

        <x-slot name="content">
            <p class="text-purple-600">¿Desea eliminar el registro seleccionado?</p>
            <p class="dark:text-gray-200">COD: {{$code}}</p>
        </x-slot>

        <x-slot name="footer">
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800 -mt-4">
                <button wire:click="$set('open_delete', false)" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                <button wire:click="delete" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Eliminar
                </button>
            </footer>
        </x-slot>
    </x-jet-dialog-modal>
</div>

