<?php

use App\Models\Project;
use App\Models\Experiment;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$projects = [
    [
        'id_key' => 'Kick of love',
        'es' => [
            'name' => 'Protocolo KoL: Escenografía Inmersiva',
            'category' => 'Arquitectura de Escenarios',
            'desc' => "[SUBJECT]: MODULADOR ESCÉNICO INMERSIVO / KICK OF LOVE\n[STATUS]: VALIDADO EN CAMPO\n\n[OBJETIVO]: Conceptualizar y diseñar un núcleo escénico disruptivo capaz de personificar la identidad del festival KoL y optimizar la experiencia sensorial mediante una arquitectura reactiva.\n\n[INVESTIGACIÓN]: Fase de 30 ciclos pre-festival enfocada en la composición tradicional vs. innovación háptica. Se identificaron tres vectores críticos: interacción artista-público, personificación identitaria y armonización estructural.\n\n[DESARROLLO]: \n- SECCIÓN ALTA: Diseño de elevación compensatoria con sistemas LED sincronizados a las vibraciones estructurales (no melódicas), subvirtiendo la respuesta sensorial esperada.\n- PISO ESCÉNICO: Integración del logotipo central con expansión de envergadura mediante 'nubes' y alas miniaturizadas. Implementación de controladores de manufactura 100% mexicana.\n\n[INFRAESTRUCTURA]: Matrices LED de alta densidad, cañones térmicos (lanzallamas) y sistemas de control programables miniaturizados.\n\n[RESULTADO]: El ecosistema modular captó el compromiso sensorial de más de 8,000 unidades biológicas, logrando un impacto viral orgánico masivo y superando en métricas de atención a festivales internacionales concurrentes."
        ],
        'en' => [
            'name' => 'KoL Protocol: Immersive Stage Architecture',
            'category' => 'Stage Architecture',
            'desc' => "[SUBJECT]: IMMERSIVE SCENIC MODULATOR / KICK OF LOVE\n[STATUS]: FIELD VALIDATED\n\n[OBJECTIVE]: To conceptualize and design a disruptive scenic core capable of personifying the KoL festival identity and optimizing the sensory experience through reactive architecture.\n\n[RESEARCH]: A 30-day pre-festival phase focused on traditional composition vs. haptic innovation. Three critical vectors were identified: artist-audience interaction, identity personification, and structural harmonization.\n\n[DEVELOPMENT]:\n- UPPER SECTION: Compensatory elevation design with LED systems synchronized to structural vibrations (non-melodic), subverting the expected sensory response.\n- SCENIC FLOOR: Integration of the central logo with expanded wingspan through 'clouds' and miniaturized wings. Implementation of 100% Mexican-manufactured controllers.\n\n[INFRASTRUCTURE]: High-density LED matrices, thermal cannons (flamethrowers), and miniaturized programmable control systems.\n\n[RESULT]: The modular ecosystem captured the sensory engagement of over 8,000 biological units, achieving massive organic viral impact and surpassing concurrent international festivals in attention metrics."
        ]
    ],
    [
        'id_key' => 'Lookgeo',
        'es' => [
            'name' => 'Análisis Geoespacial: Lookgeo',
            'category' => 'Interfaz de Datos / UI-UX',
            'desc' => "[SUBJECT]: SISTEMA DE VISUALIZACIÓN METADATA INMOBILIARIA\n[STATUS]: FASE DE DESPLIEGUE PUBLICITARIO\n\n[PREMISA]: Desarrollo de un concepto gráfico disruptivo para Lookgeo, plataforma de compra-venta de activos inmobiliarios con enfoque en innovación de metadatos.\n\n[METODOLOGÍA]: Integración de capas informativas provenientes de Google Maps API e indicadores demográficos del INEGI. Se acuñó el vector comunicativo 'El lugar de tus sueños' para humanizar los algoritmos de búsqueda.\n\n[DESARROLLO UI/UX]: Creación de una arquitectura de visualización que prioriza el despliegue de información estratificada, optimizando la toma de decisiones mediante planes de monetización escalables.\n\n[SINOPSIS]: Lookgeo transforma la frialdad de los datos en una experiencia de usuario mágica, logrando una identidad funcional y una estrategia de marketing de alto impacto."
        ],
        'en' => [
            'name' => 'Geospatial Analysis: Lookgeo',
            'category' => 'Data Interface / UI-UX',
            'desc' => "[SUBJECT]: REAL ESTATE METADATA VISUALIZATION SYSTEM\n[STATUS]: ADVERTISING DEPLOYMENT PHASE\n\n[PREMISE]: Development of a disruptive graphic concept for Lookgeo, a real estate buying and selling platform with a focus on metadata innovation.\n\n[METHODOLOGY]: Integration of information layers from Google Maps API and INEGI demographic indicators. The communicative vector 'The place of your dreams' was coined to humanize search algorithms.\n\n[UI/UX DEVELOPMENT]: Creation of a visualization architecture that prioritizes stratified information display, optimizing decision-making through scalable monetization plans.\n\n[SYNOPSIS]: Lookgeo transforms the coldness of data into a magical user experience, achieving a functional identity and a high-impact marketing strategy."
        ]
    ],
    [
        'id_key' => 'Maria jose',
        'es' => [
            'name' => 'María José Living: Revitalización Estructural',
            'category' => 'Identidad de Marca',
            'desc' => "[SUBJECT]: IDENTIDAD ESTRATÉGICA PARA DESARROLLO VERTICAL\n[STATUS]: IMPLEMENTADO\n\n[OBJETIVO]: Crear una marca capaz de revitalizar el núcleo urbano de Guadalajara (Zona Centro) mediante la generación de empatía comunitaria.\n\n[CONCEPTO]: Fusión de lo familiar y lo profesional. Diseño enfocado en el respeto a la herencia arquitectónica de la región, traduciéndola en un estilo de vida moderno y acogedor.\n\n[METODOLOGÍA]: Desarrollo de un lenguaje visual que proyecta seguridad, humanidad y prosperidad, transformando espacios emblemáticos en entornos habitacionales de alta fidelidad.\n\n[SINOPSIS]: María José Living no es solo un nombre; es un protocolo de recuperación urbana diseñado para devolverle la vitalidad a la ciudad."
        ],
        'en' => [
            'name' => 'María José Living: Structural Revitalization',
            'category' => 'Branding Identity',
            'desc' => "[SUBJECT]: STRATEGIC IDENTITY FOR VERTICAL DEVELOPMENT\n[STATUS]: IMPLEMENTED\n\n[OBJECTIVE]: To create a brand capable of revitalizing the urban core of Guadalajara (Downtown) through the generation of community empathy.\n\n[CONCEPT]: Fusion of familial and professional spheres. Design focused on respecting the region's architectural heritage, translating it into a modern and welcoming lifestyle.\n\n[METHODOLOGY]: Development of a visual language that projects security, humanity, and prosperity, transforming emblematic spaces into high-fidelity living environments.\n\n[SYNOPSIS]: María José Living is not just a name; it is an urban recovery protocol designed to return vitality to the city."
        ]
    ],
    [
        'id_key' => 'Porras',
        'es' => [
            'name' => 'Estrategia Táctica: Edgardo Porras',
            'category' => 'Comunicación Política',
            'desc' => "[SUBJECT]: PROTOCOLO DE MARKETING DE GUERRILLA POLÍTICA\n[STATUS]: VALIDACIÓN ELECTORAL FINALIZADA\n\n[CÓNTEXTO]: Asesoría global para campaña en Tlacotepec de Benito Juárez, región de alta complejidad socio-económica y tradiciones arraigadas.\n\n[METODOLOGÍA ESTRATÉGICA]:\n1. ANÁLISIS POBLACIONAL: Cotejo de planes de desarrollo municipal con incidencias delictivas para segmentar deficiencias críticas y priorizar la seguridad ciudadana.\n2. VECTOR GUERRILLA: Despliegue de publicidad no-centralizada, stickers disruptivos, intervenciones artísticas gráficas y uso táctico de TikTok para la humanización del candidato.\n3. RESPUESTA RÁPIDA: Sofocación visual de inquietudes sociales mediante videos documentales en locaciones emblemáticas (10k+ reproducciones).\n\n[RESULTADO]: Se logró una transformación de ideas en propuestas mediante una campaña sin miedo y de avance rápido, optimizando los gastos de campaña gracias al compromiso orgánico de la ciudadanía."
        ],
        'en' => [
            'name' => 'Tactical Strategy: Edgardo Porras',
            'category' => 'Political Communication',
            'desc' => "[SUBJECT]: POLITICAL GUERRILLA MARKETING PROTOCOL\n[STATUS]: ELECTORAL VALIDATION COMPLETED\n\n[CONTEXT]: Global campaign advisory in Tlacotepec de Benito Juárez, a region of high socioeconomic complexity and deep-rooted traditions.\n\n[STRATEGIC METHODOLOGY]:\n1. POPULATION ANALYSIS: Comparative study of municipal development plans with crime incidents to segment critical deficiencies and prioritize citizen security.\n2. GUERRILLA VECTOR: Deployment of non-centralized advertising, disruptive stickers, graphic artistic interventions, and tactical use of TikTok for candidate humanization.\n3. RAPID RESPONSE: Visual mitigation of social concerns through documentary videos at emblematic locations (10k+ views).\n\n[RESULT]: Ideas were successfully transformed into proposals through a fearless, fast-paced campaign, optimizing expenses thanks to the organic commitment of the citizens."
        ]
    ],
    [
        'id_key' => 'Soneto',
        'es' => [
            'name' => 'Soneto Residencial: Síntesis Estética',
            'category' => 'Identidad Visual',
            'desc' => "[SUBJECT]: BRANDING VIBRANTE PARA DESARROLLO HABITACIONAL\n[STATUS]: ACTIVO\n\n[OBJETIVO]: Capturar la esencia del estilo de vida joven y dinámico de la colonia Americana en Guadalajara.\n\n[METODOLOGÍA]: Diseño inspirado en la energía cromática y estructural de la comunidad local. Se aplicó un enfoque fresco y moderno enfocado en un sector demográfico con altos índices de vitalidad.\n\n[SINOPSIS]: Soneto Residencial se posiciona como una marca que trasciende el ladrillo, convirtiéndose en el símbolo de un estilo de vida activo y lleno de energía."
        ],
        'en' => [
            'name' => 'Soneto Residencial: Aesthetic Synthesis',
            'category' => 'Visual Identity',
            'desc' => "[SUBJECT]: VIBRANT BRANDING FOR RESIDENTIAL DEVELOPMENT\n[STATUS]: ACTIVE\n\n[OBJECTIVE]: To capture the essence of the young and dynamic lifestyle of the Americana neighborhood in Guadalajara.\n\n[METHODOLOGY]: Design inspired by the chromatic and structural energy of the local community. A fresh and modern approach was applied, focused on a demographic with high vitality indices.\n\n[SYNOPSIS]: Soneto Residencial is positioned as a brand that transcends brick and mortar, becoming the symbol of an active and energy-filled lifestyle."
        ]
    ],
    [
        'id_key' => 'Universum',
        'es' => [
            'name' => 'Universum Inmobiliaria: Re-Branding Estructural',
            'category' => 'Arquitectura de Marca',
            'desc' => "[SUBJECT]: REESTRUCTURACIÓN DE IDENTIDAD EMPRESARIAL\n[STATUS]: VALIDADO POR EL SAT / IMPI\n\n[MISIÓN]: Ejecutar un proceso de Rebranding profundo tras la obsolescencia de identidad genérica y falta de registros legales.\n\n[METODOLOGÍA DE CAMPO]: Análisis de denominadores comunes en la competencia. Se detectó saturación de iconos literales y logotipos megalomaníacos.\n\n[OBJETIVOS TÉCNICOS]:\n1. DIFERENCIACIÓN: Diseño eficiente y legible.\n2. CERCANÍA: Humanización del servicio.\n3. EXTRADIEGÉTRICA: Esquema cromático basado en Amarillo 803 U para asociación inconsciente con el sector inmobiliario público.\n\n[RESULTADO]: Creación de un sistema adaptable para medios impresos y digitales, con iconos que simbolizan conexión, calidez y solidez técnica (Puente + Abrazo + Estructura)."
        ],
        'en' => [
            'name' => 'Universum Real Estate: Structural Re-Branding',
            'category' => 'Brand Architecture',
            'desc' => "[SUBJECT]: CORPORATE IDENTITY RESTRUCTURING\n[STATUS]: SAT / IMPI VALIDATED\n\n[MISSION]: To execute a profound rebranding process following the obsolescence of generic identity and lack of legal registrations.\n\n[FIELD METHODOLOGY]: Analysis of common denominators in the competition. Saturation of literal icons and megalomaniacal logos was detected.\n\n[TECHNICAL OBJECTIVES]:\n1. DIFFERENTIATION: Efficient and readable design.\n2. CLOSENESS: Service humanization.\n3. EXTRADIEGETIC: Chromatic scheme based on Yellow 803 U for unconscious association with the public real estate sector.\n\n[RESULT]: Creation of an adaptable system for print and digital media, with icons symbolizing connection, warmth, and technical reliability (Bridge + Embrace + Structure)."
        ]
    ],
    [
        'id_key' => 'concepto villas navideñas',
        'es' => [
            'name' => 'Villas Iluminadas: Ecosistema Tlacotepec',
            'category' => 'Instalación Interactiva / Branding',
            'desc' => "[SUBJECT]: SISTEMA INTERACTIVO DE ILUMINACIÓN Y TURISMO\n[STATUS]: VALIDACIÓN DE IMPACTO ECONÓMICO FINALIZADA\n\n[PREMISA]: Impulsar el turismo nacional mediante una instalación de alta tecnología capaz de competir con proyectos tradicionales del sector.\n\n[ARQUITECTURA DEL SISTEMA]:\n- TIPO 1 (BASE): Módulos decorativos de iluminación estática.\n- TIPO 2 (SMART): Sistemas controlados por microprocesadores con sensores de proximidad.\n- TIPO 3 (INTERACTIVO): Estructuras de inmersión total con materiales termocromáticos y simulaciones celestes del invierno.\n\n[RESULTADO TÉCNICO]: Implementación de un proyecto de alta fidelidad tecnológica a un costo menor gracias a la integración vertical de procesos. Se estimó un incremento del 25% en el flujo turístico y hasta un 55% en la actividad económica local."
        ],
        'en' => [
            'name' => 'Illuminated Villas: Tlacotepec Ecosystem',
            'category' => 'Interactive Installation / Branding',
            'desc' => "[SUBJECT]: INTERACTIVE LIGHTING AND TOURISM SYSTEM\n[STATUS]: ECONOMIC IMPACT VALIDATION COMPLETED\n\n[PREMISE]: To boost national tourism through a high-technology installation capable of competing with traditional projects in the sector.\n\n[SYSTEM ARCHITECTURE]:\n- TYPE 1 (BASE): Static decorative lighting modules.\n- TYPE 2 (SMART): Microprocessor-controlled systems with proximity sensors.\n- TYPE 3 (INTERACTIVE): Full immersion structures with thermochromatic materials and winter celestial simulations.\n\n[TECHNICAL RESULT]: Implementation of a high-fidelity technological project at a lower cost thanks to vertical integration of processes. A 25% increase in tourist flow and up to 55% in local economic activity was estimated."
        ]
    ],
    [
        'id_key' => 'congreso regional',
        'es' => [
            'name' => 'VIII Congreso de Médicos: Estrategia Oyster Fork',
            'category' => 'Estrategia de Comunicación / M2M',
            'desc' => "[SUBJECT]: INFRAESTRUCTURA VISUAL Y PROFESIONALIZACIÓN CIENTÍFICA\n[STATUS]: IMPACTO PROFITABLE 500%\n\n[RETO]: Rescatar el 50 Aniversario del Colegio de Médicos de Irapuato (CMIAC) bajo condiciones de pandemia global y recesión.\n\n[ESTRATEGIA OYSTER FORK]:\n1. PROFESIONALIZACIÓN: Reestructuración de la identidad de marca del CMIAC.\n2. CANAL M2M: Creación de una plataforma digital robusta para la transmisión de conocimiento médico.\n3. MONETIZACIÓN: Desarrollo de paquetes publicitarios tácticos para Big Pharma (Pfizer, Bayer, GSK), cumpliendo rigurosamente con las regulaciones nacionales.\n\n[MISIÓN CUMPLIDA]: Se rompieron récords internos de asistencia, alcanzando la rentabilidad operativa desde la fase de investigación y sentando las bases para la expansión nacional del congreso."
        ],
        'en' => [
            'name' => 'VIII Medical Congress: Oyster Fork Strategy',
            'category' => 'Communication Strategy / M2M',
            'desc' => "[SUBJECT]: VISUAL INFRASTRUCTURE AND SCIENTIFIC PROFESSIONALIZATION\n[STATUS]: 500% PROFITABLE IMPACT\n\n[CHALLENGE]: To rescue the 50th Anniversary of the Irapuato Medical College (CMIAC) under global pandemic and recession conditions.\n\n[OYSTER FORK STRATEGY]:\n1. PROFESSIONALIZATION: Restructuring of CMIAC's brand identity.\n2. M2M CHANNEL: Creation of a robust digital platform for medical knowledge transmission.\n3. MONETIZATION: Development of tactical advertising packages for Big Pharma (Pfizer, Bayer, GSK), strictly complying with national regulations.\n\n[MISSION ACCOMPLISHED]: Internal attendance records were broken, achieving operational profitability from the research phase and laying the foundations for the congress's national expansion."
        ]
    ],
    [
        'id_key' => 'hugo fernandez',
        'es' => [
            'name' => 'Hugo Fernández: La Leyenda Continúa',
            'category' => 'Branding Estratégico / Legacy',
            'desc' => "[SUBJECT]: CONSTRUCCIÓN DE MEMORIA VISUAL Y LEGADO MUSICAL\n[STATUS]: GIRA NACIONAL SOLD OUT\n\n[OBJETIVO]: Relanzar la carrera de Hugo Fernández después de 40 años de trayectoria, capitalizando su carácter dionisiaco y carisma tropical.\n\n[METODOLOGÍA]:\n1. IDENTIDAD SEMIÓTICA: Rediseño del logo con simbología cumbia-cristiana (Corazón en llamas + Corona), optimizando legibilidad.\n2. POSICIONAMIENTO DISRUPTIVO: Enfoque en demografía joven (17-35) mediante estética 'Eco-friendly Vintage'.\n3. DOCUMENTALÍSTICA: Estrategia de micro-cápsulas diarias para generar una conexión de intimidad total entre el artista y el usuario final.\n\n[RESULTADO]: Incremento masivo de seguidores y 7 fechas nacionales agotadas en tiempo récord, validando la fuerza de la identidad sobre el legado."
        ],
        'en' => [
            'name' => 'Hugo Fernández: The Legend Continues',
            'category' => 'Strategic Branding / Legacy',
            'desc' => "[SUBJECT]: VISUAL MEMORY CONSTRUCTION AND MUSICAL LEGACY\n[STATUS]: NATIONAL TOUR SOLD OUT\n\n[OBJECTIVE]: To relaunch Hugo Fernández's career after a 40-year trajectory, capitalizing on his Dionysian character and tropical charisma.\n\n[METHODOLOGY]:\n1. SEMIOTIC IDENTITY: Logo redesign with cumbia-Christian symbology (Burning Heart + Crown), optimizing legibility.\n2. DISRUPTIVE POSITIONING: Focus on young demographics (17-35) through 'Eco-friendly Vintage' aesthetics.\n3. DOCUMENTARY: Daily micro-capsule strategy to generate total intimacy between the artist and the end-user.\n\n[RESULT]: Massive follower increase and 7 national dates sold out in record time, validating the strength of identity over legacy."
        ]
    ],
];

$experiments = [
    [
        'id_key' => 'Experimentacion de texturas calculadas matematicamente',
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

// EXECUTE SYNC
Project::truncate();
$projBase = public_path('img/Proyectos');
foreach ($projects as $proj) {
    $dirName = $proj['id_key'];
    $fullPath = $projBase . '/' . $dirName;
    $allImages = getFiles($fullPath);
    
    $project = new Project();
    $project->name = $proj['es']['name'];
    $project->name_en = $proj['en']['name'];
    $project->category = $proj['es']['category'];
    $project->category_en = $proj['en']['category'];
    $project->description = $proj['es']['desc'];
    $project->description_en = $proj['en']['desc'];
    $project->image_path = "img/Proyectos/$dirName/";
    $project->images = array_map(fn($img) => "img/Proyectos/$dirName/$img", $allImages);
    $project->save();
}

Experiment::truncate();
$expBase = public_path('img/Experimentos');
foreach ($experiments as $exp) {
    $dirName = $exp['id_key'];
    $fullPath = $expBase . '/' . $dirName;
    $allImages = getFiles($fullPath);
    
    $experiment = new Experiment();
    $experiment->name = $exp['es']['name'];
    $experiment->name_en = $exp['en']['name'];
    $experiment->category = 'R&D Laboratory';
    $experiment->category_en = 'R&D Laboratory';
    $experiment->description = $exp['es']['desc'];
    $experiment->description_en = $exp['en']['desc'];
    $experiment->image_path = "img/Experimentos/$dirName/";
    $experiment->images = array_map(fn($img) => "img/Experimentos/$dirName/$img", $allImages);
    $experiment->save();
}

echo "Laboratory Multilingual Restoration Complete. 13 High-Impact Technical Reports Synchronized (ES/EN).\n";
