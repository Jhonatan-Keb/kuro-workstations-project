<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('workstations.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out">
                {{ __('Nueva Configuración') }} 🚀
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">¡Hola, {{ Auth::user()->name }}! 👋</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Bienvenido a tu centro de mando Kuro Workstations.
                        Aquí tienes un resumen de tu actividad.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Main Content (Stats & Table) -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Stat Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Card 1 -->
                        <div
                            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                            <div class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase">Total Ordenes
                            </div>
                            <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-gray-100">
                                {{ $workstations->count() }}</div>
                        </div>
                        <!-- Card 2 -->
                        <div
                            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                            <div class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase">Gasto Total
                            </div>
                            <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-gray-100">$4,500 USD</div>
                        </div>
                        <!-- Card 3 -->
                        <div
                            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-purple-500">
                            <div class="text-gray-500 dark:text-gray-400 text-sm font-medium uppercase">Estado Sistema
                            </div>
                            <div class="mt-2 flex items-center text-3xl font-bold text-gray-900 dark:text-gray-100">
                                <span class="h-3 w-3 bg-green-500 rounded-full mr-2"></span> Operativo
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity Table -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Actividad Reciente</h4>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Nombre</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Estado</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse ($workstations as $pc)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $pc->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $pc->status === 'shipped'
                                                        ? 'bg-green-100 text-green-800'
                                                        : ($pc->status === 'building'
                                                            ? 'bg-yellow-100 text-yellow-800'
                                                            : 'bg-gray-100 text-gray-800') }}">
                                                    {{ ucfirst($pc->status) }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                                {{ $pc->created_at->diffForHumans() }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"
                                                class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                                No hay actividad reciente.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Side Panel -->
                <div class="space-y-6">
                    <!-- Promo Banner -->
                    <div
                        class="bg-gradient-to-br from-indigo-500 to-purple-600 overflow-hidden shadow-sm sm:rounded-lg text-white p-6 relative">
                        <div class="relative z-10">
                            <h4 class="text-lg font-bold">🚀 Novedades Artix</h4>
                            <p class="mt-2 text-sm text-indigo-100">Descubre la potencia de la nueva distro optimizada
                                para workstations.</p>
                            <a href="#"
                                class="mt-4 inline-block bg-white text-indigo-600 font-semibold py-2 px-4 rounded text-sm hover:bg-indigo-50 transition">
                                Ver Detalles
                            </a>
                        </div>
                        <!-- Decorative Circle -->
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-white opacity-10 rounded-full">
                        </div>
                    </div>

                    <!-- Quick Links (Filler) -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Enlaces Rápidos</h4>
                        <ul class="space-y-2">
                            <li>
                                <a href="#"
                                    class="flex items-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                    <span class="mr-2">📚</span> Documentación
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                    <span class="mr-2">🔧</span> Soporte Técnico
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                    <span class="mr-2">💬</span> Comunidad Discord
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
