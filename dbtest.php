<?php
$start = microtime(true);
require 'vendor/autoload.php';
echo "autoload: " . (microtime(true) - $start) . "s\n";

$app = require 'bootstrap/app.php';
echo "bootstrap/app: " . (microtime(true) - $start) . "s\n";

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
echo "kernel bootstrap: " . (microtime(true) - $start) . "s\n";

$db = app('db');
$users = $db->select('SELECT COUNT(*) AS c FROM users');
echo "db query users count: " . $users[0]->c . " (" . (microtime(true) - $start) . "s)\n";

$user = App\Models\User::factory()->make();
echo "factory make ok (" . (microtime(true) - $start) . "s)\n";
