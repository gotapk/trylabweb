document.addEventListener('DOMContentLoaded', () => {
    // --- Audio System ---
    const AudioSystem = {
        muted: false,
        sounds: {
            startup: 'https://assets.mixkit.co/active_storage/sfx/2568/2568-preview.mp3',
            click: 'https://assets.mixkit.co/active_storage/sfx/2571/2571-preview.mp3',
            open: 'https://assets.mixkit.co/active_storage/sfx/2569/2569-preview.mp3',
            close: 'https://assets.mixkit.co/active_storage/sfx/2570/2570-preview.mp3',
            error: 'https://assets.mixkit.co/active_storage/sfx/2572/2572-preview.mp3'
        },
        play(soundName) {
            if (this.muted) return;
            const audio = new Audio(this.sounds[soundName]);
            audio.volume = 0.4;
            audio.play().catch(e => console.log("Audio play blocked by browser policy"));
        },
        toggleMute() {
            this.muted = !this.muted;
            const muteBtn = document.getElementById('mute-btn');
            if (muteBtn) {
                muteBtn.textContent = this.muted ? '🔇' : '🔊';
                muteBtn.title = this.muted ? 'Activar Sonido' : 'Silenciar';
            }
            return this.muted;
        }
    };

    // --- Boot Sequence Logic ---
    const bootScreen = document.getElementById('boot-screen');
    const bootLines = document.querySelectorAll('.boot-line');

    function scrambleText(element, originalText, duration = 1) {
        let chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$#@&";
        let tl = gsap.timeline();
        let displayObject = { value: 0 };

        tl.to(displayObject, {
            value: originalText.length,
            duration: duration,
            ease: "none",
            onUpdate: () => {
                let currentLen = Math.floor(displayObject.value);
                let scrambled = originalText.substring(0, currentLen);
                for (let i = currentLen; i < originalText.length; i++) {
                    scrambled += chars[Math.floor(Math.random() * chars.length)];
                }
                element.textContent = scrambled;
            },
            onComplete: () => {
                element.textContent = originalText;
            }
        });
        return tl;
    }

    if (bootScreen && bootLines.length) {
        let masterTl = gsap.timeline({
            onComplete: () => {
                gsap.to(bootScreen, {
                    opacity: 0,
                    duration: 0.5,
                    onComplete: () => {
                        bootScreen.style.display = 'none';
                        document.body.classList.add('os-ready');
                    }
                });
            }
        });

        bootLines.forEach((line, index) => {
            const originalText = line.textContent;
            line.textContent = "";
            masterTl.add(() => {
                line.style.opacity = 1;
                scrambleText(line, originalText, 0.4);
            }, index * 0.6);
        });

        masterTl.to(bootScreen, {
            filter: "invert(1) contrast(500%) sepia(100%) hue-rotate(300deg)",
            duration: 0.05,
            repeat: 5,
            yoyo: true,
            delay: 0.3
        });
    }

    // --- Clock Logic ---
    const clockElement = document.getElementById('clock');
    function updateClock() {
        const now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        const timeString = `${hours}:${minutes} ${ampm}`;
        if (clockElement) clockElement.textContent = timeString;
        const mobileClock = document.querySelector('.status-left');
        if (mobileClock) mobileClock.textContent = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();

    // --- DOOM Easter Egg Trigger ---
    let clockClicks = 0;
    let clockTimer = null;
    if (clockElement) {
        clockElement.addEventListener('click', () => {
            clockClicks++;
            if (clockTimer) clearTimeout(clockTimer);
            clockTimer = setTimeout(() => { clockClicks = 0; }, 2000);
            if (clockClicks >= 15) {
                openApp('doom');
                clockClicks = 0;
                setTimeout(() => {
                    const doomIframe = document.querySelector('#window-doom iframe');
                    if (doomIframe) doomIframe.focus();
                }, 500);
            }
        });
    }

    // --- Window Management ---
    const windows = document.querySelectorAll('.os-window');
    let highestZIndex = 10000;
    let currentActivePost = null; // Track { id, winName }

    function bringToFront(win, e) {
        if (e && (e.target.closest('.window-controls') || e.target.closest('.resizer'))) {
            // Don't re-order if clicking controls or resizers to avoid event disruption
            return;
        }

        AudioSystem.play('click');
        highestZIndex++;
        win.style.setProperty('z-index', highestZIndex, 'important');

        // Only move in DOM if it's not already at the end
        if (win.parentNode && win.parentNode.lastElementChild !== win) {
            win.parentNode.appendChild(win);
        }

        document.querySelectorAll('.taskbar-item').forEach(item => item.classList.remove('active'));
        const appId = win.id.replace('window-', '');
        const taskbarItem = document.querySelector(`.taskbar-item[data-app="${appId}"]`);
        if (taskbarItem) taskbarItem.classList.add('active');
    }

    // --- Dynamic Window Responsiveness ---
    const windowObserver = new ResizeObserver(entries => {
        for (let entry of entries) {
            const win = entry.target;
            if (entry.contentRect.width < 850) {
                win.classList.add('window-narrow');
            } else {
                win.classList.remove('window-narrow');
            }
        }
    });

    // Observe initial windows
    windows.forEach(win => windowObserver.observe(win));

    // Expose observer for new windows
    window.osWindowObserver = windowObserver;
    windows.forEach(win => windowObserver.observe(win));

    windows.forEach(win => {
        win.addEventListener('mousedown', (e) => bringToFront(win, e));

        const btnClose = win.querySelector('.btn-close');
        const btnMinimize = win.querySelector('.btn-minimize');
        const btnMaximize = win.querySelector('.btn-maximize');

        if (btnClose) {
            const closeHandler = (e) => {
                e.preventDefault();
                e.stopPropagation();
                AudioSystem.play('close');
                win.classList.remove('open', 'maximized', 'minimized');
                const appId = win.id.replace('window-', '');
                const taskbarItem = document.querySelector(`.taskbar-item[data-app="${appId}"]`);
                if (taskbarItem) taskbarItem.classList.remove('active');
                if (appId === 'browser' || appId === 'experiments') {
                    currentActivePost = null;
                    const viewGrid = document.getElementById(`${appId === 'browser' ? 'browser' : 'experiments'}-view-grid`);
                    const viewPost = document.getElementById(`${appId === 'browser' ? 'browser' : 'experiments'}-view-post`);
                    if (viewGrid && viewPost) {
                        viewPost.style.display = 'none';
                        viewGrid.style.display = 'block';
                    }
                }
            };
            btnClose.addEventListener('click', closeHandler);
            btnClose.addEventListener('touchstart', closeHandler, { passive: false });
        }

        if (btnMinimize) {
            const minimizeHandler = (e) => {
                e.preventDefault();
                e.stopPropagation();
                win.classList.toggle('minimized');
                if (!win.classList.contains('minimized')) win.classList.add('open');
            };
            btnMinimize.addEventListener('click', minimizeHandler);
            btnMinimize.addEventListener('touchstart', minimizeHandler, { passive: false });
        }

        if (btnMaximize) {
            const maximizeHandler = (e) => {
                e.preventDefault();
                e.stopPropagation();
                win.classList.toggle('maximized');
            };
            btnMaximize.addEventListener('click', maximizeHandler);
            btnMaximize.addEventListener('touchstart', maximizeHandler, { passive: false });
        }

        // Window Draggable Logic (Optimized & Touch-friendly)
        const header = win.querySelector('.window-header');
        let isWindowDragging = false;
        let diffX = 0, diffY = 0;

        const onWindowMove = (e) => {
            if (!isWindowDragging || window.innerWidth < 660) return;
            const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
            const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;

            let newLeft = clientX - diffX;
            let newTop = clientY - diffY;
            if (newTop < 0) newTop = 0;

            win.style.left = `${newLeft}px`;
            win.style.top = `${newTop}px`;
            if (window.ScrollTrigger) window.ScrollTrigger.refresh();
        };

        const onWindowEnd = () => {
            if (isWindowDragging) {
                isWindowDragging = false;
                if (header) header.style.cursor = 'default';
                document.removeEventListener('mousemove', onWindowMove);
                document.removeEventListener('mouseup', onWindowEnd);
                document.removeEventListener('touchmove', onWindowMove);
                document.removeEventListener('touchend', onWindowEnd);
            }
        };

        if (header) {
            const onWindowStart = (e) => {
                if (window.innerWidth < 660) return;
                if (win.classList.contains('maximized')) return;

                isWindowDragging = true;
                bringToFront(win);
                const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;

                diffX = clientX - win.offsetLeft;
                diffY = clientY - win.offsetTop;
                header.style.cursor = 'grabbing';

                document.addEventListener('mousemove', onWindowMove);
                document.addEventListener('mouseup', onWindowEnd);
                document.addEventListener('touchmove', onWindowMove, { passive: false });
                document.addEventListener('touchend', onWindowEnd);
            };
            header.addEventListener('mousedown', onWindowStart);
            header.addEventListener('touchstart', onWindowStart, { passive: true });
        }
    });

    // App Openers
    const openers = document.querySelectorAll('.app-opener');
    openers.forEach(opener => {
        opener.addEventListener('click', () => {
            const appId = opener.getAttribute('data-app');
            openApp(appId);
        });
    });

    function openApp(appId) {
        console.log("EXEC openApp for:", appId);
        const win = document.getElementById(`window-${appId}`);
        if (win) {
            AudioSystem.play('open');
            win.classList.remove('minimized');
            win.classList.add('open');

            if (window.innerWidth <= 1024) {
                win.classList.add('maximized');
            }

            // Mobile focus: Close/Hide other windows to avoid layering blocks
            if (window.innerWidth < 660) {
                windows.forEach(w => {
                    if (w !== win) {
                        w.classList.remove('open');
                        const otherAppId = w.id.replace('window-', '');
                        const otherTaskItem = document.querySelector(`.taskbar-item[data-app="${otherAppId}"]`);
                        if (otherTaskItem) otherTaskItem.classList.remove('active');
                    }
                });
            }

            bringToFront(win);

            // --- DEEP INNOVATION: LAB APP INTRO ---
            if (appId === 'lab') {
                const sections = win.querySelectorAll('.manifesto-section');
                const scanner = win.querySelector('.scanner-line');
                const grid = win.querySelector('.lab-grid');

                let labTl = gsap.timeline();

                // Reset states
                gsap.set(sections, { opacity: 0, y: 50, filter: "blur(10px)" });
                gsap.set(scanner, { top: "0%", opacity: 0 });
                gsap.set(grid, { opacity: 0, scale: 1.2 });

                // 1. Initial Glitch / Scaled reveal (More aggressive)
                labTl.fromTo(win,
                    { scale: 0.9, filter: "brightness(10) contrast(2000%) invert(1)" },
                    { scale: 1, filter: "brightness(1) contrast(100%) invert(0)", duration: 0.3, ease: "power4.in" }
                );

                // 2. Grid Activation
                labTl.to(grid, { opacity: 1, scale: 1, duration: 0.5, ease: "steps(4)" }, "-=0.1");

                // 3. Scanner Pass (Faster)
                labTl.to(scanner, { opacity: 1, duration: 0.1 });
                labTl.to(scanner, {
                    top: "100%",
                    duration: 1,
                    ease: "power1.inOut",
                    onUpdate: () => {
                        // Activate sections as scanner passes over them
                        const scannerPos = parseFloat(scanner.style.top);
                        sections.forEach((section, idx) => {
                            const sectionPos = (idx / sections.length) * 100;
                            if (scannerPos > sectionPos && section.style.opacity == 0) {
                                gsap.to(section, {
                                    opacity: 1,
                                    y: 0,
                                    filter: "blur(0px)",
                                    duration: 0.2,
                                    ease: "power4.out"
                                });
                                // Scramble title on reveal
                                const title = section.querySelector('.section-title');
                                if (title) scrambleText(title, title.textContent, 0.5);
                            }
                        });
                    },
                    onComplete: () => {
                        gsap.to(scanner, { opacity: 0, duration: 0.5 });
                    }
                }, "-=1");

                // 4. Subtle background parallax for the grid
                win.addEventListener('mousemove', (e) => {
                    const rect = win.getBoundingClientRect();
                    const moveX = (e.clientX - rect.left - rect.width / 2) / 30;
                    const moveY = (e.clientY - rect.top - rect.height / 2) / 30;
                    gsap.to(grid, { x: moveX, y: moveY, duration: 1, ease: "power2.out" });
                });
            }
        }
    }

    // --- Contact Form ---
    const contactForm = document.getElementById('contactForm');
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const formTypeInput = document.getElementById('form-type-input');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetTab = btn.getAttribute('data-tab');
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.style.display = 'none');
            btn.classList.add('active');
            const targetContent = document.getElementById(targetTab);
            if (targetContent) targetContent.style.display = 'block';
            if (formTypeInput) formTypeInput.value = targetTab === 'tab-rapido' ? 'rapido' : 'asesoria';
        });
    });

    const fileInput = document.getElementById('attachment');
    const fileNameDisplay = document.getElementById('file-name-display');
    if (fileInput && fileNameDisplay) {
        fileInput.addEventListener('change', (e) => {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Adjuntar archivo (Opcional)';
            fileNameDisplay.textContent = fileName;
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const btn = this.querySelector('.btn-submit');
            const successMsg = document.getElementById('contact-success');
            const errorMsg = document.getElementById('contact-error');
            btn.textContent = 'Enviando...';
            btn.disabled = true;
            const formData = new FormData(this);
            fetch('/api/contact', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': formData.get('_token') },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    btn.textContent = 'Enviar Mensaje';
                    btn.disabled = false;
                    if (data.success) {
                        AudioSystem.play('startup');
                        if (successMsg) successMsg.style.display = 'block';
                        this.reset();
                        if (fileNameDisplay) {
                            const lang = i18n.current.toUpperCase();
                            fileNameDisplay.textContent = lang === 'ES' ? 'Adjuntar archivo (Opcional)' : 'Attach file (Optional)';
                        }
                    } else {
                        AudioSystem.play('error');
                        if (errorMsg) errorMsg.style.display = 'block';
                    }
                })
                .catch(() => {
                    btn.textContent = 'Enviar Mensaje';
                    btn.disabled = false;
                    if (errorMsg) errorMsg.style.display = 'block';
                });
        });
    }

    // --- Gallery & Wallpaper ---
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxVideo = document.getElementById('lightbox-video');

    if (galleryItems.length && lightbox) {
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const img = item.querySelector('img');
                const video = item.querySelector('video');

                if (img) {
                    lightboxImg.src = img.src;
                    lightboxImg.style.display = 'block';
                    lightboxVideo.style.display = 'none';
                    lightboxVideo.pause();
                } else if (video) {
                    lightboxVideo.src = video.src;
                    lightboxVideo.style.display = 'block';
                    lightboxImg.style.display = 'none';
                    lightboxVideo.play();
                }
                lightbox.classList.add('active');
            });
        });

        lightbox.querySelector('.lightbox-close').addEventListener('click', () => {
            lightbox.classList.remove('active');
            lightboxVideo.pause();
            lightboxVideo.src = "";
        });
    }

    // --- Portfolio & Experiments Logic ---
    const getDynamicPostData = (id, type) => {
        const dataList = window.BACKEND_DATA ? window.BACKEND_DATA[type] : [];
        const item = dataList.find(i => String(i.id) === String(id));

        if (!item) return null;

        let mainImg = item.image_path;
        if (mainImg.startsWith('img/')) {
            // If it's a directory path, add thumbnail.jpg
            if (!mainImg.toLowerCase().match(/\.(jpg|jpeg|png|webp|gif)$/)) {
                mainImg = mainImg.endsWith('/') ? mainImg + 'thumbnail.jpg' : mainImg + '/thumbnail.jpg';
            }
            mainImg = '/' + mainImg;
        } else {
            mainImg = '/storage/' + mainImg;
        }

        const lang = i18n.current.toUpperCase();
        const visitText = lang === 'ES' ? 'VISITAR PROYECTO' : 'VISIT PROJECT';

        // Select localized data
        const name = (lang === 'EN' && item.name_en) ? item.name_en : item.name;
        const description = (lang === 'EN' && item.description_en) ? item.description_en : item.description;
        const category = (lang === 'EN' && item.category_en) ? item.category_en : item.category;

        // Split description by sections if structured with [HEADER]
        let formattedBody = '';
        const safeDesc = description || '';
        if (safeDesc.includes('[')) {
            const sections = safeDesc.split(/(\[[A-Z\s]+\]:?)/g);
            let currentContent = '';
            sections.forEach(part => {
                if (part.match(/\[[A-Z\s]+\]:?/)) {
                    if (currentContent && currentContent.trim()) {
                        formattedBody += `<p class="premise-text">${currentContent.trim()}</p></div>`;
                    }
                    formattedBody += `<div class="report-section section-reveal"><div class="report-section-header">${part.replace(/[\[\]:]/g, '')}</div>`;
                    currentContent = '';
                } else {
                    currentContent += part;
                }
            });
            if (currentContent && currentContent.trim()) {
                formattedBody += `<p class="premise-text">${currentContent.trim()}</p></div>`;
            }
        } else {
            formattedBody = `<div class="report-section section-reveal"><div class="report-section-header">${lang === 'ES' ? 'SINOPSIS' : 'SYNOPSIS'}</div><p class="premise-text">${safeDesc.replace(/\n/g, '<br>')}</p></div>`;
        }

        // Render Gallery if present
        let extraGalleryHtml = "";
        if (item.images && Array.isArray(item.images) && item.images.length > 0) {
            extraGalleryHtml = `<div class="report-section section-reveal">
                <div class="report-section-header">${lang === 'ES' ? 'EVIDENCIA VISUAL' : 'VISUAL EVIDENCE'}</div>
                <div class="immersive-gallery">
                    ${item.images.map(img => {
                const src = img.startsWith('img/') ? '/' + img : '/storage/' + img;
                if (img.toLowerCase().endsWith('.mp4')) {
                    return `<div class="gallery-block"><video src="${src}" autoplay muted loop class="immersive-asset"></video></div>`;
                }
                return `<div class="gallery-block"><img src="${src}" class="immersive-asset" alt="Laboratory Asset"></div>`;
            }).join('')}
                </div>
            </div>`;
        }

        return `<div class="premium-post">
            <div class="scanner-line"></div>
            <div class="btn-back-orb"><i>←</i></div>
            <div class="immersive-hero">
                <img src="${mainImg}" class="hero-parallax-bg" alt="${name}">
                <div class="hero-overlay">
                    <span class="hero-tag">TECH-REPORT // V.${Math.floor(Math.random() * 900) + 100}</span>
                    <h1 class="hero-title">${name}</h1>
                </div>
            </div>
            
            <div class="immersive-body">
                <aside class="lab-metadata-sidebar">
                    <div class="metadata-item">
                        <span class="metadata-label">${lang === 'ES' ? 'ID PROYECTO' : 'PROJECT ID'}</span>
                        <span class="metadata-value">TRYLAB-26-${item.id.toString().padStart(3, '0')}</span>
                    </div>
                    <div class="metadata-item">
                        <span class="metadata-label">${lang === 'ES' ? 'CLASIFICACIÓN' : 'CLASSIFICATION'}</span>
                        <span class="metadata-value">${category.toUpperCase()}</span>
                    </div>
                    <div class="metadata-item">
                        <span class="metadata-label">${lang === 'ES' ? 'ESTADO' : 'STATUS'}</span>
                        <span class="metadata-value">VALIDATED_RECOVERY</span>
                    </div>
                    <div class="metadata-item">
                        <span class="metadata-label">${lang === 'ES' ? 'FECHA' : 'TIMESTAMP'}</span>
                        <span class="metadata-value">${new Date().toISOString().split('T')[0]}</span>
                    </div>
                </aside>

                <main class="report-content-flow">
                    ${formattedBody}
                    ${extraGalleryHtml}
                    ${item.link ? `<div class="report-section section-reveal" style="text-align:center;">
                        <a href="${item.link}" target="_blank" class="pixel-btn" style="text-decoration:none; padding: 15px 40px; border: 1px solid white; color: white; display: inline-block; font-weight: bold; letter-spacing: 2px;">${visitText}</a>
                    </div>` : ''}
                </main>
            </div>
        </div>`;
    };

    function initImmersiveAnimations(winId) {
        const win = document.getElementById(`window-${winId}`);
        const scroller = win.querySelector('.portfolio-container') || win.querySelector('.window-content');
        if (!scroller) return;
        if (window.ScrollTrigger) {
            window.ScrollTrigger.getAll().forEach(st => { if (st.scroller === scroller) st.kill(); });
            const heroBg = scroller.querySelector('.hero-parallax-bg');
            if (heroBg) {
                gsap.to(heroBg, {
                    y: "30%",
                    ease: "none",
                    scrollTrigger: {
                        trigger: scroller.querySelector('.immersive-hero'),
                        scroller: scroller,
                        start: "top top",
                        end: "bottom top",
                        scrub: true
                    }
                });
            }
            scroller.querySelectorAll('.section-reveal').forEach(section => {
                gsap.to(section, {
                    opacity: 1,
                    y: 0,
                    duration: 0.4,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: section,
                        scroller: scroller,
                        start: "top 95%",
                        toggleActions: "play none none none"
                    }
                });
            });
            window.ScrollTrigger.refresh();
        }
    }

    function openPost(id, winName, isRefresh = false) {
        const win = document.getElementById(`window-${winName}`);
        const grid = win.querySelector('[id$="-view-grid"]');
        const postView = win.querySelector('[id$="-view-post"]');
        const contentArea = win.querySelector('[id$="-dynamic-content"]');
        const scroller = win.querySelector('.portfolio-container') || win.querySelector('.window-content');

        const type = winName === 'browser' ? 'projects' : 'experiments';
        const html = getDynamicPostData(id, type);

        if (html) {
            currentActivePost = { id, winName };
            const oldScrollTop = scroller ? scroller.scrollTop : 0;

            contentArea.innerHTML = html;

            if (!isRefresh) {
                grid.style.display = 'none';
                postView.style.display = 'block';
                if (scroller) scroller.scrollTop = 0;
            } else {
                if (scroller) scroller.scrollTop = oldScrollTop;
            }

            const backOrb = contentArea.querySelector('.btn-back-orb');
            if (backOrb) {
                backOrb.onclick = () => {
                    currentActivePost = null;
                    postView.style.display = 'none';
                    grid.style.display = 'block';
                    scroller.scrollTop = 0;
                };
            }
            setTimeout(() => initImmersiveAnimations(winName), 100);
        }
    }

    document.querySelectorAll('.project-card').forEach(card => {
        card.addEventListener('click', () => {
            const id = card.getAttribute('data-id');
            const type = card.getAttribute('data-type');
            if (id) openPost(id, type === 'projects' ? 'browser' : 'experiments');
        });
    });

    // --- Resizers ---
    windows.forEach(win => {
        const resizers = win.querySelectorAll('.resizer');
        resizers.forEach(resizer => {
            resizer.addEventListener('mousedown', function (e) {
                if (window.innerWidth < 660) return;
                e.preventDefault();
                e.stopPropagation();
                const startX = e.clientX, startY = e.clientY;
                const startWidth = win.offsetWidth, startHeight = win.offsetHeight;
                const startTop = win.offsetTop, startLeft = win.offsetLeft;
                function doDrag(e) {
                    if (resizer.className.includes('resizer-e')) win.style.width = startWidth + (e.clientX - startX) + 'px';
                    if (resizer.className.includes('resizer-s')) win.style.height = startHeight + (e.clientY - startY) + 'px';
                    if (resizer.className.includes('resizer-w')) {
                        win.style.width = startWidth - (e.clientX - startX) + 'px';
                        win.style.left = startLeft + (e.clientX - startX) + 'px';
                    }
                    if (resizer.className.includes('resizer-n')) {
                        win.style.height = startHeight - (e.clientY - startY) + 'px';
                        win.style.top = startTop + (e.clientY - startY) + 'px';
                    }
                    if (window.ScrollTrigger) window.ScrollTrigger.refresh();
                }
                function stopDrag() {
                    document.documentElement.removeEventListener('mousemove', doDrag);
                    document.documentElement.removeEventListener('mouseup', stopDrag);
                }
                document.documentElement.addEventListener('mousemove', doDrag);
                document.documentElement.addEventListener('mouseup', stopDrag);
            });
        });
    });

    // --- Sleep Mode ---
    let idleTime = 0;
    const sleepScreen = document.getElementById('sleep-screen');
    function resetIdleTimer() {
        idleTime = 0;
        if (sleepScreen) sleepScreen.classList.remove('active');
    }
    setInterval(() => {
        idleTime++;
        if (idleTime >= 60 && sleepScreen) sleepScreen.classList.add('active');
    }, 1000);
    ['mousemove', 'mousedown', 'keypress', 'touchstart', 'scroll'].forEach(evt => {
        window.addEventListener(evt, resetIdleTimer, true);
    });

    // --- Desktop Icons ---
    // Dragging and reordering disabled per user request
    const desktopIcons = document.querySelectorAll('.desktop-icon');
    const desktopArea = document.getElementById('desktop');

    // --- Animated Wallpaper (GSAP Flow) ---
    function initAnimatedWallpaper() {
        const textPath1 = document.getElementById('text-path-1');
        const wallPath = document.getElementById('try-path');
        const wallPathBg = document.getElementById('try-path-bg');
        if (!textPath1 || !wallPath) return;

        // Main Text Flow (Truly Infinite Pull Logic)
        gsap.set(textPath1, { attr: { startOffset: "0%" } });
        gsap.to(textPath1, {
            attr: { startOffset: "-100%" }, // Pull text in from the right
            duration: 150, // Ultra slow for liquid elegance
            repeat: -1,
            ease: "none"
        });

        // Background Path Flow (Reverse)
        if (wallPathBg) {
            wallPathBg.classList.add('second-flow-aura');
            gsap.to(wallPathBg, {
                attr: { d: "M-100,400 C150,700 350,100 500,400 C650,700 850,100 1100,400" },
                duration: 30, // Even slower
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
        }

        // Subtle Path distortion/blob effect
        gsap.to(wallPath, {
            attr: { d: "M-100,600 C200,300 400,900 600,600 C800,300 1000,900 1200,600" },
            duration: 15, // Even slower
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // Breathing Glow Effect
        gsap.to('#glow feGaussianBlur', {
            attr: { stdDeviation: 35 },
            duration: 4,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // Viscous Magnetic Bending
        window.addEventListener('mousemove', (e) => {
            const x = (e.clientX / window.innerWidth - 0.5);
            const y = (e.clientY / window.innerHeight - 0.5);

            gsap.to('#animated-wallpaper svg', {
                x: x * 70,
                y: y * 70,
                duration: 4, // More viscosity
                ease: "sine.out"
            });

            // Extreme Smooth Liquid Deformation
            gsap.to(wallPath, {
                attr: { d: `M-100,${500 + y * 150} C${150 + x * 150},${200 + y * 150} ${350 + x * 150},${800 + y * 150} ${500 + x * 150},${500 + y * 150} C${650 + x * 150},${200 + y * 150} ${850 + x * 150},${800 + y * 150} 1100,${500 + y * 150}` },
                duration: 4, // Much more viscous feel
                ease: "sine.out"
            });

            if (wallPathBg) {
                gsap.to(wallPathBg, {
                    attr: { d: `M-100,${400 + y * 80} C${150 + x * 80},${600 + y * 80} ${350 + x * 80},${200 + y * 80} ${500 + x * 80},${400 + y * 80} C${650 + x * 80},${600 + y * 80} ${850 + x * 80},${200 + y * 80} 1100,${400 + y * 80}` },
                    duration: 4.5,
                    ease: "sine.out"
                });
            }
        });

        initWallpaperParticles();
    }

    function initWallpaperParticles() {
        const container = document.getElementById('wallpaper-particles');
        if (!container) return;

        const particleCount = 50;
        for (let i = 0; i < particleCount; i++) {
            const p = document.createElement('div');
            p.className = 'particle';
            const size = Math.random() * 10 + 2;
            const x = Math.random() * 100;
            const y = Math.random() * 100;
            const blur = Math.random() * 3;

            p.style.width = `${size}px`;
            p.style.height = `${size}px`;
            p.style.left = `${x}%`;
            p.style.top = `${y}%`;
            p.style.opacity = Math.random() * 0.6 + 0.2;
            p.style.filter = `blur(${blur}px)`;

            container.appendChild(p);

            // Infinite floating movement
            gsap.to(p, {
                x: (Math.random() - 0.5) * 300,
                y: (Math.random() - 0.5) * 300,
                duration: Math.random() * 25 + 15,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });
        }
    }

    initAnimatedWallpaper();

    // --- Custom Cursor Logic ---
    // Removed to use native pixelated CSS cursor.

    // --- Localization System ---
    const i18n = {
        current: 'ES',
        translations: {
            'ES': {
                'lab-title': 'Our Lab - Información del Sistema',
                'gallery-title': 'Galería - Visor de Imágenes',
                'browser-title': 'Navegador - Proyectos',
                'contact-title': 'Contacto - Try Lab',
                'experiments-title': 'Experimentos - Lab Blog',
                'proyectos': 'Proyectos',
                'gallery': 'Gallery',
                'contacto': 'Contacto',
                'experimentos': 'Experimentos',
                'mute': 'Silenciar',
                'unmute': 'Activar Sonido',
                'change-lang': 'Cambiar Idioma',
                'lab-btn': 'ES',
                // Manifesto
                'lab-s1-title': 'La Filosofía de la Ruptura',
                'lab-s1-p1': 'En un mercado saturado de redundancias y soluciones predecibles, lo "seguro" se ha convertido en el mayor riesgo operativo. En <strong>Try Lab</strong>, entendemos la innovación no como un evento fortuito, sino como una <strong>disciplina de ruptura programada</strong>. No operamos bajo la lógica de la adaptación, sino bajo la arquitectura del cambio.',
                'lab-s1-p2': 'Nacimos para cuestionar el statu quo no por rebeldía, sino por una necesidad intelectual de eficiencia. Donde otros ven un concepto terminado, nosotros vemos una estructura que espera ser deconstruida para alcanzar su máximo potencial.',
                'lab-s2-title': 'Expertise: El Rigor del Laboratorio',
                'lab-s2-p1': 'Nuestra veteranía es el ancla que permite nuestra audacia. Contamos con años de trayectoria que nos otorgan el derecho intelectual a la experimentación. No "intentamos" para ver qué sucede; experimentamos porque sabemos exactamente qué reglas debemos romper para forzar la evolución de una idea.',
                'lab-s2-p2': 'Combinamos el rigor técnico con una irreverencia estratégica. Esta dualidad nos permite transitar desde la concepción teórica más compleja hasta la ejecución técnica más impecable. En Try Lab, la experiencia no es un estado estático, es un legado en movimiento que se redefine con cada desafío.',
                'lab-s3-title': 'El "Toque" de Innovación: El Catalizador',
                'lab-s3-p1': 'Lo que definimos como nuestro "toque de innovación" es, en realidad, un proceso de curaduría de vanguardia. Es la inyección de una identidad única en proyectos que, de otro modo, serían ordinarios.',
                'lab-quote': '"Somos el lugar donde las ideas convencionales vienen a morir para renacer como referentes de mercado."',
                'lab-s3-p2': 'No entregamos productos, entregamos nuevos estándares. Somos el catalizador que transforma la visión de nuestros aliados en una realidad disruptiva, asegurando que cada concepto que tocamos posea esa distinción intelectual que separa a los seguidores de los líderes.',
                // Browser
                'browser-hero-h2': 'Nuestros Proyectos',
                'browser-hero-p': 'Explora nuestro trabajo más reciente en diseño, desarrollo y arte digital.',
                'p1-title': 'Escenografía: Kick of Love',
                'p1-desc': 'Diseñamos y construimos sistemas interactivos y escenarios inmersivos para elevar la identidad del festival.',
                'p2-title': 'UX/UI & Social: Lookgeo',
                'p2-desc': 'Conceptualizamos la identidad social y la interfaz de una innovadora plataforma de bienes raíces basada en metadatos.',
                'p3-title': 'Branding: María José Living',
                'p3-desc': 'Desarrollamos una marca empática enfocada en revitalizar la zona centro de Guadalajara, honrando su herencia arquitectónica.',
                'p4-title': 'Marketing: Edgardo Porras',
                'p4-desc': 'Ejecutamos una estrategia disruptiva de campaña y redes sociales, transformando por completo la percepción pública del candidato.',
                'p5-title': 'Branding: Soneto Residencial',
                'p5-desc': 'Capturamos la esencia vibrante de la colonia Americana en un estilo de vida moderno y enérgico diseñado para prosperar.',
                'p6-title': 'Re-Branding: Universum',
                'p6-desc': 'Redefinimos la identidad corporativa de la inmobiliaria para asegurar su registro y consolidar su presencia en medios digitales.',
                'p7-title': 'Instalación: Villas Navideñas',
                'p7-desc': 'Impulsamos el turismo local creando ecosistemas de iluminación automáticos e instalaciones interactivas inmersivas de bajo costo.',
                'p8-title': 'Estrategia: Congreso Médico',
                'p8-desc': 'Salvamos un evento crítico mediante una plataforma M2M y un modelo de monetización rentable, asegurando patrocinios corporativos clave.',
                'p9-title': 'Identidad: Hugo Fernández',
                'p9-desc': 'Actualizamos la gráfica identitaria y estrategia digital de esta leyenda musical para conectar orgánicamente con nuevas generaciones.',
                // Contact
                'contact-hero-h2': '¿Tienes un proyecto en mente?',
                'contact-hero-p': 'Déjanos tus datos y nos comunicaremos contigo lo antes posible.',
                'contact-tab-1': 'Contacto Rápido',
                'contact-tab-2': 'Necesito Asesoría',
                'label-name': 'Nombre',
                'label-email': 'Email',
                'label-phone': 'WhatsApp / Teléfono',
                'label-services': 'Tipo de Proyecto',
                'label-message': 'Mensaje Adicional',
                'label-file': 'Adjuntar archivo (Opcional)',
                'placeholder-name': 'Tu nombre',
                'placeholder-email': 'tu@email.com',
                'placeholder-phone': 'Tu número',
                'placeholder-message': 'Detalles extra sobre tu idea...',
                'service-1': 'Branding',
                'service-2': 'Desarrollo Web',
                'service-3': 'Audiovisual',
                'service-4': 'Otro',
                'diag-q1': '1. ¿Tu sitio web actual es lento o no atrae clientes?',
                'diag-q2': '2. ¿Sientes que la imagen de tu marca se quedó anticuada?',
                'diag-q3': '3. ¿Necesitas contenido visual de alta calidad corporativo/redes?',
                'diag-q4': '4. ¿Tienes una idea de negocio pero no sabes cómo llevarla al mundo digital?',
                'yes': 'Sí',
                'no': 'No',
                'btn-submit': 'Enviar Mensaje',
                'contact-success': '✅ ¡Mensaje enviado con éxito! Nos pondremos en contacto pronto.',
                'contact-error': '❌ Hubo un error al enviar. Intenta nuevamente.',
                // Experiments
                'exp-hero-h2': 'Laboratorio de Ideas',
                'exp-hero-p': 'Investigaciones, experimentos UI/UX y cosas que hacemos por puro gusto.',
                'exp1-date': 'FEB 2026',
                'exp1-title': 'Texturas Matemáticas PBR',
                'exp1-desc': 'Exploración de generación procedural de texturas mediante algoritmos matemáticos complejos.',
                'exp2-date': 'ENE 2026',
                'exp2-title': 'Fusión Visual 2D en 3D',
                'exp2-desc': 'Integración experimental de accesorios bidimensionales estilizados sobre modelos y entornos tridimensionales.',
                'exp3-date': 'NOV 2025',
                'exp3-title': 'Renderizado: Pulpo PBR',
                'exp3-desc': 'Pruebas de materiales fotorealistas (PBR) y simulación de luz subsuperficial en modelos orgánicos marinos.'
            },
            'EN': {
                'lab-title': 'Our Lab - System Information',
                'gallery-title': 'Gallery - Image Viewer',
                'browser-title': 'Browser - Projects',
                'contact-title': 'Contact - Try Lab',
                'experiments-title': 'Experiments - Lab Blog',
                'proyectos': 'Projects',
                'gallery': 'Gallery',
                'contacto': 'Contact',
                'experimentos': 'Experiments',
                'mute': 'Mute',
                'unmute': 'Unmute',
                'change-lang': 'Change Language',
                'lab-btn': 'EN',
                // Manifesto
                'lab-s1-title': 'The Philosophy of Rupture',
                'lab-s1-p1': 'In a market saturated with redundancies and predictable solutions, "safe" has become the greatest operational risk. At <strong>Try Lab</strong>, we understand innovation not as a random event, but as a <strong>discipline of programmed rupture</strong>. We do not operate under the logic of adaptation, but under the architecture of change.',
                'lab-s1-p2': 'We were born to challenge the status quo not out of rebellion, but out of an intellectual need for efficiency. Where others see a finished concept, we see a structure waiting to be deconstructed to reach its maximum potential.',
                'lab-s2-title': 'Expertise: Laboratory Rigor',
                'lab-s2-p1': 'Our seniority is the anchor that allows our boldness. We have years of experience that grant us the intellectual right to experiment. We don\'t "try" to see what happens; we experiment because we know exactly which rules to break to force the evolution of an idea.',
                'lab-s2-p2': 'We combine technical rigor with strategic irreverence. This duality allows us to transition from the most complex theoretical conception to the most impeccable technical execution. At Try Lab, experience is not a static state, it is a moving legacy that is redefined with each challenge.',
                'lab-s3-title': 'The Innovation "Touch": The Catalyst',
                'lab-s3-p1': 'What we define as our "innovation touch" is, in fact, a cutting-edge curation process. It is the injection of a unique identity into projects that would otherwise be ordinary.',
                'lab-quote': '"We are the place where conventional ideas come to die to be reborn as market benchmarks."',
                'lab-s3-p2': 'We don\'t deliver products, we deliver new standards. We are the catalyst that transforms our partners\' vision into a disruptive reality, ensuring that every concept we touch possesses that intellectual distinction that separates followers from leaders.',
                // Browser
                'browser-hero-h2': 'Our Projects',
                'browser-hero-p': 'Explore our latest work in design, development, and digital art.',
                'p1-title': 'Scenic Design: Kick of Love',
                'p1-desc': 'We designed and built interactive systems and immersive stages to elevate the festival\'s identity.',
                'p2-title': 'UX/UI & Social: Lookgeo',
                'p2-desc': 'We conceptualized the social identity and interface for an innovative real estate platform based on metadata.',
                'p3-title': 'Branding: María José Living',
                'p3-desc': 'We developed an empathetic brand focused on revitalizing Guadalajara\'s downtown area, honoring its architectural heritage.',
                'p4-title': 'Marketing: Edgardo Porras',
                'p4-desc': 'We executed a disruptive campaign and social media strategy, completely transforming the candidate\'s public perception.',
                'p5-title': 'Branding: Soneto Residencial',
                'p5-desc': 'We captured the vibrant essence of Colonia Americana in a modern and energetic lifestyle designed to thrive.',
                'p6-title': 'Re-Branding: Universum',
                'p6-desc': 'We redefined the real estate company\'s corporate identity to ensure its registration and consolidate its digital presence.',
                'p7-title': 'Installation: Christmas Villas',
                'p7-desc': 'We boosted local tourism by creating automatic lighting ecosystems and low-cost immersive interactive installations.',
                'p8-title': 'Strategy: Medical Congress',
                'p8-desc': 'We saved a critical event through an M2M platform and a profitable monetization model, securing key corporate sponsorships.',
                'p9-title': 'Identity: Hugo Fernández',
                'p9-desc': 'We updated the identity graphics and digital strategy of this musical legend to connect organically with new generations.',
                // Contact
                'contact-hero-h2': 'Have a project in mind?',
                'contact-hero-p': 'Leave us your details and we will get back to you as soon as possible.',
                'contact-tab-1': 'Quick Contact',
                'contact-tab-2': 'I Need Advice',
                'label-name': 'Name',
                'label-email': 'Email',
                'label-phone': 'WhatsApp / Phone',
                'label-services': 'Project Type',
                'label-message': 'Additional Message',
                'label-file': 'Attach file (Optional)',
                'placeholder-name': 'Your name',
                'placeholder-email': 'you@email.com',
                'placeholder-phone': 'Your number',
                'placeholder-message': 'Extra details about your idea...',
                'service-1': 'Branding',
                'service-2': 'Web Development',
                'service-3': 'Audiovisual',
                'service-4': 'Other',
                'diag-q1': '1. Is your current website slow or not attracting customers?',
                'diag-q2': '2. Do you feel your brand image has become outdated?',
                'diag-q3': '3. Do you need high-quality corporate/social media visual content?',
                'diag-q4': '4. Do you have a business idea but don\'t know how to take it to the digital world?',
                'yes': 'Yes',
                'no': 'No',
                'btn-submit': 'Send Message',
                'contact-success': '✅ Message sent successfully! We will contact you soon.',
                'contact-error': '❌ There was an error sending. Please try again.',
                // Experiments
                'exp-hero-h2': 'Idea Laboratory',
                'exp-hero-p': 'Research, UI/UX experiments, and things we do for pure pleasure.',
                'exp1-date': 'FEB 2026',
                'exp1-title': 'Mathematical PBR Textures',
                'exp1-desc': 'Exploration of procedural texture generation through complex mathematical algorithms.',
                'exp2-date': 'JAN 2026',
                'exp2-title': 'Visual Fusion: 2D in 3D',
                'exp2-desc': 'Experimental integration of stylized two-dimensional accessories over three-dimensional models and environments.',
                'exp3-date': 'NOV 2025',
                'exp3-title': 'Rendering: Octopus PBR',
                'exp3-desc': 'Photorealistic material tests (PBR) and subsurface scattering simulation in organic marine models.'
            }
        },
        init() {
            // Merge with DB translations if available
            if (window.DB_TRANSLATIONS) {
                Object.keys(window.DB_TRANSLATIONS).forEach(locale => {
                    const upperLocale = locale.toUpperCase();
                    if (!this.translations[upperLocale]) this.translations[upperLocale] = {};
                    Object.assign(this.translations[upperLocale], window.DB_TRANSLATIONS[locale]);
                });
            }
            this.updateUI();
        },
        updateUI() {

            const t = this.translations[this.current];

            // Bulk update via data-i18n
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (t[key]) {
                    if (el.tagName === 'P' || el.tagName === 'BLOCKQUOTE' || el.classList.contains('manifesto-section') || el.classList.contains('section-title')) {
                        el.innerHTML = t[key];
                    } else {
                        el.textContent = t[key];
                    }
                }
            });

            // Bulk update via data-i18n-placeholder
            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (t[key]) el.placeholder = t[key];
            });

            // Desktop Icons & Taskbar
            document.querySelector('.desktop-icon[data-app="browser"] span').textContent = t['proyectos'];
            document.querySelector('.desktop-icon[data-app="gallery"] span').textContent = t['gallery'];
            document.querySelector('.desktop-icon[data-app="contact"] span').textContent = t['contacto'];
            document.querySelector('.desktop-icon[data-app="experiments"] span').textContent = t['experimentos'];

            document.querySelector('.taskbar-item[data-app="browser"]').title = t['proyectos'];
            document.querySelector('.taskbar-item[data-app="gallery"]').title = t['gallery'];
            document.querySelector('.taskbar-item[data-app="contact"]').title = t['contacto'];
            document.querySelector('.taskbar-item[data-app="experiments"]').title = t['experimentos'];

            // Status Buttons
            const muteBtn = document.getElementById('mute-btn');
            if (muteBtn) muteBtn.title = AudioSystem.muted ? t['unmute'] : t['mute'];
            const langBtn = document.getElementById('lang-btn');
            if (langBtn) {
                langBtn.textContent = t['lab-btn'];
                langBtn.title = t['change-lang'];
            }

            // Update Contact Form Labels
            const submitBtn = document.querySelector('#contactForm .btn-submit');
            if (submitBtn) submitBtn.textContent = t['btn-submit'];

            const fileLabel = document.getElementById('file-name-display');
            if (fileLabel && (fileLabel.textContent === 'Adjuntar archivo (Opcional)' || fileLabel.textContent === 'Attach file (Optional)')) {
                fileLabel.textContent = t['label-file'];
            }

            // Update open post if any
            if (currentActivePost) {
                openPost(currentActivePost.id, currentActivePost.winName, true);
            }
        }
    };

    const muteBtn = document.getElementById('mute-btn');
    const langBtn = document.getElementById('lang-btn');

    if (muteBtn) {
        muteBtn.addEventListener('click', () => {
            AudioSystem.toggleMute();
        });
    }

    if (langBtn) {
        langBtn.addEventListener('click', () => {
            i18n.current = i18n.current === 'ES' ? 'EN' : 'ES';
            i18n.updateUI();
            AudioSystem.play('click');
        });
    }

    i18n.init();
});

