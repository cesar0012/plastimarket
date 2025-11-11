# Arquitectura de la Extensión NeoUI

## Visión General

La extensión NeoUI utiliza una arquitectura simplificada basada en archivos locales para eliminar completamente los problemas de CSP y CORS, garantizando máxima compatibilidad y rendimiento.

## Componentes Principales

### 1. Archivos Locales
**Archivos:** `neoui.css`, `neoui.js`
**Propósito:** Recursos de NeoUI incluidos directamente en la extensión

```
┌─────────────────────────────────────┐
│           Archivos Locales          │
│  ┌─────────────────────────────────┐ │
│  │         neoui.css              │ │
│  │    (Estilos completos)         │ │
│  └─────────────────────────────────┘ │
│  ┌─────────────────────────────────┐ │
│  │         neoui.js               │ │
│  │   (Funcionalidad completa)     │ │
│  └─────────────────────────────────┘ │
└─────────────────────────────────────┘
```

**Características:**
- ✅ Sin dependencias externas
- ✅ Sin restricciones de red
- ✅ Carga instantánea
- ✅ 100% confiable

### 2. Popup Script
**Archivo:** `popup.js`
**Propósito:** Interfaz de usuario e inyección simplificada

```
┌─────────────────────────────────────┐
│            Popup Script             │
│  ┌─────────────────────────────────┐ │
│  │         UI Controls            │ │
│  │    (Inyectar/Remover)          │ │
│  └─────────────────────────────────┘ │
│  ┌─────────────────────────────────┐ │
│  │      Local File Injection      │ │
│  │   1. chrome.runtime.getURL()   │ │
│  │   2. fetch() archivos locales  │ │
│  │   3. Inyección inline          │ │
│  └─────────────────────────────────┘ │
└─────────────────────────────────────┘
```

### 3. Content Script
**Archivo:** `content.js`
**Propósito:** Monitoreo y detección de NeoUI en páginas web

```
┌─────────────────────────────────────┐
│           Content Script            │
│  ┌─────────────────────────────────┐ │
│  │       MutationObserver         │ │
│  │     (DOM Change Detection)     │ │
│  └─────────────────────────────────┘ │
│  ┌─────────────────────────────────┐ │
│  │      Status Monitoring         │ │
│  │   (Dynamic Intervals)          │ │
│  └─────────────────────────────────┘ │
└─────────────────────────────────────┘
```

### 4. Configuration System
**Archivo:** `config.js`
**Propósito:** Configuración centralizada y personalizable

## Flujo de Inyección

### Estrategia Simplificada

```
┌─────────────────┐
│  User Click     │
│ "Inyectar NeoUI"│
└─────────┬───────┘
          │
          ▼
┌─────────────────┐
│ chrome.runtime  │
│   .getURL()     │◄─── ✅ URLs locales
└─────────┬───────┘
          │
          ▼
┌─────────────────┐
│ fetch() local   │
│    files        │◄─── ✅ Sin restricciones
└─────────┬───────┘
          │
          ▼
┌─────────────────┐
│ Inyección       │
│    Inline       │◄─── ✅ Bypass CSP
└─────────────────┘
```

### Detalle del Proceso Simplificado

#### Método Único: Archivos Locales + Inline
1. **Popup** obtiene URLs locales con `chrome.runtime.getURL()`
2. **Popup** hace fetch a archivos locales (sin restricciones)
3. **Popup** obtiene contenido CSS y JS
4. **Popup** inyecta contenido como elementos inline
5. **Content Script** detecta la inyección

## Detección y Monitoreo

### Tipos de Elementos Detectados

```javascript
// CSS Detection
const cssSelectors = [
    '#neoui-styles',                     // Inline style con ID específico
    'style[id="neoui-styles"]'          // Selector alternativo
];

// JS Detection
const jsSelectors = [
    '#neoui-script',                     // Inline script con ID específico
    'script[id="neoui-script"]'         // Selector alternativo
];

// Global Detection
const globalIndicators = [
    'window.NeoUI && window.NeoUI.isActive',  // Variable global
    'data-neoui-injected'                     // Atributo DOM
];
```

### MutationObserver

```javascript
// Detecta cambios en el DOM
const observer = new MutationObserver((mutations) => {
    const relevantNodes = mutations
        .flatMap(m => [...m.addedNodes, ...m.removedNodes])
        .filter(node => {
            // Detecta elementos NeoUI
            return isNeoUIElement(node);
        });
    
    if (relevantNodes.length > 0) {
        debouncedCheck(); // Verificación con debounce
    }
});
```

## Ventajas de la Arquitectura

### 🔒 Seguridad
- **Bypassa CSP**: Scripts inline no están sujetos a restricciones externas
- **Sin CORS**: Archivos locales eliminan problemas de origen cruzado
- **Método único confiable**: Sin puntos de fallo de red

### ⚡ Rendimiento
- **Carga instantánea**: Sin latencia de red
- **Detección eficiente**: MutationObserver con debounce
- **Intervalos dinámicos**: Reduce frecuencia cuando no hay cambios
- **Sin overhead**: No requiere background scripts

### 🔧 Mantenibilidad
- **Arquitectura simple**: Flujo lineal y predecible
- **Menos código**: Sin lógica compleja de fallbacks
- **Configuración centralizada**: Fácil personalización
- **Debugging fácil**: Un solo método de inyección

### 🌐 Compatibilidad
- **Universal**: Funciona en cualquier sitio web
- **100% confiable**: Sin dependencias externas
- **Detección robusta**: Múltiples indicadores de estado

## Archivos de Configuración

### manifest.json
```json
{
  "manifest_version": 3,
  "permissions": ["activeTab", "scripting"],
  "web_accessible_resources": [{
    "resources": ["neoui.css", "neoui.js"],
    "matches": ["<all_urls>"]
  }],
  "content_scripts": [{
    "matches": ["<all_urls>"],
    "js": ["config.js", "content.js"]
  }]
}
```

### Orden de Carga
1. `config.js` - Configuración global
2. `content.js` - Monitoreo de página
3. `neoui.css` - Estilos de NeoUI (local)
4. `neoui.js` - Funcionalidad de NeoUI (local)
5. `popup.js` - Solo cuando se abre el popup

## Troubleshooting

Para diagnosticar problemas, la extensión incluye:

- **test-fix.js**: Script de diagnóstico automático
- **TROUBLESHOOTING.md**: Guía detallada de solución de problemas
- **CSP-SOLUTION.md**: Documentación técnica específica
- **Logging detallado**: En consola del navegador

## Futuras Mejoras

### Actualización Automática
```javascript
// Sistema de actualización de archivos locales
async function checkForUpdates() {
    try {
        const remoteVersion = await fetch('https://neoxygen2.com/neoui/version.json');
        const localVersion = chrome.runtime.getManifest().version;
        
        if (remoteVersion.version > localVersion) {
            // Notificar al usuario sobre actualización disponible
            showUpdateNotification();
        }
    } catch (error) {
        // Fallar silenciosamente, usar versión local
    }
}
```

### Configuración Avanzada
- Personalización de temas
- Configuración de componentes específicos
- Perfiles de usuario

### Performance Monitoring
- Métricas de tiempo de inyección
- Estadísticas de uso
- Optimización automática basada en patrones