<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        @stack('styles')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @stack('scripts')
    </head>
    <body>
        <body class="font-sans antialiased">
    
            <div class="min-h-screen bg-gray-100">
                <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                        
                        <!-- Search input -->
                        <div class="flex justify-start flex-1 lg:mr-32">
                            <div class="text-lg text-indigo-600 font-bold">
                                <a href="{{route('welcome')}}">CobradorApp</a> 
                            </div>
                        </div>
                        <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Theme toggler -->
                            <li class="flex">
                                <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                                    <template x-if="!dark">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                        </svg>
                                    </template>
                                    <template x-if="dark">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </template>
                                </button>
                            </li>
                            <!-- Profile menu -->
                            @auth()
                            <li class="relative">
                                <div class="mx-2 relative block">
                                    <a href="{{route('dashboard')}}" class="w-full px-2 sm:px-4 py-1 text-white rounded-md  bg-indigo-600 hover:bg-indigo-700 focus:outline-none text-sm sm:w-auto sm:mx-1 focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-40">Dashboard</a>
                                </div>
                            @else
                            <li class="relative">
                                <div class="mx-2 relative block">
                                    <a href="{{route('login')}}" class="w-full px-2 sm:px-4 py-1 text-white rounded-md  bg-indigo-600 hover:bg-indigo-700 focus:outline-none text-sm sm:w-auto sm:mx-1 focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-40">Iniciar sesión</a>
                                    <a href="{{route('register')}}" class="ml-2 w-full px-2 sm:px-4 py-1 text-white rounded-md  bg-indigo-600 hover:bg-indigo-700 focus:outline-none text-sm sm:w-auto sm:mx-1 focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-40">Registrarse</a>
                                </div>
                            </li>
                            @endauth
                            
                        </ul>
                    </div>
                </header>
    
                <!-- Page Content -->
                <main class="p-2 sm:p-4 md:p-8">
                    {{ $slot }}
                </main>
            </div>
    
            @stack('modals')
    
            @livewireScripts
        </body>
    </body>
</html>
