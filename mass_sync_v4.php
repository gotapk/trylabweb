<?php

use App\Models\Project;
use App\Models\Experiment;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$projectData = [
    'Kick of love' => [
        'name' => 'Protocolo KoL: Escenografía Inmersiva',
        'category' => 'Stage Architecture',
        'desc' => "[SUBJECT]: MODULADOR ESCÉNICO INMERSIVO / KICK OF LOVE\n[STATUS]: VALIDADO EN CAMPO\n\n[PREMISA TÉCNICA]: Desarrollo de un núcleo escénico disruptivo enfocado en la subversión de la experiencia visual tradicional mediante una arquitectura reactiva.\n\n[METODOLOGÍA]: Se ejecutó una fase de investigación de 30 ciclos pre-festival enfocada en sistemas de iluminación de gran escala y ergonomía sensorial. El despliegue incluyó matrices LED moduladas con sistemas de control miniaturizados y una arquitectura reactiva a frecuencias vibratorias, logrando una sincronización háptica-visual inédita que trasciende el ritmo melódico.\n\n[INFRAESTRUCTURA]: Implementación de cañones neumáticos de partículas, propulsión térmica controlada (lanzallamas) y pantallas LED de ultra-densidad. El sistema central fue procesado mediante controladores industriales 100% de manufactura local.\n\n[SINOPSIS]: La integración de estos vectores permitió la viralización orgánica del protocolo KoL, captando el compromiso sensorial de más de 8,000 unidades biológicas durante 48 horas de operación continua."
    ],
    'Lookgeo' => [
        'name' => 'Módulo Georeferencial: Lookgeo',
        'category' => 'Data Interface',
        'desc' => "[SUBJECT]: SISTEMA DE VISUALIZACIÓN META-DATA INMOBILIARIA\n[STATUS]: FASE DE DESPLIEGUE\n\n[OBJETIVO]: Optimizar la interpretación de datos geoespaciales para la optimización de transacciones habitacionales.\n\n[METODOLOGÍA]: Desarrollo de una interfaz de usuario avanzada que amalgama metadatos de Google Maps API y sensores de datos demográficos nacionales (INEGI). El núcleo del sistema permite el despliegue de información estratificada por capas de valor, accesibilidad y proyecciones de plusvalía.\n\n[REPORTE TÉCNICO]: Implementación de micro-servicios de consulta en tiempo real y arquitectura de frontend responsiva con bajo índice de latencia arquitectónica.\n\n[SINOPSIS]: Lookgeo redefine la búsqueda de 'El lugar de tus sueños' transformando el deseo en métricas precisas y visualización de datos de alto impacto."
    ],
    'Maria jose' => [
        'name' => 'Revitalización Urbana: María José Living',
        'category' => 'Branding Identity',
        'desc' => "[SUBJECT]: IDENTIDAD ESTRUCTURAL PARA DESARROLLOS VERTICALES\n[STATUS]: ACTIVO\n\n[CONCEPTUALIZACIÓN]: Diseño de un ecosistema visual para María José Living, enfocado en la convergencia de la sofisticación habitacional y la solidez técnica.\n\n[DESARROLLO]: Creación de un lenguaje gráfico de precisión que comunica los valores de revitalización urbana y calidad de vida. La paleta cromática y tipográfica fue seleccionada mediante protocolos de psicología del color aplicados a la percepción de espacios seguros y modernos.\n\n[SINOPSIS]: El resultado es una marca que no solo identifica un edificio, sino que encapsula una metodología de vida urbana optimizada."
    ],
    'Porras' => [
        'name' => 'Vector Guerrilla: Edgardo Porras',
        'category' => 'Political Strategy',
        'desc' => "[SUBJECT]: PROTOCOLO DE COMUNICACIÓN POLÍTICA DISRUPTIVA\n[STATUS]: CONFIDENCIAL / VALIDADO\n\n[OBJETIVO]: Despliegue de una campaña de comunicación táctica basada en el concepto de 'Vector Guerrilla'.\n\n[METODOLOGÍA]: Diseño de activos visuales de alto contraste y narrativa de impacto directo para la fragmentación de la opinión pública convencional. El sistema de identidad fue diseñado para una rápida propagación en medios digitales bajo condiciones de alta volatilidad informativa.\n\n[MÉTRICAS]: El protocolo permitió una penetración del 45% por encima del benchmark en distritos electorales críticos, utilizando una estética industrial rigurosa.\n\n[SINOPSIS]: Edgardo Porras representa la aplicación de diseño agresivo para la conquista de espacios de poder mediante la claridad visual y la fuerza discursiva."
    ],
    'Soneto' => [
        'name' => 'Síntesis de Estilo: Soneto Residencial',
        'category' => 'Visual Arts',
        'desc' => "[SUBJECT]: COMPOSICIÓN ESTÉTICA PARA ESPACIOS DE ALTA GAMA\n[STATUS]: COMPLETADO\n\n[MÉTODO]: Aplicación de principios de simetría técnica y equilibrio formal para la visualización de Soneto Residencial.\n\n[DESARROLLO]: Se implementó una guía de estilo que actúa como una síntesis entre el minimalismo estructural y la calidez ambiental. Cada activo visual fue renderizado bajo estándares de realismo fotométrico para validar la habitabilidad del proyecto antes de su construcción física.\n\n[SINOPSIS]: Soneto es la evidencia de que la estética es una función de la ingeniería visual precisa."
    ],
    'Universum' => [
        'name' => 'Arquitectura de Marca: Universum',
        'category' => 'Corporate Identity',
        'desc' => "[SUBJECT]: REESTRUCTURACIÓN DE ADN CORPORATIVO\n[STATUS]: IMPLEMENTADO\n\n[OBJETIVO]: Traducir la solidez corporativa en una arquitectura de marca escalable y coherente.\n\n[PROCESO]: Diagnóstico profundo de los vectores de valor de Universum. Se diseñó un sistema de identidad modular capaz de adaptarse a diversas unidades de negocio sin pérdida de cohesión técnica.\n\n[SINOPSIS]: Universum proyecta ahora una imagen de liderazgo tecnológico respaldada por una infraestructura visual robusta y profesional."
    ],
    'concepto villas navideñas' => [
        'name' => 'Ecosistema Interactivo: Villas Navideñas',
        'category' => 'Public Installation',
        'desc' => "[SUBJECT]: SISTEMA INTERACTIVO DE ILUMINACIÓN URBANA\n[STATUS]: ARCHIVADO / REPLICABLE\n\n[PREMISA]: Optimización de instalaciones públicas masivas mediante diseño modular de bajo costo y alto impacto.\n\n[MÉTODO]: Se desarrolló un sistema que combina hardware preexistente con nuevos protocolos de iluminación LED controlados centralmente. El objetivo fue simplificar el concepto narrativo para garantizar la asimilación por parte de audiencias demográficamente diversas.\n\n[RETO TÉCNICO]: Implementación de sistemas de control escalables para una rápida instalación en diversos entornos urbanos.\n\n[SINOPSIS]: Las Villas Navideñas operaron como un experimento social de cohesión comunitaria a través del diseño de luz."
    ],
    'congreso regional' => [
        'name' => 'Estrategia M2M: Congreso Médico',
        'category' => 'Product Design',
        'desc' => "[SUBJECT]: INFRAESTRUCTURA VISUAL PARA EVENTOS DE CIENCIA\n[STATUS]: COMPLETADO\n\n[OBJETIVO]: Crear un ecosistema informativo para el Congreso Médico que facilite la transferencia de conocimiento técnico.\n\n[METODOLOGÍA]: Diseño de señalética, activos digitales y espacios físicos bajo un protocolo de claridad absoluta. Se aplicaron jerarquías visuales estrictas para la organización de datos científicos complejos.\n\n[SINOPSIS]: La estrategia M2M (Medical to Medical) garantizó un flujo de información eficiente, validando la importancia del diseño en la comunicación científica de alto nivel."
    ],
    'hugo fernandez' => [
        'name' => 'Legado Identitario: Hugo Fernández',
        'category' => 'Digital Legacy',
        'desc' => "[SUBJECT]: CONSTRUCCIÓN DE MEMORIA VISUAL DIGITAL\n[STATUS]: PRESERVADO\n\n[MISIÓN]: Digitalización y sistematización de la trayectoria profesional de Hugo Fernández.\n\n[DESARROLLO]: Aplicación de protocolos de archivística visual para la creación de un portafolio retrospectivo que comunica una evolución técnica constante. Se priorizó la legibilidad y el impacto cronológico de los activos.\n\n[SINOPSIS]: El legado de Hugo Fernández sirve como un caso de estudio en la permanencia de la identidad profesional a través del diseño estructurado."
    ],
];

$experimentData = [
    'Experimentacion de texturas calculadas matematicamente' => [
        'name' => 'Cómputo Generativo: Texturas Matemáticas',
        'desc' => "[SUBJECT]: SÍNTESIS DE SUPERFICIES MEDIANTE ALGORITMOS FRACTALES\n[LAB-LOG]: EXP-302\n\n[OBJETIVO]: Validación de algoritmos generativos para la creación de texturas orgánicas no repetitivas.\n\n[MÉTODO]: Implementación de ruidos de Perlin y funciones sinusoidales complejas para despliegue en tiempo real.\n\n[HALLAZGOS]: Se logró una optimización del 40% en el consumo de GPU manteniendo una fidelidad visual ultra-alta."
    ],
    'Experimentación de accesorios 2D para 3D' => [
        'name' => 'Hibridación Estética: Accesorios 2D/3D',
        'desc' => "[SUBJECT]: INTEGRACIÓN DE VECTORES PLANOS EN ESPACIOS VOLUMÉTRICOS\n[LAB-LOG]: EXP-109\n\n[PREMISA]: Subversión de la profundidad tradicional mediante la inserción de elementos 2D dentro de entornos de renderizado 3D.\n\n[TÉCNICA]: Uso de 'billboarding' avanzado y corrección de perspectiva dinámica.\n\n[SINOPSIS]: El experimento demuestra la viabilidad de una estética híbrida para aplicaciones de realidad aumentada y storytelling visual."
    ],
    'juego de mallas' => [
        'name' => 'Análisis Lumínico: Juego de Mallas',
        'desc' => "[SUBJECT]: INTERFERENCIA LUMÍNICA EN ESTRUCTURAS GEOMÉTRICAS\n[LAB-LOG]: EXP-504\n\n[OBJETIVO]: Estudiar el comportamiento de la luz a través de múltiples capas de mallas industriales con diversas opacidades.\n\n[MÉTODO]: Despliegue de fuentes de luz RGB con control DMX sobre estructuras de rejilla superpuestas.\n\n[REPORTE]: Se detectaron patrones de interferencia constructiva que generan una sensación de volumen vacío altamente inmersiva."
    ],
    'pulpo pbr' => [
        'name' => 'Simulación Bio-Inorgánica: Pulpo PBR',
        'desc' => "[SUBJECT]: RENDERIZADO BASADO EN LA FÍSICA DE MATERIALES ORGÁNICOS\n[LAB-LOG]: EXP-221\n\n[OBJETIVO]: Replicar la respuesta lumínica de membranas biológicas bajo un flujo de trabajo PBR (Physically Based Rendering).\n\n[MÉTODO]: Esculpido digital de alta fidelidad con texturizado procedimental de capas sub-superficiales (SSS).\n\n[RESULTADO]: Validación de realismo fotométrico en estructuras complejas no-lineales."
    ],
];

function getFiles($dir) {
    if (!is_dir($dir)) return [];
    $files = scandir($dir);
    return array_values(array_filter($files, function($f) use ($dir) {
        return !is_dir($dir . '/' . $f) && in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'mp4']);
    }));
}

// EXECUTE SYNC
Project::truncate();
$projBase = public_path('img/Proyectos');
foreach ($projectData as $dirName => $info) {
    $fullPath = $projBase . '/' . $dirName;
    $allImages = getFiles($fullPath);
    
    $project = new Project();
    $project->name = $info['name'];
    $project->category = $info['category'];
    $project->description = $info['desc'];
    $project->image_path = "img/Proyectos/$dirName/";
    $project->images = array_map(fn($img) => "img/Proyectos/$dirName/$img", $allImages);
    $project->save();
}

Experiment::truncate();
$expBase = public_path('img/Experimentos');
foreach ($experimentData as $dirName => $info) {
    $fullPath = $expBase . '/' . $dirName;
    $allImages = getFiles($fullPath);
    
    $experiment = new Experiment();
    $experiment->name = $info['name'];
    $experiment->category = 'R&D Laboratory';
    $experiment->description = $info['desc'];
    $experiment->image_path = "img/Experimentos/$dirName/";
    $experiment->images = array_map(fn($img) => "img/Experimentos/$dirName/$img", $allImages);
    $experiment->save();
}

echo "Laboratory Restoration Complete. 13 High-Impact Technical Reports Synchronized.\n";
