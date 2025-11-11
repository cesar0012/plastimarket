// Elementos del DOM
const injectBtn = document.getElementById('injectBtn');
const removeBtn = document.getElementById('removeBtn');
const statusIndicator = document.getElementById('statusIndicator');
const statusText = document.getElementById('statusText');
const statusDiv = document.getElementById('status');

// URLs de NeoUI
const NEOUI_CSS_URL = 'https://neoxygen2.com/neoui/neoui.css';
const NEOUI_JS_URL = 'https://neoxygen2.com/neoui/neoui.js';

// Estado de la aplicación
let isInjected = false;
let isLoading = false;

// Inicialización
document.addEventListener('DOMContentLoaded', async () => {
    await checkNeoUIStatus();
    setupEventListeners();
});

// Configurar event listeners
function setupEventListeners() {
    injectBtn.addEventListener('click', handleInject);
    removeBtn.addEventListener('click', handleRemove);
}

// Verificar si NeoUI ya está inyectado
async function checkNeoUIStatus() {
    try {
        const [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
        
        const results = await chrome.scripting.executeScript({
            target: { tabId: tab.id },
            func: () => {
                // Verificar si NeoUI está presente
                const cssLink = document.querySelector('link[href*="neoui.css"]');
                const jsScript = document.querySelector('script[src*="neoui.js"]');
                return !!(cssLink || jsScript);
            }
        });
        
        isInjected = results[0].result;
        updateUI();
    } catch (error) {
        console.error('Error checking NeoUI status:', error);
        updateStatus('error', 'Error al verificar estado');
    }
}

// Manejar inyección de NeoUI
async function handleInject() {
    if (isLoading || isInjected) return;
    
    setLoading(true);
    updateStatus('loading', 'Inyectando NeoUI...');
    
    try {
        const [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
        
        // Obtener URLs de archivos locales
        const cssUrl = chrome.runtime.getURL('neoui.css');
        const jsUrl = chrome.runtime.getURL('neoui.js');
        
        console.log('CSS URL:', cssUrl);
        console.log('JS URL:', jsUrl);
        
        // Obtener contenido de archivos locales
        const cssResponse = await fetch(cssUrl);
        const jsResponse = await fetch(jsUrl);
        
        if (!cssResponse.ok || !jsResponse.ok) {
            throw new Error('No se pudieron cargar los archivos locales de NeoUI');
        }
        
        const cssContent = await cssResponse.text();
        const jsContent = await jsResponse.text();
        
        // Inyectar CSS y JS de NeoUI
        await chrome.scripting.executeScript({
            target: { tabId: tab.id },
            func: injectNeoUI,
            args: [cssContent, jsContent]
        });
        
        isInjected = true;
        updateStatus('injected', 'NeoUI inyectado correctamente');
        
        // Mostrar notificación de éxito
        showNotification('✅ NeoUI inyectado exitosamente');
        
    } catch (error) {
        console.error('Error injecting NeoUI:', error);
        updateStatus('error', 'Error al inyectar NeoUI');
        showNotification('❌ Error al inyectar NeoUI');
    } finally {
        setLoading(false);
        updateUI();
    }
}

// Manejar remoción de NeoUI
async function handleRemove() {
    if (isLoading || !isInjected) return;
    
    setLoading(true);
    updateStatus('loading', 'Removiendo NeoUI...');
    
    try {
        const [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
        
        // Remover CSS y JS de NeoUI
        await chrome.scripting.executeScript({
            target: { tabId: tab.id },
            func: removeNeoUI
        });
        
        isInjected = false;
        updateStatus('ready', 'NeoUI removido correctamente');
        
        // Mostrar notificación de éxito
        showNotification('🗑️ NeoUI removido exitosamente');
        
    } catch (error) {
        console.error('Error removing NeoUI:', error);
        updateStatus('error', 'Error al remover NeoUI');
        showNotification('❌ Error al remover NeoUI');
    } finally {
        setLoading(false);
        updateUI();
    }
}

// Función que se ejecuta en la página para inyectar NeoUI
function injectNeoUI(cssContent, jsContent) {
    return new Promise((resolve, reject) => {
        try {
            // Verificar si ya está inyectado
            if (document.querySelector('#neoui-css-injected') ||
                document.querySelector('#neoui-js-injected')) {
                resolve('NeoUI ya está presente');
                return;
            }
            
            console.log('Inyectando NeoUI usando archivos locales...');
            
            // Crear elemento style para CSS
            const styleElement = document.createElement('style');
            styleElement.id = 'neoui-css-injected';
            styleElement.textContent = cssContent;
            document.head.appendChild(styleElement);
            
            // Crear elemento script para JS
            const scriptElement = document.createElement('script');
            scriptElement.id = 'neoui-js-injected';
            scriptElement.textContent = jsContent;
            document.head.appendChild(scriptElement);
            
            // Agregar marca de identificación
            document.documentElement.setAttribute('data-neoui-injected', 'true');
            
            // Crear evento personalizado para notificar que NeoUI está listo
            setTimeout(() => {
                const event = new CustomEvent('neoui:loaded', {
                    detail: { timestamp: Date.now(), method: 'local-files' }
                });
                document.dispatchEvent(event);
                resolve('NeoUI inyectado exitosamente usando archivos locales');
            }, 100);
            
        } catch (error) {
            reject(error);
        }
    });
}

// Función que se ejecuta en la página para remover NeoUI
function removeNeoUI() {
    try {
        // Remover CSS (tanto link como style inline)
        const cssElements = document.querySelectorAll('#neoui-css-injected, link[href*="neoui.css"], style[id="neoui-css-injected"]');
        cssElements.forEach(element => element.remove());
        
        // Remover JS (tanto script externo como inline)
        const jsElements = document.querySelectorAll('#neoui-js-injected, script[src*="neoui.js"], script[id="neoui-js-injected"]');
        jsElements.forEach(element => element.remove());
        
        // Remover clases y estilos de NeoUI del DOM
        const neoElements = document.querySelectorAll('[class*="neo-"], [data-neo]');
        neoElements.forEach(element => {
            // Remover clases que contengan 'neo-'
            const classes = Array.from(element.classList);
            classes.forEach(className => {
                if (className.includes('neo-')) {
                    element.classList.remove(className);
                }
            });
            
            // Remover atributos data-neo
            const attributes = Array.from(element.attributes);
            attributes.forEach(attr => {
                if (attr.name.startsWith('data-neo')) {
                    element.removeAttribute(attr.name);
                }
            });
        });
        
        // Remover marca de identificación
        document.documentElement.removeAttribute('data-neoui-injected');
        
        // Crear evento personalizado para notificar que NeoUI fue removido
        const event = new CustomEvent('neoui:removed', {
            detail: { timestamp: Date.now() }
        });
        document.dispatchEvent(event);
        
        return 'NeoUI removido exitosamente';
    } catch (error) {
        throw new Error('Error al remover NeoUI: ' + error.message);
    }
}

// Actualizar estado de carga
function setLoading(loading) {
    isLoading = loading;
    injectBtn.disabled = loading;
    removeBtn.disabled = loading || !isInjected;
    
    if (loading) {
        injectBtn.classList.add('loading');
        removeBtn.classList.add('loading');
    } else {
        injectBtn.classList.remove('loading');
        removeBtn.classList.remove('loading');
    }
}

// Actualizar estado visual
function updateStatus(type, message) {
    statusDiv.className = `status ${type}`;
    statusText.textContent = message;
}

// Actualizar UI según el estado
function updateUI() {
    if (isInjected) {
        injectBtn.disabled = true;
        removeBtn.disabled = false;
        updateStatus('injected', 'NeoUI está activo');
    } else {
        injectBtn.disabled = false;
        removeBtn.disabled = true;
        updateStatus('ready', 'Listo para inyectar');
    }
}

// Mostrar notificación temporal
function showNotification(message) {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 10px;
        right: 10px;
        background: var(--primary-color);
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        z-index: 10000;
        animation: slideIn 0.3s ease;
        box-shadow: var(--shadow);
    `;
    notification.textContent = message;
    
    // Agregar estilos de animación
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
    
    document.body.appendChild(notification);
    
    // Remover después de 3 segundos
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
            if (style.parentNode) {
                style.parentNode.removeChild(style);
            }
        }, 300);
    }, 3000);
}

// Manejar errores globales
window.addEventListener('error', (event) => {
    console.error('Error en popup:', event.error);
    updateStatus('error', 'Error inesperado');
    setLoading(false);
});