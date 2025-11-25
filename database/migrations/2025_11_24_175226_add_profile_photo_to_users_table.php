<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Agregamos la columna después del email, puede ser nula
        $table->string('profile_photo_path', 2048)->nullable()->after('email');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Si revertimos, borramos la columna
        $table->dropColumn('profile_photo_path');
    });
}
};
