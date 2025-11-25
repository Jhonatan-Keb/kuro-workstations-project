<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Simulate login
$user = User::first();
if (!$user) {
    echo "No users found.\n";
    exit;
}

Auth::login($user, true);
echo "Logged in user: " . Auth::id() . "\n";
echo "Remember token: " . $user->fresh()->remember_token . "\n";

// Check session
Session::put('test_key', 'test_value');
Session::save();

echo "Session ID: " . Session::getId() . "\n";
echo "Session Data: " . json_encode(Session::all()) . "\n";

// Verify DB session
$dbSession = \DB::table('sessions')->where('id', Session::getId())->first();
if ($dbSession) {
    echo "Session found in DB.\n";
} else {
    echo "Session NOT found in DB.\n";
}
