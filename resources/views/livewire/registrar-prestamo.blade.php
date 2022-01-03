<div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Registrar Préstamo
    </h2>

    <div class="max-w-4xl mx-auto p-4 md:p-0 py-6 md:py-10 dark:text-gray-300 rounded-lg bg-white dark:bg-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4  md:gap-y-6 md:gap-x-8 ">
            <div class="md:col-span-2">
                <div class="flex items-center mb-4">
                    <div class="flex-1">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Clientes
                            </span>
                            <select wire:model="customer_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="">Seleccione el cliente...</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </label>
                        @error('customer_id')
                            <div class="text-xs text-purple-600 mt-1">
                                <span>(*) {{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </div>
    
                <div class="flex items-center mb-4">
                    <div class="flex-1 mr-1">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Fecha Inicio</span>
                            <input wire:model="start_date" type="date" value="{{ date('Y-m-d') }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Cédula de identidad"/>
                        </label>
                        @error('start_date')
                            <div class="text-xs text-purple-600 mt-1">
                                <span>(*) {{$message}}</span>
                            </div>
                        @enderror
                    </div>
    
                    <div class="flex-1 ml-1">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Fecha Fin</span>
                            <input wire:model="end_date" type="date" value="{{ date('Y-m-d') }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Cédula de identidad"/>  
                        </label>
                        @error('end_date')
                            <div class="text-xs text-purple-600 mt-1">
                                <span>(*) {{$message}}</span>
                            </div>
                        @enderror
                    </div>
                    
                </div>
    
                <div class="flex items-center mb-4">
                    <div class="flex-1">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Descripción</span>
                            <input wire:model="description" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Descripción"/>
                        </label>
                        @error('description')
                            <div class="text-xs text-purple-600 mt-1">
                                <span>(*) {{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="flex-1 mr-1">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Tipo de pago
                            </span>
                            <select wire:model="payment_type" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="1">CORRIENTE</option>
                                <option value="2" selected>DIFERIDO</option>
                            </select>
                        </label>
                        @error('payment_type')
                            <div class="text-xs text-purple-600 mt-1">
                                <span>(*) {{$message}}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="flex-1 ml-1">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Tiempo
                            </span>
                            <select wire:model="time" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="1">DIARIO</option>
                                <option value="2" >SEMANAL</option>
                                <option value="3" selected>MENSUAL</option>
                                <option value="4" >ANUAL</option>
                            </select>
                            
                        </label>
                        @error('time')
                            <div class="text-xs text-purple-600 mt-1">
                                <span>(*) {{$message}}</span>
                            </div>
                        @enderror
                    </div>
                    
                </div>
    
            </div>

            <div class="md:col-span-1">
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Monto</span>
                    <input wire:model="quantity" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="$ 0.00"/>
                    @error('quantity')
                        <div class="text-xs text-purple-600 mt-1">
                            <span>(*) {{$message}}</span>
                        </div>
                    @enderror
                </label>

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Cuotas</span>
                    <input wire:model="payments_number" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="#"/>
                    @error('payments_number')
                        <div class="text-xs text-purple-600 mt-1">
                            <span>(*) {{$message}}</span>
                        </div>
                    @enderror
                </label>

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Interés (%)</span>
                    <div class="flex">
                        <input wire:model="interest" type="text" class="block w-full mr-1 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="0%"/>
                        
                        <div class="mt-1">
                            <button wire:click="calcular" class="w-full px-5 py-3 ml-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-greenLime-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-greenLime-600 hover:bg-greenLime-700 focus:outline-none focus:shadow-outline-greenLime">
                                Calcular
                            </button>
                        </div>
                        
                    </div>
                    @error('interest')
                        <div class="text-xs text-purple-600 mt-1">
                            <span>(*) {{$message}}</span>
                        </div>
                    @enderror
                   
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Pago final</span>
                    <input wire:model="final_payment" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" disabled readonly placeholder="$0.00" value="{{$final_payment}}"/>
                    @error('final_payment')
                        <div class="text-xs text-purple-600 mt-1">
                            <span>(*) {{$message}}</span>
                        </div>
                    @enderror
                </label>
                                    
            </div>
        
        </div>
        
        @if($summary)
            <a class="flex items-center justify-between p-4 mt-4 text-md font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" ref="https://github.com/estevanmaito/windmill-dashboard">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <span>{{$message}}</span>
                </div>
            </a>
        @endif
       

        <footer class="flex items-center justify-between dark:bg-gray-800 mt-4">
            <a href="{{route('dashboard')}}" class="w-full px-5 py-3 mr-1 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancelar
            </a>

            <button wire:click="save" class="w-full px-5 py-3 ml-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Guardar
            </button>
        </footer>

    </div>
</div>

@push('scripts')
@endpush



