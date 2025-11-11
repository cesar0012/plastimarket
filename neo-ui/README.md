# NeoUI Extension

Extensión de Chrome que permite inyectar y gestionar NeoUI en cualquier página web de forma **100% confiable**, eliminando completamente los problemas de **Content Security Policy (CSP)** y **Cross-Origin Resource Sharing (CORS)** mediante archivos locales.

## 🚀 Características Principales

### Solución Definitiva con Archivos Locales
La extensión utiliza **archivos locales incluidos** para garantizar funcionamiento universal:

1. **Archivos Locales** - `neoui.css` y `neoui.js` incluidos en la extensión
2. **chrome.runtime.getURL()** - URLs locales sin restricciones
3. **Fetch Local** - Carga instantánea sin dependencias de red
4. **Inyección Inline** - Bypass completo de CSP

### Funcionalidades Avanzadas
- ✅ **Sin Dependencias Externas**: Archivos incluidos localmente
- ✅ **Confiabilidad 100%**: Sin fallos de red o CORS
- ✅ **Carga Instantánea**: Sin latencia de descarga
- ✅ **Detección Automática**: Identifica si NeoUI ya está presente
- ✅ **Remoción Completa**: Elimina todos los rastros de NeoUI
- ✅ **Monitoreo Continuo**: Detecta cambios dinámicos en la página
- ✅ **Configuración Avanzada**: Modo silencioso, auto-inyección, intervalos personalizables
- ✅ **Compatibilidad Universal**: Funciona en cualquier sitio web

## 🔧 Arquitectura Técnica

### Solución Definitiva: Archivos Locales

La extensión implementa una **arquitectura simplificada** que elimina completamente los problemas de CSP y CORS:

#### 1. Archivos Locales Incluidos
- **Propósito**: Eliminar dependencias externas y restricciones de red
- **Ventaja**: Los archivos locales no tienen restricciones CORS ni CSP
- **Implementación**: `neoui.css` y `neoui.js` incluidos en la extensión

#### 2. chrome.runtime.getURL()
- **Propósito**: Obtener URLs locales accesibles
- **Ventaja**: URLs siempre disponibles sin restricciones
- **Implementación**: URLs del tipo `chrome-extension://[id]/neoui.css`

#### 3. Inyección Inline
- **Propósito**: Evitar todas las restricciones CSP
- **Ventaja**: Los elementos `<style>` y `<script>` inline no están sujetos a CSP
- **Implementación**: `chrome.scripting.executeScript` con código inline

### Componentes Principales

```
📁 neo-ui/
├── 📄 manifest.json          # Configuración de la extensión
├── 📄 popup.html            # Interfaz de usuario
├── 📄 popup.js              # Lógica de inyección simplificada
├── 📄 content.js            # Detección y monitoreo
├── 📄 config.js             # Configuración global
├── 📄 neoui.css             # Estilos de NeoUI (local)
├── 📄 neoui.js              # Funcionalidad de NeoUI (local)
└── 📄 test-fix.js           # Herramientas de diagnóstico
```

### Flujo de Inyección Simplificado

```mermaid
graph TD
    A[Usuario hace clic] --> B[popup.js inicia]
    B --> C[chrome.runtime.getURL()]
    C --> D[fetch() archivos locales]
    D --> E[Obtener contenido CSS/JS]
    E --> F[Inyección Inline]
    F --> G[NeoUI Activo]
```

## Características Adicionales

- 🎯 Interfaz simple y fácil de usar
- 🔍 Detección automática del estado de NeoUI
- 🗑️ Capacidad de remover NeoUI cuando sea necesario
- ⚡ **Optimizado para rendimiento** - Modo silencioso por defecto
- 🔧 Monitoreo inteligente con intervalos dinámicos
- 📊 Herramientas de debugging integradas

## Optimizaciones de Rendimiento

### Problema Resuelto
La versión anterior mostraba constantemente el mensaje "❌ NeoUI no detectado en la página" en TODAS las páginas web, lo que podía:
- Saturar la consola del navegador
- Consumir recursos innecesarios
- Crear ruido en los logs de desarrollo

### Soluciones Implementadas

1. **Modo Silencioso**: Por defecto, la extensión opera en modo silencioso
2. **Intervalos Dinámicos**: El monitoreo se ajusta automáticamente:
   - Intervalo normal: 5 segundos
   - Intervalo reducido: 10 segundos (cuando NeoUI no está presente)
3. **Logs Inteligentes**: Solo muestra mensajes cuando es relevante
4. **Monitoreo Eficiente**: Usa MutationObserver para detectar cambios en tiempo real

## Archivos

- `manifest.json` - Configuración de la extensión
- `popup.html` - Interfaz de usuario del popup
- `popup.css` - Estilos del popup
- `popup.js` - Lógica del popup
- `content.js` - Script optimizado que se ejecuta en las páginas web
- `icons/` - Iconos de la extensión

## Desarrollo

Para desarrolladores que quieran contribuir o modificar la extensión:

1. El archivo `content.js` contiene toda la lógica de monitoreo optimizada
2. Las configuraciones se pueden ajustar en el objeto `CONFIG`
3. El modo silencioso se puede controlar dinámicamente
4. Todas las funciones están expuestas en `window.neoUIInjector` para debugging

## 🛠️ Instalación

### Método 1: Instalación Manual
1. Descarga o clona este repositorio
2. Asegúrate de que los archivos `neoui.css` y `neoui.js` estén presentes
3. Abre Chrome y ve a `chrome://extensions/`
4. Activa el "Modo de desarrollador"
5. Haz clic en "Cargar extensión sin empaquetar"
6. Selecciona la carpeta del proyecto

### Método 2: Desde Chrome Web Store
*(Próximamente disponible)*

## 📋 Uso

### Inyección Básica
1. **Navega** a cualquier página web
2. **Haz clic** en el icono de la extensión
3. **Presiona** "Inyectar NeoUI"
4. **¡Listo!** NeoUI se carga instantáneamente desde archivos locales

### Funciones Avanzadas

#### Detección Automática
- La extensión detecta automáticamente si NeoUI ya está presente
- Muestra el estado actual en tiempo real
- Evita inyecciones duplicadas

#### Remoción Completa
- Botón "Remover NeoUI" elimina completamente la interfaz
- Limpia todos los elementos CSS y JavaScript
- Restaura la página a su estado original

#### Configuración Personalizada
- **Modo Silencioso**: Inyección sin notificaciones
- **Auto-inyección**: Carga automática en páginas específicas
- **Intervalo de Monitoreo**: Personaliza la frecuencia de detección

### Funciones Avanzadas (Consola del Navegador)

```javascript
// Verificar estado actual de NeoUI
window.neoUIInjector.checkStatus();

// Activar/desactivar modo silencioso
window.neoUIInjector.setSilentMode(false); // Activar logs
window.neoUIInjector.setSilentMode(true);  // Modo silencioso

// Verificar configuración actual
window.neoUIInjector.getConfig();

// Controlar monitoreo manualmente
window.neoUIInjector.stopMonitoring();
window.neoUIInjector.startMonitoring();

// Mostrar notificación personalizada
window.neoUIInjector.showNotification('Mensaje personalizado', 'success');
```

## 📊 Ventajas de la Solución

### ✅ Eliminación Total de Problemas de Red
- **Sin CORS**: Los archivos locales no tienen restricciones de origen
- **Sin Dependencias Externas**: No depende de servicios externos
- **Confiabilidad 100%**: Siempre funciona, sin fallos de red

### ✅ Bypass Completo de CSP
- **Inyección Inline**: Evita todas las restricciones CSP
- **chrome.scripting**: API nativa de extensiones
- **Ejecución directa**: Código se ejecuta en contexto de página

### ✅ Rendimiento Óptimo
- **Carga Instantánea**: Sin latencia de descarga
- **Sin Solicitudes HTTP**: Archivos disponibles inmediatamente
- **Menor Uso de Recursos**: No requiere background scripts

### ✅ Simplicidad y Mantenibilidad
- **Arquitectura Simple**: Flujo lineal y predecible
- **Menos Código**: Sin lógica compleja de fallbacks
- **Debugging Fácil**: Un solo punto de fallo posible

### ✅ Detección y Remoción Completa
- **Múltiples indicadores**: CSS, JS, DOM, atributos
- **Monitoreo continuo**: Verificación periódica
- **Limpieza exhaustiva**: Todos los elementos y referencias
- **Restauración de estado**: Página como antes de la inyección

### ✅ Compatibilidad Universal
- **Funciona en Cualquier Sitio**: Sin excepciones
- **Sin Configuración**: No requiere ajustes por sitio
- **Futuro-Proof**: Inmune a cambios en políticas web

## 🔧 Configuración de NeoUI

La extensión carga NeoUI desde las siguientes URLs:

- **CSS**: `https://neoxygen2.com/neoui/neoui.css`
- **JavaScript**: `https://neoxygen2.com/neoui/neoui.js`

### Cambiar URLs de NeoUI

Si necesitas cambiar las URLs de NeoUI, edita las constantes en `popup.js`:

```javascript
const NEOUI_CSS_URL = 'https://tu-dominio.com/neoui/neoui.css';
const NEOUI_JS_URL = 'https://tu-dominio.com/neoui/neoui.js';
```

## 🎨 Personalización

### Colores y Estilos

Puedes personalizar los colores de la extensión editando las variables CSS en `popup.css`:

```css
:root {
    --primary-color: #FF6B35;     /* Color principal */
    --secondary-color: #2C3E50;   /* Color secundario */
    --success-color: #27AE60;     /* Color de éxito */
    --danger-color: #E74C3C;      /* Color de error */
    /* ... más variables */
}
```

### Modificar el Icono

1. Edita los archivos SVG en la carpeta `icons/`
2. Regenera los PNG usando `generate-icons.html`
3. Recarga la extensión en Chrome

## 🔍 Características Técnicas

### Manifest V3

La extensión utiliza Manifest V3, la versión más reciente y segura:

- **Permisos mínimos**: Solo `activeTab` y `scripting`
- **Content Scripts**: Monitoreo automático del estado
- **Service Workers**: No utilizados para mantener simplicidad

### Detección Inteligente

La extensión detecta automáticamente:

- Si NeoUI ya está presente en la página
- Cambios en el DOM relacionados con NeoUI
- Errores durante la inyección o remoción

### Notificaciones

Sistema de notificaciones integrado que muestra:

- ✅ Confirmación de inyección exitosa
- 🗑️ Confirmación de remoción exitosa
- ❌ Errores durante el proceso

## 🐛 Solución de Problemas

## 🔍 Diagnóstico y Troubleshooting

### Script de Diagnóstico Automático
La extensión incluye `test-fix.js` para diagnóstico completo:

```javascript
// Ejecutar en la consola de la página
// Copia y pega el contenido de test-fix.js
```

### Problemas Comunes

#### 1. Archivos no encontrados
**Síntoma**: `Failed to fetch chrome-extension://[id]/neoui.css`
**Solución**: Verificar que `neoui.css` y `neoui.js` estén en el directorio de la extensión

#### 2. Error en manifest.json
**Síntoma**: Extensión no carga o archivos no accesibles
**Solución**: Verificar configuración de `web_accessible_resources`

#### 3. Contenido incompleto
**Síntoma**: NeoUI se inyecta pero no funciona correctamente
**Solución**: Verificar que los archivos locales contengan el código completo

#### 4. NeoUI no se detecta
**Síntoma**: La extensión no reconoce que NeoUI está presente
**Solución**: Verificar que los elementos tengan los IDs correctos (`#neoui-styles`)

---

### Problema Común: "❌ NeoUI no detectado en la página"

Si ves este mensaje frecuentemente, **la extensión ya incluye una solución automática**:

#### Diagnóstico Rápido
1. Abre la consola del navegador (F12)
2. Copia y pega el contenido de `test-fix.js`
3. Presiona Enter y espera 10 segundos
4. Revisa el diagnóstico automático

#### Solución Manual
```javascript
// Activar modo silencioso
window.neoUIInjector.setSilentMode(true);

// Verificar configuración
console.log('Modo silencioso:', window.neoUIInjector.getSilentMode());
```

### Otros Problemas

#### La extensión no aparece

1. Verifica que el "Modo de desarrollador" esté activado
2. Asegúrate de que todos los archivos estén en la carpeta correcta
3. Revisa la consola de Chrome para errores

#### NeoUI no se inyecta

1. Verifica que las URLs de NeoUI sean accesibles
2. Revisa la consola de la página para errores de red
3. Asegúrate de que la página permita la carga de recursos externos

#### El popup no se abre

1. Verifica que `popup.html` exista y sea válido
2. Revisa la consola de extensiones para errores
3. Asegúrate de que todos los archivos CSS y JS estén presentes

#### Debugging Avanzado

Si experimentas otros problemas:

1. **Consulta** `TROUBLESHOOTING.md` para soluciones detalladas
2. **Verifica la consola del navegador** (F12) para mensajes de error
3. **Recarga la extensión** en `chrome://extensions/`
4. **Usa las funciones de debugging**:
   ```javascript
   // En la consola del navegador
   window.neoUIInjector.checkStatus();
   window.neoUIInjector.getConfig();
   ```

## 📝 Desarrollo

### Estructura del Código

- **`manifest.json`**: Configuración y permisos de la extensión
- **`popup.html/css/js`**: Interfaz de usuario del popup
- **`content.js`**: Script que se ejecuta en todas las páginas
- **`icons/`**: Recursos gráficos de la extensión

### Debugging

Para debuggear la extensión:

1. Ve a `chrome://extensions/`
2. Haz clic en "Detalles" de la extensión
3. Haz clic en "Inspeccionar vistas: popup" para debuggear el popup
4. Usa las herramientas de desarrollador de Chrome para debuggear content scripts

### Logs de Consola

La extensión genera logs útiles:

```javascript
// En content.js
console.log('🚀 NeoUI Injector Content Script iniciado');
console.log('✅ NeoUI detectado en la página');
console.log('❌ NeoUI no detectado en la página');

// En popup.js
console.log('Inyectando NeoUI...');
console.log('Removiendo NeoUI...');
```

## 🤝 Contribución

Para contribuir al proyecto:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-caracteristica`)
3. Commit tus cambios (`git commit -am 'Agregar nueva característica'`)
4. Push a la rama (`git push origin feature/nueva-caracteristica`)
5. Crea un Pull Request

## 📄 Licencia

Este proyecto está desarrollado para **PLASTIMARKET** y es de uso interno.

## 🆘 Soporte

Si encuentras algún problema o tienes sugerencias:

1. Revisa la sección de "Solución de Problemas"
2. Verifica los logs de la consola
3. Contacta al equipo de desarrollo

---

**Desarrollado con ❤️ para PLASTIMARKET**

*Versión 1.0 - NeoUI Injector Extension*