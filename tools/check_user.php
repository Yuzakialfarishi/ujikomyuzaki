<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$u = User::where('email','admin@gmail.com')->first();
if ($u) {
    echo "FOUND\n";
    echo "id: {$u->id}\n";
    echo "name: {$u->name}\n";
    echo "email: {$u->email}\n";
    echo "password_hash: {$u->password}\n";
} else {
    echo "NOTFOUND\n";
}
