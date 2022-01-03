<x-main-layout>
    <section class="flex justify-center items-center py-36">
        <div class="container mx-auto ">
            <h1 class="text-5xl font-bold text-center mx-auto text-indigo-400"><span class="text-2xl font-semibold text-gray-700">Bienvenido a</span> <br>  CobradorApp</h1>

            <div class="max-w-2xl mx-auto mt-4 rounded shadow-lg bg-gray-50">
                <form action="{{route('buscar.resultado')}}"  method="POST" class="py-6" autocomplete="off">
                    <div class="flex flex-row items-center justify-center">
                        
                        @csrf
                        
                        <input type="text" name="code" id="code" placeholder="Ingresa el código del préstamo..." class="px-4 py-2 focus:outline-none focus:ring-1 focus:ring-indigo-300 w-3/4 rounded-l" />
                        <button type="submit" class="px-4 py-2 text-l font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-r">Consultar</button>
                        
                    </div>
                    @error('code')
                        <span class="text-red-600 px-2 md:px-9 py-2 text-sm" role="alert">
                            <span>(*) {{$message}}</span>
                        </span>
                    @enderror
                </form>
            </div>
        </div>
    </section>

</x-main-layout>