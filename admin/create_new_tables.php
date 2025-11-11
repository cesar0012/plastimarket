<?php
require_once '../config/database.php';

echo "Creando tablas para configuraciones globales y página Quienes Somos...\n\n";

try {
    // Crear tabla para configuraciones globales
    echo "1. Creando tabla 'global_settings'...";
    $database->create('global_settings', [
        'id' => ['INTEGER', 'PRIMARY_KEY'],
        'announcement_message' => ['TEXT'],
        'header_logo_url' => ['TEXT'],
        'header_logo_alt' => ['TEXT'],
        'footer_logo_url' => ['TEXT'],
        'footer_description' => ['TEXT'],
        'facebook_url' => ['TEXT'],
        'instagram_url' => ['TEXT'],
        'tiktok_url' => ['TEXT'],
        'copyright_text' => ['TEXT'],
        'created_at' => ['DATETIME', 'DEFAULT' => 'CURRENT_TIMESTAMP'],
        'updated_at' => ['DATETIME', 'DEFAULT' => 'CURRENT_TIMESTAMP']
    ]);
    echo " ✓ Completado\n";

    // Crear tabla para página Quienes Somos
    echo "2. Creando tabla 'quienes_somos'...";
    $database->create('quienes_somos', [
        'id' => ['INTEGER', 'PRIMARY_KEY'],
        'hero_title' => ['TEXT'],
        'hero_description' => ['TEXT'],
        'stat1_number' => ['TEXT'],
        'stat1_label' => ['TEXT'],
        'stat2_number' => ['TEXT'], 
        'stat2_label' => ['TEXT'],
        'stat3_number' => ['TEXT'],
        'stat3_label' => ['TEXT'], 
        'stat4_number' => ['TEXT'],
        'stat4_label' => ['TEXT'],
        'story1_title' => ['TEXT'],
        'story1_content' => ['TEXT'],
        'story2_title' => ['TEXT'], 
        'story2_content' => ['TEXT'],
        'values_title' => ['TEXT'],
        'values_subtitle' => ['TEXT'],
        'value1_title' => ['TEXT'],
        'value1_content' => ['TEXT'],
        'value2_title' => ['TEXT'],
        'value2_content' => ['TEXT'], 
        'value3_title' => ['TEXT'],
        'value3_content' => ['TEXT'],
        'team_section_title' => ['TEXT'],
        'team_section_subtitle' => ['TEXT'],
        'team1_image' => ['TEXT'],
        'team1_category' => ['TEXT'],
        'team1_title' => ['TEXT'],
        'team1_description' => ['TEXT'],
        'team2_image' => ['TEXT'],
        'team2_category' => ['TEXT'],
        'team2_title' => ['TEXT'], 
        'team2_description' => ['TEXT'],
        'team3_image' => ['TEXT'],
        'team3_category' => ['TEXT'],
        'team3_title' => ['TEXT'],
        'team3_description' => ['TEXT'],
        'member1_name' => ['TEXT'],
        'member1_role' => ['TEXT'],
        'member1_description' => ['TEXT'],
        'member2_name' => ['TEXT'],
        'member2_role' => ['TEXT'], 
        'member2_description' => ['TEXT'],
        'member3_name' => ['TEXT'],
        'member3_role' => ['TEXT'],
        'member3_description' => ['TEXT'],
        'cta_title' => ['TEXT'],
        'cta_description' => ['TEXT'],
        'cta_button_text' => ['TEXT'],
        'cta_button_url' => ['TEXT'],
        'created_at' => ['DATETIME', 'DEFAULT' => 'CURRENT_TIMESTAMP'],
        'updated_at' => ['DATETIME', 'DEFAULT' => 'CURRENT_TIMESTAMP']
    ]);
    echo " ✓ Completado\n";

    // Insertar datos por defecto para configuraciones globales
    echo "3. Insertando configuraciones globales por defecto...";
    $database->insert('global_settings', [
        'announcement_message' => '¡PRECIOS EXCLUSIVOS A MAYORISTAS!',
        'header_logo_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'header_logo_alt' => 'PLASTIMARKET',
        'footer_logo_url' => 'https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170',
        'footer_description' => 'Tu tienda de confianza para productos de hogar, cocina y más. Calidad garantizada y los mejores precios del mercado.',
        'facebook_url' => '#',
        'instagram_url' => '#',
        'tiktok_url' => '#',
        'copyright_text' => '© 2025, PLASTIMARKET'
    ]);
    echo " ✓ Completado\n";

    // Insertar datos por defecto para página Quienes Somos
    echo "4. Insertando datos por defecto para página Quienes Somos...";
    $database->insert('quienes_somos', [
        'hero_title' => 'Nuestra Historia',
        'hero_description' => 'Más de una década transformando hogares salvadoreños con productos de melamina y plásticos de la más alta calidad.',
        'stat1_number' => '15',
        'stat1_label' => 'Años de Experiencia',
        'stat2_number' => '10000', 
        'stat2_label' => 'Clientes Satisfechos',
        'stat3_number' => '500',
        'stat3_label' => 'Productos Disponibles', 
        'stat4_number' => '100',
        'stat4_label' => 'Calidad Garantizada',
        'story1_title' => 'Nuestro Origen',
        'story1_content' => 'PlastiMarket nació en 2008 con una visión clara: ofrecer a las familias salvadoreñas productos de melamina y plásticos que combinaran funcionalidad, durabilidad y diseño atractivo. Comenzamos como una pequeña empresa familiar con el sueño de transformar la manera en que las personas equipan sus hogares.',
        'story2_title' => 'Nuestro Crecimiento', 
        'story2_content' => 'A lo largo de los años, hemos expandido nuestro catálogo y mejorado nuestros procesos, siempre manteniendo nuestro compromiso con la calidad. Hoy somos líderes en el mercado salvadoreño, con una amplia gama de productos que van desde vajillas hasta contenedores de almacenamiento.',
        'values_title' => 'Nuestros Valores',
        'values_subtitle' => 'Los principios que guían cada decisión que tomamos',
        'value1_title' => 'Calidad',
        'value1_content' => 'Seleccionamos cuidadosamente cada producto para garantizar que cumpla con los más altos estándares de calidad y durabilidad.',
        'value2_title' => 'Confianza',
        'value2_content' => 'Construimos relaciones duraderas con nuestros clientes basadas en la transparencia, honestidad y cumplimiento de promesas.', 
        'value3_title' => 'Sostenibilidad',
        'value3_content' => 'Promovemos el uso de productos duraderos y reutilizables que contribuyen a un estilo de vida más sostenible.',
        'team_section_title' => 'Nuestro Equipo en Acción',
        'team_section_subtitle' => 'Conoce a las personas que hacen posible nuestra misión',
        'team1_image' => 'assets/img/nosotros/team 1.jpg',
        'team1_category' => 'Colaboración',
        'team1_title' => 'Trabajo en Equipo',
        'team1_description' => 'Nuestro equipo colabora estrechamente para brindar la mejor experiencia a nuestros clientes, combinando experiencia y dedicación.',
        'team2_image' => 'assets/img/nosotros/team 2.jpg',
        'team2_category' => 'Celebración',
        'team2_title' => 'Momentos de Alegría', 
        'team2_description' => 'Celebramos cada logro juntos, creando un ambiente de trabajo positivo que se refleja en la calidad de nuestro servicio.',
        'team3_image' => 'assets/img/nosotros/team 3.jpg',
        'team3_category' => 'Planificación',
        'team3_title' => 'Estrategia y Visión',
        'team3_description' => 'Constantemente planificamos y mejoramos nuestros procesos para ofrecer productos de la más alta calidad a nuestros clientes.',
        'member1_name' => 'Carlos Mendoza',
        'member1_role' => 'Director General',
        'member1_description' => 'Con más de 15 años de experiencia en el sector, Carlos lidera nuestra visión estratégica y el crecimiento de la empresa.',
        'member2_name' => 'María González',
        'member2_role' => 'Gerente de Calidad', 
        'member2_description' => 'María se encarga de garantizar que cada producto cumpla con nuestros estrictos estándares de calidad y durabilidad.',
        'member3_name' => 'Roberto Silva',
        'member3_role' => 'Gerente de Ventas',
        'member3_description' => 'Roberto y su equipo se dedican a brindar la mejor experiencia de compra y atención al cliente.',
        'cta_title' => '¿Listo para Descubrir Nuestros Productos?',
        'cta_description' => 'Explora nuestro catálogo completo y encuentra los productos perfectos para tu hogar',
        'cta_button_text' => 'Ver Tienda',
        'cta_button_url' => 'tienda.html'
    ]);
    echo " ✓ Completado\n";

    echo "\n✅ TABLAS CREADAS EXITOSAMENTE\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "Las siguientes tablas han sido creadas:\n";
    echo "• global_settings: Configuraciones globales del sitio\n";
    echo "• quienes_somos: Contenido de la página Quienes Somos\n\n";
    echo "Datos por defecto insertados correctamente.\n";
    echo "Ya puedes usar los editores desde el panel de administración.\n";

} catch (Exception $e) {
    echo "\n❌ ERROR: " . $e->getMessage() . "\n";
}
?>