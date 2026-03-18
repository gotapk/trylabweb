<?php

use App\Models\Project;
use App\Models\Experiment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting Full Laboratory Restoration...\n";

// 1. INJECT ADMIN USER
$adminEmail = 'tryadmin@trylab.studio';
$adminPass = 'Zmka6679.';

$user = User::updateOrCreate(
    ['email' => $adminEmail],
    [
        'name' => 'Try Lab Admin',
        'password' => Hash::make($adminPass),
    ]
);
echo "Admin user ($adminEmail) injected/updated successfully.\n";

// 2. DATA DEFINITION (Multilingual & Professional)
$projectsData = [
    [
        'id_key' => 'Kick of love',
        'order' => 1,
        'main_image' => 'img/Proyectos/Kick of love/257f6d157064525.63727af4e5ea8.webp',
        'es' => [
            'name' => 'Protocolo KoL: Escenografía Inmersiva',
            'category' => 'Arquitectura de Escenarios',
            'desc' => "[SUBJECT]: MODULADOR ESCÉNICO INMERSIVO / KICK OF LOVE\n[STATUS]: VALIDADO EN CAMPO\n\n[OBJETIVO]: Conceptualizar y diseñar un núcleo escénico disruptivo capaz de personificar la identidad del festival KoL y optimizar la experiencia sensorial mediante una arquitectura reactiva.\n\n[INVESTIGACIÓN]: Fase de 30 ciclos pre-festival enfocada en la composición tradicional vs. innovación háptica. Se identificaron tres vectores críticos: interacción artista-público, personificación identitaria y armonización estructural.\n\n[DESARROLLO]: \n- SECCIÓN ALTA: Diseño de elevación compensatoria con sistemas LED sincronizados a las vibraciones estructurales (no melódicas), subvirtiendo la respuesta sensorial esperada.\n- PISO ESCÉNICO: Integración del logotipo central con expansión de envergadura mediante 'nubes' y alas miniaturizadas. Implementación de controladores de manufactura 100% mexicana.\n\n[INFRAESTRUCTURA]: Matrices LED de alta densidad, cañones térmicos (lanzallamas) y sistemas de control programables miniaturizados.\n\n[RESULTADO]: El ecosistema modular captó el compromiso sensorial de más de 8,000 unidades biológicas, logrando un impacto viral orgánico masivo y superando en métricas de atención a festivales internacionales concurrentes."
        ],
        'en' => [
            'name' => 'KoL Protocole. Immersive scenography.',
            'category' => 'Stage Architecture',
            'desc' => "[SUBJECT]: IMMERSIVE SCENIC MODULATOR / KICK OF LOVE\n[STATUS]: FIELD VALIDATED\n\n[OBJECTIVE]: To conceptualize and design a disruptive scenic core capable of personifying the KoL festival identity and optimizing the sensory experience through reactive architecture.\n\n[RESEARCH]: A 30-day pre-festival phase focused on traditional composition vs. haptic innovation. Three critical vectors were identified: artist-audience interaction, identity personification, and structural harmonization.\n\n[DEVELOPMENT]:\n- UPPER SECTION: Compensatory elevation design with LED systems synchronized to structural vibrations (non-melodic), subverting the expected sensory response.\n- SCENIC FLOOR: Integration of the central logo with expanded wingspan through 'clouds' and miniaturized wings. Implementation of 100% Mexican-manufactured controllers.\n\n[INFRASTRUCTURE]: High-density LED matrices, thermal cannons (flamethrowers), and miniaturized programmable control systems.\n\n[RESULT]: The modular ecosystem captured the sensory engagement of over 8,000 biological units, achieving massive organic viral impact and surpassing concurrent international festivals in attention metrics."
        ]
    ],
    [
        'id_key' => 'congreso regional',
        'order' => 2,
        'main_image' => 'img/Proyectos/congreso regional/ea10b8157013733.6371c94a99bf8.webp',
        'es' => [
            'name' => 'VIII Congreso de Médicos: Estrategia Oyster Fork',
            'category' => 'Estrategia de Comunicación / M2M',
            'desc' => "[SUBJECT]: INFRAESTRUCTURA VISUAL Y PROFESIONALIZACIÓN CIENTÍFICA\n[STATUS]: IMPACTO PROFITABLE 500%\n\n[RETO]: Rescatar el 50 Aniversario del Colegio de Médicos de Irapuato (CMIAC) bajo condiciones de pandemia global y recesión.\n\n[ESTRATEGIA OYSTER FORK]:\n1. PROFESIONALIZACIÓN: Reestructuración de la identidad de marca del CMIAC.\n2. CANAL M2M: Creación de una plataforma digital robusta para la transmisión de conocimiento médico.\n3. MONETIZACIÓN: Desarrollo de paquetes publicitarios tácticos para Big Pharma (Pfizer, Bayer, GSK), cumpliendo rigurosamente con las regulaciones nacionales.\n\n[MISIÓN CUMPLIDA]: Se rompieron récords internos de asistencia, alcanzando la rentabilidad operativa desde la fase de investigación y sentando las bases para la expansión nacional del congreso."
        ],
        'en' => [
            'name' => '8th Medical Conference: Oyster Fork Strategy',
            'category' => 'Communication Strategy / M2M',
            'desc' => "[SUBJECT]: VISUAL INFRASTRUCTURE AND SCIENTIFIC PROFESSIONALIZATION\n[STATUS]: IMPACTO PROFITABLE 500%\n\n[CHALLENGE]: To rescue the 50th Anniversary of the Irapuato Medical College (CMIAC) under global pandemic and recession conditions.\n\n[OYSTER FORK STRATEGY]:\n1. PROFESSIONALIZATION: Reestructuración de la identidad de marca del CMIAC.\n2. CANAL M2M: Creación de una plataforma digital robusta para la transmisión de conocimiento médico.\n3. MONETIZACIÓN: Desarrollo de paquetes publicitarios tácticos para Big Pharma (Pfizer, Bayer, GSK), cumpliendo rigurosamente con las regulaciones nacionales.\n\n[MISIÓN CUMPLIDA]: Se rompieron récords internos de asistencia, alcanzando la rentabilidad operativa desde la fase de investigación y sentando las bases para la expansión nacional del congreso."
        ]
    ],
    [
        'id_key' => 'hugo fernandez',
        'order' => 3,
        'main_image' => 'img/Proyectos/hugo fernandez/fa11a2157070675.63728e1e9c502.webp',
        'es' => [
            'name' => 'Hugo Fernández: La Leyenda Continúa',
            'category' => 'Branding Estratégico / Legacy',
            'desc' => "[SUBJECT]: CONSTRUCCIÓN DE MEMORIA VISUAL Y LEGADO MUSICAL\n[STATUS]: GIRA NACIONAL SOLD OUT\n\n[OBJETIVO]: Relanzar la carrera de Hugo Fernández después de 40 años de trayectoria, capitalizando su carácter dionisiaco y carisma tropical.\n\n[METODOLOGÍA]:\n1. IDENTIDAD SEMIÓTICA: Rediseño del logo con simbología cumbia-cristiana (Corazón en llamas + Corona), optimizando legibilidad.\n2. POSICIONAMIENTO DISRUPTIVO: Enfoque en demografía joven (17-35) mediante estética 'Eco-friendly Vintage'.\n3. DOCUMENTALÍSTICA: Estrategia de micro-cápsulas diarias para generar una conexión de intimidad total entre el artista y el usuario final.\n\n[RESULTADO]: Incremento masivo de seguidores y 7 fechas nacionales agotadas en tiempo récord, validando la fuerza de la identidad sobre el legado."
        ],
        'en' => [
            'name' => 'Hugo Fernandez: The Legend Lives On.',
            'category' => 'Strategic Branding / Legacy',
            'desc' => "[SUBJECT]: VISUAL MEMORY CONSTRUCTION AND MUSICAL LEGACY\n[STATUS]: NATIONAL TOUR SOLD OUT\n\n[OBJECTIVE]: To relaunch Hugo Fernández's career after a 40-year trajectory, capitalizando su carácter dionisiaco y carisma tropical.\n\n[METODOLOGÍA]:\n1. IDENTIDAD SEMIÓTICA: Rediseño del logo con simbología cumbia-cristiana (Corazón en llamas + Corona), optimizando legibilidad.\n2. POSICIONAMIENTO DISRUPTIVO: Enfoque en demografía joven (17-35) mediante estética 'Eco-friendly Vintage'.\n3. DOCUMENTALÍSTICA: Estrategia de micro-cápsulas diarias para generar una conexión de intimidad total entre el artista y el usuario final.\n\n[RESULTADO]: Incremento masivo de seguidores y 7 fechas nacionales agotadas en tiempo récord, validando la fuerza de la identidad sobre el legado."
        ]
    ],
    [
        'id_key' => 'Maria jose',
        'order' => 4,
        'main_image' => 'img/Proyectos/Maria jose/523a8a192037623.65d5792374bee.webp',
        'es' => [
            'name' => 'María José Living: Revitalización Estructural',
            'category' => 'Identidad de Marca',
            'desc' => "[SUBJECT]: IDENTIDAD ESTRATÉGICA PARA DESARROLLO VERTICAL\n[STATUS]: IMPLEMENTADO\n\n[OBJETIVO]: Crear una marca capaz de revitalizar el núcleo urbano de Guadalajara (Zona Centro) mediante la generación de empatía comunitaria.\n\n[CONCEPTO]: Fusión de lo familiar y lo profesional. Diseño enfocado en el respeto a la herencia arquitectónica de la región, traduciéndola en un estilo de vida moderno y acogedor.\n\n[METODOLOGÍA]: Desarrollo de un lenguaje visual que proyecta seguridad, humanidad y prosperidad, transformando espacios emblemáticos en entornos habitacionales de alta fidelidad.\n\n[SINOPSIS]: María José Living no es solo un nombre; es un protocolo de recuperación urbana diseñado para devolverle la vitalidad a la ciudad."
        ],
        'en' => [
            'name' => 'Maria Jose Living: Structural revitalization.',
            'category' => 'Branding Identity',
            'desc' => "[SUBJECT]: ESTRATEGIA DE COMUNICACIÓN / M2M\n[STATUS]: IMPLEMENTADO\n\n[OBJETIVO]: Crear una marca capaz de revitalizar el núcleo urbano de Guadalajara (Zona Centro) mediante la generación de empatía comunitaria.\n\n[CONCEPTO]: Fusión de lo familiar y lo profesional. Diseño enfocado en el respeto a la herencia arquitectónica de la región, traduciéndola en un estilo de vida moderno y acogedor.\n\n[METODOLOGÍA]: Desarrollo de un lenguaje visual que proyecta seguridad, humanidad y prosperidad, transformando espacios emblemáticos en entornos habitacionales de alta fidelidad.\n\n[SINOPSIS]: María José Living no es solo un nombre; es un protocolo de recuperación urbana diseñado para devolverle la vitalidad a la ciudad."
        ]
    ],
    [
        'id_key' => 'Porras',
        'order' => 5,
        'main_image' => 'img/Proyectos/Porras/7aa66a157162257.6373fbdd4b7c7.webp',
        'es' => [
            'name' => 'Estrategia Táctica: Edgardo Porras',
            'category' => 'Comunicación Política',
            'desc' => "[SUBJECT]: PROTOCOLO DE MARKETING DE GUERRILLA POLÍTICA\n[STATUS]: VALIDACIÓN ELECTORAL FINALIZADA\n\n[CÓNTEXTO]: Asesoría global para campaña en Tlacotepec de Benito Juárez, región de alta complejidad socio-económica y tradiciones arraigadas.\n\n[METODOLOGÍA ESTRATÉGICA]:\n1. ANÁLISIS POBLACIONAL: Cotejo de planes de desarrollo municipal con incidencias delictivas para segmentar deficiencias críticas y priorizar la seguridad ciudadana.\n2. VECTOR GUERRILLA: Despliegue de publicidad no-centralizada, stickers disruptivos, intervenciones artísticas gráficas y uso táctico de TikTok para la humanización del candidato.\n3. RESPUESTA RÁPIDA: Sofocación visual de inquietudes sociales mediante videos documentales en locaciones emblemáticas (10k+ reproducciones).\n\n[RESULTADO]: Se logró una transformación de ideas en propuestas mediante una campaña sin miedo y de avance rápido, optimizando los gastos de campaña gracias al compromiso orgánico de la ciudadanía."
        ],
        'en' => [
            'name' => 'Tactical strategy: Edgardo Porras',
            'category' => 'Political Communication',
            'desc' => "[SUBJECT]: PROTOCOLO DE MARKETING DE GUERRILLA POLÍTICA\n[STATUS]: VALIDACIÓN ELECTORAL FINALIZADA\n\n[CÓNTEXTO]: Asesoría global para campaña en Tlacotepec de Benito Juárez, región de alta complejidad socio-económica y tradiciones arraigadas.\n\n[METODOLOGÍA ESTRATÉGICA]:\n1. ANÁLISIS POBLACIONAL: Cotejo de planes de desarrollo municipal con incidencias delictivas para segmentar deficiencias críticas y priorizar la seguridad ciudadana.\n2. VECTOR GUERRILLA: Despliegue de publicidad no-centralizada, stickers disruptivos, intervenciones artísticas gráficas y uso táctico de TikTok para la humanización del candidato.\n3. RESPUESTA RÁPIDA: Sofocación visual de inquietudes sociales mediante videos documentales en locaciones emblemáticas (10k+ reproducciones).\n\n[RESULTADO]: Se logró una transformación de ideas en propuestas mediante una campaña sin miedo y de avance rápido, optimizando los gastos de campaña gracias al compromiso orgánico de la ciudadanía."
        ]
    ],
    [
        'id_key' => 'Soneto',
        'order' => 6,
        'main_image' => 'img/Proyectos/Soneto/0688da192037295.65d5774840d36.webp',
        'es' => [
            'name' => 'Soneto Residencial: Síntesis Estética',
            'category' => 'Identidad Visual',
            'desc' => "[SUBJECT]: BRANDING VIBRANTE PARA DESARROLLO HABITACIONAL\n[STATUS]: ACTIVO\n\n[OBJETIVO]: Capturar la esencia del estilo de vida joven y dinámico de la colonia Americana en Guadalajara.\n\n[METODOLOGÍA]: Diseño inspirado en la energía cromática y estructural de la comunidad local. Se aplicó un enfoque fresco y moderno enfocado en un sector demográfico con altos índices de vitalidad.\n\n[SINOPSIS]: Soneto Residencial se posiciona como una marca que trasciende el ladrillo, convirtiéndose en el símbolo de un estilo de vida activo y lleno de energía."
        ],
        'en' => [
            'name' => 'Residential Sonnet: An Aesthetic Synthesis',
            'category' => 'Visual Identity',
            'desc' => "[SUBJECT]: BRANDING VIBRANTE PARA DESARROLLO HABITACIONAL\n[STATUS]: ACTIVO\n\n[OBJETIVO]: Capturar la esencia del estilo de vida joven y dinámico de la colonia Americana en Guadalajara.\n\n[METODOLOGÍA]: Diseño inspirado en la energía cromática y estructural de la comunidad local. Se aplicó un enfoque fresco y moderno enfocado en un sector demográfico con altos índices de vitalidad.\n\n[SINOPSIS]: Soneto Residencial se posiciona como una marca que trasciende el ladrillo, convirtiéndose en el símbolo de un estilo de vida activo y lleno de energía."
        ]
    ],
    [
        'id_key' => 'Universum',
        'order' => 7,
        'main_image' => 'img/Proyectos/Universum/55746d157005911.6371911d644e4.webp',
        'es' => [
            'name' => 'Universum Inmobiliaria: Re-Branding Estructural',
            'category' => 'Arquitectura de Marca',
            'desc' => "[SUBJECT]: REESTRUCTURACIÓN DE IDENTIDAD EMPRESARIAL\n[STATUS]: VALIDADO POR EL SAT / IMPI\n\n[MISIÓN]: Ejecutar un proceso de Rebranding profundo tras la obsolescencia de identidad genérica y falta de registros legales.\n\n[METODOLOGÍA DE CAMPO]: Análisis de denominadores comunes en la competencia. Se detectó saturación de iconos literales y logotipos megalomaníacos.\n\n[OBJETIVOS TÉCNICOS]:\n1. DIFERENCIACIÓN: Diseño eficiente y legible.\n2. CERCANÍA: Humanización del servicio.\n3. EXTRADIEGÉTRICA: Esquema cromático basado en Amarillo 803 U para asociación inconsciente con el sector inmobiliario público.\n\n[RESULTADO]: Creación de un sistema adaptable para medios impresos y digitales, con iconos que simbolizan conexión, calidez y solidez técnica (Puente + Abrazo + Estructura)."
        ],
        'en' => [
            'name' => 'Universum Real Estate: Structural Rebranding',
            'category' => 'Brand Architecture',
            'desc' => "[SUBJECT]: REESTRUCTURACIÓN DE IDENTIDAD EMPRESARIAL\n[STATUS]: VALIDADO POR EL SAT / IMPI\n\n[MISIÓN]: Ejecutar un proceso de Rebranding profundo tras la obsolescencia de identidad genérica y falta de registros legales.\n\n[METODOLOGÍA DE CAMPO]: Análisis de denominadores comunes en la competencia. Se detectó saturación de iconos literales y logotipos megalomaníacos.\n\n[OBJETIVOS TÉCNICOS]:\n1. DIFERENCIACIÓN: Diseño eficiente y legible.\n2. CERCANÍA: Humanización del servicio.\n3. EXTRADIEGÉTRICA: Esquema cromático basado en Amarillo 803 U para asociación inconsciente con el sector inmobiliario público.\n\n[RESULTADO]: Creación de un sistema adaptable para medios impresos y digitales, con iconos que simbolizan conexión, calidez y solidez técnica (Puente + Abrazo + Estructura)."
        ]
    ],
    [
        'id_key' => 'concepto villas navideñas',
        'order' => 8,
        'main_image' => 'img/Proyectos/concepto villas navideñas/5acbbe157011279.6371ba8cf31be.webp',
        'es' => [
            'name' => 'Villas Iluminadas: Ecosistema Tlacotepec',
            'category' => 'Instalación Interactiva / Branding',
            'desc' => "[SUBJECT]: SISTEMA INTERACTIVO DE ILUMINACIÓN Y TURISMO\n[STATUS]: VALIDACIÓN DE IMPACTO ECONÓMICO FINALIZADA\n\n[PREMISA]: Impulsar el turismo nacional mediante una instalación de alta tecnología capaz de competir con proyectos tradicionales del sector.\n\n[ARQUITECTURA DEL SISTEMA]:\n- TIPO 1 (BASE): Módulos decorativos de iluminación estática.\n- TIPO 2 (SMART): Sistemas controlados por microprocesadores con sensores de proximidad.\n- TIPO 3 (INTERACTIVO): Estructuras de inmersión total con materiales termocromáticos y simulaciones celestes del invierno.\n\n[RESULTADO TÉCNICO]: Implementación de un proyecto de alta fidelidad tecnológica a un costo menor gracias a la integración vertical de procesos. Se estimó un incremento del 25% en el flujo turístico y hasta un 55% en la actividad económica local."
        ],
        'en' => [
            'name' => 'Illuminated Villas: Tlacotepec Ecosystem',
            'category' => 'Interactive Installation / Branding',
            'desc' => "[SUBJECT]: SISTEMA INTERACTIVO DE ILUMINACIÓN Y TURISMO\n[STATUS]: VALIDACIÓN DE IMPACTO ECONÓMICO FINALIZADA\n\n[PREMISA]: Impulsar el turismo nacional mediante una instalación de alta tecnología capaz de competir con proyectos tradicionales del sector.\n\n[ARQUITECTURA DEL SISTEMA]:\n- TIPO 1 (BASE): Módulos decorativos de iluminación estática.\n- TIPO 2 (SMART): Sistemas controlados por microprocesadores con sensores de proximidad.\n- TIPO 3 (INTERACTIVO): Estructuras de inmersión total con materiales termocromáticos y simulaciones celestes del invierno.\n\n[RESULTADO TÉCNICO]: Implementación de un proyecto de alta fidelidad tecnológica a un costo menor gracias a la integración vertical de procesos. Se estimó un incremento del 25% en el flujo turístico y hasta un 55% en la actividad económica local."
        ]
    ],
    [
        'id_key' => 'Lookgeo',
        'order' => 9,
        'main_image' => 'img/Proyectos/Lookgeo/thumbnail.jpg', // Lookgeo was 9th in final local sync
        'es' => [
            'name' => 'Análisis Geoespacial: Lookgeo',
            'category' => 'Interfaz de Datos / UI-UX',
            'desc' => "[SUBJECT]: SISTEMA DE VISUALIZACIÓN METADATA INMOBILIARIA\n[STATUS]: FASE DE DESPLIEGUE PUBLICITARIO\n\n[PREMISA]: Desarrollo de un concepto gráfico disruptivo para Lookgeo, plataforma de compra-venta de activos inmobiliarios con enfoque en innovación de metadatos.\n\n[METODOLOGÍA]: Integración de capas informativas provenientes de Google Maps API e indicadores demográficos del INEGI. Se acuñó el vector comunicativo 'El lugar de tus sueños' para humanizar los algoritmos de búsqueda.\n\n[DESARROLLO UI/UX]: Creación de una arquitectura de visualización que prioriza el despliegue de información estratificada, optimizando la toma de decisiones mediante planes de monetización escalables.\n\n[SINOPSIS]: Lookgeo transforma la frialdad de los datos en una experiencia de usuario mágica, logrando una identidad funcional y una estrategia de marketing de alto impacto."
        ],
        'en' => [
            'name' => 'Geospatial Analysis: Lookgeo',
            'category' => 'Data Interface / UI-UX',
            'desc' => "[SUBJECT]: SISTEMA DE VISUALIZACIÓN METADATA INMOBILIARIA\n[STATUS]: FASE DE DESPLIEGUE PUBLICITARIO\n\n[PREMISA]: Desarrollo de un concepto gráfico disruptivo para Lookgeo, plataforma de compra-venta de activos inmobiliarios con enfoque en innovación de metadatos.\n\n[METODOLOGÍA]: Integración de capas informativas provenientes de Google Maps API e indicadores demográficos del INEGI. Se acuñó el vector comunicativo 'El lugar de tus sueños' para humanizar los algoritmos de búsqueda.\n\n[DESARROLLO UI/UX]: Creación de una arquitectura de visualización que prioriza el despliegue de información estratificada, optimizando la toma de decisiones mediante planes de monetización escalables.\n\n[SINOPSIS]: Lookgeo transforma la frialdad de los datos en una experiencia de usuario mágica, logrando una identidad funcional y una estrategia de marketing de alto impacto."
        ]
    ],
];

$experimentsData = [
    [
        'id_key' => 'Experimentacion de texturas calculadas matematicamente',
        'main_image' => 'img/Experimentos/Experimentacion de texturas calculadas matematicamente/b707c8192128443.65d6abc8dcd5a.webp',
        'es' => [
            'name' => 'Cómputo Generativo: Texturas Fractales',
            'desc' => "[SUBJECT]: SÍNTESIS DE SUPERFICIES MEDIANTE ALGORITMOS MATEMÁTICOS\n[LAB-LOG]: EXP-302\n\n[MÉTODO]: Aplicación de ruidos de Perlin y funciones sinusoidales para la generación de texturas orgánicas no-repetitivas.\n[HALLAZGOS]: Optimización del 40% en procesos de renderizado en tiempo real."
        ],
        'en' => [
            'name' => 'Generative Computation: Fractal Textures',
            'desc' => "[SUBJECT]: SURFACE SYNTHESIS VIA MATHEMATICAL ALGORITHMS\n[LAB-LOG]: EXP-302\n\n[METHOD]: Application of Perlin noise and sinusoidal functions for generating non-repetitive organic textures.\n[FINDINGS]: 40% optimization in real-time rendering processes."
        ]
    ],
    [
        'id_key' => 'Experimentación de accesorios 2D para 3D',
        'main_image' => 'img/Experimentos/Experimentación de accesorios 2D para 3D/adef9b192129515.65d6b336b3334.webp',
        'es' => [
            'name' => 'Hibridación Estética: Arte 2D/3D',
            'desc' => "[SUBJECT]: INTEGRACIÓN DE VECTORES PLANOS EN ENTORNOS VOLUMÉTRICOS\n[LAB-LOG]: EXP-109\n\n[TÉCNICA]: Subversión de la profundidad tradicional mediante 'billboarding' avanzado y corrección de perspectiva dinámica."
        ],
        'en' => [
            'name' => 'Aesthetic Hybridization: 2D/3D Art',
            'desc' => "[SUBJECT]: INTEGRATION OF FLAT VECTORS IN VOLUMETRIC ENVIRONMENTS\n[LAB-LOG]: EXP-109\n\n[TECHNIQUE]: Subversion of traditional depth through advanced 'billboarding' and dynamic perspective correction."
        ]
    ],
    [
        'id_key' => 'juego de mallas',
        'main_image' => 'img/Experimentos/juego de mallas/blen.mp4',
        'es' => [
            'name' => 'Análisis Lumínico: Interferencia de Mallas',
            'desc' => "[SUBJECT]: ESTUDIO DE PATRONES DE LUZ EN ESTRUCTURAS GEOMÉTRICAS\n[LAB-LOG]: EXP-504\n\n[MÉTODO]: Superposición de mallas industriales con control lumínico DMX para generar sensaciones de volumen vacío inmersivo."
        ],
        'en' => [
            'name' => 'Light Analysis: Mesh Interference',
            'desc' => "[SUBJECT]: STUDY OF LIGHT PATTERNS IN GEOMETRIC STRUCTURES\n[LAB-LOG]: EXP-504\n\n[METHOD]: Overlapping of industrial meshes with DMX light control to generate immersive empty volume sensations."
        ]
    ],
    [
        'id_key' => 'pulpo pbr',
        'main_image' => 'img/Experimentos/pulpo pbr/0940bd192129183.65d6b0f261274.webp',
        'es' => [
            'name' => 'Simulación Bio-Orgánica: Pulpo PBR',
            'desc' => "[SUBJECT]: RENDERIZADO BASADO EN LA FÍSICA DE MATERIALES BIOLÓGICOS\n[LAB-LOG]: EXP-221\n\n[MÉTODO]: Esculpido digital con texturizado procedimental SSS (Subsurface Scattering) para validación de realismo fotométrico."
        ],
        'en' => [
            'name' => 'Bio-Organic Simulation: PBR Octopus',
            'desc' => "[SUBJECT]: PHYSICALLY BASED RENDERING OF BIOLOGICAL MATERIALS\n[LAB-LOG]: EXP-221\n\n[METHOD]: Digital sculpting with procedural SSS (Subsurface Scattering) texturing for photometric realism validation."
        ]
    ]
];

function getFiles($dir) {
    if (!is_dir($dir)) return [];
    $files = scandir($dir);
    return array_values(array_filter($files, function($f) use ($dir) {
        return !is_dir($dir . '/' . $f) && in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'mp4']);
    }));
}

// 2. EXECUTE RESTORATION
Project::truncate();
foreach ($projectsData as $proj) {
    $dirName = $proj['id_key'];
    $fullPath = public_path("img/Proyectos/$dirName");
    $allImages = getFiles($fullPath);
    
    $project = new Project();
    $project->name = $proj['es']['name'];
    $project->name_en = $proj['en']['name'];
    $project->category = $proj['es']['category'];
    $project->category_en = $proj['en']['category'];
    $project->description = $proj['es']['desc'];
    $project->description_en = $proj['en']['desc'];
    $project->order = $proj['order'];
    
    // Image Visibility Fix
    $project->image_path = $proj['main_image'];
    $images = array_map(fn($img) => "img/Proyectos/$dirName/$img", $allImages);
    $mainIdx = array_search($proj['main_image'], $images);
    if ($mainIdx !== false) unset($images[$mainIdx]);
    array_unshift($images, $proj['main_image']);
    $project->images = array_values($images);
    
    $project->save();
}

Experiment::truncate();
foreach ($experimentsData as $exp) {
    $dirName = $exp['id_key'];
    $fullPath = public_path("img/Experimentos/$dirName");
    $allImages = getFiles($fullPath);
    
    $experiment = new Experiment();
    $experiment->name = $exp['es']['name'];
    $experiment->name_en = $exp['en']['name'];
    $experiment->category = 'R&D Laboratory';
    $experiment->category_en = 'R&D Laboratory';
    $experiment->description = $exp['es']['desc'];
    $experiment->description_en = $exp['en']['desc'];
    
    // Image Visibility Fix
    $experiment->image_path = $exp['main_image'];
    $images = array_map(fn($img) => "img/Experimentos/$dirName/$img", $allImages);
    $mainIdx = array_search($exp['main_image'], $images);
    if ($mainIdx !== false) unset($images[$mainIdx]);
    array_unshift($images, $exp['main_image']);
    $experiment->images = array_values($images);
    
    $experiment->save();
}

echo "Laboratory Deep Restoration Complete. Multilingual content, ordering, and asset paths recovered successfully.\n";
