<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiments = [
            [
                'name' => 'Texturas Calculadas Matemáticamente',
                'description' => 'Experimentación de texturas generadas mediante algoritmos matemáticos.',
                'category' => 'Generative Art',
                'image_path' => 'img/Experimentos/Experimentacion de texturas calculadas matematicamente/',
            ],
            [
                'name' => 'Accesorios 2D para 3D',
                'description' => 'Experimentación de integración de elementos 2D en entornos 3D.',
                'category' => 'Hybrid Media',
                'image_path' => 'img/Experimentos/Experimentacin de accesorios 2D para 3D/',
            ],
            [
                'name' => 'Juego de Mallas',
                'description' => 'Estudio de mallas y topología en modelos 3D.',
                'category' => '3D Modeling',
                'image_path' => 'img/Experimentos/juego de mallas/',
            ],
            [
                'name' => 'Pulpo PBR',
                'description' => 'Pruebas de materiales PBR (Physically Based Rendering) en un modelo de pulpo.',
                'category' => 'PBR / Texturing',
                'image_path' => 'img/Experimentos/pulpo pbr/',
            ],
        ];

        foreach ($experiments as $experiment) {
            \App\Models\Experiment::updateOrCreate(
                ['name' => $experiment['name']],
                $experiment
            );
        }
    }
}
