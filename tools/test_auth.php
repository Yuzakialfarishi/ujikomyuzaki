<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Auth;

$email = 'admin@gmail.com';
$password = '12345';

try {
    $result = Auth::attempt(['email' => $email, 'password' => $password]);
    echo $result ? "AUTH_OK\n" : "AUTH_FAIL\n";
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
