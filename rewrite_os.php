<?php

$content = file_get_contents('c:/laragon/www/Web-Trylab/public/js/os.js');

$replacement = <<<EOD
    const postData = {
        'kick-of-love': `
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/Kick of love/1a55f3157064525.63727af4e4f3c.webp" class="hero-parallax-bg" alt="Kick of Love">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Escenografía</span>
                        <h1 class="hero-title">KICK OF<br>LOVE</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>HIPÓTESIS ESTRATÉGICA:</strong> El escenario no debe ser un fondo estático; debe ser un <strong>actor estelar</strong> que sincronice vibración táctil con respuesta lumínica.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>1. Análisis de Requisitos del Festival</h3>
                        <p>El Festival Internacional "Kick of Love" (KoL) nos contactó aproximadamente un mes previo al evento para conceptualizar y diseñar el corazón táctico del espectáculo: un escenario que elevara la identidad y forzara el reconocimiento inmediato de la marca.</p>
                        <p>Tras una rápida investigación de necesidades de los artistas y usuarios finales, delineamos tres vectores de desarrollo:</p>
                        <ul>
                            <li>Permitir un alto grado de interacción entre el escenario, los intérpretes y la audiencia.</li>
                            <li>Generar un diseño capaz de personificar la identidad brutalista del evento.</li>
                            <li>Armonizar la estructura para optimizar la experiencia sensorial de 8,000 asistentes simultáneos.</li>
                        </ul>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/1ec641157064525.63727af4e40b9.webp" alt="Proceso Escénico">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>2. Ejecución Táctica: Escenarios Gemelos</h3>
                        <p>Con base en el inventario preexistente (cañones de papeletas, lanzallamas y pantallas LED mega-formato), decidimos crear dos escenarios independientes. El primer escenario (zona alta) se diseñó para contrarrestar la visibilidad reducida causada por su elevación. Integramos luces LED sincronizadas no al ritmo de la música, sino a las vibraciones físicas del escenario, para subvertir las expectativas y crear una experiencia corpórea de unidad.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/257f6d157064525.63727af4e5ea8.webp" alt="Estructura LED">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>3. Hardware Propietario & Resultados</h3>
                        <p>La sección del piso escénico incorporó el logotipo de KoL como estructura central, a la que añadimos 4 metros extra mediante alas de audífonos y nubes laterales modulares.</p>
                        <p>El reto fue la miniaturización de los controladores periféricos. El equipo de Try Lab diseñó y construyó tanto el sistema de control como la programación interna. Utilizamos cables de alta velocidad y microprocesadores integrados en laboratorio. El resultado fue la viralización del evento, logrando retener a la audiencia durante dos días a pesar de competir directamente contra el Festival Internacional Medusa.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/4d02ac157064525.63727af560a0a.webp" alt="Vista Frontal Noche">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/5412d5157064525.63727af562c67.webp" alt="Cielo y Fuegos Artificiales">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/69c886157064525.63727af561bba.webp" alt="Luces del Escenario">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/764d7b157064525.63727af4e2ce2.webp" alt="Efectos de Fuego">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Kick of love/8c0bfb157064525.63727af4e1c48.webp" alt="Boceto/Planos">
                    </div>
                </div>
            </div>
        \`,
        'lookgeo': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/Lookgeo/1ea3cf157163691.63740248ed048.webp" class="hero-parallax-bg" alt="Lookgeo">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // UX y Big Data</span>
                        <h1 class="hero-title">LOOKGEO</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>PROBLEMA IDENTIFICADO:</strong> Vender un inmueble no es despachar paredes, es procesar <strong>metadatos ambientales</strong> para visualizar el "lugar de tus sueños".</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Definición del Ecosistema de Datos</h3>
                        <p>Lookgeo es una plataforma emergente de venta y renta de casas. Como parte de su escalado operativo, el equipo de Try Lab fue seleccionado para diseñar la consultoría externa, UI/UX y conceptualización del ecosistema de redes sociales.</p>
                        <p>La propuesta diferencial consistió en innovar en el despliegue de información. En lugar de limitarnos a m2 y recámaras, integramos metadatos extraídos de APIs geográficas como Google Maps y bases del INEGI, estructurando una interface que otorga ventajas predictivas a los compradores de los planes de suscripción mensual.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Lookgeo/23f050157826633.637fd8e535b00.png" alt="Concepto UI App 1">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Lookgeo/2b7d2c157826633.637fd8e536965.png" alt="Concepto UI App 2">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Estrategia Visual de Conversión</h3>
                        <p>Basándonos en la segmentación del público objetivo, acuñamos el mantra de marca "El lugar de tus sueños". Desarrollamos un framework gráfico fluido, corporativo pero altamente emocional. Las parrillas de redes sociales fueron diseñadas para explicar algoritmos complejos a usuarios finales mediante gráficos amigables y un copy conciso.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Lookgeo/2daa9d157826633.637fd8e5776a2.webp" alt="Mockup Branding 1">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Lookgeo/4e4b4b157826633.637fd8e4cb931.webp" alt="Mockup Social 1">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Lookgeo/573027157826633.637fd8e4c93d8.webp" alt="Grid Visual">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Lookgeo/6e37a3157163691.6374024978eb4.webp" alt="Brand Logo Concept">
                    </div>
                </div>
            </div>
        \`,
        'maria-jose': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/Maria jose/37199a192037623.65d579229fcce.webp" class="hero-parallax-bg" alt="Maria Jose">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Identidad Urbana</span>
                        <h1 class="hero-title">MARÍA JOSÉ<br>LIVING</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>TESIS CENTRAL:</strong> La revitalización urbana requiere la extracción empática de la <strong>herencia arquitectónica</strong> de la ciudad.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Planteamiento Socio-Urbano</h3>
                        <p>"María José Living" se conceptualizó como un macroproyecto de branding con una misión crítica: inyectar vitalidad renovada a la zona centro de Guadalajara, operando desde un plano de estricta empatía comunitaria.</p>
                        <p>La marca debía resonar con un estilo de vida que transita velozmente entre lo familiar y lo corporativo. Evitamos el brutalismo frío del Real Estate tradicional, optando por una paleta y un diseño que honraran las cornisas neoclásicas y la textura cálida de la ciudad.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Maria jose/523a8a192037623.65d5792374bee.webp" alt="Logo Maria Jose">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Traducción Semiótica</h3>
                        <p>Nuestro equipo destiló esta dualidad en una marca que busca activamente transformar el estrés demográfico del centro en un refugio humano. El desarrollo gráfico apoya este ecosistema, usando tipografías amigables, pesos de línea orgánicos y una composición visual enfocada en que la comunidad prospere en un entorno acogedor.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Maria jose/83243d192037623.65d57922a0afb.webp" alt="Material Coporativo 1">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Maria jose/a33b28192037623.65d5792375abb.webp" alt="Iconografía">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Maria jose/d58387192037623.65d579229eff0.webp" alt="Brochure Design">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Maria jose/e6eff2192037623.65d579229e43d.png" alt="Papelería">
                    </div>
                </div>
            </div>
        \`,
        'porras': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/Porras/07aaf6157162257.6373fbdfdb8e1.webp" class="hero-parallax-bg" alt="Edgardo Porras">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Táctica Electoral</span>
                        <h1 class="hero-title">EDGARDO<br>PORRAS</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>VECTOR TÁCTICO:</strong> Dar <strong>"porrazos"</strong> electorales mediante guerrilla política móvil.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>1. Análisis de Complejidad Geopolítica</h3>
                        <p>La campaña por la alcaldía de Tlacotepec de Benito Juárez presentó un escenario hostil. El municipio es simultáneamente un punto asolado por el hurto de hidrocarburos ("huachicoleo") y un bastión de tradiciones indígenas regido por usos y costumbres.</p>
                        <p>El equipo de inteligencia de Try Lab realizó estudios demográficos para segmentar fallas estructurales. Con el diagnóstico cuantificado, asumimos el rol clave de jefatura de campaña.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/141395157162257.6373fbdcbb86f.webp" alt="Propaganda Urbana">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>2. Pilares de Despliegue</h3>
                        <p>Se estructuró una campaña asimétrica:</p>
                        <ol>
                            <li><strong>Filtración:</strong> Recolectamos feedback de la comunidad.</li>
                            <li><strong>Guerrilla Marketing:</strong> Distribuimos stickers virales por WhatsApp, y adoptamos identidad visual urbana bromeando con dar "porrazos" a la corrupción.</li>
                        </ol>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/542ba4157162257.6373fbdcc1f4d.webp" alt="Stickers y Digital">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/5855df157162257.6373fbdf2b931.webp" alt="Materiales y Playeras">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/663637157162257.6373fbdd4cf3e.webp" alt="Stickers y Digital 2">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/8da635157162257.6373fbdf30a71.webp" alt="Activación en Barda">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/92d7e5157162257.6373fbdba4c77.webp" alt="Documento Táctico">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Porras/def0f0157162257.6373fbdd4e876.webp" alt="Evento Político">
                    </div>
                </div>
            </div>
        \`,
        'soneto': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/Soneto/0688da192037295.65d5774840d36.webp" class="hero-parallax-bg" alt="Soneto">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Identidad Urbana</span>
                        <h1 class="hero-title">SONETO<br>RESIDENCIAL</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>SÍNTESIS CULTURAL:</strong> El ritmo incombustible de la <strong>Colonia Americana</strong> empacado en un volumen geométrico.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>El Reto del Código Postal</h3>
                        <p>Diseñar la identidad de un complejo de vivienda vertical en la zona más gentrificada de Guadalajara requiere precisión de navaja. Un fallo implicaría el rechazo del mercado meta crítico: adultos jóvenes urbanos de alto ingreso.</p>
                        <p>Planteamos una identidad gráfica para Soneto Residencial que destila juventud y un dinamismo calculado, capturando la fricción bohemia de la Colonia Americana.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/4d7e51192037295.65d5774841a63.webp" alt="Logo Principal">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Modelado de Líneas</h3>
                        <p>Las líneas sólidas, las fuentes serif intervenidas y los perfiles arquitectónicos en el manual de marca establecen a "Soneto" como el contenedor físico lógico para un demográfico que prospera en la energía inagotable.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/53eff4192037295.65d57746e8125.webp" alt="Color Palette">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/9805f7192037295.65d57745aba94.webp" alt="Stationery Soneto">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/b0257e192037295.65d57746e75c0.webp" alt="Branding Material">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/b15965192037295.65d57746e8c4f.webp" alt="Arquitectura Referencia">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/ce406e192037295.65d57745a9be7.webp" alt="Display y Tarjetas">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Soneto/ceb5e7192037295.65d57745aab3b.webp" alt="Brochure Digital">
                    </div>
                </div>
            </div>
        \`,
        'universum': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/Universum/0d5945157005911.6371911d653b7.webp" class="hero-parallax-bg" alt="Universum">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Reposicionamiento</span>
                        <h1 class="hero-title">UNIVERSUM</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>EJECUCIÓN ESTRATÉGICA:</strong> Rescatar un patrimonio empresarial de la <strong>ilegalidad marcaria</strong> con psicología geométrica.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>1. Análisis de Crisis</h3>
                        <p>En su fundación en 2016, "Luxury Real State" extrajo un logo genérico. Tras 3 años, el IMPI bloqueó sus procedimientos legales por su nombre genérico. Try Lab realizó ingeniería inversa para crear "Universum Inmobiliaria".</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Universum/17bd4a157005911.6371911ce9000.webp" alt="Design Grid Universum">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>2. Semántica Competitiva</h3>
                        <p>Viramos a 180 grados:</p>
                        <ul>
                            <li><strong>Color Analizado:</strong> Extrajimos el valor 803 U Amarillo asimilado con carteles de "Se Renta".</li>
                            <li><strong>Vectorización Semiótica:</strong> El nuevo isotipo calculado matemáticamente consolida un puente y abrazo visual.</li>
                        </ul>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Universum/55746d157005911.6371911d644e4.webp" alt="Details and Colors">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Universum/d22d01157005911.6371911ce7779.webp" alt="Formatos Múltiples">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/Universum/f76aa6157005911.6371911ce841b.webp" alt="Logo Construcción">
                    </div>
                </div>
            </div>
        \`,
        'villas-navidenas': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/concepto villas navideñas/1e4a65157011279.6371ba8d5cd33.webp" class="hero-parallax-bg" alt="Villas Navideñas">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Intervención Cívica</span>
                        <h1 class="hero-title">VILLAS<br>NAVIDEÑAS</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>OPERACIÓN TURISMO:</strong> Hackear turismo con presupuestos recortados usando <strong>climatología termo-sensible experimental</strong>.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Contexto Operativo Complejo</h3>
                        <p>Tlacotepec, confió en nosotros para catapultar el turismo navideño compitiendo contra entidades vecinas de fondos masivos. Destruimos las estimaciones de costo usando instalaciones de altísimo nivel tecnológico orientadas al contacto físico.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/concepto villas navideñas/3075b7157011279.6371ba8cf0174.webp" alt="Diagramas Nodos">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/concepto villas navideñas/38a532157011279.6371ba8d0109d.webp" alt="Esquemas Sensoriales">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/concepto villas navideñas/5acbbe157011279.6371ba8cf31be.webp" alt="Plano Topológico">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Impacto Socioeconómico Registrado</h3>
                        <p>Empíricamente logramos un aumento del 25% interanual en tráfico de transeúntes y desatamos una avalancha económica transaccional de hasta el 55% sobre la zona.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/concepto villas navideñas/9b1a2a157011279.6371ba8d5dc4a.webp" alt="Mapa Turístico">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/concepto villas navideñas/dcf28c157011279.6371ba8d60008.webp" alt="Iluminación Central">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/concepto villas navideñas/e30eb0157011279.6371ba8d5ec06.webp" alt="Vista Nocturna">
                    </div>
                </div>
            </div>
        \`,
        'congreso-medico': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/congreso regional/0473b2157013733.6371c94a9c844.webp" class="hero-parallax-bg" alt="Congreso Médico">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Plataforma M2M</span>
                        <h1 class="hero-title">CONGRESO<br>MÉDICO</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>INTERVENCIÓN DE CRISIS:</strong> Rescatar una asociación clausurada por pandemia inyectando una <strong>arquitectura digital M2M</strong>.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Cronología del Colapso</h3>
                        <p>El Colegio de Médicos de Irapuato debió celebrar su cincuentenario el 2020. Por confinamiento estricto, todas sus vías críticas de financiamiento se cayeron de lleno. Creamos el vector 'Oyster Fork' salvándolo.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/2495c8157013733.6371c94aeb957.webp" alt="Colores Institucionales">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Arquitectura M2M y Monetización</h3>
                        <p>Desarrollamos el marco completo para transcodificar sesiones simultáneas y un modelo AdTech integrando patrocinios en el flujo de las clases, destrozando récords de ROI (+500%).</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/345dd1157013733.6371c94b8e5e1.webp" alt="Elementos Graficos">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/4bd6dc157013733.6371c94b4a109.webp" alt="Banner Evento Principal">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/7e4a19157013733.6371c94b4bf59.webp" alt="Diploma Certificado">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/7ec2ae157013733.6371c94aedbd8.webp" alt="Flyer Secundario">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/84033e157013733.6371c94b8c3af.webp" alt="Materiales y Props">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/c5af34157013733.6371c94b8dbc7.webp" alt="Assets Generales">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/dac0b7157013733.6371c94be73e1.webp" alt="Brazaletes y Accessos">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/congreso regional/ea10b8157013733.6371c94a99bf8.webp" alt="Publicidad Medios">
                    </div>
                </div>
            </div>
        \`,
        'hugo-fernandez': \`
            <div class="premium-post">
                <div class="btn-back-orb"><i>←</i></div>
                <div class="immersive-hero">
                    <img src="/img/Proyectos/hugo fernandez/28ca1a157070675.63728e1e39a9f.webp" class="hero-parallax-bg" alt="Hugo Fernandez">
                    <div class="hero-overlay">
                        <span class="hero-tag">Reporte de Laboratorio // Identidad de Legado</span>
                        <h1 class="hero-title">HUGO<br>FERNÁNDEZ</h1>
                    </div>
                </div>
                <div class="immersive-body">
                    <div class="section-reveal premise-card">
                        <p class="premise-text"><strong>PARADIGMA DIGITAL:</strong> ¿Cómo trasladas a una <strong>institución musical analógica</strong> hacia las dinámicas hipnóticas del feed de generaciones emergentes?</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Vector de Abordaje Cultural</h3>
                        <p>Con 40 años ininterrumpidos en pistas de baile cruzando México y Estados Unidos, 'Hugo Fernández' nos requirió para su nueva etapa solista 'La Leyenda'. Postulamos una amplificación dramática y controlada del 'Carácter Dionisiaco Costeño'.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/hugo fernandez/33ef5d157070675.63728e1e3a561 (1).webp" alt="Sesión Fotográfica Principal">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/hugo fernandez/685c40157070675.63728e1e9b349.webp" alt="Promo Layout">
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Campaña de Guerrilla Documental</h3>
                        <p>Empleamos píldoras documentales capturando intimidad absoluta, logrando miles de suscriptores orgánicos virales adquiridos en métricas semanales y cerrando 7 'sold outs' en la gira nacional consecutiva a menos de 30 días de la reingeniería total.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/hugo fernandez/75e367157070675.63728e1e37f41.webp" alt="Typographic Grid">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/hugo fernandez/a735f4157070675.63728e1e9d4ef.webp" alt="Hugo Promo Pic">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/hugo fernandez/c74122157070675.63728e1e38c6b.webp" alt="Cartel Tour Oficial">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Proyectos/hugo fernandez/fa11a2157070675.63728e1e9c502.webp" alt="Social Media Material">
                    </div>
                </div>
            </div>
        \`,
        'texturas-pbr': \`
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
                        <p class="premise-text"><strong>DEMOSTRACIÓN DE TEÓREMA:</strong> El fotorrealismo hiper-detallado no requiere cámaras, requiere <strong>algoritmos y procesadores gráficos</strong>.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Disertación Táctica 3D</h3>
                        <p>Prescindimos totalmente de escaneos LiDAR y fotogrametría en nuestro ecosistema PBR (Physically Based Rendering). Forzamos al motor gráfico a depender netamente de variables matemáticas abstractas iterando ruido Perlin y Voronoi.</p>
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
        \`,
        'fusion-2d-3d': \`
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
                        <p class="premise-text"><strong>RUPTURA ESPACIAL:</strong> Hackear shaders físicos para <strong>insertar arte manga puramente 2D</strong> reaccionando adherido a geometrías masivas.</p>
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
        \`,
        'pulpo-pbr': \`
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
                        <p class="premise-text"><strong>PRUEBA DE ESTRÉS SSS:</strong> Extraer el límite matemático probando <strong>Dispersión Subsuperficial de Luz profunda</strong> en biología marina hostil.</p>
                    </div>
                    <div class="section-reveal text-reveal">
                        <h3>Reporte Forense del Fotón</h3>
                        <p>Las redes de nodos se configuraron meticulosamente para evaluar simulaciones sintéticas mediante lumen global de luz lateral agresiva. La densidad cromática térmica y refracción interna destiló exquisitez gráfica total.</p>
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/pulpo pbr/0940bd192129183.65d6b0f261274.webp" alt="Luz Lateral Reflejada">
                    </div>
                    <div class="section-reveal media-reveal">
                        <img src="/img/Experimentos/pulpo pbr/ab07fc192129183.65d6b0f1eebf7.webp" alt="Lumen Subsuperficial Activo">
                    </div>
                </div>
            </div>
        \`
    };
EOD;

$content = preg_replace('/    const postData = \{.*?\n    \};/s', $replacement, $content);
file_put_contents('c:/laragon/www/Web-Trylab/public/js/os.js', $content);

echo "PostData replaced via PHP successfully.\n";

?>
