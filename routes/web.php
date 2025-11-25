<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $workstations = App\Models\Workstation::latest()->take(5)->get();
    return view('dashboard', compact('workstations'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/workstations', [App\Http\Controllers\WorkstationController::class, 'index'])->name('workstations.index');
    Route::get('/workstations/create', [App\Http\Controllers\WorkstationController::class, 'create'])->name('workstations.create');
    Route::get('/workstations/{id}/edit', [App\Http\Controllers\WorkstationController::class, 'edit'])->name('workstations.edit');
});

require __DIR__.'/auth.php';
