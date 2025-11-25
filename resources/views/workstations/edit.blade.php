<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar: {{ $workstation->name }} 🔧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="#" class="space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre del
                                Build</label>
                            <input type="text" value="{{ $workstation->name }}"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">CPU</label>
                                <input type="text" value="{{ $workstation->cpu }}"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">RAM</label>
                                <input type="number" value="{{ $workstation->ram }}"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                            </div>
                        </div>

                        <div
                            class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg border border-yellow-200 dark:border-yellow-800">
                            <label class="block font-medium text-sm text-yellow-800 dark:text-yellow-300">Estado del
                                Pedido (Simulación)</label>
                            <select
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                                <option {{ $workstation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option {{ $workstation->status == 'building' ? 'selected' : '' }}>Building</option>
                                <option {{ $workstation->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-4">
                            <a href="{{ route('workstations.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancelar</a>
                            <button type="button"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                                Guardar Cambios (Demo)
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
