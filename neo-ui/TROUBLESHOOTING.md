# Guía de Solución de Problemas - NeoUI Extension

Esta guía te ayudará a diagnosticar y resolver los problemas más comunes con la extensión NeoUI que utiliza **archivos locales**.

## 🚨 Problemas Comunes

### 1. Archivos Locales No Encontrados

#### Síntomas:
```
Failed to fetch chrome-extension://[extension-id]/neoui.css
Failed to fetch chrome-extension://[extension-id]/neoui.js
```

#### ✅ Solución:

1. **Verificar archivos**: Asegúrate de que `neoui.css` y `neoui.js` estén en el directorio raíz de la extensión
2. **Verificar manifest.json**: Confirma que `web_accessible_resources` esté configurado correctamente
3. **Recargar extensión**: Ve a `chrome://extensions/` y recarga la extensión

#### Verificación:
```javascript
// En DevTools de la extensión (popup)
const cssUrl = chrome.runtime.getURL('neoui.css');
const jsUrl = chrome.runtime.getURL('neoui.js');
console.log('URLs locales:', { cssUrl, jsUrl });

// Verificar acceso
fetch(cssUrl).then(r => console.log('CSS accesible:', r.ok));
fetch(jsUrl).then(r => console.log('JS accesible:', r.ok));
```

### 2. Error en Configuración del Manifest

#### Síntomas:
```
Extensión no carga
Archivos no accesibles desde la página web
```

#### ✅ Solución:

Verifica que tu `manifest.json` tenga la configuración correcta:

```json
{
  "manifest_version": 3,
  "web_accessible_resources": [{
    "resources": ["neoui.css", "neoui.js"],
    "matches": ["<all_urls>"]
  }]
}
```

### 3. NeoUI No Se Inyecta

#### Síntomas:
- El botón dice "Inyectar NeoUI" pero no pasa nada
- No aparecen elementos de NeoUI en la página
- No hay errores visibles en la consola

#### Diagnóstico Automático:
Ejecuta el script de diagnóstico completo:

```javascript
// Copia y pega todo el contenido de test-fix.js en la consola
// El script realizará un diagnóstico completo automáticamente
```

#### Verificación Manual:

1. **Verificar archivos locales**:
   ```javascript
   // En DevTools de la extensión (popup)
   const cssUrl = chrome.runtime.getURL('neoui.css');
   const jsUrl = chrome.runtime.getURL('neoui.js');
   
   Promise.all([
       fetch(cssUrl).then(r => ({ css: r.ok, status: r.status })),
       fetch(jsUrl).then(r => ({ js: r.ok, status: r.status }))
   ]).then(results => console.log('Estado archivos:', results));
   ```

2. **Verificar inyección inline**:
   ```javascript
   // En DevTools de la página web
   console.log('CSS inyectado:', document.querySelector('#neoui-styles'));
   console.log('Atributo DOM:', document.documentElement.getAttribute('data-neoui-injected'));
   console.log('NeoUI global:', window.NeoUI);
   ```

3. **Verificar content script**:
   ```javascript
   // En DevTools de la página web
   console.log('Content script cargado:', typeof detectNeoUI === 'function');
   ```

#### Soluciones:
- **Verificar archivos**: Asegurar que `neoui.css` y `neoui.js` existan
- **Recargar extensión**: `chrome://extensions/` → Recargar
- **Verificar permisos**: La extensión debe tener acceso a la pestaña actual
- **Revisar consola**: Buscar errores específicos en DevTools

### 4. Extensión No Aparece en la Barra

#### Síntomas:
- No ves el icono de la extensión en la barra de herramientas
- La extensión aparece en `chrome://extensions/` pero no es visible

#### Soluciones:
1. **Anclar extensión**:
   - Haz clic en el icono de puzzle (🧩) en la barra de herramientas
   - Busca "NeoUI Extension"
   - Haz clic en el icono de pin para anclarla

2. **Verificar que esté habilitada**:
   - Ve a `chrome://extensions/`
   - Asegúrate de que el toggle esté activado

3. **Reinstalar si es necesario**:
   - Elimina la extensión
   - Vuelve a cargarla desde la carpeta

### 5. Popup No Se Abre

#### Síntomas:
- Haces clic en el icono pero no aparece el popup
- El icono está visible pero no responde

#### Soluciones:
1. **Verificar errores en popup**:
   - Clic derecho en el icono de la extensión
   - Selecciona "Inspeccionar popup"
   - Revisa la consola para errores

2. **Recargar extensión**:
   - Ve a `chrome://extensions/`
   - Haz clic en el botón de recarga

3. **Verificar permisos**:
   - La extensión necesita permisos para la pestaña actual
   - Algunos sitios pueden bloquear extensiones

### 6. Contenido de Archivos Incompleto

#### Síntomas:
- NeoUI se inyecta pero no funciona correctamente
- Faltan estilos o funcionalidades
- Errores de JavaScript en la consola

#### Soluciones:
1. **Verificar contenido de archivos**:
   ```javascript
   // En DevTools de la extensión
   fetch(chrome.runtime.getURL('neoui.css'))
       .then(r => r.text())
       .then(css => console.log('CSS length:', css.length));
   
   fetch(chrome.runtime.getURL('neoui.js'))
       .then(r => r.text())
       .then(js => console.log('JS length:', js.length));
   ```

2. **Actualizar archivos locales**:
   - Descargar la versión más reciente de NeoUI
   - Reemplazar `neoui.css` y `neoui.js`
   - Recargar la extensión

## 🔧 Herramientas de Diagnóstico

### Script de Diagnóstico Automático

La extensión incluye un script de diagnóstico completo en `test-fix.js`. Para usarlo:

1. **Abre DevTools** en la página donde tienes problemas
2. **Ve a la pestaña Console**
3. **Copia y pega** todo el contenido de `test-fix.js`
4. **Presiona Enter** para ejecutar

El script verificará automáticamente:
- ✅ Estado de la extensión
- ✅ Archivos locales accesibles
- ✅ Configuración del manifest
- ✅ Inyección inline
- ✅ Detección de NeoUI
- ✅ Elementos DOM
- ✅ Variables globales

### Verificación Manual Paso a Paso

#### 1. Estado de la Extensión
```javascript
// Verificar que la extensión esté cargada
console.log('Extension ID:', chrome.runtime.id);
console.log('Extension URL:', chrome.runtime.getURL(''));
```

#### 2. Estado de Archivos Locales
```javascript
// Verificar acceso a archivos locales
const cssUrl = chrome.runtime.getURL('neoui.css');
const jsUrl = chrome.runtime.getURL('neoui.js');

console.log('URLs locales:', { cssUrl, jsUrl });

// Verificar que los archivos existan y sean accesibles
Promise.all([
    fetch(cssUrl).then(r => ({ file: 'CSS', ok: r.ok, status: r.status, size: r.headers.get('content-length') })),
    fetch(jsUrl).then(r => ({ file: 'JS', ok: r.ok, status: r.status, size: r.headers.get('content-length') }))
]).then(results => {
    console.log('Estado archivos locales:', results);
}).catch(error => {
    console.error('Error accediendo archivos locales:', error);
});
```

#### 3. Estado del DOM
```javascript
// Verificar elementos de NeoUI en la página
const neoUIElements = {
    cssStyles: document.querySelector('#neoui-styles'),
    jsScript: document.querySelector('#neoui-script'),
    toolbar: document.querySelector('#neoui-toolbar'),
    dataAttribute: document.documentElement.getAttribute('data-neoui-injected'),
    globalNeoUI: window.NeoUI,
    neoUIActive: window.NeoUI && window.NeoUI.isActive
};
console.log('Elementos NeoUI:', neoUIElements);
```

## 📋 Lista de Verificación para Reportar Problemas

Antes de reportar un problema, por favor completa esta lista:

### Información Básica
- [ ] **Versión de Chrome**: `chrome://version/`
- [ ] **Versión de la extensión**: Visible en `chrome://extensions/`
- [ ] **URL donde ocurre el problema**: 
- [ ] **Pasos para reproducir**: 

### Verificaciones Técnicas
- [ ] **Archivos locales presentes**: `neoui.css` y `neoui.js` en directorio de extensión
- [ ] **Manifest.json correcto**: `web_accessible_resources` configurado
- [ ] **Extensión recargada**: Recargada en `chrome://extensions/`
- [ ] **Permisos verificados**: La extensión tiene acceso a la pestaña
- [ ] **Consola revisada**: Sin errores críticos en DevTools
- [ ] **Script de diagnóstico ejecutado**: Resultados incluidos

### Logs y Errores
- [ ] **Errores de consola**: Copia los errores exactos
- [ ] **Errores de archivos locales**: Incluye errores de fetch si los hay
- [ ] **Estado de elementos**: Resultado de verificación DOM
- [ ] **Tamaño de archivos**: Verificar que los archivos no estén vacíos

## 🚑 Soluciones de Emergencia

### Reset Completo
Si nada funciona, prueba un reset completo:

1. **Verificar archivos**:
   - Confirma que `neoui.css` y `neoui.js` existan
   - Verifica que tengan contenido (no estén vacíos)
   - Compara con versiones originales de neoxygen2.com

2. **Eliminar y reinstalar extensión**:
   - Ve a `chrome://extensions/`
   - Elimina "NeoUI Extension"
   - Cierra Chrome completamente
   - Reinicia Chrome
   - Carga la extensión nuevamente

3. **Verificar configuración**:
   - Revisa `manifest.json`
   - Confirma `web_accessible_resources`
   - Verifica permisos

### Modo de Compatibilidad
Si los archivos locales fallan, usa inyección manual de emergencia:

```javascript
// Inyección manual de emergencia (solo si archivos locales fallan)
const cssContent = `/* Pegar aquí el contenido completo de neoui.css */`;
const jsContent = `/* Pegar aquí el contenido completo de neoui.js */`;

// Inyectar CSS
const style = document.createElement('style');
style.id = 'neoui-styles-emergency';
style.textContent = cssContent;
document.head.appendChild(style);

// Inyectar JS
const script = document.createElement('script');
script.id = 'neoui-script-emergency';
script.textContent = jsContent;
document.head.appendChild(script);

console.log('NeoUI inyectado en modo de emergencia');
```

## 📞 Soporte Adicional

Si ninguna de estas soluciones funciona:

1. Ejecuta el diagnóstico completo
2. Recopila toda la información solicitada
3. Verifica que los archivos locales `neoui.css` y `neoui.js` tengan contenido
4. Incluye capturas de pantalla si es relevante

**Ventajas de la solución con archivos locales:**
- ✅ No hay problemas de CORS
- ✅ No hay problemas de CSP
- ✅ Funciona offline
- ✅ Carga instantánea
- ✅ 100% confiable
- ✅ No depende de la red

**Recuerda:** Con archivos locales, la mayoría de problemas se resuelven verificando que los archivos existan y estén correctamente configurados en el manifest.