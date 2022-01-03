<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalle Del Préstamo
    </h2>

    <div class="max-w-4xl mx-auto p-4 md:p-0 py-6 md:py-10 dark:text-gray-300 rounded-lg bg-white dark:bg-gray-800">
        <div x-data="{open: true}">
            <div x-on:click="open= !open" class="flex items-center justify-between font-bold text-md border-b border-gray-400  pb-2 cursor-pointer">
                DETALLE DEL CLIENTE
                <i class="fas fa-chevron-down mr-1"></i>
            </div>

            <div x-show="open" class="mt-2 p-2 rounded bg-gray-50 dark:bg-gray-900">
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">CÉDULA</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->dni}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">CLIENTE</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->name}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">DIRECCIÓN</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->address}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">TELÉFONO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->phone}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">EMAIL</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->email}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{open: true}">
            <div x-on:click="open= !open" class="flex items-center justify-between font-bold text-md border-b border-gray-400 mt-4  pb-2 cursor-pointer">
                DETALLE DEL PRÉSTAMO
                <i class="fas fa-chevron-down mr-1"></i>
            </div>

            <div x-show="open" class="mt-2 p-2 rounded bg-gray-50 dark:bg-gray-900">
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">CÓDIGO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->code}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">FECHA DE INICIO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->start_date}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">FECHA FIN</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->end_date}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">DESCRIPCIÓN</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->description}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">TIPO DE PAGO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">
                            @switch($loan->payment_type)
                                @case(1)
                                    CORRIENTE
                                    @break
                                @case(2)
                                    DIFERIDO
                                    @break
                                @default
                            @endswitch    
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-purple-500 font-semibold">TIEMPO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">
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
                        </p>
                    </div>
                </div>

                <div class="w-full overflow-hidden rounded shadow-xs mt-4">
                    
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap ">
                            <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">MONTO</th>
                                <th class="px-4 py-3">CUOTAS</th>
                                <th class="px-4 py-3">INT.</th>
                                <th class="px-4 py-3">M. PAGAR</th>
                                <th class="px-4 py-3">SALDO</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        ${{$loan->quantity}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{$loan->payments_number}} / ${{round($loan->final_payment / $loan->payments_number, 2)}} 
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{$loan->interest}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        ${{$loan->final_payment}}        
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        ${{$loan_payments->balance}}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{open: true}">
            <div x-on:click="open= !open"  class="flex items-center justify-between font-bold text-md border-b border-gray-400 mt-4  pb-2 cursor-pointer">
                DETALLE DE PAGOS
                <i class="fas fa-chevron-down mr-1"></i>
            </div>

            <div x-show="open" class="mt-2 p-2 rounded bg-gray-50 dark:bg-gray-900" >
                @if($loan_payments->payments->count())
                
                <div class="w-full overflow-hidden rounded shadow-xs mt-4">
                
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap ">
                            <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">FECHA</th>
                                <th class="px-4 py-3">CANTIDAD</th>
                                <th class="px-4 py-3" width="100"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                
                                @foreach($loan_payments->payments as $payment)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{$payment->payment_date}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        ${{$payment->quantity}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if($loop->last)
                                        <button wire:click="destroy({{$payment->id}})" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg  focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                
                </div>

                @else
                    <p class="my-2 text-center">Aún no se ha realizado ningún pago a la deuda...</p>
                @endif
            </div>
        </div>

        <footer class="flex items-center justify-between dark:bg-gray-800 mt-4">
            <a href="{{route('prestamos.index')}}" class="text-center w-full px-5 py-3 mr-1 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Volver
            </a>

            @if($loan_payments->balance > 0)
            <button wire:click="pago({{$loan->id}})" class="w-full px-5 py-3 ml-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Realizar pago
            </button>
            @endif
        </footer>

    </div>

    {{-- Editar --}}
    <x-jet-dialog-modal wire:model="open_pago" maxWidth="lg">
        <x-slot name="title">
            <h1 class="text-center text-lg font-bold dark:text-gray-200">Pago de cuota</h1>
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-2 gap-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Saldo</span>
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="${{$balance}}" readonly disabled"/>
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cantidad</span>
                    <input type="number" wire:model="quantity" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="$0.00"
                    />
                    @error('quantity')
                        <div class="text-xs text-purple-600 mt-1">
                            <span>(*) {{$message}}</span>
                        </div>
                    @enderror
                </label>
            </div>
            

        </x-slot>

        <x-slot name="footer">
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800 -mt-4">
                <button wire:click="$set('open_pago',false)" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                <button wire:click="save" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Guardar
                </button>
            </footer>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Eliminar --}}
    <x-jet-dialog-modal wire:model="open_delete" maxWidth="lg">
        <x-slot name="title">
            <h1 class="text-center text-lg font-bold dark:text-gray-200">Eliminar pago</h1>
        </x-slot>

        <x-slot name="content">
            <p class="text-purple-600">¿Desea eliminar el registro seleccionado?</p>
            <p class="dark:text-gray-200">Pago: {{$pago}}</p>
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


