// ===== TIKTOK LIGHTBOX FUNCTIONALITY =====

// Crear el modal lightbox dinámicamente
function createLightboxModal() {
    const lightbox = document.createElement('div');
    lightbox.className = 'video-lightbox';
    lightbox.innerHTML = `
        <div class="lightbox-content">
            <span class="lightbox-close">&times;</span>
            <div class="lightbox-video-container">
                <iframe src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    `;
    document.body.appendChild(lightbox);
    return lightbox;
}

// Inicializar lightbox para videos de TikTok
function initTikTokLightbox() {
    const lightbox = createLightboxModal();
    const lightboxIframe = lightbox.querySelector('iframe');
    const closeBtn = lightbox.querySelector('.lightbox-close');
    const tiktokCards = document.querySelectorAll('.tiktok-card');

    // Función para abrir lightbox
    function openLightbox(videoUrl) {
        lightboxIframe.src = videoUrl;
        lightbox.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Animación de entrada suave
        requestAnimationFrame(() => {
            lightbox.classList.add('show');
        });
    }

    // Función para cerrar lightbox
    function closeLightbox() {
        lightbox.classList.remove('show');
        
        setTimeout(() => {
            lightbox.style.display = 'none';
            lightboxIframe.src = '';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Event listeners para las tarjetas de TikTok
    tiktokCards.forEach(card => {
        card.addEventListener('click', function() {
            const videoUrl = this.dataset.video;
            if (videoUrl) {
                openLightbox(videoUrl);
            }
        });

        // Agregar cursor pointer
        card.style.cursor = 'pointer';
    });

    // Event listener para cerrar con el botón X
    closeBtn.addEventListener('click', closeLightbox);

    // Event listener para cerrar con click fuera del contenido
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Event listener para cerrar con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.style.display === 'block') {
            closeLightbox();
        }
    });

    console.log('TikTok Lightbox inicializado correctamente');
}

// Inicializar cuando el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTikTokLightbox);
} else {
    initTikTokLightbox();
}

// Exportar funciones para uso global
window.TikTokLightbox = {
    init: initTikTokLightbox
};