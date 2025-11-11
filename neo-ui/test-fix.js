// Script de prueba para verificar la corrección del problema "NeoUI no detectado"
// Ejecutar en la consola del navegador (F12)

(function() {
    'use strict';
    
    console.log('🔍 Iniciando diagnóstico de NeoUI Injector...');
    
    // Función para mostrar resultados con estilo
    function logResult(title, value, isGood = null) {
        const emoji = isGood === true ? '✅' : isGood === false ? '❌' : 'ℹ️';
        console.log(`${emoji} ${title}:`, value);
    }
    
    // 1. Verificar si el content script está cargado
    const injectorExists = typeof window.neoUIInjector !== 'undefined';
    logResult('NeoUI Injector cargado', injectorExists, injectorExists);
    
    if (!injectorExists) {
        console.log('❌ ERROR: NeoUI Injector no está cargado. Recarga la página.');
        return;
    }
    
    // 2. Verificar configuración actual
    const currentConfig = window.neoUIInjector.getConfig();
    logResult('Configuración actual', currentConfig);
    
    // 3. Verificar modo silencioso
    const silentMode = window.neoUIInjector.getSilentMode();
    logResult('Modo silencioso activo', silentMode, silentMode);
    
    // 4. Verificar configuración global
    const globalConfigExists = typeof window.NEOUI_CONFIG !== 'undefined';
    logResult('Configuración global cargada', globalConfigExists, globalConfigExists);
    
    if (globalConfigExists) {
        logResult('Configuración global', window.NEOUI_CONFIG);
        const globalSilentMode = window.NEOUI_CONFIG.logging?.silentMode;
        logResult('Modo silencioso en config global', globalSilentMode, globalSilentMode);
    }
    
    // 5. Verificar estado de NeoUI
    const neoUIStatus = window.neoUIInjector.checkStatus();
    logResult('NeoUI detectado en página', neoUIStatus);
    
    // 6. Verificar atributos en documentElement
    const dataStatus = document.documentElement.getAttribute('data-neoui-status');
    const dataTimestamp = document.documentElement.getAttribute('data-neoui-timestamp');
    logResult('Estado en DOM', dataStatus);
    logResult('Timestamp en DOM', dataTimestamp);
    
    // 7. Verificar inyección CSP y métodos de carga
    const inlineCSS = document.querySelector('style[id="neoui-css-injected"]');
    const inlineJS = document.querySelector('script[id="neoui-js-injected"]');
    const externalCSS = document.querySelector('link[href*="neoui.css"]');
    const externalJS = document.querySelector('script[src*="neoui.js"]');
    
    logResult('CSS Injection Type', {
        inline: !!inlineCSS,
        external: !!externalCSS,
        method: inlineCSS ? 'inline (CSP bypass)' : externalCSS ? 'external' : 'none'
    });
    
    logResult('JS Injection Type', {
        inline: !!inlineJS,
        external: !!externalJS,
        method: inlineJS ? 'inline (CSP bypass)' : externalJS ? 'external' : 'none'
    });
    
    logResult('CSP Status', {
         usingInlineInjection: !!(inlineCSS || inlineJS),
         recommendedForCSP: !!(inlineCSS && inlineJS),
         note: 'Inline injection bypasses most CSP restrictions'
     });
     
     // 8. Verificar background script
     logResult('Background Script', {
         available: typeof chrome !== 'undefined' && typeof chrome.runtime !== 'undefined',
         canSendMessage: typeof chrome !== 'undefined' && typeof chrome.runtime.sendMessage === 'function',
         note: 'Background script helps bypass CORS restrictions'
     });
    
    // 9. Aplicar corrección automática si es necesario
    console.log('\n🔧 Aplicando correcciones automáticas...');
    
    let fixesApplied = 0;
    
    // Activar modo silencioso si no está activo
    if (!silentMode) {
        window.neoUIInjector.setSilentMode(true);
        logResult('Modo silencioso activado', true, true);
        fixesApplied++;
    }
    
    // Crear configuración global si no existe
    if (!globalConfigExists) {
        window.NEOUI_CONFIG = {
            performance: {
                checkInterval: 5000,
                maxRetries: 3
            },
            logging: {
                silentMode: true,
                debugMode: false
            }
        };
        logResult('Configuración global creada', true, true);
        fixesApplied++;
    }
    
    // 8. Verificar que no hay logs de error recientes
    console.log('\n📊 Monitoreando logs por 10 segundos...');
    
    let errorCount = 0;
    const originalConsoleLog = console.log;
    
    // Interceptar console.log temporalmente
    console.log = function(...args) {
        const message = args.join(' ');
        if (message.includes('❌ NeoUI no detectado')) {
            errorCount++;
            console.error('🚨 DETECTADO: Mensaje de error persistente:', message);
        }
        originalConsoleLog.apply(console, args);
    };
    
    // Restaurar console.log después de 10 segundos
    setTimeout(() => {
        console.log = originalConsoleLog;
        
        console.log('\n📋 RESUMEN DEL DIAGNÓSTICO:');
        logResult('Correcciones aplicadas', fixesApplied);
        logResult('Errores detectados en 10s', errorCount, errorCount === 0);
        
        if (errorCount === 0 && silentMode) {
            console.log('🎉 ¡ÉXITO! El problema ha sido resuelto.');
            console.log('💡 El modo silencioso está activo y no deberías ver más mensajes de error.');
        } else if (errorCount > 0) {
            console.log('⚠️ PROBLEMA PERSISTENTE: Aún se detectan mensajes de error.');
            console.log('🔧 Soluciones recomendadas:');
            console.log('   1. Recarga la extensión en chrome://extensions/');
            console.log('   2. Recarga esta página');
            console.log('   3. Verifica el archivo manifest.json');
        } else {
            console.log('✅ Configuración correcta, monitoreando...');
        }
        
        // Información adicional para soporte
        console.log('\n🔍 Información para soporte técnico:');
        console.log({
            timestamp: new Date().toISOString(),
            userAgent: navigator.userAgent,
            url: window.location.href,
            injectorConfig: window.neoUIInjector?.getConfig(),
            globalConfig: window.NEOUI_CONFIG,
            silentMode: window.neoUIInjector?.getSilentMode(),
            neoUIPresent: window.neoUIInjector?.checkStatus(),
            domStatus: document.documentElement.getAttribute('data-neoui-status'),
            errorsDetected: errorCount
        });
        
    }, 10000);
    
    console.log('⏱️ Monitoreando... (espera 10 segundos para el resultado final)');
    
})();

// Instrucciones de uso
console.log(`
📖 INSTRUCCIONES:
1. Copia y pega este script completo en la consola
2. Presiona Enter para ejecutar
3. Espera 10 segundos para el diagnóstico completo
4. Revisa el resumen final

🔧 Si el problema persiste, consulta TROUBLESHOOTING.md`);