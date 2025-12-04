<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Reset password untuk user admin
$u = User::find(1);
if ($u) {
    $u->password = bcrypt('12345');
    $u->save();
    echo "✓ Password reset berhasil untuk user: {$u->email}\n";
    echo "Password hash baru: {$u->password}\n\n";
    
    // Test auth dengan password baru
    echo "Testing Auth::attempt...\n";
    $result = Auth::attempt(['email' => 'admin@gmail.com', 'password' => '12345']);
    echo "Result: " . ($result ? "SUCCESS" : "FAILED") . "\n";
    
    if ($result) {
        Auth::logout();
    }
} else {
    echo "User tidak ditemukan\n";
}
