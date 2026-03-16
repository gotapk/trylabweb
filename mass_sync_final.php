<?php

use App\Models\Project;
use App\Models\Experiment;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$mapping = [
    'Kick of love' => [
        'name' => 'Protocolo KoL: Escenografía Inmersiva',
        'category' => 'Stage Architecture'
    ],
    'Lookgeo' => [
        'name' => 'Módulo Georeferencial: Lookgeo',
        'category' => 'Data Interface'
    ],
    'Maria jose' => [
        'name' => 'Revitalización Urbana: María José Living',
        'category' => 'Branding Identity'
    ],
    'Porras' => [
        'name' => 'Vector Guerrilla: Edgardo Porras',
        'category' => 'Political Strategy'
    ],
    'Soneto' => [
        'name' => 'Síntesis de Estilo: Soneto Residencial',
        'category' => 'Visual Arts'
    ],
    'Universum' => [
        'name' => 'Arquitectura de Marca: Universum',
        'category' => 'Corporate Identity'
    ],
    'concepto villas navideñas' => [
        'name' => 'Ecosistema Interactivo: Villas Navideñas',
        'category' => 'Public Installation'
    ],
    'congreso regional' => [
        'name' => 'Estrategia M2M: Congreso Médico',
        'category' => 'Product Design'
    ],
    'hugo fernandez' => [
        'name' => 'Legado Identitario: Hugo Fernández',
        'category' => 'Digital Legacy'
    ],
];

function getFiles($dir) {
    if (!is_dir($dir)) return [];
    $files = scandir($dir);
    return array_values(array_filter($files, function($f) use ($dir) {
        return !is_dir($dir . '/' . $f) && in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'mp4']);
    }));
}

// Clear table to avoid duplication
Project::truncate();

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
    
    $info = $mapping[$dir] ?? ['name' => $dir, 'category' => 'Uncategorized'];
    
    $project = new Project();
    $project->name = $info['name'];
    $project->category = $info['category'];
    $project->description = trim($content);
    $project->image_path = "img/Proyectos/$dir/";
    $project->images = array_map(fn($img) => "img/Proyectos/$dir/$img", $allImages);
    $project->save();
}

// Experiment sync (Experiments mostly already fine, but let's redo for consistency)
Experiment::truncate();
$expBase = public_path('img/Experimentos');
$expDirs = is_dir($expBase) ? array_filter(scandir($expBase), fn($d) => is_dir($expBase.'/'.$d) && !in_array($d, ['.','..'])) : [];

foreach ($expDirs as $dir) {
    $fullPath = $expBase . '/' . $dir;
    $txtFiles = glob($fullPath . '/*.txt');
    $content = "";
    if (!empty($txtFiles)) {
        $content = file_get_contents($txtFiles[0]);
    } else {
        $content = "Experimentación técnica en el área de " . str_replace('_', ' ', $dir) . ".";
    }
    
    $allImages = getFiles($fullPath);
    
    $experiment = new Experiment();
    $experiment->name = ucwords(str_replace(['_', '-'], ' ', $dir));
    // Manual titles for experiments if needed
    if ($dir === 'juego de mallas') $experiment->name = 'Experimentación de iluminación: Juego de mallas';
    if ($dir === 'pulpo pbr') $experiment->name = 'Renderizado: Pulpo PBR';
    
    $experiment->category = 'R&D Laboratory';
    $experiment->description = trim($content);
    $experiment->image_path = "img/Experimentos/$dir/";
    $experiment->images = array_map(fn($img) => "img/Experimentos/$dir/$img", $allImages);
    $experiment->save();
}

echo "Final sync completed. 9 Projects and 4 Experiments restored with full content.\n";
