<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Workstation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. USUARIO ADMIN (Tú) 👑
        User::factory()->create([
            'name' => 'Hoshiko Kuro',
            'email' => 'hoshiko@dendro.com',
            'password' => Hash::make('KuroHoshiko12!'), // Contraseña simple para pruebas
            'role' => 'admin',
            'is_active' => true,
        ]);

        // 2. USUARIO STAFF (Técnico) 🛠️
        User::factory()->create([
            'name' => 'Técnico Artix',
            'email' => 'staff@kuro.com',
            'password' => Hash::make('password'),
            'role' => 'technician',
            'is_active' => true,
        ]);

        // 3. USUARIO CLIENTE (Ejemplo) 💼
        $client = User::factory()->create([
            'name' => 'Cliente Feliz',
            'email' => 'client@kuro.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'is_active' => true,
        ]);

        // Crear 3 órdenes para este cliente específico
        Workstation::factory(3)->create([
            'user_id' => $client->id,
        ]);

        // 4. DATOS RANDOM DE RELLENO 🎲
        // Crea 10 usuarios extra, cada uno con 1 o 2 workstations
        User::factory(10)->create(['role' => 'customer'])->each(function ($user) {
            Workstation::factory(rand(1, 2))->create([
                'user_id' => $user->id,
            ]);
        });
        
        echo "🌱 Base de datos sembrada con éxito: Admin, Staff y Datos de prueba.\n";
    }
}