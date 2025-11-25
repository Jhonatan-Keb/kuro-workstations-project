<aside
    class="w-64 bg-white dark:bg-gray-800 border-r border-gray-100 dark:border-gray-700 hidden md:flex md:flex-col h-screen transition-all duration-300">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b border-gray-100 dark:border-gray-700">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 overflow-y-auto py-4">
        <nav class="space-y-1 px-2">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="w-full justify-start">
                <span class="mr-3">📊</span> {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')" class="w-full justify-start">
                <span class="mr-3">🔐</span> {{ __('Roles') }}
            </x-nav-link>

            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="w-full justify-start">
                <span class="mr-3">👥</span> {{ __('Usuarios') }}
            </x-nav-link>

            <x-nav-link :href="route('workstations.index')" :active="request()->routeIs('workstations.*')" class="w-full justify-start">
                <span class="mr-3">🖥️</span> {{ __('Workstations') }}
            </x-nav-link>
        </nav>
    </div>

    <!-- Footer / Version (Optional) -->
    <div class="p-4 border-t border-gray-100 dark:border-gray-700">
        <p class="text-xs text-center text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} Kuro WS
        </p>
    </div>
</aside>
