    <!-- Footer Expandido -->
    <footer class="main-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand">
                        <img src="<?= safeHtml($global['footer_logo_url']) ?>" alt="<?= safeHtml($global['header_logo_alt']) ?>" class="footer-logo mb-3">
                        <p class="footer-description"><?= safeHtml($global['footer_description']) ?></p>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Búsqueda</a></li>
                        <li><a href="/">Inicio</a></li>
                        <li><a href="/quienes-somos">Quienes Somos</a></li>
                        <li><a href="/tienda">Tienda</a></li>
                        <li><a href="/contacto">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Categorías</h5>
                    <ul class="footer-links">
                        <li><a href="#">Cocina</a></li>
                        <li><a href="#">Decoración</a></li>
                        <li><a href="#">Limpieza</a></li>
                        <li><a href="#">Electrodomésticos</a></li>
                        <li><a href="#">Ferretería</a></li>
                        <li><a href="#">Muebles</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="<?= safeHtml($global['facebook_url']) ?>"><i class="fab fa-facebook"></i></a>
                        <a href="<?= safeHtml($global['instagram_url']) ?>"><i class="fab fa-instagram"></i></a>
                        <a href="<?= safeHtml($global['tiktok_url']) ?>"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <div class="footer-info">
                        <p><?= safeHtml($global['copyright_text']) ?></p>
                        <p><a href="/politica-privacidad">Política de privacidad</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- External JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom Main Script -->
    <script src="/assets/js/script.js"></script>
    
    <!-- Page-Specific and Component Scripts -->
    <script src="/assets/js/slider.js"></script>
    <script src="/assets/js/hot-deals.js"></script>
    <script src="/assets/js/brands.js"></script>
    <script src="/assets/js/banner.js"></script>
    <script src="/assets/js/tiktok-lightbox.js"></script>
    <script src="/assets/js/enhanced-pricing.js"></script>
    <script src="/assets/js/compact-pricing.js"></script>
    <script src="/assets/js/pricing-interfaces.js"></script>
    
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

    <?php if (isset($page) && $page === 'index'): ?>
    <!-- =================================================================== -->
    <!-- START: MODAL DE POLÍTICAS DE VENTA (HTML, CSS, JS) - CÓDIGO COMPLETO -->
    <!-- =================================================================== -->

    <!-- Modal Personalizado de Políticas de Venta -->
    <div id="customSalesPolicyModal" class="custom-modal-overlay">
        <div class="custom-modal-container">
            <div class="custom-modal-header">
                <div class="modal-title-section">
                    <div class="title-icon-wrapper"><div class="icon-glow"></div><div class="title-icon"><i class="fas fa-file-contract"></i></div></div>
                    <div class="title-content"><h2>Políticas de Venta</h2><p>Términos y condiciones de Plastimarket</p></div>
                </div>
                <button id="closeCustomModal" class="custom-modal-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="custom-modal-body">
                <div class="policy-grid">
                    <div class="policy-card featured"><div class="policy-icon"><i class="fas fa-handshake"></i></div><h3>Condiciones Generales</h3><p>Todos nuestros productos están sujetos a disponibilidad. Los precios pueden variar sin previo aviso.</p><div class="policy-highlights"><span class="highlight-tag">Disponibilidad</span><span class="highlight-tag">Precios Variables</span></div></div>
                    <div class="policy-card"><div class="policy-icon"><i class="fas fa-tags"></i></div><h3>Precios Mayoristas</h3><p>Ofrecemos descuentos para compras al por mayor a partir de cantidades mínimas.</p><div class="policy-highlights"><span class="highlight-tag">Descuentos</span><span class="highlight-tag">Cantidad Mínima</span></div></div>
                    <div class="policy-card"><div class="policy-icon"><i class="fas fa-shipping-fast"></i></div><h3>Envíos y Entregas</h3><p>Envíos a nivel nacional. Tiempos de entrega varían según la ubicación. Envío gratis sobre $150.000.</p><div class="policy-highlights"><span class="highlight-tag">Nacional</span><span class="highlight-tag">Envío Gratis</span></div></div>
                    <div class="policy-card"><div class="policy-icon"><i class="fas fa-undo-alt"></i></div><h3>Devoluciones</h3><p>Aceptamos devoluciones hasta 15 días después de la compra, con el producto en perfectas condiciones.</p><div class="policy-highlights"><span class="highlight-tag">15 Días</span><span class="highlight-tag">Estado Original</span></div></div>
                </div>
            </div>
            <div class="custom-modal-footer">
                <button id="closeModalSecondary" class="btn-secondary-custom"><i class="fas fa-times"></i>Cerrar</button>
                <button id="understoodBtn" class="btn-primary-custom"><i class="fas fa-check"></i>Entendido</button>
            </div>
        </div>
    </div>
    <button id="floating-policy-btn" class="floating-policy-btn" type="button"><div class="btn-content"><i class="fas fa-file-contract btn-icon"></i><span class="btn-text">Ver Políticas</span></div><div class="btn-ripple"></div><div class="btn-glow"></div></button>

    <!-- Estilos CSS para el modal -->
    <style>
        .custom-modal-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;z-index:999999;opacity:0;visibility:hidden;transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);padding:20px}.custom-modal-overlay.active{opacity:1;visibility:visible}.custom-modal-container{background:linear-gradient(145deg,#ffffff 0%,#f8f9fa 100%);border-radius:24px;box-shadow:0 25px 80px rgba(0,0,0,0.15),0 0 0 1px rgba(255,255,255,0.1);max-width:900px;width:100%;max-height:90vh;overflow:hidden;transform:scale(0.8) translateY(50px);transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);position:relative}.custom-modal-overlay.active .custom-modal-container{transform:scale(1) translateY(0)}.custom-modal-header{background:linear-gradient(135deg,#FF6B35 0%,#E55A2B 100%);color:white;padding:30px;display:flex;align-items:center;justify-content:space-between;position:relative;overflow:hidden}.custom-modal-header::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;opacity:0.3}.modal-title-section{display:flex;align-items:center;gap:20px;position:relative;z-index:1}.title-icon-wrapper{position:relative}.title-icon{width:60px;height:60px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:24px;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.3)}.icon-glow{position:absolute;top:-10px;left:-10px;right:-10px;bottom:-10px;background:radial-gradient(circle,rgba(255,255,255,0.3) 0%,transparent 70%);border-radius:50%;animation:pulse-glow 2s ease-in-out infinite}@keyframes pulse-glow{0%,100%{transform:scale(1);opacity:0.5}50%{transform:scale(1.1);opacity:0.8}}.title-content h2{margin:0;font-size:28px;font-weight:700;text-shadow:0 2px 4px rgba(0,0,0,0.1)}.title-content p{margin:5px 0 0 0;opacity:0.9;font-size:14px;font-weight:400}.custom-modal-close{background:rgba(255,255,255,0.2);border:none;color:white;width:45px;height:45px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all 0.3s ease;backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.3);position:relative;z-index:1}.custom-modal-close:hover{background:rgba(255,255,255,0.3);transform:rotate(90deg) scale(1.1)}.custom-modal-body{padding:40px 30px;max-height:60vh;overflow-y:auto;background:linear-gradient(145deg,#ffffff 0%,#f8f9fa 100%)}.custom-modal-body::-webkit-scrollbar{width:8px}.custom-modal-body::-webkit-scrollbar-track{background:#f1f1f1;border-radius:4px}.custom-modal-body::-webkit-scrollbar-thumb{background:linear-gradient(135deg,#FF6B35,#E55A2B);border-radius:4px}.policy-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:25px}.policy-card{background:white;border-radius:16px;padding:25px;box-shadow:0 8px 25px rgba(0,0,0,0.08);border:1px solid rgba(255,107,53,0.1);transition:all 0.3s cubic-bezier(0.25,0.46,0.45,0.94);position:relative;overflow:hidden}.policy-card:hover{transform:translateY(-8px);box-shadow:0 15px 40px rgba(255,107,53,0.15)}.policy-card h3{font-size:18px;font-weight:700;color:#2c3e50}.policy-card.featured{background:linear-gradient(135deg,#FF6B35 0%,#E55A2B 100%);color:white}.policy-card.featured h3{color:white}.custom-modal-footer{padding:25px 30px;background:#f8f9fa;display:flex;justify-content:flex-end;gap:15px;border-top:1px solid #e9ecef}.floating-policy-btn{position:fixed;bottom:30px;right:30px;background:linear-gradient(135deg,#FF6B35 0%,#E55A2B 100%);color:white;border:none;border-radius:60px;width:auto;height:60px;cursor:pointer;z-index:99999;box-shadow:0 8px 30px rgba(255,107,53,0.3);transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94)}.btn-content{display:flex;align-items:center;justify-content:center;gap:10px;padding:18px 24px}.btn-text{font-weight:700;font-size:14px}
    </style>

    <!-- Script para el modal -->
    <script>
    (function(){
        'use strict';
        document.addEventListener('DOMContentLoaded',function(){
            const modal=document.getElementById('customSalesPolicyModal');
            const floatingBtn=document.getElementById('floating-policy-btn');
            const closeBtn=document.getElementById('closeCustomModal');
            const closeSecondaryBtn=document.getElementById('closeModalSecondary');
            const understoodBtn=document.getElementById('understoodBtn');
            if(!modal||!floatingBtn){return}
            function openModal(){modal.classList.add('active');document.body.style.overflow='hidden'}
            function closeModal(){modal.classList.remove('active');document.body.style.overflow=''}
            floatingBtn.addEventListener('click',openModal);
            if(closeBtn)closeBtn.addEventListener('click',closeModal);
            if(closeSecondaryBtn)closeSecondaryBtn.addEventListener('click',closeModal);
            if(understoodBtn)understoodBtn.addEventListener('click',closeModal);
            modal.addEventListener('click',function(e){if(e.target===modal){closeModal()}});
            document.addEventListener('keydown',function(e){if(e.key==='Escape'&&modal.classList.contains('active')){closeModal()}});
            setTimeout(openModal,1000);
        });
    })();
    </script>

    <!-- =================================================================== -->
    <!-- END: MODAL DE POLÍTICAS DE VENTA -->
    <!-- =================================================================== -->
    <?php endif; ?>

    <!-- Optional page-specific JS variable -->
    <?php if (isset($page_js)): ?>
        <script src="/assets/js/<?= $page_js ?>"></script>
    <?php endif; ?>

</body>
</html>
