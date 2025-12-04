<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "=== CHECKING DATABASE TABLES ===\n";

$tables = ['users', 'sessions', 'cache', 'jobs'];

foreach ($tables as $table) {
    $exists = Schema::hasTable($table);
    echo "$table: " . ($exists ? "✓ EXISTS" : "✗ MISSING") . "\n";
}

echo "\n=== USERS TABLE DATA ===\n";
$users = DB::table('users')->get();
echo "Total users: " . $users->count() . "\n";
foreach ($users as $user) {
    echo "- ID: {$user->id}, Email: {$user->email}, Name: {$user->name}\n";
}

echo "\n=== SESSIONS TABLE CHECK ===\n";
$sessions_count = DB::table('sessions')->count();
echo "Active sessions: $sessions_count\n";
