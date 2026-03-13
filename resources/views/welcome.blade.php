<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Try Lab OS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:200,300,400,500,600,700" rel="stylesheet" />

        <!-- Styles & Scripts -->
        <link rel="stylesheet" href="{{ asset('css/os.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
        <script src="{{ asset('js/os.js') }}" defer></script>
    </head>
    <body>
        
        <!-- Animated Wallpaper Layer -->
        <div id="animated-wallpaper">
            <!-- Noise Overlay -->
            <div class="noise-overlay"></div>
            
            <!-- Particle Container -->
            <div id="wallpaper-particles"></div>

            <svg viewBox="0 0 1000 1000" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <linearGradient id="path-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#ff003c;stop-opacity:1" />
                        <stop offset="33%" style="stop-color:#00e5ff;stop-opacity:1" />
                        <stop offset="66%" style="stop-color:#7000ff;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ff8c00;stop-opacity:1" />
                    </linearGradient>
                    <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur stdDeviation="25" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>
                    
                    <!-- Brutalist Grain Filter -->
                    <filter id="grain" x="0" y="0" width="100%" height="100%">
                        <feTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch" />
                        <feColorMatrix type="saturate" values="0" />
                        <feComponentTransfer>
                            <feFuncR type="linear" slope="0.1" />
                            <feFuncG type="linear" slope="0.1" />
                            <feFuncB type="linear" slope="0.1" />
                        </feComponentTransfer>
                    </filter>
                </defs>
                
                <!-- Background helper path for depth -->
                <path id="try-path-bg" d="M1100,600 C850,300 650,900 500,600 C350,300 150,900 -100,600" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="2" />
                
                <path id="try-path" d="M-100,500 C150,200 350,800 500,500 C650,200 850,800 1100,500" fill="none" stroke="url(#path-gradient)" stroke-width="60" stroke-linecap="round" filter="url(#glow)" />
                <text font-family="'Inter', sans-serif" font-size="28" font-weight="900" fill="white" style="letter-spacing: 0.3em; opacity: 0.9;">
                    <textPath href="#try-path" startOffset="0%" id="text-path-1">
                        TRY NEW IDEAS — TRY DIFFERENT EXPERIENCES — TRY TO EXPLORE — TRY SOMETHING BOLD — NEVER STOP TRYING — TRY A DIFFERENT PERSPECTIVE — TRY NOT JUST TO DREAM — TRY NEW IDEAS — TRY DIFFERENT EXPERIENCES — TRY TO EXPLORE — TRY SOMETHING BOLD — NEVER STOP TRYING — TRY A DIFFERENT PERSPECTIVE — TRY NOT JUST TO DREAM — TRY NEW IDEAS — TRY DIFFERENT EXPERIENCES — TRY TO EXPLORE — TRY SOMETHING BOLD — NEVER STOP TRYING — TRY A DIFFERENT PERSPECTIVE — TRY NOT JUST TO DREAM — TRY NEW IDEAS — TRY DIFFERENT EXPERIENCES — TRY TO EXPLORE — TRY SOMETHING BOLD — NEVER STOP TRYING — TRY A DIFFERENT PERSPECTIVE — TRY NOT JUST TO DREAM — TRY NEW IDEAS — TRY DIFFERENT EXPERIENCES — TRY TO EXPLORE — TRY SOMETHING BOLD — NEVER STOP TRYING — TRY A DIFFERENT PERSPECTIVE — TRY NOT JUST TO DREAM — TRY NEW IDEAS — TRY DIFFERENT EXPERIENCES — TRY TO EXPLORE — TRY SOMETHING BOLD — NEVER STOP TRYING — TRY A DIFFERENT PERSPECTIVE — TRY NOT JUST TO DREAM — 
                    </textPath>
                </text>
            </svg>
        </div>

        <!-- Boot Sequence Overlay -->
        <div id="boot-screen">
            <div class="boot-terminal">
                <div class="boot-line">> TRY_LAB_KERNEL_INIT... [OK]</div>
                <div class="boot-line">> LOADING_NEURAL_RESOURCES... [OK]</div>
                <div class="boot-line">> MOUNTING_CREATIVE_DRIVES... [OK]</div>
                <div class="boot-line">> ESTABLISHING_VISUAL_LINK... [READY]</div>
                <div class="boot-line cursor">_</div>
            </div>
            <div class="boot-logo">
                <img src="{{ asset('img/TRY_Lab_logo.png') }}" alt="Logo">
                <span>TRY LAB OS</span>
            </div>
        </div>

        <!-- Desktop Area -->
        <div id="desktop">
            <div class="mobile-status-bar">
                <div class="status-left">10:02 PM</div>
                <div class="status-right">
                    <span class="status-icon">📶</span>
                    <span class="status-icon">🔋 85%</span>
                </div>
            </div>
            
            <!-- App Launcher Container -->
            <div class="desktop-icons-container">
                <!-- Desktop Icon: Our Lab -->
                <div class="desktop-icon app-opener" data-app="lab">
                    <img src="{{ asset('img/TRY_Lab_logo.png') }}" alt="Our Lab">
                    <span>Our Lab</span>
                </div>

                <!-- Desktop Icon: Proyectos (Browser) -->
                <div class="desktop-icon app-opener" data-app="browser">
                    <img src="{{ asset('img/rocket.png') }}" alt="Proyectos">
                    <span>Proyectos</span>
                </div>

                <!-- Desktop Icon: Gallery -->
                <div class="desktop-icon app-opener" data-app="gallery">
                    <img src="{{ asset('img/frame_with_picture.png') }}" alt="Gallery">
                    <span>Gallery</span>
                </div>

                <!-- Desktop Icon: Contact -->
                <div class="desktop-icon app-opener" data-app="contact">
                    <img src="{{ asset('img/speech_balloon.png') }}" alt="Contacto">
                    <span>Contacto</span>
                </div>

                <!-- Desktop Icon: Experimentos -->
                <div class="desktop-icon app-opener" data-app="experiments">
                    <img src="{{ asset('img/test_tube.png') }}" alt="Experimentos">
                    <span>Experimentos</span>
                </div>
            </div>
            
            <!-- Window: Our Lab -->
            <div class="os-window glass" id="window-lab" style="z-index: 100;">
                <div class="window-header with-grain">
                    <div class="window-controls">
                        <button class="control-btn btn-close">X</button>
                        <button class="control-btn btn-minimize">_</button>
                        <button class="control-btn btn-maximize">+</button>
                    </div>
                    <div class="window-title" data-i18n="lab-title">Our Lab - System Info</div>
                    <div style="width: 80px;"></div> <!-- Spacer for flex centering -->
                </div>
                <div class="window-content manifesto-container">
                    <div class="lab-grid"></div>
                    <div class="scanner-line"></div>
                    <div class="manifesto-grid">
                        <section class="manifesto-section" data-section="ruptura">
                            <h2 class="section-number">I</h2>
                            <h3 class="section-title" data-i18n="lab-s1-title">La Filosofía de la Ruptura</h3>
                            <p data-i18n="lab-s1-p1">En un mercado saturado de redundancias y soluciones predecibles, lo "seguro" se ha convertido en el mayor riesgo operativo. En <strong>Try Lab</strong>, entendemos la innovación no como un evento fortuito, sino como una <strong>disciplina de ruptura programada</strong>. No operamos bajo la lógica de la adaptación, sino bajo la arquitectura del cambio.</p>
                            <p data-i18n="lab-s1-p2">Nacimos para cuestionar el statu quo no por rebeldía, sino por una necesidad intelectual de eficiencia. Donde otros ven un concepto terminado, nosotros vemos una estructura que espera ser deconstruida para alcanzar su máximo potencial.</p>
                        </section>

                        <section class="manifesto-section" data-section="expertise">
                            <h2 class="section-number">II</h2>
                            <h3 class="section-title" data-i18n="lab-s2-title">Expertise: El Rigor del Laboratorio</h3>
                            <p data-i18n="lab-s2-p1">Nuestra veteranía es el ancla que permite nuestra audacia. Contamos con años de trayectoria que nos otorgan el derecho intelectual a la experimentación. No "intentamos" para ver qué sucede; experimentamos porque sabemos exactamente qué reglas debemos romper para forzar la evolución de una idea.</p>
                            <p data-i18n="lab-s2-p2">Combinamos el rigor técnico con una irreverencia estratégica. Esta dualidad nos permite transitar desde la concepción teórica más compleja hasta la ejecución técnica más impecable. En Try Lab, la experiencia no es un estado estático, es un legado en movimiento que se redefine con cada desafío.</p>
                        </section>

                        <section class="manifesto-section section-full" data-section="catalizador">
                            <h2 class="section-number">III</h2>
                            <h3 class="section-title" data-i18n="lab-s3-title">El "Toque" de Innovación: El Catalizador</h3>
                            <p data-i18n="lab-s3-p1">Lo que definimos como nuestro "toque de innovación" es, en realidad, un proceso de curaduría de vanguardia. Es la inyección de una identidad única en proyectos que, de otro modo, serían ordinarios.</p>
                            <div class="manifesto-quote">
                                <blockquote data-i18n="lab-quote">"Somos el lugar donde las ideas convencionales vienen a morir para renacer como referentes de mercado."</blockquote>
                            </div>
                            <p data-i18n="lab-s3-p2">No entregamos productos, entregamos nuevos estándares. Somos el catalizador que transforma la visión de nuestros aliados en una realidad disruptiva, asegurando que cada concepto que tocamos posea esa distinción intelectual que separa a los seguidores de los líderes.</p>
                        </section>
                    </div>
                </div>
                <!-- Resizers -->
                <div class="resizer resizer-nw"></div>
                <div class="resizer resizer-ne"></div>
                <div class="resizer resizer-sw"></div>
                <div class="resizer resizer-se"></div>
                <div class="resizer resizer-n"></div>
                <div class="resizer resizer-s"></div>
                <div class="resizer resizer-e"></div>
                <div class="resizer resizer-w"></div>
            </div>

            <!-- Window: Gallery -->
            <div class="os-window glass" id="window-gallery" style="z-index: 100;">
                <div class="window-header with-grain">
                    <div class="window-controls">
                        <button class="control-btn btn-close"></button>
                        <button class="control-btn btn-minimize"></button>
                        <button class="control-btn btn-maximize"></button>
                    </div>
                    <div class="window-title" data-i18n="gallery-title">Gallery - Image Viewer</div>
                    <div style="width: 48px;"></div> <!-- Spacer for flex centering -->
                </div>
                <div class="window-content glass" style="border-radius: 0 !important;">
                    <div class="gallery-grid">
                        <!-- Video Item First -->
                        <div class="gallery-item glass">
                            <video src="{{ asset('img/imagenes/demo.mp4') }}" muted loop></video>
                        </div>
                        <div class="gallery-item glass"><img src="{{ asset('img/imagenes/mezcal_Mesa de trabajo 1.jpg') }}" alt="Mezcal"></div>
                        <div class="gallery-item glass"><img src="{{ asset('img/imagenes/monito2.jpg') }}" alt="Monito"></div>
                        <div class="gallery-item glass"><img src="{{ asset('img/imagenes/tentaculos.jpg') }}" alt="Tentaculos"></div>
                        <div class="gallery-item glass"><img src="{{ asset('img/imagenes/tentaculos_2.jpg') }}" alt="Tentaculos 2"></div>
                        <div class="gallery-item glass"><img src="{{ asset('img/imagenes/tentaculos_3.jpg') }}" alt="Tentaculos 3"></div>
                        <div class="gallery-item glass"><img src="{{ asset('img/imagenes/tentaculos - copia.jpg') }}" alt="Tentaculos Copia"></div>
                    </div>
                </div>
                <!-- Resizers -->
                <div class="resizer resizer-nw"></div>
                <div class="resizer resizer-ne"></div>
                <div class="resizer resizer-sw"></div>
                <div class="resizer resizer-se"></div>
                <div class="resizer resizer-n"></div>
                <div class="resizer resizer-s"></div>
                <div class="resizer resizer-e"></div>
                <div class="resizer resizer-w"></div>
            </div>

            <!-- Window: Browser (Proyectos) -->
            <div class="os-window glass browser-window" id="window-browser" style="z-index: 100;">
                <div class="window-header with-grain">
                    <div class="window-controls">
                        <button class="control-btn btn-close"></button>
                        <button class="control-btn btn-minimize"></button>
                        <button class="control-btn btn-maximize"></button>
                    </div>
                    <!-- Fake Browser URL Bar -->
                    <div class="browser-url-bar">
                        <span class="url-text">https://trylab.studio/proyectos</span>
                    </div>
                    <div style="width: 48px;"></div> <!-- Spacer -->
                </div>
                <div class="window-content glass" style="padding: 0; overflow: hidden;">
                    <div class="portfolio-container">
                        <div id="browser-view-grid" class="portfolio-grid-view">
                            <!-- Hero Section -->
                            <div class="portfolio-hero">
                                <h2 data-i18n="browser-hero-h2">Nuestros Proyectos</h2>
                                <p data-i18n="browser-hero-p">Explora nuestro trabajo más reciente en diseño, desarrollo y arte digital.</p>
                            </div>
                            
                            <!-- Projects Gr                             <div class="project-card" data-project="kick-of-love">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/Kick of love/1a55f3157064525.63727af4e4f3c.webp') }}" alt="Kick of Love">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p1-title">Escenografía: Kick of Love</h3>
                                    <p data-i18n="p1-desc">Diseñamos y construimos sistemas interactivos y escenarios inmersivos para elevar la identidad del festival.</p>
                                </div>
                            </div>
                            <!-- Project 2: Lookgeo -->
                            <div class="project-card" data-project="lookgeo">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/Lookgeo/1ea3cf157163691.63740248ed048.webp') }}" alt="Lookgeo">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p2-title">UX/UI & Social: Lookgeo</h3>
                                    <p data-i18n="p2-desc">Conceptualizamos la identidad social y la interfaz de una innovadora plataforma de bienes raíces basada en metadatos.</p>
                                </div>
                            </div>
                            <!-- Project 3: Maria Jose -->
                            <div class="project-card" data-project="maria-jose">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/Maria jose/37199a192037623.65d579229fcce.webp') }}" alt="Maria Jose Living">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p3-title">Branding: María José Living</h3>
                                    <p data-i18n="p3-desc">Desarrollamos una marca empática enfocada en revitalizar la zona centro de Guadalajara, honrando su herencia arquitectónica.</p>
                                </div>
                            </div>
                            <!-- Project 4: Porras -->
                            <div class="project-card" data-project="porras">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/Porras/07aaf6157162257.6373fbdfdb8e1.webp') }}" alt="Edgardo Porras">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p4-title">Marketing: Edgardo Porras</h3>
                                    <p data-i18n="p4-desc">Ejecutamos una estrategia disruptiva de campaña y redes sociales, transformando por completo la percepción pública del candidato.</p>
                                </div>
                            </div>
                            <!-- Project 5: Soneto -->
                            <div class="project-card" data-project="soneto">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/Soneto/0688da192037295.65d5774840d36.webp') }}" alt="Soneto Residencial">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p5-title">Branding: Soneto Residencial</h3>
                                    <p data-i18n="p5-desc">Capturamos la esencia vibrante de la colonia Americana en un estilo de vida moderno y enérgico diseñado para prosperar.</p>
                                </div>
                            </div>
                            <!-- Project 6: Universum -->
                            <div class="project-card" data-project="universum">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/Universum/0d5945157005911.6371911d653b7.webp') }}" alt="Universum">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p6-title">Re-Branding: Universum</h3>
                                    <p data-i18n="p6-desc">Redefinimos la identidad corporativa de la inmobiliaria para asegurar su registro y consolidar su presencia en medios digitales.</p>
                                </div>
                            </div>
                            <!-- Project 7: Villas Navideñas -->
                            <div class="project-card" data-project="villas-navidenas">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/concepto villas navideñas/1e4a65157011279.6371ba8d5cd33.webp') }}" alt="Villas Navideñas">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p7-title">Instalación: Villas Navideñas</h3>
                                    <p data-i18n="p7-desc">Impulsamos el turismo local creando ecosistemas de iluminación automáticos e instalaciones interactivas inmersivas de bajo costo.</p>
                                </div>
                            </div>
                            <!-- Project 8: Congreso Médico -->
                            <div class="project-card" data-project="congreso-medico">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/congreso regional/0473b2157013733.6371c94a9c844.webp') }}" alt="Congreso de Médicos">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p8-title">Estrategia: Congreso Médico</h3>
                                    <p data-i18n="p8-desc">Salvamos un evento crítico mediante una plataforma M2M y un modelo de monetización rentable, asegurando patrocinios corporativos clave.</p>
                                </div>
                            </div>
                            <!-- Project 9: Hugo Fernandez -->
                            <div class="project-card" data-project="hugo-fernandez">
                                <div class="project-media">
                                    <img src="{{ asset('img/Proyectos/hugo fernandez/28ca1a157070675.63728e1e39a9f.webp') }}" alt="Hugo Fernandez">
                                </div>
                                <div class="project-info">
                                    <h3 data-i18n="p9-title">Identidad: Hugo Fernández</h3>
                                    <p data-i18n="p9-desc">Actualizamos la gráfica identitaria y estrategia digital de esta leyenda musical para conectar orgánicamente con nuevas generaciones.</p>
                                </div>
                            </div>
ta leyenda musical para conectar orgánicamente con nuevas generaciones.</p>
                                </div>
                            </div>
                        </div>
                        </div> <!-- End browser-view-grid -->
                        
                        <!-- Blog Post View -->
                        <div id="browser-view-post" style="display: none;">
                            <div class="post-content-area" id="post-dynamic-content">
                                <!-- JS content goes here (Includes Orb Back Button) -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Resizers -->
                <div class="resizer resizer-nw"></div>
                <div class="resizer resizer-ne"></div>
                <div class="resizer resizer-sw"></div>
                <div class="resizer resizer-se"></div>
                <div class="resizer resizer-n"></div>
                <div class="resizer resizer-s"></div>
                <div class="resizer resizer-e"></div>
                <div class="resizer resizer-w"></div>
            </div>

            <!-- Window: Contact -->
            <div class="os-window glass" id="window-contact" style="z-index: 100;">
                <div class="window-header with-grain">
                    <div class="window-controls">
                        <button class="control-btn btn-close"></button>
                        <button class="control-btn btn-minimize"></button>
                        <button class="control-btn btn-maximize"></button>
                    </div>
                    <div class="window-title" data-i18n="contact-title">Contacto - Try Lab</div>
                    <div style="width: 48px;"></div>
                </div>
                <!-- Isolated scroll area -->
                <div class="window-content app-content contact-app-bg" style="padding: 0; overflow: hidden;">
                    <div class="portfolio-container" style="height: 100%; overflow-y: auto;">
                        <div class="contact-container">
                            <!-- Contact Form -->
                            <div class="contact-form-container">
                                <h2 data-i18n="contact-hero-h2">¿Tienes un proyecto en mente?</h2>
                                <p data-i18n="contact-hero-p">Déjanos tus datos y nos comunicaremos contigo lo antes posible.</p>
                                
                                <!-- Tab Switcher -->
                                <div class="contact-tabs">
                                    <button type="button" class="tab-btn active" data-tab="tab-rapido" data-i18n="contact-tab-1">Contacto Rápido</button>
                                    <button type="button" class="tab-btn" data-tab="tab-asesoria" data-i18n="contact-tab-2">Necesito Asesoría</button>
                                </div>

                                <form id="contactForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="form_type" id="form-type-input" value="rapido">

                                    <!-- Base Info (Shared) -->
                                    <div class="form-group row">
                                        <div class="col-half">
                                            <label for="name" data-i18n="label-name">Nombre</label>
                                            <input type="text" id="name" name="name" required data-i18n-placeholder="placeholder-name" placeholder="Tu nombre">
                                        </div>
                                        <div class="col-half">
                                            <label for="email" data-i18n="label-email">Email</label>
                                            <input type="email" id="email" name="email" required data-i18n-placeholder="placeholder-email" placeholder="tu@email.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" data-i18n="label-phone">WhatsApp / Teléfono</label>
                                        <input type="text" id="phone" name="phone" required data-i18n-placeholder="placeholder-phone" placeholder="Tu número">
                                    </div>

                                    <!-- Tab: Contacto Rápido -->
                                    <div id="tab-rapido" class="tab-content active">
                                        <div class="form-group">
                                            <label data-i18n="label-services">Tipo de Proyecto</label>
                                            <div class="options-group">
                                                <label class="chip-checkbox">
                                                    <input type="checkbox" name="services[]" value="Branding">
                                                    <span data-i18n="service-1">Branding</span>
                                                </label>
                                                <label class="chip-checkbox">
                                                    <input type="checkbox" name="services[]" value="Desarrollo Web">
                                                    <span data-i18n="service-2">Desarrollo Web</span>
                                                </label>
                                                <label class="chip-checkbox">
                                                    <input type="checkbox" name="services[]" value="Audiovisual">
                                                    <span data-i18n="service-3">Audiovisual</span>
                                                </label>
                                                <label class="chip-checkbox">
                                                    <input type="checkbox" name="services[]" value="Otro">
                                                    <span data-i18n="service-4">Otro</span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="message" data-i18n="label-message">Mensaje Adicional</label>
                                            <textarea id="message" name="message" rows="2" data-i18n-placeholder="placeholder-message" placeholder="Detalles extra sobre tu idea..."></textarea>
                                        </div>

                                        <div class="form-group file-group">
                                            <input type="file" id="attachment" name="attachment" class="file-input-hidden" accept=".pdf,.doc,.docx,.jpg,.png">
                                            <label for="attachment" class="file-upload-btn">
                                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                                <span id="file-name-display" data-i18n="label-file">Adjuntar archivo (Opcional)</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Tab: Necesito Asesoría (Diagnostic) -->
                                    <div id="tab-asesoria" class="tab-content" style="display: none;">
                                        <div class="diagnostic-group">
                                            <label class="diagnostic-question" data-i18n="diag-q1">1. ¿Tu sitio web actual es lento o no atrae clientes?</label>
                                            <div class="yes-no-group">
                                                <label class="chip-radio"><input type="radio" name="diag_web" value="Si"><span data-i18n="yes">Sí</span></label>
                                                <label class="chip-radio"><input type="radio" name="diag_web" value="No"><span data-i18n="no">No</span></label>
                                            </div>
                                        </div>
                                        <div class="diagnostic-group">
                                            <label class="diagnostic-question" data-i18n="diag-q2">2. ¿Sientes que la imagen de tu marca se quedó anticuada?</label>
                                            <div class="yes-no-group">
                                                <label class="chip-radio"><input type="radio" name="diag_brand" value="Si"><span data-i18n="yes">Sí</span></label>
                                                <label class="chip-radio"><input type="radio" name="diag_brand" value="No"><span data-i18n="no">No</span></label>
                                            </div>
                                        </div>
                                        <div class="diagnostic-group">
                                            <label class="diagnostic-question" data-i18n="diag-q3">3. ¿Necesitas contenido visual de alta calidad corporativo/redes?</label>
                                            <div class="yes-no-group">
                                                <label class="chip-radio"><input type="radio" name="diag_media" value="Si"><span data-i18n="yes">Sí</span></label>
                                                <label class="chip-radio"><input type="radio" name="diag_media" value="No"><span data-i18n="no">No</span></label>
                                            </div>
                                        </div>
                                        <div class="diagnostic-group" style="padding-bottom: 20px;">
                                            <label class="diagnostic-question" data-i18n="diag-q4">4. ¿Tienes una idea de negocio pero no sabes cómo llevarla al mundo digital?</label>
                                            <div class="yes-no-group">
                                                <label class="chip-radio"><input type="radio" name="diag_startup" value="Si"><span data-i18n="yes">Sí</span></label>
                                                <label class="chip-radio"><input type="radio" name="diag_startup" value="No"><span data-i18n="no">No</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn-submit" data-i18n="btn-submit">Enviar Mensaje</button>
                                </form>
                                
                                <!-- Success Message Container -->
                                <div id="contact-success" class="alert-success" style="display: none;" data-i18n="contact-success">
                                    ✅ ¡Mensaje enviado con éxito! Nos pondremos en contacto pronto.
                                </div>
                                <div id="contact-error" class="alert-error" style="display: none;" data-i18n="contact-error">
                                    ❌ Hubo un error al enviar. Intenta nuevamente.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Resizers (Directly inside window to be always on top) -->
                <div class="resizer resizer-nw"></div>
                <div class="resizer resizer-ne"></div>
                <div class="resizer resizer-sw"></div>
                <div class="resizer resizer-se"></div>
                <div class="resizer resizer-n"></div>
                <div class="resizer resizer-s"></div>
                <div class="resizer resizer-e"></div>
                <div class="resizer resizer-w"></div>
            </div>


            <!-- Window: Experimentos -->
        <div class="os-window glass" id="window-experiments" style="z-index: 100;">
                <div class="window-header with-grain">
                    <div class="window-controls">
                        <button class="control-btn btn-close"></button>
                        <button class="control-btn btn-minimize"></button>
                        <button class="control-btn btn-maximize"></button>
                    </div>
                    <div class="window-title" data-i18n="experiments-title">Experimentos - Lab Blog</div>
                    <div style="width: 48px;"></div>
                </div>
                <div class="window-content glass app-content experiments-bg" style="padding: 0; overflow: hidden;">
                    <div class="portfolio-container" style="background: transparent;">
                        <div id="experiments-view-grid" class="portfolio-grid-view">
                            <div class="portfolio-hero" style="text-align: left; margin-bottom: 40px;">
                                <h2 data-i18n="exp-hero-h2">Laboratorio de Ideas</h2>
                                <p data-i18n="exp-hero-p">Investigaciones, experimentos UI/UX y cosas que hacemos por puro gusto.</p>
                            </div>

                            <div class="projects-grid">
                                <article class="project-card experiment-post" data-exp="texturas-pbr">
                                    <div class="project-media">
                                        <img src="{{ asset('img/Experimentos/Experimentacion de texturas calculadas matematicamente/067324192128517.65d6ac877a6d8.webp') }}" alt="Texturas PBR">
                                    </div>
                                    <div class="project-info">
                                        <div class="exp-date" style="font-size: 10px; opacity: 0.5; margin-bottom: 5px;" data-i18n="exp1-date">FEB 2026</div>
                                        <h3 data-i18n="exp1-title">Texturas Matemáticas PBR</h3>
                                        <p data-i18n="exp1-desc">Exploración de generación procedural de texturas mediante algoritmos matemáticos complejos.</p>
                                    </div>
                                </article>
                                
                                <article class="project-card experiment-post" data-exp="fusion-2d-3d">
                                    <div class="project-media">
                                        <img src="{{ asset('img/Experimentos/Experimentación de accesorios 2D para 3D/3ed364192129515.65d6b336b1f7a.webp') }}" alt="Accesorios 2D en 3D">
                                    </div>
                                    <div class="project-info">
                                        <div class="exp-date" style="font-size: 10px; opacity: 0.5; margin-bottom: 5px;" data-i18n="exp2-date">ENE 2026</div>
                                        <h3 data-i18n="exp2-title">Fusión Visual 2D en 3D</h3>
                                        <p data-i18n="exp2-desc">Integración experimental de accesorios bidimensionales estilizados sobre modelos y entornos tridimensionales.</p>
                                    </div>
                                </article>
                                
                                <article class="project-card experiment-post" data-exp="pulpo-pbr">
                                    <div class="project-media">
                                        <img src="{{ asset('img/Experimentos/pulpo pbr/08c8cf192129183.65d6b0f1ef625.webp') }}" alt="Pulpo PBR">
                                    </div>
                                    <div class="project-info">
                                        <div class="exp-date" style="font-size: 10px; opacity: 0.5; margin-bottom: 5px;" data-i18n="exp3-date">NOV 2025</div>
                                        <h3 data-i18n="exp3-title">Renderizado: Pulpo PBR</h3>
                                        <p data-i18n="exp3-desc">Pruebas de materiales fotorealistas (PBR) y simulación de luz subsuperficial en modelos orgánicos marinos.</p>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <!-- Experiment Post View -->
                        <div id="experiments-view-post" style="display: none;">
                            <div id="exp-dynamic-content" class="post-content-area">
                                <!-- Content injected via JS (Includes Orb Back Button) -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Resizers -->
                <div class="resizer resizer-nw"></div>
                <div class="resizer resizer-ne"></div>
                <div class="resizer resizer-sw"></div>
                <div class="resizer resizer-se"></div>
                <div class="resizer resizer-n"></div>
                <div class="resizer resizer-s"></div>
                <div class="resizer resizer-e"></div>
                <div class="resizer resizer-w"></div>
            </div>

        <!-- Window: DOOM -->
        <div class="os-window glass" id="window-doom" style="z-index: 1001; width: 800px; height: 500px;">
            <div class="window-header">
                <div class="window-controls">
                    <button class="control-btn btn-close"></button>
                    <button class="control-btn btn-minimize"></button>
                    <button class="control-btn btn-maximize"></button>
                </div>
                <div class="window-title">DOOM - Secret Level</div>
                <div style="width: 48px;"></div>
            </div>
            <div class="window-content" style="background: #000; padding: 0; overflow: hidden; display: flex; position: relative;">
                <iframe src="https://diekmann.github.io/wasm-fizzbuzz/doom/" 
                        width="100%" height="100%" frameborder="no" 
                        allow="autoplay; fullscreen"
                        sandbox="allow-scripts allow-same-origin allow-forms allow-pointer-lock"
                        scrolling="no"></iframe>
                <div class="doom-controls-hint">
                    Haz clic dentro para capturar el mouse. ESC para liberar.
                </div>
            </div>
        </div>
    </div> <!-- Close #desktop here -->

        <!-- Taskbar / Dock -->
        <!-- Taskbar / Dock -->
        <div id="taskbar" class="glass taskbar">
            <div class="taskbar-item app-opener" data-app="lab" title="Our Lab">
                <img src="{{ asset('img/TRY_Lab_logo.png') }}" alt="Our Lab">
            </div>
            <div class="taskbar-item app-opener" data-app="browser" title="Proyectos">
                <img src="{{ asset('img/rocket.png') }}" alt="Proyectos">
            </div>
            <div class="taskbar-item app-opener" data-app="gallery" title="Gallery">
                <img src="{{ asset('img/frame_with_picture.png') }}" alt="Gallery">
            </div>
            <div class="taskbar-item app-opener" data-app="contact" title="Contacto">
                <img src="{{ asset('img/speech_balloon.png') }}" alt="Contacto">
            </div>
            <div class="taskbar-item app-opener" data-app="experiments" title="Experimentos">
                <img src="{{ asset('img/test_tube.png') }}" alt="Experimentos">
            </div>
            
            <!-- Separator -->
            <div style="width: 1px; height: 30px; background: rgba(255,255,255,0.2); margin: 0 10px;"></div>

            <div class="taskbar-status">
                <button id="mute-btn" class="taskbar-btn" title="Silenciar">🔊</button>
                <button id="lang-btn" class="taskbar-btn" title="Cambiar Idioma">ES</button>
                <div id="clock" class="clock">12:00 AM</div>
            </div>
        </div>

        <!-- Lightbox for Gallery -->
        <div id="gallery-lightbox" class="lightbox">
            <div class="lightbox-content">
                <span class="lightbox-close">&times;</span>
                <img src="" alt="Expanded Image" id="lightbox-img">
                <video id="lightbox-video" controls style="display:none; max-width:100%; max-height:100%;"></video>
                <div class="lightbox-controls">
                </div>
            </div>
        </div>

        <div id="sleep-screen">
            <div class="sleep-content">
                <div class="sleep-icon">🌙</div>
                <div class="sleep-text">Mueve el mouse para despertar el sistema</div>
            </div>
        </div>

        <!-- Advanced Custom Cursor removed -->
    </body>
</html>
