<x-main-layout>
    @if($loan)
        <h1 class="text-5xl font-bold text-center mx-auto text-indigo-400"><span class="text-2xl font-semibold text-gray-700">Resultado de consulta</span> <br>  CobradorApp</h1>
        <div class="max-w-4xl mx-auto p-4 md:p-0 py-6 md:py-10 dark:text-gray-300 rounded-lg bg-white dark:bg-gray-800">
            <div class="flex items-center justify-between font-bold text-md border-b border-gray-400  pb-2">
                DETALLE DEL CLIENTE
            </div>
    
            <div class="mt-2 p-2 rounded bg-gray-50 dark:bg-gray-900">
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">CÉDULA</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->dni}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">CLIENTE</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->name}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">DIRECCIÓN</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->address}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">TELÉFONO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->phone}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">EMAIL</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->customer->email}}</p>
                    </div>
                </div>
            </div>
    
            <div class="flex items-center justify-between font-bold text-md border-b border-gray-400 mt-4  pb-2">
                DETALLE DEL PRÉSTAMO
            </div>
    
            <div class="mt-2 p-2 rounded bg-gray-50 dark:bg-gray-900">
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">CÓDIGO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->code}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">FECHA DE INICIO</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->start_date}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">FECHA FIN</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->end_date}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">DESCRIPCIÓN</p>
                    </div>
                    <div class="col-span-3 md:col-span-4">
                        <p class="dark:text-gray-200">{{$loan->description}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 md:col-span-1">
                        <p class="text-indigo-500 font-semibold">TIPO DE PAGO</p>
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
                        <p class="text-indigo-500 font-semibold">TIEMPO</p>
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
                                        {{$loan->payments_number}} / ${{$loan->final_payment / $loan->payments_number}} 
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{$loan->interest}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        ${{$loan->final_payment}}        
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        ${{$loan->balance}}
                                    </td>
                                </tr>
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
            <div class="flex items-center justify-between font-bold text-md border-b border-gray-400 mt-4  pb-2">
                DETALLE DE PAGOS
            </div>
    
            <div class="mt-2 p-2 rounded bg-gray-50 dark:bg-gray-900">
                @if($loan->payments->count())
                
                <div class="w-full overflow-hidden rounded shadow-xs mt-4">
                    
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap ">
                            <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">FECHA</th>
                                <th class="px-4 py-3">CANTIDAD</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                
                                @foreach($loan->payments as $payment)
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
    
            <footer class="flex items-center justify-between dark:bg-gray-800 mt-4">
                <a href="{{route('welcome')}}" class="text-center w-full px-5 py-3 mr-1 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Volver
                </a>
    
                <a href="{{route('info.pdf', $loan->id)}}" target="_blank" class="w-full px-5 py-3 ml-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Imprimir
                </a>
            </footer>
    
        </div>

    @else

    <section class="flex justify-center items-center py-36">

        <div class="container mx-auto p-4">
            <h1 class="text-5xl font-bold text-center mx-auto text-indigo-400"><span class="text-2xl font-semibold text-gray-700">Bienvenido a</span> <br>  CobradorApp</h1>

            <div class="max-w-2xl mx-auto mt-4 rounded shadow-lg bg-gray-50 p-4">
                <p class="text-gray-600 font-semibold text-lg text-center">
                    <span class="font-normal">No hay registro coincidentes con el código: </span> {{$code}}
                </p>
                <div class="flex items-center justify-center mt-2">
                    <a href="{{route('welcome')}}" class="mx-auto px-4 py-1 text-l font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded">Volver</a>
                </div>
                
            </div>
        </div>

    </section>
    @endif
</x-main-layout>