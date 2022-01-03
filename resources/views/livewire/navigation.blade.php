<div class="bg-white dark:bg-gray-800">
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{route('dashboard')}}">
                CobradorApp
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('dashboard') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a href="{{route('dashboard')}}" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <div class="px-6 my-2">
                <a href="{{route('registrar.prestamo')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Registrar Préstamo
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>
            </div>
            <ul class="text-gray-700">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('clientes.index') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a href="{{route('clientes.index')}}" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-4">Clientes</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('prestamos.index') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a href="{{route('prestamos.index')}}" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                        <i class="fas fa-money-bill-alt w-5"></i>
                        <span class="ml-4">Préstamos</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('historial.index') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a href="{{route('historial.index')}}" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">
                        <i class="fas fa-history w-5"></i>
                        <span class="ml-4">Historial</span>
                    </a>
                </li>
           
            
            </ul>
        </div>
    </aside>

    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Windmill
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('dashboard') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{route('dashboard')}}">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="px-6 my-2">
                <a href="{{route('registrar.prestamo')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Registrar Préstamo
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>
            </div>

            <ul class="text-gray-700">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('clientes.index') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{route('clientes.index')}}">
                        <i class="fas fa-clone w-5"></i>
                        <span class="ml-4">Clientes</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('historial.index') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{route('historial.index')}}">
                        <i class="fas fa-money-bill-alt w-5"></i>
                        <span class="ml-4">Historial</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 {{ request()->routeIs('prestamos.index') ? 'bg-purple-600':'bg-white' }} rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                    <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{route('prestamos.index')}}">
                        <i class="fas fa-money-bill-alt w-5"></i>
                        <span class="ml-4">Préstamos</span>
                    </a>
                </li>
            
            </ul>

        </div>
    </aside>
</div>