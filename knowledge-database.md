# PLASTIMARKET - Base de Conocimiento del Proyecto

## 📋 Información General del Proyecto

### Descripción
**PLASTIMARKET** es una tienda de comercio electrónico especializada en productos de melamina y plásticos de alta calidad en El Salvador. El sitio web está diseñado para ofrecer tanto ventas al por menor como al por mayor, con precios exclusivos para mayoristas.

### Datos de la Empresa
- **Nombre**: PLASTIMARKET
- **Eslogan**: "Tu tienda de comercio electrónico"
- **Ubicación**: El Salvador
- **Especialidad**: Productos de melamina y plásticos de alta calidad
- **Modelo de Negocio**: B2B y B2C (Retail y Mayoreo)

---

## 🏗️ Estructura del Proyecto

### Archivos HTML Principales
```
├── index.html              # Página principal
├── quienes-somos.html      # Página "Quienes Somos" (anteriormente nosotros.html)
├── tienda.html             # Catálogo de productos
├── contacto.html           # Página de contacto
├── carrito.html            # Carrito de compras
├── checkout.html           # Proceso de pago
├── producto.html           # Página de producto individual
└── modal-test.html         # Página de pruebas para modales
```

### Estructura de Carpetas
```
├── assets/
│   ├── css/                # Archivos de estilos
│   │   ├── styles.css      # Estilos principales
│   │   ├── quienes-somos.css # Estilos específicos de "Quienes Somos"
│   │   ├── tienda.css      # Estilos de la tienda
│   │   ├── contacto.css    # Estilos de contacto
│   │   ├── carrito.css     # Estilos del carrito
│   │   ├── checkout.css    # Estilos del checkout
│   │   └── producto.css    # Estilos de producto
│   ├── js/                 # Scripts JavaScript
│   │   ├── script.js       # Script principal
│   │   ├── enhanced-pricing.js # Sistema de precios mejorado
│   │   ├── compact-pricing.js  # Sistema de precios compacto
│   │   ├── dynamic-pricing.js  # Sistema de precios dinámico
│   │   ├── quienes-somos.js    # Scripts de "Quienes Somos"
│   │   ├── tienda.js       # Scripts de la tienda
│   │   ├── contacto.js     # Scripts de contacto
│   │   ├── producto.js     # Scripts de producto
│   │   └── [otros scripts específicos]
│   └── img/                # Imágenes del proyecto
│       └── nosotros/       # Imágenes de la sección "Quienes Somos"
└── NeoUI/                  # Herramienta de desarrollo UI
    ├── README.md
    ├── neoui.css
    └── neoui.js
```

---

## 🎨 Diseño y Tecnologías

### Stack Tecnológico
- **Frontend Framework**: Bootstrap 5.3.0
- **Iconos**: Font Awesome 6.4.0
- **Fuentes**: Google Fonts (Inter)
- **Animaciones**: AOS (Animate On Scroll) 2.3.1
- **JavaScript**: Vanilla ES6+
- **CSS**: CSS3 con variables personalizadas

### Paleta de Colores
```css
:root {
    --primary-color: #FF6B35;      /* Naranja principal */
    --secondary-color: #2C3E50;    /* Azul oscuro */
    --accent-color: #F39C12;       /* Amarillo/Naranja */
    --text-dark: #2C3E50;          /* Texto oscuro */
    --text-light: #7F8C8D;         /* Texto claro */
    --bg-light: #F8F9FA;           /* Fondo claro */
    --white: #FFFFFF;
    --black: #000000;
    --border-color: #E9ECEF;
}
```

### Características de Diseño
- **Responsive Design**: Mobile-first approach
- **Animaciones**: Efectos de entrada y transiciones suaves
- **Lazy Loading**: Carga diferida de imágenes
- **Dark Mode**: Soporte nativo para modo oscuro
- **Glassmorphism**: Efectos de vidrio esmerilado
- **Microinteracciones**: Efectos hover y de click

---

## 🛍️ Funcionalidades del E-commerce

### Sistema de Precios
El proyecto incluye **tres sistemas de precios diferentes**:

1. **Enhanced Pricing System** (`enhanced-pricing.js`)
   - Transición automática entre precios retail y mayoreo
   - Basado en cantidad mínima (6 unidades)
   - Animaciones visuales para estados activos/inactivos
   - Descuento del 15% para mayoristas

2. **Compact Pricing System** (`compact-pricing.js`)
   - Sistema compacto de precios
   - Manejo de eventos de cantidad
   - Transiciones automáticas de precios

3. **Dynamic Pricing System** (`dynamic-pricing.js`)
   - Sistema dinámico con animaciones
   - Toggle entre modos retail y mayoreo
   - Manejo de cambios de cantidad

### Categorías de Productos
- **BEBIDAS** (3 productos)
- **COCINA** (45 productos)
- **DECORACIÓN** (32 productos)
- **ELECTRODOMÉSTICOS** (15 productos)
- **FERRETERÍA** (22 productos)
- **INFANTIL** (8 productos)
- **IMPORTACIÓN** (12 productos)
- **LIMPIEZA Y BAÑO** (3 productos)
- **MUEBLES** (3 productos)
- **MESA Y BAR** (3 productos)
- **MASCOTAS** (6 productos)
- **OFERTAS** (¡HOT!)
- **ORGANIZACIÓN** (3 productos)

### Funcionalidades del Carrito
- Añadir/quitar productos
- Actualizar cantidades
- Cálculo automático de totales
- Persistencia de datos
- Integración con sistema de precios

---

## 📱 Navegación y UX

### Estructura de Navegación
```
HEADER
├── Logo PLASTIMARKET
├── Navegación Principal
│   ├── INICIO (index.html)
│   ├── QUIENES SOMOS (quienes-somos.html)
│   ├── TIENDA (tienda.html)
│   └── CONTACTO (contacto.html)
├── Barra de Búsqueda
│   ├── Selector de categorías
│   └── Campo de búsqueda
└── Iconos de Usuario
    ├── Búsqueda
    ├── Usuario
    ├── Carrito
    └── Menú de Categorías (Offcanvas)
```

### Menú de Categorías (Sidebar)
- **Offcanvas** de Bootstrap 5
- Búsqueda de categorías
- Iconos personalizados para cada categoría
- Contadores de productos
- Submenús desplegables
- Animaciones de entrada

### Características UX
- **Breadcrumbs** en todas las páginas
- **Filtros avanzados** en la tienda
- **Paginación** de productos
- **Vista de cuadrícula/lista**
- **Ordenamiento** por precio, popularidad, etc.
- **Búsqueda en tiempo real**

---

## 🔧 Funcionalidades JavaScript

### Script Principal (`script.js`)
```javascript
// Funcionalidades principales:
- initAnimations()          // Animaciones de entrada
- initLazyLoading()         // Carga diferida de imágenes
- initQuantitySelectors()   // Selectores de cantidad
- initSmoothScrolling()     // Scroll suave
- initHeaderEffects()       // Efectos del header
- initProductCards()        // Tarjetas de productos
- initTestimonialCards()    // Tarjetas de testimonios
- initCategoryCards()       // Tarjetas de categorías
- initCategoriesMenu()      // Menú de categorías
- initCountdown()           // Contador regresivo
- initNewsletterForm()      // Formulario de newsletter
```

### Intersection Observer
- **Lazy Loading** de imágenes
- **Animaciones** al entrar en viewport
- **Optimización** de rendimiento
- **Threshold**: 0.1 con rootMargin

### Manejo de Errores
- Captura global de errores
- Logging para debugging
- Fallbacks para funcionalidades críticas

---

## 🎯 Características Especiales

### Modal de Políticas
- **Popup flotante** para políticas de venta
- **Auto-apertura** al cargar la página
- **Efecto ripple** en botones
- **Animaciones CSS** personalizadas
- **Responsive design**

### Sistema de Testimonios
- **Carrusel** de testimonios de clientes
- **Animaciones** de entrada
- **Responsive** en todos los dispositivos
- **Auto-play** opcional

### Contador de Ofertas
- **Flash countdown** para ofertas limitadas
- **Múltiples contadores** simultáneos
- **Animaciones** de números
- **Actualización** en tiempo real

### Newsletter
- **Formulario** de suscripción
- **Validación** de email
- **Feedback** visual
- **Integración** con backend

---

## 🛠️ Herramientas de Desarrollo

### NeoUI
- **Herramienta avanzada** para generar prompts de IA
- **Elementos modernos**: colores, glassmorphism, animaciones
- **Funcionalidades**:
  - Selección de elementos
  - Acciones de diseño (modernizar, responsive, animaciones)
  - Acciones de componentes (crear, duplicar, optimizar)
  - Generador de prompts personalizado
- **Carga automática** en entornos de desarrollo
- **Solo localhost**: 127.0.0.1 o protocolo file

---

## 📊 Optimización y Rendimiento

### Core Web Vitals
- **LCP** (Largest Contentful Paint): Optimizado
- **FID** (First Input Delay): Minimizado
- **CLS** (Cumulative Layout Shift): Controlado

### Optimizaciones Implementadas
- **Lazy Loading** de imágenes
- **Minificación** de CSS y JS
- **Compresión** de imágenes
- **Carga asíncrona** de scripts no críticos
- **Preload** de recursos críticos

### Recomendaciones de Mejora
1. **Consolidar sistemas de precios** (actualmente hay 3)
2. **Remover NeoUI** de producción
3. **Externalizar modal** del HTML inline
4. **Implementar lazy loading** para scripts no críticos
5. **Minificar y combinar** archivos JavaScript

---

## 📞 Información de Contacto

### Datos de Contacto
- **Teléfono**: +1 (555) 123-4567
- **Email**: info@plastimarket.com
- **Dirección**: 123 Calle Principal, Ciudad

### Redes Sociales
- **Facebook**: Enlace disponible
- **Instagram**: Enlace disponible
- **TikTok**: Enlace disponible

---

## 🔄 Historial de Cambios Recientes

### Cambio de "Nosotros" a "Quienes Somos"
- **Archivos renombrados**:
  - `nosotros.css` → `quienes-somos.css`
  - `nosotros.js` → `quienes-somos.js`
- **Enlaces actualizados** en todos los archivos HTML
- **Navegación** actualizada de "NOSOTROS" a "QUIENES SOMOS"
- **Referencias** en footers corregidas

### Optimizaciones de Dropdown
- **Problema resuelto**: Items de dropdown invisibles
- **Solución**: CSS `opacity: 1 !important` y `transform: translateX(0) !important`
- **Animaciones**: Preservadas con `fadeInItem`
- **Color de texto**: `#333` con `!important`

---

## 🚀 Próximos Pasos Recomendados

1. **Optimización de Performance**
   - Consolidar sistemas de precios
   - Remover dependencias innecesarias
   - Implementar code splitting

2. **Funcionalidades Pendientes**
   - Sistema de autenticación
   - Integración de pagos
   - Panel de administración
   - API para gestión de productos

3. **SEO y Marketing**
   - Optimización de meta tags
   - Schema markup
   - Sitemap XML
   - Google Analytics

4. **Accesibilidad**
   - Cumplimiento WCAG 2.1
   - Navegación por teclado
   - Screen reader compatibility
   - Contraste de colores

---

## 📝 Notas Técnicas

### Compatibilidad
- **Navegadores**: Chrome, Firefox, Safari, Edge (últimas 2 versiones)
- **Dispositivos**: Desktop, Tablet, Mobile
- **Resoluciones**: 320px - 1920px+

### Dependencias Externas
- Bootstrap 5.3.0 (CDN)
- Font Awesome 6.4.0 (CDN)
- Google Fonts - Inter (CDN)
- AOS 2.3.1 (CDN)

### Estructura de Archivos CSS
- **Variables CSS** para consistencia
- **Mobile-first** approach
- **BEM methodology** en clases
- **Modular structure** por páginas

---

*Documento generado automáticamente - Última actualización: 2025*
*Proyecto: PLASTIMARKET E-commerce Platform*
*Versión: 2.0.0*