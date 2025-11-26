<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nueva Workstation') }} 🛠️
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('workstations.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre del
                                Build</label>
                            <input type="text" name="name"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"
                                placeholder="Ej: Dev Beast v1" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Procesador
                                    (CPU)</label>
                                <select name="cpu"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    @foreach ($cpus as $cpu)
                                        <option value="{{ $cpu }}" {{ old('cpu') == $cpu ? 'selected' : '' }}>
                                            {{ $cpu }}</option>
                                    @endforeach
                                </select>
                                @error('cpu')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Memoria RAM
                                    (GB)</label>
                                <select name="ram"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    @foreach ($rams as $ram)
                                        <option value="{{ $ram }}" {{ old('ram') == $ram ? 'selected' : '' }}>
                                            {{ $ram }}</option>
                                    @endforeach
                                </select>
                                @error('ram')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tarjeta
                                    Gráfica (GPU)</label>
                                <select name="gpu"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    @foreach ($gpus as $gpu)
                                        <option value="{{ $gpu }}"
                                            {{ old('gpu') == $gpu ? 'selected' : '' }}>{{ $gpu }}</option>
                                    @endforeach
                                </select>
                                @error('gpu')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sistema
                                    Operativo</label>
                                <select name="os"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    <option value="Artix Linux">Artix Linux</option>
                                    <option value="Arch Linux">Arch Linux</option>
                                    <option value="Fedora Workstation">Fedora Workstation</option>
                                    <option value="Ubuntu">Ubuntu</option>
                                </select>
                                @error('os')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-4">
                            <a href="{{ route('workstations.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancelar</a>
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                                Crear Orden
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
