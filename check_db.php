<?php
use App\Models\Project;
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$projects = Project::all();
foreach ($projects as $p) {
    echo "ID: " . $p->id . " | Name: " . $p->name . "\n";
    echo "Desc Length: " . strlen($p->description) . "\n";
    echo "Images: " . json_encode($p->images) . "\n";
    echo "-------------------\n";
}
