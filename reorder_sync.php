<?php

use App\Models\Project;
use App\Models\Experiment;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting Extended Reorder and Image Visibility Fix...\n";

// Reset all to high order first
Project::where('id', '>', 0)->update(['order' => 10]);

// 1. Project Reordering and Specific Covers
$projectOrder = [
    'Kick of love' => [
        'order' => 1,
        'main_image' => 'img/Proyectos/Kick of love/257f6d157064525.63727af4e5ea8.webp'
    ],
    'congreso regional' => [
        'order' => 2,
        'main_image' => 'img/Proyectos/congreso regional/ea10b8157013733.6371c94a99bf8.webp'
    ],
    'hugo fernandez' => [
        'order' => 3,
        'main_image' => 'img/Proyectos/hugo fernandez/fa11a2157070675.63728e1e9c502.webp'
    ],
    'Maria jose' => [
        'order' => 4,
        'main_image' => 'img/Proyectos/Maria jose/523a8a192037623.65d5792374bee.webp'
    ],
    'Porras' => [
        'order' => 5,
        'main_image' => 'img/Proyectos/Porras/7aa66a157162257.6373fbdd4b7c7.webp'
    ],
    'Soneto' => [
        'order' => 6,
        'main_image' => 'img/Proyectos/Soneto/0688da192037295.65d5774840d36.webp'
    ],
    'Universum' => [
        'order' => 7,
        'main_image' => 'img/Proyectos/Universum/55746d157005911.6371911d644e4.webp'
    ],
    'concepto villas navideñas' => [
        'order' => 8,
        'main_image' => 'img/Proyectos/concepto villas navideñas/5acbbe157011279.6371ba8cf31be.webp'
    ]
];

foreach ($projectOrder as $idKey => $data) {
    // Locate project by partial match in image_path (which contains the directory name)
    $project = Project::where('image_path', 'like', "%$idKey%")->first();
    
    if ($project) {
        echo "Updating Project: {$project->name} (Order: {$data['order']})\n";
        
        $project->order = $data['order'];
        // Set the SPECIFIC image as the main path to fix card visibility
        $project->image_path = $data['main_image'];
        
        // Ensure main image is first in the gallery
        $images = $project->images ?: [];
        $mainIdx = array_search($data['main_image'], $images);
        if ($mainIdx !== false) {
            unset($images[$mainIdx]);
        }
        array_unshift($images, $data['main_image']);
        $project->images = array_values($images);
        
        $project->save();
    } else {
        echo "WARNING: Project not found for id_key: $idKey\n";
    }
}

// 2. Re-verify Experiments "Interesting" Images
$experimentAssets = [
    'Experimentacion de texturas calculadas matematicamente' => 'img/Experimentos/Experimentacion de texturas calculadas matematicamente/b707c8192128443.65d6abc8dcd5a.webp',
    'Experimentación de accesorios 2D para 3D' => 'img/Experimentos/Experimentación de accesorios 2D para 3D/adef9b192129515.65d6b336b3334.webp',
    'juego de mallas' => 'img/Experimentos/juego de mallas/blen.mp4',
    'pulpo pbr' => 'img/Experimentos/pulpo pbr/0940bd192129183.65d6b0f261274.webp'
];

foreach ($experimentAssets as $idKey => $mainAsset) {
    $experiment = Experiment::where('image_path', 'like', "%$idKey%")->first();
    if ($experiment) {
        echo "Syncing Experiment Asset: {$experiment->name}\n";
        $experiment->image_path = $mainAsset;
        
        $images = $experiment->images ?: [];
        $mainIdx = array_search($mainAsset, $images);
        if ($mainIdx !== false) {
            unset($images[$mainIdx]);
        }
        array_unshift($images, $mainAsset);
        $experiment->images = array_values($images);
        
        $experiment->save();
    }
}

echo "Extended Reorder and Visibility Fix Complete.\n";
