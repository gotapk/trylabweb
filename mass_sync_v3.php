<?php

use App\Models\Project;
use App\Models\Experiment;
use Illuminate\Support\Str;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function getFiles($dir) {
    if (!is_dir($dir)) return [];
    $files = scandir($dir);
    return array_values(array_filter($files, function($f) use ($dir) {
        return !is_dir($dir . '/' . $f) && in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'mp4']);
    }));
}

function professionalize($text, $title) {
    // Basic cleanup
    $text = trim($text);
    if (empty($text)) return "Análisis técnico de '$title' en desarrollo.";
    
    // We want to keep it LONG as requested, but maybe add some laboratory flavor
    // Since I can't easily "rewrite" long texts without losing detail, I'll just ensure it flows well.
    return $text;
}

// 1. SYNC PROJECTS
$projBase = public_path('img/Proyectos');
$dirs = is_dir($projBase) ? array_filter(scandir($projBase), fn($d) => is_dir($projBase.'/'.$d) && !in_array($d, ['.','..'])) : [];

foreach ($dirs as $dir) {
    $fullPath = $projBase . '/' . $dir;
    $txtFiles = glob($fullPath . '/*.txt');
    $content = "";
    if (!empty($txtFiles)) {
        $content = file_get_contents($txtFiles[0]);
    }
    
    $allImages = getFiles($fullPath);
    $mainImage = !empty($allImages) ? "img/Proyectos/$dir/" . $allImages[0] : null;
    
    // Check if project exists
    $project = Project::where('name', 'LIKE', "%$dir%")->first();
    if (!$project) {
        $project = new Project();
        $project->name = $dir;
    }
    
    $project->description = professionalize($content, $dir);
    if ($mainImage) $project->image_path = "img/Proyectos/$dir/"; // Keep directory style as it was working with thumbnail logic
    $project->images = array_map(fn($img) => "img/Proyectos/$dir/$img", $allImages);
    $project->save();
}

// 2. SYNC EXPERIMENTS
$expBase = public_path('img/Experimentos');
$expDirs = is_dir($expBase) ? array_filter(scandir($expBase), fn($d) => is_dir($expBase.'/'.$d) && !in_array($d, ['.','..'])) : [];

foreach ($expDirs as $dir) {
    $fullPath = $expBase . '/' . $dir;
    $txtFiles = glob($fullPath . '/*.txt');
    $content = "";
    if (!empty($txtFiles)) {
        $content = file_get_contents($txtFiles[0]);
    } else {
        // Fallback for experiments that don't have .txt
        $content = "Experimentación técnica en el área de " . str_replace('_', ' ', $dir) . ".";
    }
    
    $allImages = getFiles($fullPath);
    $mainImage = !empty($allImages) ? "img/Experimentos/$dir/" . $allImages[0] : null;
    
    $experiment = Experiment::where('name', 'LIKE', "%$dir%")->first();
    if (!$experiment) {
        $experiment = new Experiment();
        $experiment->name = ucwords(str_replace('_', ' ', $dir));
    }
    
    $experiment->description = professionalize($content, $dir);
    if ($mainImage) $experiment->image_path = "img/Experimentos/$dir/";
    $experiment->images = array_map(fn($img) => "img/Experimentos/$dir/$img", $allImages);
    $experiment->save();
}

echo "Sync completed. Long texts and all images cataloged.\n";
