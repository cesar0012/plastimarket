/**
 * NeoUI JavaScript - Advanced UI Generator
 * Enhanced functionality for the AI prompt generation tool
 * Version: 1.0.0
 */

(function() {
    'use strict';

    // Global NeoUI object
    window.NeoUI = {
        version: '1.0.0',
        isActive: false,
        selectedElement: null,
        toolbar: null,
        isDragging: false,
        dragOffset: { x: 0, y: 0 },
        isMinimized: false,
        
        // Configuration
        config: {
            position: { x: 20, y: 20 },
            autoHide: false,
            theme: 'default',
            language: 'es'
        },

        // Initialize NeoUI
        init: function() {
            if (this.isActive) {
                console.log('NeoUI ya está activo');
                return;
            }

            this.createToolbar();
            this.attachEventListeners();
            this.isActive = true;
            this.showNotification('NeoUI activado correctamente', 'success');
            console.log('NeoUI inicializado correctamente');
        },

        // Create the main toolbar
        createToolbar: function() {
            if (document.getElementById('neoui-toolbar')) {
                return;
            }

            const toolbar = document.createElement('div');
            toolbar.id = 'neoui-toolbar';
            toolbar.innerHTML = `
                <div class="neoui-header">
                    <div class="neoui-logo">
                        <span class="neoui-icon">🚀</span>
                        <span class="neoui-title">NeoUI</span>
                    </div>
                    <div class="neoui-controls">
                        <button class="neoui-minimize" title="Minimizar">−</button>
                        <button class="neoui-close" title="Cerrar">×</button>
                    </div>
                </div>
                <div class="neoui-content">
                    <div class="neoui-section">
                        <h4>🎯 Selección de Elementos</h4>
                        <button class="neoui-btn neoui-secondary" id="neoui-select-element">
                            <span class="neoui-btn-icon">🎯</span>
                            Seleccionar Elemento
                        </button>
                        <div id="neoui-selected-info" class="neoui-selected-info" style="display: none;">
                            <div class="neoui-placeholder">Ningún elemento seleccionado</div>
                        </div>
                    </div>
                    
                    <div class="neoui-section">
                        <h4>⚡ Prompts Rápidos</h4>
                        <button class="neoui-btn neoui-primary" data-prompt="Analiza este elemento y describe su función en la interfaz de usuario">
                            <span class="neoui-btn-icon">🔍</span>
                            Analizar Elemento
                        </button>
                        <button class="neoui-btn neoui-secondary" data-prompt="Sugiere mejoras de UX/UI para este elemento">
                            <span class="neoui-btn-icon">✨</span>
                            Mejorar UX/UI
                        </button>
                        <button class="neoui-btn neoui-secondary" data-prompt="Genera código CSS para estilizar este elemento">
                            <span class="neoui-btn-icon">🎨</span>
                            Generar CSS
                        </button>
                        <button class="neoui-btn neoui-secondary" data-prompt="Crea JavaScript para añadir interactividad a este elemento">
                            <span class="neoui-btn-icon">⚡</span>
                            Añadir JS
                        </button>
                    </div>
                    
                    <div class="neoui-section">
                        <h4>🛠️ Herramientas Avanzadas</h4>
                        <button class="neoui-btn neoui-success" data-prompt="Realiza una auditoría de accesibilidad de este elemento">
                            <span class="neoui-btn-icon">♿</span>
                            Auditoría A11Y
                        </button>
                        <button class="neoui-btn neoui-secondary" data-prompt="Optimiza el rendimiento de este elemento">
                            <span class="neoui-btn-icon">🚀</span>
                            Optimizar
                        </button>
                        <button class="neoui-btn neoui-secondary" data-prompt="Genera tests automatizados para este elemento">
                            <span class="neoui-btn-icon">🧪</span>
                            Crear Tests
                        </button>
                    </div>
                    
                    <div class="neoui-section">
                        <h4>✍️ Prompt Personalizado</h4>
                        <textarea id="neoui-custom-prompt" placeholder="Escribe tu prompt personalizado aquí..."></textarea>
                        <button class="neoui-btn neoui-primary" id="neoui-execute-custom">
                            <span class="neoui-btn-icon">🎯</span>
                            Ejecutar Prompt
                        </button>
                    </div>
                    
                    <div class="neoui-section" id="neoui-output-section" style="display: none;">
                        <h4>📋 Resultado</h4>
                        <div class="neoui-prompt-output" id="neoui-prompt-output"></div>
                        <div class="neoui-prompt-actions">
                            <button class="neoui-btn neoui-success" id="neoui-copy-prompt">
                                <span class="neoui-btn-icon">📋</span>
                                Copiar
                            </button>
                            <button class="neoui-btn neoui-secondary" id="neoui-clear-output">
                                <span class="neoui-btn-icon">🗑️</span>
                                Limpiar
                            </button>
                        </div>
                    </div>
                </div>
            `;

            document.body.appendChild(toolbar);
            this.toolbar = toolbar;
            this.makeDraggable(toolbar);
        },

        // Attach event listeners
        attachEventListeners: function() {
            const toolbar = this.toolbar;
            
            // Close button
            toolbar.querySelector('.neoui-close').addEventListener('click', () => {
                this.destroy();
            });
            
            // Minimize button
            toolbar.querySelector('.neoui-minimize').addEventListener('click', () => {
                this.toggleMinimize();
            });
            
            // Select element button
            toolbar.querySelector('#neoui-select-element').addEventListener('click', () => {
                this.startElementSelection();
            });
            
            // Quick prompt buttons
            toolbar.querySelectorAll('[data-prompt]').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const prompt = e.currentTarget.getAttribute('data-prompt');
                    this.executePrompt(prompt);
                });
            });
            
            // Custom prompt execution
            toolbar.querySelector('#neoui-execute-custom').addEventListener('click', () => {
                const customPrompt = toolbar.querySelector('#neoui-custom-prompt').value.trim();
                if (customPrompt) {
                    this.executePrompt(customPrompt);
                } else {
                    this.showNotification('Por favor, escribe un prompt personalizado', 'error');
                }
            });
            
            // Copy prompt button
            toolbar.querySelector('#neoui-copy-prompt').addEventListener('click', () => {
                this.copyToClipboard();
            });
            
            // Clear output button
            toolbar.querySelector('#neoui-clear-output').addEventListener('click', () => {
                this.clearOutput();
            });
            
            // Keyboard shortcuts
            document.addEventListener('keydown', (e) => {
                if (e.ctrlKey && e.shiftKey && e.key === 'N') {
                    e.preventDefault();
                    if (this.isActive) {
                        this.destroy();
                    } else {
                        this.init();
                    }
                }
                
                if (e.key === 'Escape' && this.isActive) {
                    this.stopElementSelection();
                }
            });
        },

        // Make toolbar draggable
        makeDraggable: function(element) {
            const header = element.querySelector('.neoui-header');
            
            header.addEventListener('mousedown', (e) => {
                this.isDragging = true;
                const rect = element.getBoundingClientRect();
                this.dragOffset.x = e.clientX - rect.left;
                this.dragOffset.y = e.clientY - rect.top;
                
                document.addEventListener('mousemove', this.handleDrag.bind(this));
                document.addEventListener('mouseup', this.stopDrag.bind(this));
                
                e.preventDefault();
            });
        },

        // Handle drag movement
        handleDrag: function(e) {
            if (!this.isDragging) return;
            
            const x = e.clientX - this.dragOffset.x;
            const y = e.clientY - this.dragOffset.y;
            
            // Keep toolbar within viewport
            const maxX = window.innerWidth - this.toolbar.offsetWidth;
            const maxY = window.innerHeight - this.toolbar.offsetHeight;
            
            const constrainedX = Math.max(0, Math.min(x, maxX));
            const constrainedY = Math.max(0, Math.min(y, maxY));
            
            this.toolbar.style.left = constrainedX + 'px';
            this.toolbar.style.top = constrainedY + 'px';
            this.toolbar.style.right = 'auto';
        },

        // Stop dragging
        stopDrag: function() {
            this.isDragging = false;
            document.removeEventListener('mousemove', this.handleDrag.bind(this));
            document.removeEventListener('mouseup', this.stopDrag.bind(this));
        },

        // Toggle minimize state
        toggleMinimize: function() {
            this.isMinimized = !this.isMinimized;
            this.toolbar.classList.toggle('neoui-minimized', this.isMinimized);
            
            const minimizeBtn = this.toolbar.querySelector('.neoui-minimize');
            minimizeBtn.textContent = this.isMinimized ? '+' : '−';
            minimizeBtn.title = this.isMinimized ? 'Maximizar' : 'Minimizar';
        },

        // Start element selection mode
        startElementSelection: function() {
            this.showNotification('Haz clic en cualquier elemento para seleccionarlo. Presiona ESC para cancelar.', 'info');
            
            document.body.style.cursor = 'crosshair';
            
            // Add hover effect to all elements
            document.addEventListener('mouseover', this.highlightElement.bind(this));
            document.addEventListener('mouseout', this.unhighlightElement.bind(this));
            document.addEventListener('click', this.selectElement.bind(this));
            
            // Update button state
            const selectBtn = this.toolbar.querySelector('#neoui-select-element');
            selectBtn.classList.add('neoui-active');
            selectBtn.innerHTML = '<span class="neoui-btn-icon">⏹️</span> Cancelar Selección';
        },

        // Stop element selection mode
        stopElementSelection: function() {
            document.body.style.cursor = '';
            
            // Remove event listeners
            document.removeEventListener('mouseover', this.highlightElement.bind(this));
            document.removeEventListener('mouseout', this.unhighlightElement.bind(this));
            document.removeEventListener('click', this.selectElement.bind(this));
            
            // Remove any remaining highlights
            document.querySelectorAll('.neoui-element-highlight').forEach(el => {
                el.classList.remove('neoui-element-highlight');
            });
            
            // Reset button state
            const selectBtn = this.toolbar.querySelector('#neoui-select-element');
            selectBtn.classList.remove('neoui-active');
            selectBtn.innerHTML = '<span class="neoui-btn-icon">🎯</span> Seleccionar Elemento';
        },

        // Highlight element on hover
        highlightElement: function(e) {
            if (e.target.closest('#neoui-toolbar')) return;
            
            // Remove previous highlights
            document.querySelectorAll('.neoui-element-highlight').forEach(el => {
                el.classList.remove('neoui-element-highlight');
            });
            
            // Add highlight to current element
            e.target.classList.add('neoui-element-highlight');
        },

        // Remove highlight from element
        unhighlightElement: function(e) {
            if (e.target.closest('#neoui-toolbar')) return;
            e.target.classList.remove('neoui-element-highlight');
        },

        // Select an element
        selectElement: function(e) {
            if (e.target.closest('#neoui-toolbar')) return;
            
            e.preventDefault();
            e.stopPropagation();
            
            this.selectedElement = e.target;
            this.updateSelectedElementInfo();
            this.stopElementSelection();
            
            this.showNotification('Elemento seleccionado correctamente', 'success');
        },

        // Update selected element information
        updateSelectedElementInfo: function() {
            const infoDiv = this.toolbar.querySelector('#neoui-selected-info');
            
            if (!this.selectedElement) {
                infoDiv.style.display = 'none';
                return;
            }
            
            const element = this.selectedElement;
            const tagName = element.tagName.toLowerCase();
            const className = element.className ? `.${element.className.split(' ').join('.')}` : '';
            const id = element.id ? `#${element.id}` : '';
            const text = element.textContent ? element.textContent.substring(0, 50) + '...' : '';
            
            infoDiv.innerHTML = `
                <strong>Elemento:</strong> ${tagName}${id}${className}<br>
                <strong>Texto:</strong> ${text || 'Sin texto'}<br>
                <strong>Posición:</strong> ${element.getBoundingClientRect().top.toFixed(0)}px, ${element.getBoundingClientRect().left.toFixed(0)}px
            `;
            
            infoDiv.style.display = 'block';
        },

        // Execute a prompt
        executePrompt: function(promptTemplate) {
            if (!this.selectedElement && promptTemplate.includes('este elemento')) {
                this.showNotification('Por favor, selecciona un elemento primero', 'error');
                return;
            }
            
            let finalPrompt = promptTemplate;
            
            if (this.selectedElement) {
                const elementInfo = this.getElementInfo(this.selectedElement);
                finalPrompt += `\n\nInformación del elemento seleccionado:\n${elementInfo}`;
            }
            
            this.displayPromptOutput(finalPrompt);
            this.showNotification('Prompt generado correctamente', 'success');
        },

        // Get detailed element information
        getElementInfo: function(element) {
            const rect = element.getBoundingClientRect();
            const styles = window.getComputedStyle(element);
            
            return `Elemento: ${element.tagName.toLowerCase()}
ID: ${element.id || 'Sin ID'}
Clases: ${element.className || 'Sin clases'}
Texto: ${element.textContent?.substring(0, 100) || 'Sin texto'}
Dimensiones: ${rect.width.toFixed(0)}x${rect.height.toFixed(0)}px
Posición: ${rect.top.toFixed(0)}, ${rect.left.toFixed(0)}px
Color de fondo: ${styles.backgroundColor}
Color de texto: ${styles.color}
Fuente: ${styles.fontFamily}
Tamaño de fuente: ${styles.fontSize}
HTML: ${element.outerHTML.substring(0, 200)}...`;
        },

        // Display prompt output
        displayPromptOutput: function(prompt) {
            const outputSection = this.toolbar.querySelector('#neoui-output-section');
            const outputDiv = this.toolbar.querySelector('#neoui-prompt-output');
            
            outputDiv.textContent = prompt;
            outputSection.style.display = 'block';
            
            // Scroll to output
            outputSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        },

        // Copy to clipboard
        copyToClipboard: function() {
            const outputDiv = this.toolbar.querySelector('#neoui-prompt-output');
            const text = outputDiv.textContent;
            
            if (!text) {
                this.showNotification('No hay contenido para copiar', 'error');
                return;
            }
            
            navigator.clipboard.writeText(text).then(() => {
                this.showNotification('Prompt copiado al portapapeles', 'success');
            }).catch(() => {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                this.showNotification('Prompt copiado al portapapeles', 'success');
            });
        },

        // Clear output
        clearOutput: function() {
            const outputSection = this.toolbar.querySelector('#neoui-output-section');
            const outputDiv = this.toolbar.querySelector('#neoui-prompt-output');
            
            outputDiv.textContent = '';
            outputSection.style.display = 'none';
            
            this.showNotification('Salida limpiada', 'success');
        },

        // Show notification
        showNotification: function(message, type = 'info') {
            // Remove existing notifications
            document.querySelectorAll('.neoui-notification').forEach(n => n.remove());
            
            const notification = document.createElement('div');
            notification.className = `neoui-notification ${type}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Auto-remove after 3 seconds
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 3000);
        },

        // Destroy NeoUI
        destroy: function() {
            if (!this.isActive) return;
            
            this.stopElementSelection();
            
            if (this.toolbar) {
                this.toolbar.remove();
                this.toolbar = null;
            }
            
            // Remove any remaining highlights
            document.querySelectorAll('.neoui-element-highlight').forEach(el => {
                el.classList.remove('neoui-element-highlight');
            });
            
            // Remove notifications
            document.querySelectorAll('.neoui-notification').forEach(n => n.remove());
            
            this.isActive = false;
            this.selectedElement = null;
            
            console.log('NeoUI desactivado');
        },

        // Get current state
        getState: function() {
            return {
                isActive: this.isActive,
                isMinimized: this.isMinimized,
                selectedElement: this.selectedElement ? {
                    tagName: this.selectedElement.tagName,
                    id: this.selectedElement.id,
                    className: this.selectedElement.className
                } : null,
                position: this.toolbar ? {
                    x: this.toolbar.offsetLeft,
                    y: this.toolbar.offsetTop
                } : null
            };
        },

        // Restore state
        restoreState: function(state) {
            if (state.isActive && !this.isActive) {
                this.init();
            }
            
            if (state.isMinimized !== this.isMinimized) {
                this.toggleMinimize();
            }
            
            if (state.position && this.toolbar) {
                this.toolbar.style.left = state.position.x + 'px';
                this.toolbar.style.top = state.position.y + 'px';
                this.toolbar.style.right = 'auto';
            }
        }
    };

    // Auto-initialize if not in extension context
    if (typeof chrome === 'undefined' || !chrome.runtime) {
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                window.NeoUI.init();
            });
        } else {
            window.NeoUI.init();
        }
    }

    // Export for module systems
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = window.NeoUI;
    }

    console.log('NeoUI script cargado correctamente');

})();

// Global functions for external access
function activateNeoUI() {
    if (window.NeoUI) {
        window.NeoUI.init();
    }
}

function deactivateNeoUI() {
    if (window.NeoUI) {
        window.NeoUI.destroy();
    }
}

function toggleNeoUI() {
    if (window.NeoUI) {
        if (window.NeoUI.isActive) {
            window.NeoUI.destroy();
        } else {
            window.NeoUI.init();
        }
    }
}

// Make functions globally available
window.activateNeoUI = activateNeoUI;
window.deactivateNeoUI = deactivateNeoUI;
window.toggleNeoUI = toggleNeoUI;