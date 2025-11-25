<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

file_put_contents('users_list.txt', "Bootstrapped.\n");
$users = App\Models\User::all();
file_put_contents('users_list.txt', "Users count: " . $users->count() . "\n", FILE_APPEND);
foreach ($users as $user) {
    file_put_contents('users_list.txt', "ID: {$user->id} | Name: {$user->name} | Email: {$user->email} | Role: {$user->role}\n", FILE_APPEND);
}
