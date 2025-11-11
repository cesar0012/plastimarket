<?php
// Configuración de TinyDB para el panel de administración

define('ADMIN_DB_PATH', __DIR__ . '/../data/');
define('ADMIN_SESSION_TIMEOUT', 3600); // 1 hora

// Crear directorio de datos si no existe
if (!is_dir(ADMIN_DB_PATH)) {
    mkdir(ADMIN_DB_PATH, 0755, true);
}

// Configuraciones de secciones del sitio web basadas en index.html
$site_sections = [
    'announcement_bar' => [
        'title' => 'Barra de Anuncios',
        'description' => 'Mensaje promocional en la parte superior',
        'elements' => ['message'],
        'file_location' => 'header'
    ],
    'header' => [
        'title' => 'Header Principal',
        'description' => 'Logo, navegación y barra de búsqueda',
        'elements' => ['logo', 'navigation', 'search_bar', 'icons'],
        'file_location' => 'header'
    ],
    'categories_menu' => [
        'title' => 'Menú de Categorías',
        'description' => 'Sidebar con categorías de productos',
        'elements' => ['categories', 'subcategories', 'icons', 'product_counts'],
        'file_location' => 'offcanvas'
    ],
    'hero_section' => [
        'title' => 'Sección Hero',
        'description' => 'Banner principal con llamada a la acción',
        'elements' => ['title', 'subtitle', 'buttons', 'badge', 'hero_image'],
        'file_location' => 'main_content'
    ],
    'features_section' => [
        'title' => 'Características',
        'description' => 'Iconos y descripciones de servicios',
        'elements' => ['feature_items', 'icons', 'titles'],
        'file_location' => 'main_content'
    ],
    'brands_section' => [
        'title' => 'Marcas',
        'description' => 'Carrusel de marcas asociadas',
        'elements' => ['brand_logos', 'brand_names'],
        'file_location' => 'main_content'
    ],
    'products_section' => [
        'title' => 'Productos Destacados',
        'description' => 'Grid de productos principales',
        'elements' => ['product_cards', 'prices', 'images', 'descriptions'],
        'file_location' => 'main_content'
    ],
    'footer' => [
        'title' => 'Pie de Página',
        'description' => 'Información de contacto y enlaces',
        'elements' => ['contact_info', 'links', 'social_media', 'copyright'],
        'file_location' => 'footer'
    ]
];

// Categorías extraídas del HTML
$default_categories = [
    'bebidas' => [
        'name' => 'BEBIDAS',
        'icon' => 'fas fa-wine-bottle',
        'product_count' => 3,
        'subcategories' => [
            ['name' => 'Refrescos', 'icon' => 'fas fa-glass-whiskey'],
            ['name' => 'Jugos', 'icon' => 'fas fa-apple-alt'],
            ['name' => 'Agua', 'icon' => 'fas fa-tint']
        ]
    ],
    'cocina' => [
        'name' => 'COCINA',
        'icon' => 'fas fa-utensils',
        'product_count' => 3,
        'subcategories' => [
            ['name' => 'Utensilios', 'icon' => 'fas fa-blender'],
            ['name' => 'Ollas y Sartenes', 'icon' => 'fas fa-fire'],
            ['name' => 'Electrodomésticos', 'icon' => 'fas fa-microchip']
        ]
    ],
    'decoracion' => [
        'name' => 'DECORACIÓN HOGAR',
        'icon' => 'fas fa-home',
        'product_count' => 3,
        'subcategories' => [
            ['name' => 'Adornos', 'icon' => 'fas fa-star'],
            ['name' => 'Cuadros', 'icon' => 'fas fa-image'],
            ['name' => 'Plantas', 'icon' => 'fas fa-seedling']
        ]
    ],
    'electrodomesticos' => [
        'name' => 'ELECTRODOMÉSTICOS',
        'icon' => 'fas fa-plug',
        'product_count' => 15,
        'subcategories' => []
    ],
    'ferreteria' => [
        'name' => 'FERRETERÍA',
        'icon' => 'fas fa-tools',
        'product_count' => 3,
        'subcategories' => [
            ['name' => 'Herramientas', 'icon' => 'fas fa-hammer'],
            ['name' => 'Tornillos', 'icon' => 'fas fa-bolt'],
            ['name' => 'Pinturas', 'icon' => 'fas fa-paint-brush']
        ]
    ],
    'infantil' => [
        'name' => 'INFANTIL',
        'icon' => 'fas fa-baby',
        'product_count' => 8,
        'subcategories' => []
    ],
    'importacion' => [
        'name' => 'IMPORTACIÓN',
        'icon' => 'fas fa-globe',
        'product_count' => 12,
        'subcategories' => []
    ],
    'limpieza' => [
        'name' => 'LIMPIEZA Y BAÑO',
        'icon' => 'fas fa-spray-can',
        'product_count' => 3,
        'subcategories' => [
            ['name' => 'Detergentes', 'icon' => 'fas fa-soap'],
            ['name' => 'Desinfectantes', 'icon' => 'fas fa-shield-virus'],
            ['name' => 'Papel Higiénico', 'icon' => 'fas fa-toilet-paper']
        ]
    ],
    'mascotas' => [
        'name' => 'MASCOTAS',
        'icon' => 'fas fa-paw',
        'product_count' => 6,
        'subcategories' => []
    ],
    'ofertas' => [
        'name' => 'OFERTAS',
        'icon' => 'fas fa-fire',
        'product_count' => 'HOT!',
        'subcategories' => [],
        'special' => true
    ],
    'organizacion' => [
        'name' => 'ORGANIZACIÓN',
        'icon' => 'fas fa-boxes',
        'product_count' => 3,
        'subcategories' => [
            ['name' => 'Cajas', 'icon' => 'fas fa-box'],
            ['name' => 'Contenedores', 'icon' => 'fas fa-cube'],
            ['name' => 'Organizadores', 'icon' => 'fas fa-layer-group']
        ]
    ]
];

// Características por defecto
$default_features = [
    [
        'title' => 'ATENCIÓN PERSONALIZADA',
        'icon' => 'user-svg',
        'description' => 'Servicio personalizado para cada cliente'
    ],
    [
        'title' => 'PRECIOS COMPETITIVOS',
        'icon' => 'dollar-svg',
        'description' => 'Los mejores precios del mercado'
    ],
    [
        'title' => 'ENVÍO GRATIS',
        'icon' => 'truck-svg',
        'description' => 'Envío gratuito en compras mayores'
    ],
    [
        'title' => 'GARANTÍA',
        'icon' => 'shield-svg',
        'description' => 'Garantía en todos nuestros productos'
    ],
    [
        'title' => 'SOPORTE 24/7',
        'icon' => 'clock-svg',
        'description' => 'Atención al cliente las 24 horas'
    ],
    [
        'title' => 'PAGOS SEGUROS',
        'icon' => 'card-svg',
        'description' => 'Transacciones 100% seguras'
    ]
];

// Tipos de elementos UI disponibles
$ui_element_types = [
    'text' => 'Texto',
    'image' => 'Imagen',
    'link' => 'Enlace',
    'button' => 'Botón',
    'icon' => 'Icono',
    'list' => 'Lista',
    'card' => 'Tarjeta',
    'banner' => 'Banner',
    'category' => 'Categoría',
    'feature' => 'Característica'
];

// Configuración de archivos
$allowed_image_types = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
$max_upload_size = 5 * 1024 * 1024; // 5MB

// Funciones de utilidad
function sanitize_input($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function generate_uuid() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

function format_date($timestamp) {
    return date('d/m/Y H:i:s', $timestamp);
}

function get_file_extension($filename) {
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}

function is_valid_image($filename) {
    global $allowed_image_types;
    $extension = get_file_extension($filename);
    return in_array($extension, $allowed_image_types);
}

function create_slug($string) {
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    $slug = strtolower(trim($slug, '-'));
    return $slug;
}

// Función para obtener contenido dinámico
function get_content($section, $key, $default = '') {
    static $db = null;
    if ($db === null) {
        require_once __DIR__ . '/database.php';
        $db = new AdminDatabase();
    }
    
    $content = $db->getWhere('page_content', ['section' => $section, 'content_key' => $key]);
    return !empty($content) ? $content[0]['content_value'] : $default;
}

// Configuraciones de secciones editables
$site_sections = [
    'home' => [
        'title' => 'Página Home',
        'description' => 'Gestiona el contenido de la página principal',
        'sections' => [
            'announcement_bar' => [
                'title' => 'Barra de Anuncios',
                'fields' => [
                    'message' => ['type' => 'text', 'label' => 'Mensaje del anuncio']
                ]
            ],
            'header' => [
                'title' => 'Header',
                'fields' => [
                    'logo_url' => ['type' => 'url', 'label' => 'URL del Logo'],
                    'logo_alt' => ['type' => 'text', 'label' => 'Texto alternativo del logo']
                ]
            ],
            'hero_section' => [
                'title' => 'Sección Hero',
                'fields' => [
                    'badge_text' => ['type' => 'text', 'label' => 'Texto del badge'],
                    'main_title' => ['type' => 'text', 'label' => 'Título principal'],
                    'subtitle' => ['type' => 'text', 'label' => 'Subtítulo'],
                    'primary_button_text' => ['type' => 'text', 'label' => 'Texto botón principal'],
                    'primary_button_url' => ['type' => 'url', 'label' => 'URL botón principal'],
                    'secondary_button_text' => ['type' => 'text', 'label' => 'Texto botón secundario'],
                    'secondary_button_url' => ['type' => 'url', 'label' => 'URL botón secundario'],
                    'hero_image_url' => ['type' => 'url', 'label' => 'URL imagen hero'],
                    'hero_image_alt' => ['type' => 'text', 'label' => 'Texto alternativo imagen']
                ]
            ],
            'features_section' => [
                'title' => 'Sección de Características',
                'fields' => [
                    'feature_1_title' => ['type' => 'text', 'label' => 'Característica 1'],
                    'feature_2_title' => ['type' => 'text', 'label' => 'Característica 2'],
                    'feature_3_title' => ['type' => 'text', 'label' => 'Característica 3'],
                    'feature_4_title' => ['type' => 'text', 'label' => 'Característica 4'],
                    'feature_5_title' => ['type' => 'text', 'label' => 'Característica 5'],
                    'feature_6_title' => ['type' => 'text', 'label' => 'Característica 6']
                ]
            ],
            'footer' => [
                'title' => 'Footer',
                'fields' => [
                    'logo_url' => ['type' => 'url', 'label' => 'URL del logo'],
                    'description' => ['type' => 'textarea', 'label' => 'Descripción de la empresa'],
                    'facebook_url' => ['type' => 'url', 'label' => 'URL Facebook'],
                    'instagram_url' => ['type' => 'url', 'label' => 'URL Instagram'],
                    'tiktok_url' => ['type' => 'url', 'label' => 'URL TikTok'],
                    'copyright_text' => ['type' => 'text', 'label' => 'Texto de copyright']
                ]
            ]
        ]
    ]
];
?>