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

    <!-- === COMPLETE SCRIPT LIST FROM BACKUP (TYPO FIXED) === -->
    <!-- This is the definitive fix. All required scripts are now included with correct absolute paths. -->

    <!-- Custom Main Script -->
    <script src="/assets/js/script.js"></script>
    
    <!-- Page-Specific and Component Scripts (as seen in index_backup.html) -->
    <script src="/assets/js/slider.js"></script>
    <script src="/assets/js/hot-deals.js"></script>
    <script src="/assets/js/brands.js"></script>
    <script src="/assets/js/banner.js"></script>
    <script src="/assets/js/tiktok-lightbox.js"></script> <!-- TYPO FIX HERE -->
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
    
    <!-- Optional page-specific JS variable -->
    <?php if (isset($page_js)): ?>
        <script src="/assets/js/<?= $page_js ?>"></script>
    <?php endif; ?>
</body>
</html>
