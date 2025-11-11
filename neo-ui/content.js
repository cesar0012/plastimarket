// Content Script para NeoUI Injector
// Este script se ejecuta en todas las páginas para monitorear el estado de NeoUI

(function() {
    'use strict';
    
    // Configuración (se puede sobrescribir con NEOUI_CONFIG)
    let CONFIG = {
        cssUrl: 'https://neoxygen2.com/neoui/neoui.css',
        jsUrl: 'https://neoxygen2.com/neoui/neoui.js',
        checkInterval: 5000, // Verificar cada 5 segundos (reducido de 1 segundo)
        maxRetries: 3,
        silentMode: true // Modo silencioso para evitar logs innecesarios
    };
    
    // Aplicar configuración personalizada si está disponible
    function applyConfig() {
        if (typeof window.NEOUI_CONFIG !== 'undefined') {
            const customConfig = window.NEOUI_CONFIG;
            CONFIG.checkInterval = customConfig.performance?.checkInterval || CONFIG.checkInterval;
            CONFIG.maxRetries = customConfig.performance?.maxRetries || CONFIG.maxRetries;
            CONFIG.silentMode = customConfig.logging?.silentMode !== undefined ? customConfig.logging.silentMode : CONFIG.silentMode;
            CONFIG.cssUrl = customConfig.urls?.css || CONFIG.cssUrl;
            CONFIG.jsUrl = customConfig.urls?.js || CONFIG.jsUrl;
        }
    }
    
    // Estado del content script
    let isMonitoring = false;
    let retryCount = 0;
    
    // Inicializar cuando el DOM esté listo (con pequeño retraso para config.js)
    function delayedInit() {
        // Pequeño retraso para asegurar que config.js se haya cargado
        setTimeout(() => {
            init();
        }, 100);
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', delayedInit);
    } else {
        delayedInit();
    }
    
    function init() {
        // Aplicar configuración personalizada primero
        applyConfig();
        
        if (!CONFIG.silentMode) {
            console.log('🚀 NeoUI Injector Content Script iniciado');
        }
        
        // Verificar estado inicial
        checkNeoUIStatus();
        
        // Configurar listeners para eventos de NeoUI
        setupNeoUIListeners();
        
        // Configurar observer para cambios en el DOM
        setupDOMObserver();
        
        // Iniciar monitoreo periódico
        startMonitoring();
    }
    
    // Verificar si NeoUI está presente en la página
    function checkNeoUIStatus() {
        const cssPresent = !!document.querySelector('link[href*="neoui.css"], #neoui-css-injected, style[id="neoui-css-injected"]');
        const jsPresent = !!document.querySelector('script[src*="neoui.js"], #neoui-js-injected, script[id="neoui-js-injected"]');
        const dataAttribute = document.documentElement.hasAttribute('data-neoui-injected');
        
        const isPresent = cssPresent || jsPresent || dataAttribute;
        
        if (isPresent) {
            if (!CONFIG.silentMode) {
                console.log('✅ NeoUI detectado en la página');
            }
            markAsInjected();
        } else {
            // Solo mostrar mensaje de "no detectado" si:
            // 1. No está en modo silencioso, O
            // 2. Previamente estaba inyectado (para detectar cuando se remueve)
            const wasInjected = document.documentElement.getAttribute('data-neoui-status') === 'injected';
            const shouldLog = !CONFIG.silentMode || wasInjected;
            
            if (shouldLog) {
                console.log('❌ NeoUI no detectado en la página');
            }
            markAsNotInjected();
        }
        
        return isPresent;
    }
    
    // Marcar página como que tiene NeoUI inyectado
    function markAsInjected() {
        document.documentElement.setAttribute('data-neoui-status', 'injected');
        document.documentElement.setAttribute('data-neoui-timestamp', Date.now().toString());
    }
    
    // Marcar página como que NO tiene NeoUI inyectado
    function markAsNotInjected() {
        document.documentElement.setAttribute('data-neoui-status', 'not-injected');
        document.documentElement.removeAttribute('data-neoui-timestamp');
    }
    
    // Configurar listeners para eventos de NeoUI
    function setupNeoUIListeners() {
        // Listener para cuando NeoUI se carga
        document.addEventListener('neoui:loaded', (event) => {
            console.log('🎉 NeoUI cargado exitosamente:', event.detail);
            markAsInjected();
            showNeoUINotification('NeoUI activado', 'success');
        });
        
        // Listener para cuando NeoUI se remueve
        document.addEventListener('neoui:removed', (event) => {
            console.log('🗑️ NeoUI removido:', event.detail);
            markAsNotInjected();
            showNeoUINotification('NeoUI desactivado', 'info');
        });
        
        // Listener para errores de NeoUI
        document.addEventListener('neoui:error', (event) => {
            console.error('❌ Error en NeoUI:', event.detail);
            showNeoUINotification('Error en NeoUI', 'error');
        });
    }
    
    // Configurar observer para cambios en el DOM
    function setupDOMObserver() {
        const observer = new MutationObserver((mutations) => {
            let shouldCheck = false;
            
            mutations.forEach((mutation) => {
                // Verificar si se agregaron o removieron elementos link o script
                if (mutation.type === 'childList') {
                    const addedNodes = Array.from(mutation.addedNodes);
                    const removedNodes = Array.from(mutation.removedNodes);
                    
                    const relevantNodes = [...addedNodes, ...removedNodes].filter(node => {
                        if (node.nodeType !== Node.ELEMENT_NODE) return false;
                        
                        const tagName = node.tagName?.toLowerCase();
                        if (tagName === 'link' || tagName === 'script') {
                            const href = node.href || node.src || '';
                            return href.includes('neoui');
                        }
                        
                        // Detectar elementos style o script con id neoui-*-injected
                        if (tagName === 'style' || tagName === 'script') {
                            const id = node.id || '';
                            return id.includes('neoui') && id.includes('injected');
                        }
                        
                        return false;
                    });
                    
                    if (relevantNodes.length > 0) {
                        shouldCheck = true;
                    }
                }
                
                // Verificar cambios en atributos del documentElement
                if (mutation.type === 'attributes' && 
                    mutation.target === document.documentElement &&
                    mutation.attributeName === 'data-neoui-injected') {
                    shouldCheck = true;
                }
            });
            
            if (shouldCheck) {
                // Debounce la verificación
                clearTimeout(window.neoUICheckTimeout);
                window.neoUICheckTimeout = setTimeout(checkNeoUIStatus, 100);
            }
        });
        
        // Observar cambios en head y documentElement
        observer.observe(document.head, {
            childList: true,
            subtree: true
        });
        
        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-neoui-injected', 'data-neoui-status']
        });
    }
    
    // Iniciar monitoreo periódico (optimizado)
    function startMonitoring() {
        if (isMonitoring) return;
        
        isMonitoring = true;
        let consecutiveNotFound = 0;
        const maxConsecutiveNotFound = 3; // Después de 3 verificaciones sin NeoUI, reducir frecuencia
        
        const monitor = () => {
            try {
                const wasFound = checkNeoUIStatus();
                
                if (wasFound) {
                    consecutiveNotFound = 0;
                } else {
                    consecutiveNotFound++;
                }
                
                retryCount = 0; // Reset retry count on success
            } catch (error) {
                if (!CONFIG.silentMode) {
                    console.error('Error en monitoreo de NeoUI:', error);
                }
                retryCount++;
                
                if (retryCount >= CONFIG.maxRetries) {
                    if (!CONFIG.silentMode) {
                        console.warn('Máximo número de reintentos alcanzado, deteniendo monitoreo');
                    }
                    isMonitoring = false;
                    return;
                }
            }
            
            if (isMonitoring) {
                // Ajustar intervalo dinámicamente: si no se encuentra NeoUI por varias veces,
                // aumentar el intervalo para reducir el impacto en el rendimiento
                const dynamicInterval = consecutiveNotFound >= maxConsecutiveNotFound 
                    ? CONFIG.checkInterval * 2 
                    : CONFIG.checkInterval;
                    
                setTimeout(monitor, dynamicInterval);
            }
        };
        
        // Primer chequeo inmediato, luego usar intervalo
        setTimeout(monitor, 1000);
    }
    
    // Detener monitoreo
    function stopMonitoring() {
        isMonitoring = false;
    }
    
    // Mostrar notificación de NeoUI
    function showNeoUINotification(message, type = 'info') {
        // Solo mostrar si no hay otras notificaciones activas
        if (document.querySelector('.neoui-notification')) return;
        
        const notification = document.createElement('div');
        notification.className = 'neoui-notification';
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${getNotificationColor(type)};
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 14px;
            font-weight: 500;
            z-index: 999999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            animation: neoui-slide-in 0.3s ease;
            max-width: 300px;
            word-wrap: break-word;
        `;
        
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 8px;">
                <span style="font-size: 16px;">${getNotificationIcon(type)}</span>
                <span>${message}</span>
            </div>
        `;
        
        // Agregar estilos de animación si no existen
        if (!document.querySelector('#neoui-notification-styles')) {
            const style = document.createElement('style');
            style.id = 'neoui-notification-styles';
            style.textContent = `
                @keyframes neoui-slide-in {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
                @keyframes neoui-slide-out {
                    from {
                        transform: translateX(0);
                        opacity: 1;
                    }
                    to {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
        
        document.body.appendChild(notification);
        
        // Auto-remover después de 3 segundos
        setTimeout(() => {
            if (notification.parentNode) {
                notification.style.animation = 'neoui-slide-out 0.3s ease';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }
        }, 3000);
    }
    
    // Obtener color de notificación según el tipo
    function getNotificationColor(type) {
        const colors = {
            success: '#27AE60',
            error: '#E74C3C',
            warning: '#F39C12',
            info: '#3498DB'
        };
        return colors[type] || colors.info;
    }
    
    // Obtener icono de notificación según el tipo
    function getNotificationIcon(type) {
        const icons = {
            success: '✅',
            error: '❌',
            warning: '⚠️',
            info: 'ℹ️'
        };
        return icons[type] || icons.info;
    }
    
    // Exponer funciones útiles al contexto global para debugging
    if (typeof window !== 'undefined') {
        window.neoUIInjector = {
            checkStatus: checkNeoUIStatus,
            startMonitoring,
            stopMonitoring,
            showNotification: showNeoUINotification,
            setSilentMode: (silent) => {
                CONFIG.silentMode = silent;
                // También actualizar la configuración global si existe
                if (typeof window.NEOUI_CONFIG !== 'undefined') {
                    window.NEOUI_CONFIG.logging.silentMode = silent;
                }
                console.log(`🔧 NeoUI Injector: Modo silencioso ${silent ? 'activado' : 'desactivado'}`);
            },
            getSilentMode: () => CONFIG.silentMode,
            getConfig: () => ({ ...CONFIG })
        };
    }
    
    // Cleanup al descargar la página
    window.addEventListener('beforeunload', () => {
        stopMonitoring();
    });
    
    if (!CONFIG.silentMode) {
        console.log('✨ NeoUI Injector Content Script configurado correctamente');
    }
    
})();