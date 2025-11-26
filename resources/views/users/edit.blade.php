<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Usuario: {{ $user->name }} ✏️
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Correo
                                Electrónico</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nueva Contraseña
                                (Opcional)</label>
                            <input type="password" name="password"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1"
                                placeholder="Dejar en blanco para mantener la actual">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Rol</label>
                            <select name="role"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1">
                                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Cliente
                                </option>
                                <option value="technician" {{ $user->role == 'technician' ? 'selected' : '' }}>Técnico
                                </option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador
                                </option>
                            </select>
                            @error('role')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-4">
                            <a href="{{ route('users.index') }}"
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancelar</a>
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Eliminar
                                Usuario</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
