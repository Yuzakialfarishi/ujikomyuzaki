<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Reset password untuk user admin ke 123456
$u = User::find(1);
if ($u) {
    $u->password = bcrypt('123456');
    $u->save();
    echo "✓ Password berhasil direset menjadi: 123456\n";
    echo "Password hash baru: {$u->password}\n\n";
    
    // Test auth dengan password baru
    echo "Testing Auth::attempt dengan password 123456...\n";
    $result = Auth::attempt(['email' => 'admin@gmail.com', 'password' => '123456']);
    echo "Result: " . ($result ? "SUCCESS ✓" : "FAILED ✗") . "\n";
    
    if ($result) {
        Auth::logout();
    }
} else {
    echo "User tidak ditemukan\n";
}
