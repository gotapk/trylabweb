<?php

$content = file_get_contents('c:/laragon/www/Web-Trylab/public/js/os.js');

// We are replacing the specific blocks for the 3 experiments
// We will use preg_replace with a regex that captures the key and replaces the whole block.

$experiments = [
    'texturas-pbr' => <<<EOD
        'texturas-pbr': `
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/067324192128517.65d6ac877a6d8.webp" class="hero-parallax-bg" alt="PBR Textures">
                    <div class="hero-overlay">
                        <span class="hero-tag">Lab Blog // Modelado Procedural</span>
                        <h1 class="hero-title">RUIDO<br>MATEMÁTICO</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>DEMOSTRACIÓN DE TEOREMA:</strong> El fotorrealismo hiper-detallado no requiere cámaras, requiere <strong>algoritmos y procesadores gráficos forzados al límite</strong>.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>1. Disertación Táctica 3D: El Fin de la Fotogrametría</h3>
                        <p>En el Departamento de Materiales Virtuales de Try Lab, prescindimos temporalmente de los escaneos LiDAR y la fotogrametría tradicional. Nuestra hipótesis: el fotorrealismo puede ser sintetizado desde cero puramente a través del código.</p>
                        <p>Sometimos nuestra red de renderizado PBR (Physically Based Rendering) a pruebas de estrés mediante el uso exclusivo de nodos procesales. Al combinar variaciones de ruido matemático (Perlin, Voronoi, Musgrave), logramos instruir al motor gráfico para que calculara la degradación molecular, el óxido y las imperfecciones del metal a un nivel submilimétrico.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/1db4eb192128443.65d6abc8de62d.webp" alt="Simetría Nodo 1">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/28e648192128617.65d6ad44b1b7a.webp" alt="Textura Densa 02">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/76a8a6192128617.65d6ad44b04c8.webp" alt="Material Corroído">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/7fcebf192128443.65d6abc8df382.webp" alt="Fragmentos Irregulares">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>2. Conclusiones Cuantitativas</h3>
                        <p>El resultado es un banco de texturas de resolución teóricamente infinita que no sufre de pixelación al acercamiento. La fricción óptica creada por las rugosidades simuladas y la reflectividad especular es indistinguible de muestras metálicas en un microscopio electrónico. Hemos purgado la necesidad del mundo real en la creación de activos digitales de alto impacto.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/a17e28192128517.65d6ac877b194.webp" alt="Render de Iluminación">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/b1c232192128617.65d6ad44b1178.webp" alt="Render Metálico 01">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/b707c8192128443.65d6abc8dcd5a.webp" alt="Render Metálico 02">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/c75848192128443.65d6abc8ddb55.webp" alt="Especular Matemático">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentacion de texturas calculadas matematicamente/d23d38192128517.65d6ac8779bdd.webp" alt="Shader Completo">
                    </div>
                </div>
            </div>
        `
EOD,
    'fusion-2d-3d' => <<<EOD
        'fusion-2d-3d': `
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/3ed364192129515.65d6b336b1f7a.webp" class="hero-parallax-bg" alt="Fusion Estilos Visuales">
                    <div class="hero-overlay">
                        <span class="hero-tag">Lab Blog // Shading Dinámico</span>
                        <h1 class="hero-title">ARTEFACTOS<br>2D EN 3D</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>RUPTURA ESPACIAL:</strong> Hackear shaders físicos para <strong>insertar arte manga puramente 2D</strong>, forzándolo a reaccionar físicamente al adherirse a geometrías masivas tridimensionales.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>1. Fricción Cognitiva Intencional</h3>
                        <p>El Laboratorio de Ilusión Óptica diseñó este experimento como una provocación visual directa. Nuestro objetivo no era la armonía, sino el constante recordatorio de la artificiosidad del medio. Tomamos mallas poligonales pesadas y anatómicamente correctas, y sobre ellas, forzamos la proyección de un sombreado (shader) plano y agresivo característico del arte conceptual 2D.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/6646b0192129515.65d6b336b28ba.webp" alt="Shader Test 01">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/6761e2192129515.65d6b335c566d.webp" alt="Prueba de Luz Direccional">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/6fcd5f192129515.65d6b335c6467.webp" alt="Render Plano 2D">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/96ff5b192129515.65d6b335603dd.webp" alt="Test Huesos Tridimensionales">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>2. Manipulación de la Refracción Lumínica</h3>
                        <p>Al manipular matemáticamente los mapas de normales (normal maps) hacia un valor absoluto de cero en áreas seleccionadas, evitamos que la luz tridimensional rodeara las formas. Esto colapsa la profundidad del objeto, aplanando los accesorios justo antes de que el espectador asimile la rotación 3D del cuerpo anfitrión. El resultado es un glitch perceptual altamente inmersivo, abriendo un nuevo vector estético para animaciones no convencionales en pautas publicitarias.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/adef9b192129515.65d6b336b3334.webp" alt="Cámara de Ortogonalidad">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/b9bc5d192129515.65d6b3363e067.webp" alt="Modelado en Rotación">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/d1b102192129515.65d6b33560f3e.webp" alt="Shader Material">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/de61b3192129515.65d6b336b08c6.webp" alt="Renderizado de Prueba Final">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/Experimentación de accesorios 2D para 3D/fdb747192129515.65d6b3363d241.webp" alt="Perspectiva Diagonal Escorzo">
                    </div>
                </div>
            </div>
        `
EOD,
    'pulpo-pbr' => <<<EOD
        'pulpo-pbr': `
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Experimentos/pulpo pbr/08c8cf192129183.65d6b0f1ef625.webp" class="hero-parallax-bg" alt="Octopus PBR">
                    <div class="hero-overlay">
                        <span class="hero-tag">Lab Blog // Render Físico</span>
                        <h1 class="hero-title">LUMEN<br>ORGÁNICO</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>PRUEBA DE ESTRÉS SSS:</strong> Extraer el límite matemático del motor probando <strong>Dispersión Subsuperficial de Luz profunda</strong> en biología extruida.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>1. Reporte Forense del Fotón</h3>
                        <p>La renderización de criaturas marítimas abisales representa sistemáticamente uno de los mayores desafíos energéticos para las estaciones de trabajo del laboratorio. El tejido orgánico de un pulpo no rebota la luz de golpe; la absorbe, la difumina a través de capas mucosas y la expulsa alterada espectralmente.</p>
                        <p>Configuramos redes de nodos tácticos para calcular específicamente el índice de refracción térmico (Scatter Radii) y la densidad de volumen del modelo tridimensional bajo luz direccional sumamente hostil.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/pulpo pbr/0940bd192129183.65d6b0f261274.webp" alt="Luz Lateral Reflejada">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/pulpo pbr/ab07fc192129183.65d6b0f1eebf7.webp" alt="Lumen Subsuperficial Activo">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>2. Exquisitez Gráfica Bajo Presión</h3>
                        <p>Saturando el algoritmo con rayos de luz lateral o "Rim Light", observamos cómo las delgadas venas y membranas adquirían una semi-transparencia roja hirviente. El éxito de este experimento PBR valida categóricamente la capacidad computacional de nuestra tubería gráfica para el renderizado cinematográfico en tiempo real, pavimentando el terreno para simulaciones biológicas sintéticas encargadas por nuestros clientes de alto perfil armamentístico-creativo.</p>
                    </div>
                </div>
            </div>
        `
EOD
];

foreach ($experiments as $key => $replacement) {
    // Regex blocks: 'key': `...`
    // Use positive lookahead and lazy matching to replace everything from the key until the next block or end of object
    $content = preg_replace("/'$key': `.*?`/s", $replacement, $content);
}

file_put_contents('c:/laragon/www/Web-Trylab/public/js/os.js', $content);
echo "Experiments updated.\n";

?>
