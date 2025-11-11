// Configuración personalizable para NeoUI Injector
// Este archivo permite a los usuarios avanzados personalizar el comportamiento de la extensión

// IMPORTANTE: Después de modificar este archivo, recarga la extensión en chrome://extensions/

const NEOUI_CONFIG = {
    // Configuración de rendimiento
    performance: {
        // Intervalo base de verificación en milisegundos (por defecto: 5000 = 5 segundos)
        checkInterval: 5000,
        
        // Multiplicador para el intervalo cuando NeoUI no está presente (por defecto: 2)
        // Esto significa que si NeoUI no se encuentra, el intervalo se duplica
        intervalMultiplier: 2,
        
        // Número de verificaciones consecutivas sin NeoUI antes de reducir frecuencia
        maxConsecutiveNotFound: 3,
        
        // Número máximo de reintentos antes de detener el monitoreo
        maxRetries: 3
    },
    
    // Configuración de logging
    logging: {
        // Modo silencioso por defecto (true = menos logs, false = todos los logs)
        silentMode: true,
        
        // Mostrar logs de debugging (solo para desarrollo)
        debugMode: false,
        
        // Mostrar notificaciones visuales en la página
        showNotifications: true
    },
    
    // URLs de NeoUI (cambiar solo si es necesario)
    urls: {
        css: 'https://neoxygen2.com/neoui/neoui.css',
        js: 'https://neoxygen2.com/neoui/neoui.js'
    },
    
    // Configuración de notificaciones
    notifications: {
        // Duración de las notificaciones en milisegundos
        duration: 3000,
        
        // Posición de las notificaciones ('top-right', 'top-left', 'bottom-right', 'bottom-left')
        position: 'top-right',
        
        // Mostrar notificación cuando NeoUI se inyecta
        showOnInject: true,
        
        // Mostrar notificación cuando NeoUI se remueve
        showOnRemove: true
    },
    
    // Configuración avanzada
    advanced: {
        // Usar MutationObserver para detectar cambios en tiempo real
        useMutationObserver: true,
        
        // Debounce time para MutationObserver en milisegundos
        mutationDebounce: 100,
        
        // Verificar atributos data-neoui-* en el documentElement
        checkDataAttributes: true,
        
        // Limpiar elementos NeoUI al remover (más agresivo)
        aggressiveCleanup: true
    }
};

// Función para aplicar configuración personalizada
function applyCustomConfig() {
    if (typeof window !== 'undefined' && window.neoUIInjector) {
        // Aplicar configuración de logging
        window.neoUIInjector.setSilentMode(NEOUI_CONFIG.logging.silentMode);
        
        console.log('🔧 Configuración personalizada de NeoUI aplicada:', NEOUI_CONFIG);
    }
}

// Auto-aplicar configuración cuando se carga el script
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', applyCustomConfig);
} else {
    applyCustomConfig();
}

// Exponer configuración globalmente para debugging
if (typeof window !== 'undefined') {
    window.NEOUI_CONFIG = NEOUI_CONFIG;
}

// Exportar para uso en otros scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = NEOUI_CONFIG;
}