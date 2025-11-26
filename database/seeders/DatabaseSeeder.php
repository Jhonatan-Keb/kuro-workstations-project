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
            'password' => 'KuroHoshiko12!', // Contraseña simple para pruebas
            'role' => 'admin',
            'is_active' => true,
        ]);

        // 2. DATOS RANDOM DE RELLENO 🎲
        // (Opcional) Si quieres workstations de prueba para el admin
        Workstation::factory(3)->create([
            'user_id' => 1, // Asignadas al Admin
        ]);
        
        echo "🌱 Base de datos sembrada con éxito: Solo Admin.\n";
        
        echo "🌱 Base de datos sembrada con éxito: Admin, Staff y Datos de prueba.\n";
    }
}