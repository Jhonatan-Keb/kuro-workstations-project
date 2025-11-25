<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles del Sistema') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Admin Role -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-500">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold">Administrador</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Acceso total al sistema. Puede gestionar usuarios, roles, configuraciones y ver todas las
                            órdenes.
                        </p>
                    </div>
                </div>

                <!-- Technician Role -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-blue-500">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold">Técnico</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Encargado del ensamblaje y actualización de estados de las workstations. Acceso limitado a
                            órdenes asignadas.
                        </p>
                    </div>
                </div>

                <!-- Customer Role -->
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-green-500">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold">Cliente</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            Usuario estándar. Puede crear nuevas configuraciones, ver el estado de sus pedidos y editar
                            su perfil.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
