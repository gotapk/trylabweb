/* 
   TRY LAB - Easter Eggs Logic
   Rupture & Deconstruction Protocols 
*/

document.addEventListener('DOMContentLoaded', () => {
    console.log("[SYSTEM]: EASTER_EGGS_PROTOCOL_INITIALIZED");

    // --- 1. KEYWORD & KONAMI LISTENERS ---
    let inputBuffer = "";
    const keywords = ["root", "admin", "hack"];
    const konamiCode = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "KeyB", "KeyA"];
    let konamiIndex = 0;

    window.addEventListener('keydown', (e) => {
        // Keyword tracking
        inputBuffer += e.key.toLowerCase();
        if (inputBuffer.length > 10) inputBuffer = inputBuffer.slice(-10);

        keywords.forEach(kw => {
            if (inputBuffer.includes(kw)) {
                activateTerminal();
                inputBuffer = "";
            }
        });

        // Konami tracking
        if (e.code === konamiCode[konamiIndex]) {
            konamiIndex++;
            if (konamiIndex === konamiCode.length) {
                activateSelfDestruct();
                konamiIndex = 0;
            }
        } else {
            konamiIndex = 0;
        }
    });

    // --- 2. TERMINAL PROTOCOL ---
    const terminal = document.getElementById('easter-terminal');
    function activateTerminal() {
        if (!terminal) return;
        terminal.style.display = 'block';
        terminal.innerHTML = "";
        
        const lines = [
            "[CRITICAL]: UNAUTHORIZED BYPASS DETECTED",
            "[SYSTEM]: ANALYZING NEURAL SIGNATURE...",
            "[STATUS]: SIGNATURE_MATCH: 'CREATIVE_ENTITY_01'",
            "---",
            "WELCOME TO THE TRY LAB BACKDOOR.",
            "AVAILABLE COMMANDS:",
            "- HELP: SHOW DATABASE ENTITIES",
            "- STATUS: CHECK LAB VITALITY",
            "- EXIT: CLOSE SECURE LINK",
            "---"
        ];

        let i = 0;
        function typeLine() {
            if (i < lines.length) {
                const lineDiv = document.createElement('div');
                lineDiv.className = 'terminal-line terminal-prompt';
                terminal.appendChild(lineDiv);
                
                let charIdx = 0;
                const typeText = () => {
                    if (charIdx < lines[i].length) {
                        lineDiv.textContent += lines[i][charIdx];
                        charIdx++;
                        setTimeout(typeText, 30);
                    } else {
                        i++;
                        setTimeout(typeLine, 200);
                    }
                };
                typeText();
            }
        }
        typeLine();
    }

    // Close terminal on ESC or click
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && terminal) terminal.style.display = 'none';
    });
    if (terminal) terminal.addEventListener('click', () => terminal.style.display = 'none');

    // --- 3. SELF-DESTRUCT (KONAMI) ---
    function activateSelfDestruct() {
        document.body.classList.add('glitch-active');
        const overlay = document.createElement('div');
        overlay.style.cssText = "position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,0,0,0.2); z-index:10000; pointer-events:none;";
        document.body.appendChild(overlay);

        setTimeout(() => {
            document.body.classList.remove('glitch-active');
            overlay.remove();
            alert("[SYSTEM_RESTORED]: THE LAB IS STABLE. FOR NOW.");
        }, 5000);
    }

    // --- 4. CCTV PROTOCOL ---
    const cctvTrigger = document.getElementById('cctv-trigger');
    const cctvOverlay = document.getElementById('cctv-overlay');
    
    if (cctvTrigger && cctvOverlay) {
        cctvTrigger.addEventListener('click', () => {
            const isVisible = cctvOverlay.style.display === 'block';
            cctvOverlay.style.display = isVisible ? 'none' : 'block';
            
            if (!isVisible) {
                setTimeout(() => {
                    cctvOverlay.style.display = 'none';
                }, 10000);
            }
        });
    }

    // --- 5. RADIOACTIVE CURSOR ---
    let idleTimer;
    window.addEventListener('mousemove', () => {
        document.body.classList.remove('radioactive-cursor');
        clearTimeout(idleTimer);
        idleTimer = setTimeout(() => {
            document.body.classList.add('radioactive-cursor');
        }, 15000);
    });

    // --- 6. HIDDEN LOG DOWNLOAD ---
    const versionEl = document.querySelector('.system-version');
    if (versionEl) {
        versionEl.addEventListener('click', (e) => {
            if (e.detail === 3) { // Triple click
                const link = document.createElement('a');
                link.href = '/trylab_system.log';
                link.download = 'trylab_system.log';
                link.click();
            }
        });
    }

    // --- 7. DRAGGABLE LOGO ---
    const mainLogo = document.querySelector('.boot-logo img');
    if (mainLogo && typeof gsap !== 'undefined') {
        // Basic drag implementation using GSAP if available
        // Note: For full draggable we might need Draggable plugin, but we can do a simple version
        let isDragging = false;
        
        mainLogo.style.cursor = 'grab';
        
        mainLogo.addEventListener('mousedown', () => {
            isDragging = true;
            mainLogo.classList.add('is-dragging');
        });

        window.addEventListener('mouseup', () => {
            if (isDragging) {
                isDragging = false;
                mainLogo.classList.remove('is-dragging');
                gsap.to(mainLogo, { x: 0, y: 0, duration: 0.5, ease: "elastic.out(1, 0.3)" });
            }
        });

        window.addEventListener('mousemove', (e) => {
            if (isDragging) {
                gsap.set(mainLogo, { 
                    x: e.movementX * 2, 
                    y: e.movementY * 2, 
                    overwrite: false 
                });
            }
        });
    }
});
