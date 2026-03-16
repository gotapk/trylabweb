<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Lookgeo',
                'description' => 'Plataforma de venta y renta de casas que innova en el despliegue de información basado en meta datos de Google Maps e INEGI.',
                'category' => 'Branding, UI/UX, Redes Sociales',
                'image_path' => 'img/Proyectos/Lookgeo/',
            ],
            [
                'name' => 'María José Living',
                'description' => 'Proyecto de branding para revitalizar la zona centro de Guadalajara, equilibrando lo familiar y profesional.',
                'category' => 'Branding',
                'image_path' => 'img/Proyectos/Maria jose/',
            ],
            [
                'name' => 'Universum',
                'description' => 'Proyecto relacionado con Universum (según archivos en public/img/Proyectos/Universum).',
                'category' => 'Diseño',
                'image_path' => 'img/Proyectos/Universum/',
            ],
            [
                'name' => 'Concepto Villas Navideñas',
                'description' => 'Desarrollo de concepto para villas navideñas.',
                'category' => 'Concept Art',
                'image_path' => 'img/Proyectos/concepto villas navideñas/',
            ],
            [
                'name' => 'Hugo Fernandez',
                'description' => 'Proyecto "Hugo Fernandez la Leyenda".',
                'category' => 'Branding',
                'image_path' => 'img/Proyectos/hugo fernandez/',
            ],
            [
                'name' => 'Kick of love',
                'description' => 'Proyecto Kick of love.',
                'category' => 'Diseño',
                'image_path' => 'img/Proyectos/Kick of love/',
            ],
            [
                'name' => 'Edgardo Porras',
                'description' => 'Proyecto Edgardo Porras.',
                'category' => 'Branding',
                'image_path' => 'img/Proyectos/Porras/',
            ],
            [
                'name' => 'Soneto',
                'description' => 'Proyecto Soneto.',
                'category' => 'Diseño',
                'image_path' => 'img/Proyectos/Soneto/',
            ],
            [
                'name' => 'Congreso Regional',
                'description' => 'Diseño para Congreso de Médicos.',
                'category' => 'Event Branding',
                'image_path' => 'img/Proyectos/congreso regional/',
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project::create($project);
        }
    }
}
