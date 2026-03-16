<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $translations = [
            'ES' => [
                'lab-title' => 'Our Lab - Información del Sistema',
                'gallery-title' => 'Galería - Visor de Imágenes',
                'browser-title' => 'Navegador - Proyectos',
                'contact-title' => 'Contacto - Try Lab',
                'experiments-title' => 'Experimentos - Lab Blog',
                'proyectos' => 'Proyectos',
                'gallery' => 'Gallery',
                'contacto' => 'Contacto',
                'experimentos' => 'Experimentos',
                'mute' => 'Silenciar',
                'unmute' => 'Activar Sonido',
                'change-lang' => 'Cambiar Idioma',
                'lab-btn' => 'ES',
                'lab-s1-title' => 'La Filosofía de la Ruptura',
                'lab-s1-p1' => 'En un mercado saturado de redundancias y soluciones predecibles, lo "seguro" se ha convertido en el mayor riesgo operativo. En Try Lab, entendemos la innovación no como un evento fortuito, sino como una disciplina de ruptura programada.',
                'lab-quote' => '"Somos el lugar donde las ideas convencionales vienen a morir para renacer como referentes de mercado."',
                'browser-hero-h2' => 'Nuestros Proyectos',
                'browser-hero-p' => 'Explora nuestro trabajo más reciente en diseño, desarrollo y arte digital.',
                'contact-hero-h2' => '¿Tienes un proyecto en mente?',
                'contact-hero-p' => 'Déjanos tus datos y nos comunicaremos contigo lo antes posible.',
                'contact-success' => '✅ ¡Mensaje enviado con éxito! Nos pondremos en contacto pronto.',
                'exp-hero-h2' => 'Laboratorio de Ideas',
                'exp-hero-p' => 'Investigaciones, experimentos UI/UX y cosas que hacemos por puro gusto.',
            ],
            'EN' => [
                'lab-title' => 'Our Lab - System Information',
                'gallery-title' => 'Gallery - Image Viewer',
                'browser-title' => 'Browser - Projects',
                'contact-title' => 'Contact - Try Lab',
                'experiments-title' => 'Experiments - Lab Blog',
                'proyectos' => 'Projects',
                'gallery' => 'Gallery',
                'contacto' => 'Contact',
                'experimentos' => 'Experiments',
                'mute' => 'Mute',
                'unmute' => 'Unmute',
                'change-lang' => 'Change Language',
                'lab-btn' => 'EN',
                'lab-s1-title' => 'The Philosophy of Rupture',
                'lab-s1-p1' => 'In a market saturated with redundancies and predictable solutions, "safe" has become the greatest operational risk. At Try Lab, we understand innovation not as a random event, but as a discipline of programmed rupture.',
                'lab-quote' => '"We are the place where conventional ideas come to die to be reborn as market benchmarks."',
                'browser-hero-h2' => 'Our Projects',
                'browser-hero-p' => 'Explore our latest work in design, development, and digital art.',
                'contact-hero-h2' => 'Have a project in mind?',
                'contact-hero-p' => 'Leave us your details and we will get back to you as soon as possible.',
                'contact-success' => '✅ Message sent successfully! We will contact you soon.',
                'exp-hero-h2' => 'Idea Laboratory',
                'exp-hero-p' => 'Research, UI/UX experiments, and things we do for pure pleasure.',
            ]
        ];

        foreach ($translations as $locale => $keys) {
            foreach ($keys as $key => $value) {
                \App\Models\Translation::updateOrCreate(
                    ['key' => $key, 'locale' => strtolower($locale)],
                    ['value' => $value]
                );
            }
        }
    }
}
