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

                    <form action="{{ route('workstations.update', $workstation->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre del
                                Build</label>
                            <input type="text" name="name" value="{{ old('name', $workstation->name) }}"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">CPU</label>
                                <select name="cpu"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    @foreach ($cpus as $cpu)
                                        <option value="{{ $cpu }}"
                                            {{ old('cpu', $workstation->cpu) == $cpu ? 'selected' : '' }}>
                                            {{ $cpu }}</option>
                                    @endforeach
                                </select>
                                @error('cpu')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">RAM</label>
                                <select name="ram"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    @foreach ($rams as $ram)
                                        <option value="{{ $ram }}"
                                            {{ old('ram', $workstation->ram) == $ram ? 'selected' : '' }}>
                                            {{ $ram }}</option>
                                    @endforeach
                                </select>
                                @error('ram')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">GPU</label>
                                <select name="gpu"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    @foreach ($gpus as $gpu)
                                        <option value="{{ $gpu }}"
                                            {{ old('gpu', $workstation->gpu) == $gpu ? 'selected' : '' }}>
                                            {{ $gpu }}</option>
                                    @endforeach
                                </select>
                                @error('gpu')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">OS</label>
                                <select name="os"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                    <option value="Artix Linux"
                                        {{ $workstation->os == 'Artix Linux' ? 'selected' : '' }}>Artix Linux</option>
                                    <option value="Arch Linux"
                                        {{ $workstation->os == 'Arch Linux' ? 'selected' : '' }}>Arch Linux</option>
                                    <option value="Fedora Workstation"
                                        {{ $workstation->os == 'Fedora Workstation' ? 'selected' : '' }}>Fedora
                                        Workstation</option>
                                    <option value="Ubuntu" {{ $workstation->os == 'Ubuntu' ? 'selected' : '' }}>Ubuntu
                                    </option>
                                </select>
                                @error('os')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'technician')
                            <div
                                class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg border border-yellow-200 dark:border-yellow-800">
                                <label class="block font-medium text-sm text-yellow-800 dark:text-yellow-300">Estado del
                                    Pedido</label>
                                <select name="status"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                                    <option value="pending" {{ $workstation->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="building"
                                        {{ $workstation->status == 'building' ? 'selected' : '' }}>Building</option>
                                    <option value="shipped" {{ $workstation->status == 'shipped' ? 'selected' : '' }}>
                                        Shipped</option>
                                    <option value="cancelled"
                                        {{ $workstation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        @else
                            <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded">
                                <span class="text-gray-500 dark:text-gray-300">Estado actual:</span>
                                <span
                                    class="font-bold uppercase text-gray-800 dark:text-gray-200">{{ $workstation->status }}</span>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4 gap-4">
                            <a href="{{ route('workstations.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancelar</a>
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <form id="delete-form-{{ $workstation->id }}"
                            action="{{ route('workstations.destroy', $workstation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $workstation->id }})"
                                class="text-red-500 hover:text-red-700 font-medium">
                                Eliminar Orden
                            </button>
                        </form>
                    </div>

                    <script>
                        function confirmDelete(id) {
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: "¡No podrás revertir esto!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#ef4444',
                                cancelButtonColor: '#3b82f6',
                                confirmButtonText: 'Sí, eliminarlo',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('delete-form-' + id).submit();
                                }
                            })
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
