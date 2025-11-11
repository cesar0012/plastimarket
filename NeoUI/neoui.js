/**
 * NeoUI - Advanced UI Generator for AI Code Assistants
 * Generates precise prompts for Cursor, Windsurf, and other AI coding tools
 * Author: Elite Frontend Designer
 * Version: 1.0.0
 */

class NeoUI {
    constructor() {
        this.selectedElement = null;
        this.isEditMode = false;
        this.promptHistory = [];
        this.init();
    }

    init() {
        // Check if we're in development environment
        const isDevelopment = window.location.hostname === 'localhost' || 
                            window.location.hostname === '127.0.0.1' || 
                            window.location.protocol === 'file:';
        
        if (isDevelopment) {
            this.createToolbar();
            this.addStyles();
            this.bindEvents();
            this.makeDraggable();
            console.log('🚀 NeoUI initialized successfully!');
        }
    }

    createToolbar() {
        const toolbar = document.createElement('div');
        toolbar.id = 'neoui-toolbar';
        toolbar.className = 'neoui-minimized';
        toolbar.innerHTML = `
            <div class="neoui-header" id="neoui-header">
                <div class="neoui-logo">
                    <span class="neoui-icon">🎯</span>
                    <span class="neoui-title">NeoUI</span>
                </div>
                <div class="neoui-controls">
                    <button class="neoui-minimize" onclick="neoUI.toggleMinimize()" title="Minimizar/Expandir">+</button>
                    <button class="neoui-close" onclick="neoUI.close()" title="Cerrar">×</button>
                </div>
            </div>
            <div class="neoui-content">
                <div class="neoui-section">
                    <h4>🎯 Element Selector</h4>
                    <button class="neoui-btn neoui-primary" onclick="neoUI.enableEditMode()">
                        <span class="neoui-btn-icon">🎯</span>
                        Select Element
                    </button>
                    <div class="neoui-selected-info" id="neoui-selected-info">
                        <span class="neoui-placeholder">No element selected</span>
                    </div>
                </div>
                
                <div class="neoui-section">
                    <h4>🎨 Design Actions</h4>
                    <button class="neoui-btn" onclick="neoUI.generateStylePrompt()">
                        <span class="neoui-btn-icon">🎨</span>
                        Style Element
                    </button>
                    <button class="neoui-btn" onclick="neoUI.generateLayoutPrompt()">
                        <span class="neoui-btn-icon">📐</span>
                        Modify Layout
                    </button>
                    <button class="neoui-btn" onclick="neoUI.generateAnimationPrompt()">
                        <span class="neoui-btn-icon">✨</span>
                        Add Animation
                    </button>
                </div>
                
                <div class="neoui-section">
                    <h4>🚀 Component Actions</h4>
                    <button class="neoui-btn" onclick="neoUI.generateComponentPrompt()">
                        <span class="neoui-btn-icon">🧩</span>
                        Create Component
                    </button>
                    <button class="neoui-btn" onclick="neoUI.generateResponsivePrompt()">
                        <span class="neoui-btn-icon">📱</span>
                        Make Responsive
                    </button>
                    <button class="neoui-btn" onclick="neoUI.generateOptimizePrompt()">
                        <span class="neoui-btn-icon">⚡</span>
                        Optimize Code
                    </button>
                </div>
                
                <div class="neoui-section">
                    <h4>🤖 Custom Prompt</h4>
                    <textarea id="neoui-custom-prompt" placeholder="Describe what you want to create or modify..."></textarea>
                    <button class="neoui-btn neoui-secondary" onclick="neoUI.generateCustomPrompt()">
                        <span class="neoui-btn-icon">🚀</span>
                        Generate Prompt
                    </button>
                </div>
                
                <div class="neoui-section">
                    <h4>📋 Generated Prompt</h4>
                    <div class="neoui-prompt-output" id="neoui-prompt-output">
                        <span class="neoui-placeholder">Generated prompts will appear here...</span>
                    </div>
                    <div class="neoui-prompt-actions">
                        <button class="neoui-btn neoui-success" onclick="neoUI.copyPrompt()">
                            <span class="neoui-btn-icon">📋</span>
                            Copy Prompt
                        </button>
                        <button class="neoui-btn" onclick="neoUI.clearPrompt()">
                            <span class="neoui-btn-icon">🗑️</span>
                            Clear
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(toolbar);
    }

    addStyles() {
        const styles = document.createElement('style');
        styles.textContent = `
            #neoui-toolbar {
                position: fixed;
                top: 20px;
                right: 20px;
                width: 350px;
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #f7b733 100%);
                border-radius: 16px;
                box-shadow: 0 20px 40px rgba(30, 60, 114, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.1);
                z-index: 10000;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
                color: white;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            /* Selected element highlight */
            .neoui-selected {
                outline: 3px solid #f7b733 !important;
                outline-offset: 2px !important;
                box-shadow: 0 0 20px rgba(247, 183, 51, 0.5) !important;
                position: relative !important;
            }

            .neoui-selected::before {
                content: 'SELECTED';
                position: absolute;
                top: -25px;
                left: 0;
                background: #f7b733;
                color: #1e3c72;
                padding: 2px 8px;
                font-size: 10px;
                font-weight: bold;
                border-radius: 3px;
                z-index: 10001;
                pointer-events: none;
            }
            
            .neoui-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 16px 20px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.15);
                background: rgba(255, 255, 255, 0.05);
                border-radius: 16px 16px 0 0;
            }
            
            .neoui-logo {
                display: flex;
                align-items: center;
                gap: 8px;
            }
            
            .neoui-icon {
                font-size: 20px;
                filter: drop-shadow(0 0 8px #f7b733);
            }
            
            .neoui-title {
                font-weight: 700;
                font-size: 16px;
                background: linear-gradient(45deg, #ffffff, #f7b733);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .neoui-controls {
                display: flex;
                gap: 8px;
            }
            
            .neoui-minimize, .neoui-close {
                background: rgba(255, 255, 255, 0.1);
                border: none;
                color: white;
                font-size: 16px;
                cursor: pointer;
                padding: 0;
                width: 28px;
                height: 28px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s ease;
            }
            
            .neoui-minimize:hover {
                background: rgba(247, 183, 51, 0.3);
                transform: scale(1.1);
            }
            
            .neoui-close:hover {
                background: rgba(255, 69, 58, 0.3);
                transform: scale(1.1);
            }
            
            .neoui-content {
                padding: 20px;
                max-height: 600px;
                overflow-y: auto;
                scrollbar-width: thin;
                scrollbar-color: rgba(247, 183, 51, 0.5) transparent;
            }
            
            .neoui-content::-webkit-scrollbar {
                width: 6px;
            }
            
            .neoui-content::-webkit-scrollbar-track {
                background: transparent;
            }
            
            .neoui-content::-webkit-scrollbar-thumb {
                background: rgba(247, 183, 51, 0.5);
                border-radius: 3px;
            }
            
            .neoui-section {
                margin-bottom: 24px;
            }
            
            .neoui-section h4 {
                margin: 0 0 12px 0;
                font-size: 13px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.8px;
                color: #f7b733;
                display: flex;
                align-items: center;
                gap: 6px;
            }
            
            .neoui-btn {
                width: 100%;
                padding: 12px 16px;
                margin: 6px 0;
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.15);
                border-radius: 10px;
                color: white;
                font-size: 13px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                text-align: left;
                display: flex;
                align-items: center;
                gap: 10px;
                position: relative;
                overflow: hidden;
            }
            
            .neoui-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
                transition: left 0.5s;
            }
            
            .neoui-btn:hover::before {
                left: 100%;
            }
            
            .neoui-btn:hover {
                background: rgba(255, 255, 255, 0.15);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(30, 60, 114, 0.3);
                border-color: rgba(247, 183, 51, 0.5);
            }
            
            .neoui-btn-icon {
                font-size: 16px;
                filter: drop-shadow(0 0 4px currentColor);
            }
            
            .neoui-primary {
                background: linear-gradient(135deg, #f7b733, #fc4a1a);
                border-color: #f7b733;
            }
            
            .neoui-primary:hover {
                background: linear-gradient(135deg, #fc4a1a, #f7b733);
                transform: translateY(-2px) scale(1.02);
            }
            
            .neoui-secondary {
                background: linear-gradient(135deg, #2a5298, #1e3c72);
                border-color: #2a5298;
            }
            
            .neoui-success {
                background: linear-gradient(135deg, #4CAF50, #45a049);
                border-color: #4CAF50;
            }
            
            .neoui-selected-info {
                background: rgba(0, 0, 0, 0.2);
                border: 1px solid rgba(247, 183, 51, 0.3);
                border-radius: 8px;
                padding: 10px;
                margin-top: 8px;
                font-size: 12px;
                min-height: 40px;
                display: flex;
                align-items: center;
            }
            
            .neoui-placeholder {
                color: rgba(255, 255, 255, 0.6);
                font-style: italic;
            }
            
            #neoui-custom-prompt {
                width: 100%;
                height: 80px;
                padding: 12px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 8px;
                background: rgba(0, 0, 0, 0.2);
                color: white;
                font-size: 13px;
                font-family: inherit;
                resize: vertical;
                margin-bottom: 10px;
                transition: all 0.3s ease;
            }
            
            #neoui-custom-prompt:focus {
                outline: none;
                border-color: #f7b733;
                box-shadow: 0 0 0 2px rgba(247, 183, 51, 0.2);
            }
            
            #neoui-custom-prompt::placeholder {
                color: rgba(255, 255, 255, 0.5);
            }
            
            .neoui-prompt-output {
                background: rgba(0, 0, 0, 0.3);
                border: 1px solid rgba(247, 183, 51, 0.3);
                border-radius: 8px;
                padding: 12px;
                margin-bottom: 10px;
                font-size: 12px;
                font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
                line-height: 1.5;
                max-height: 150px;
                overflow-y: auto;
                white-space: pre-wrap;
                word-wrap: break-word;
            }
            
            .neoui-prompt-actions {
                display: flex;
                gap: 8px;
            }
            
            .neoui-prompt-actions .neoui-btn {
                flex: 1;
            }
            
            .neoui-minimized .neoui-content {
                display: none;
            }
            
            .neoui-minimized {
                width: 140px;
            }
            
            .neoui-hidden {
                transform: translateX(400px);
                opacity: 0;
                pointer-events: none;
            }
            
            .neoui-element-highlight {
                outline: 3px solid #f7b733 !important;
                outline-offset: 2px !important;
                box-shadow: 0 0 0 6px rgba(247, 183, 51, 0.2) !important;
                cursor: crosshair !important;
                position: relative !important;
            }
            
            .neoui-element-highlight::after {
                content: 'Click to select';
                position: absolute;
                top: -30px;
                left: 0;
                background: #f7b733;
                color: #1e3c72;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 11px;
                font-weight: 600;
                white-space: nowrap;
                z-index: 10001;
            }
            
            /* Minimized state */
            .neoui-minimized {
                width: 180px;
            }
            
            .neoui-minimized .neoui-content {
                display: none;
            }
            
            .neoui-minimized .neoui-header {
                padding: 12px 16px;
                border-radius: 16px;
            }
            
            .neoui-minimized .neoui-title {
                font-size: 14px;
            }
            
            .neoui-minimized .neoui-icon {
                font-size: 16px;
            }
            
            .neoui-minimized .neoui-minimize,
            .neoui-minimized .neoui-close {
                width: 24px;
                height: 24px;
                font-size: 14px;
            }
            
            /* Hidden state */
            .neoui-hidden {
                display: none;
            }
            
            /* Draggable cursor */
            .neoui-header {
                user-select: none;
                cursor: move;
            }
            
            .neoui-minimized .neoui-header:hover {
                cursor: move;
            }
            
            .neoui-header:active {
                cursor: grabbing;
            }
        `;
        
        document.head.appendChild(styles);
    }

    bindEvents() {
        // Global click handler for element selection
        document.addEventListener('click', (e) => {
            if (this.isEditMode && !e.target.closest('#neoui-toolbar')) {
                e.preventDefault();
                e.stopPropagation();
                this.selectElement(e.target);
                this.disableEditMode();
            }
        });

        // Hover effects for edit mode
        document.addEventListener('mouseover', (e) => {
            if (this.isEditMode && !e.target.closest('#neoui-toolbar')) {
                e.target.classList.add('neoui-element-highlight');
            }
        });

        document.addEventListener('mouseout', (e) => {
            if (this.isEditMode && !e.target.closest('#neoui-toolbar')) {
                e.target.classList.remove('neoui-element-highlight');
            }
        });
    }

    enableEditMode() {
        this.isEditMode = true;
        document.body.style.cursor = 'crosshair';
        this.showNotification('Click on any element to select it', 'info');
    }

    disableEditMode() {
        this.isEditMode = false;
        document.body.style.cursor = 'default';
        // Remove all highlight classes
        document.querySelectorAll('.neoui-element-highlight').forEach(el => {
            el.classList.remove('neoui-element-highlight');
        });
    }

    selectElement(element) {
        // Remove previous selection
        document.querySelectorAll('.neoui-selected').forEach(el => {
            el.classList.remove('neoui-selected');
        });

        // Add selection to current element
        element.classList.add('neoui-selected');
        this.selectedElement = element;

        const info = this.getElementInfo(element);
        let indexInfo = '';
        if (info.elementIndex) {
            indexInfo = `<div><strong>Index:</strong> ${info.elementIndex.index + 1} of ${info.elementIndex.total} (${info.elementIndex.selector})</div>`;
        }
        
        document.getElementById('neoui-selected-info').innerHTML = `
            <div><strong>Tag:</strong> ${info.tag}</div>
            <div><strong>Classes:</strong> ${info.classes || 'None'}</div>
            <div><strong>ID:</strong> ${info.id || 'None'}</div>
            <div><strong>Unique Selector:</strong> <code style="background: rgba(255,255,255,0.1); padding: 2px 4px; border-radius: 3px; font-size: 11px;">${info.uniqueSelector}</code></div>
            <div><strong>Text:</strong> ${info.text || 'None'}</div>${indexInfo}
        `;
        this.showNotification('Element selected successfully!', 'success');
    }

    getElementInfo(element) {
        const uniqueSelector = this.generateUniqueSelector(element);
        
        // Filtrar clases de NeoUI para obtener solo las clases reales del elemento
        const realClasses = element.className
            .split(/\s+/)
            .filter(cls => cls && !cls.startsWith('neoui-'))
            .join(' ');
        
        return {
            tag: element.tagName.toLowerCase(),
            classes: realClasses || '',
            id: element.id || '',
            text: element.textContent?.substring(0, 50) || '',
            attributes: Array.from(element.attributes).map(attr => `${attr.name}="${attr.value}"`).join(' '),
            uniqueSelector: uniqueSelector,
            elementIndex: this.getElementIndex(element)
        };
    }

    generateUniqueSelector(element) {
        // Si tiene ID único, usarlo
        if (element.id) {
            return `#${element.id}`;
        }

        // Construir selector único usando la ruta del DOM
        const path = [];
        let current = element;

        while (current && current !== document.body) {
            let selector = current.tagName.toLowerCase();
            
            // Agregar clases si existen
            if (current.className) {
                const classes = current.className.trim().split(/\s+/).filter(cls => 
                    !cls.startsWith('neoui-') // Excluir clases de NeoUI
                ).join('.');
                if (classes) {
                    selector += `.${classes}`;
                }
            }

            // Si hay hermanos con el mismo selector, agregar nth-child
            const siblings = Array.from(current.parentNode?.children || []);
            const sameTagSiblings = siblings.filter(sibling => {
                const siblingSelector = this.buildBasicSelector(sibling);
                const currentSelector = this.buildBasicSelector(current);
                return siblingSelector === currentSelector;
            });

            if (sameTagSiblings.length > 1) {
                const index = sameTagSiblings.indexOf(current) + 1;
                selector += `:nth-child(${index})`;
            }

            path.unshift(selector);
            current = current.parentNode;
        }

        return path.join(' > ');
    }

    buildBasicSelector(element) {
        let selector = element.tagName.toLowerCase();
        if (element.className) {
            const classes = element.className.trim().split(/\s+/).filter(cls => 
                !cls.startsWith('neoui-')
            ).join('.');
            if (classes) {
                selector += `.${classes}`;
            }
        }
        return selector;
    }

    getElementIndex(element) {
        if (!element.className) return null;
        
        // Filtrar clases de NeoUI para obtener solo las clases reales del elemento
        const classes = element.className.trim().split(/\s+/).filter(cls => 
            cls && !cls.startsWith('neoui-')
        );
        
        if (classes.length === 0) return null;

        // Buscar elementos con las mismas clases reales (sin clases de NeoUI)
        const selector = `.${classes.join('.')}`;
        const similarElements = document.querySelectorAll(selector);
        
        if (similarElements.length <= 1) return null;
        
        const index = Array.from(similarElements).indexOf(element);
        return {
            index: index,
            total: similarElements.length,
            selector: selector
        };
    }

    generateStylePrompt() {
        if (!this.selectedElement) {
            this.showNotification('Please select an element first', 'error');
            return;
        }

        const info = this.getElementInfo(this.selectedElement);
        let elementDescription = `Element Details:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
        
        if (info.elementIndex) {
            elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
        }
        
        const prompt = `Style the ${info.tag} element with the following specifications:

${elementDescription}

Please apply modern styling with:
- Contemporary color scheme
- Smooth transitions and hover effects
- Responsive design considerations
- Accessibility improvements
- Modern typography if applicable

Generate the CSS code for this specific element using the unique selector: ${info.uniqueSelector}`;

        this.displayPrompt(prompt);
    }

    generateLayoutPrompt() {
        if (!this.selectedElement) {
            this.showNotification('Please select an element first', 'error');
            return;
        }

        const info = this.getElementInfo(this.selectedElement);
        let elementDescription = `Element Details:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
        
        if (info.elementIndex) {
            elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
        }
        
        const prompt = `Modify the layout of the ${info.tag} element:

${elementDescription}

Please restructure the layout with:
- Modern CSS Grid or Flexbox
- Responsive breakpoints
- Proper spacing and alignment
- Mobile-first approach
- Clean and organized structure

Provide the complete HTML and CSS code for the improved layout using the unique selector: ${info.uniqueSelector}`;

        this.displayPrompt(prompt);
    }

    generateAnimationPrompt() {
        if (!this.selectedElement) {
            this.showNotification('Please select an element first', 'error');
            return;
        }

        const info = this.getElementInfo(this.selectedElement);
        let elementDescription = `Element Details:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
        
        if (info.elementIndex) {
            elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
        }
        
        const prompt = `Add smooth animations to the ${info.tag} element:

${elementDescription}

Please implement:
- Entrance animations (fade-in, slide-in, etc.)
- Hover effects and micro-interactions
- Scroll-triggered animations using Intersection Observer
- CSS keyframes for smooth transitions
- Performance-optimized animations

Generate the CSS and JavaScript code for these animations using the unique selector: ${info.uniqueSelector}`;

        this.displayPrompt(prompt);
    }

    generateComponentPrompt() {
        if (!this.selectedElement) {
            this.showNotification('Please select an element first', 'error');
            return;
        }

        const info = this.getElementInfo(this.selectedElement);
        let elementDescription = `Element Details:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
        
        if (info.elementIndex) {
            elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
        }
        
        const prompt = `Convert the ${info.tag} element into a reusable component:

${elementDescription}

Component Requirements:
- Modern design with clean aesthetics
- Responsive layout (mobile-first)
- Accessibility features (ARIA labels, keyboard navigation)
- Smooth animations and transitions
- Semantic HTML structure
- Modular CSS with BEM methodology
- JavaScript functionality if needed

Please provide:
1. Complete HTML structure
2. CSS styling with modern techniques
3. JavaScript functionality (if applicable)
4. Usage instructions

Make it production-ready and well-documented using the unique selector: ${info.uniqueSelector}`;

        this.displayPrompt(prompt);
    }

    generateResponsivePrompt() {
        if (!this.selectedElement) {
            this.showNotification('Please select an element first', 'error');
            return;
        }

        const info = this.getElementInfo(this.selectedElement);
        let elementDescription = `Element Details:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
        
        if (info.elementIndex) {
            elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
        }
        
        const prompt = `Make the ${info.tag} element fully responsive:

${elementDescription}

Implement responsive design with:
- Mobile-first approach (320px+)
- Tablet optimization (768px+)
- Desktop enhancement (1024px+)
- Large screen adaptation (1440px+)
- Flexible typography (clamp, rem units)
- Responsive images and media
- Touch-friendly interactions

Provide the complete responsive CSS code with media queries using the unique selector: ${info.uniqueSelector}`;

        this.displayPrompt(prompt);
    }

    generateOptimizePrompt() {
        if (!this.selectedElement) {
            this.showNotification('Please select an element first', 'error');
            return;
        }

        const info = this.getElementInfo(this.selectedElement);
        let elementDescription = `Element Details:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
        
        if (info.elementIndex) {
            elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
        }
        
        const prompt = `Optimize the ${info.tag} element for performance and best practices:

${elementDescription}

Optimization areas:
- CSS performance (reduce specificity, eliminate unused styles)
- HTML semantic structure
- Accessibility improvements (WCAG 2.1 AA)
- Core Web Vitals optimization
- SEO enhancements
- Code maintainability
- Browser compatibility

Provide the optimized code with explanations for each improvement using the unique selector: ${info.uniqueSelector}`;

        this.displayPrompt(prompt);
    }

    generateCustomPrompt() {
        const customText = document.getElementById('neoui-custom-prompt').value.trim();
        if (!customText) {
            this.showNotification('Please enter a custom prompt first', 'error');
            return;
        }

        let prompt = `Custom Request: ${customText}\n\n`;
        
        if (this.selectedElement) {
            const info = this.getElementInfo(this.selectedElement);
            let elementDescription = `Selected Element Context:
- Tag: <${info.tag}>
- Classes: ${info.classes || 'none'}
- ID: ${info.id || 'none'}
- Unique Selector: ${info.uniqueSelector}`;
            
            if (info.elementIndex) {
                elementDescription += `
- Element Position: ${info.elementIndex.index + 1} of ${info.elementIndex.total} elements with the same classes`;
            }
            
            prompt += elementDescription + '\n\n';
        }

        prompt += `Please provide:\n- Clean, production-ready code\n- Modern best practices\n- Responsive design considerations\n- Accessibility compliance\n- Detailed implementation instructions`;

        this.displayPrompt(prompt);
        document.getElementById('neoui-custom-prompt').value = '';
    }

    displayPrompt(prompt) {
        const output = document.getElementById('neoui-prompt-output');
        output.textContent = prompt;
        this.promptHistory.push(prompt);
        this.showNotification('Prompt generated successfully!', 'success');
    }

    copyPrompt() {
        const output = document.getElementById('neoui-prompt-output');
        const text = output.textContent;
        
        if (!text || text.includes('Generated prompts will appear here')) {
            this.showNotification('No prompt to copy', 'error');
            return;
        }

        navigator.clipboard.writeText(text).then(() => {
            this.showNotification('Prompt copied to clipboard!', 'success');
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            this.showNotification('Prompt copied to clipboard!', 'success');
        });
    }

    clearPrompt() {
        document.getElementById('neoui-prompt-output').innerHTML = '<span class="neoui-placeholder">Generated prompts will appear here...</span>';
        this.showNotification('Prompt cleared', 'info');
    }

    toggleMinimize() {
        const toolbar = document.getElementById('neoui-toolbar');
        toolbar.classList.toggle('neoui-minimized');
    }

    close() {
        const toolbar = document.getElementById('neoui-toolbar');
        toolbar.classList.add('neoui-hidden');
        setTimeout(() => {
            this.showNotification('NeoUI hidden. Refresh page to show again.', 'info');
        }, 300);
    }

    makeDraggable() {
        const toolbar = document.getElementById('neoui-toolbar');
        const header = document.getElementById('neoui-header');
        let isDragging = false;
        let currentX;
        let currentY;
        let initialX;
        let initialY;
        let xOffset = 0;
        let yOffset = 0;

        header.addEventListener('mousedown', dragStart);
        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', dragEnd);

        function dragStart(e) {
            if (e.target.closest('.neoui-minimize') || e.target.closest('.neoui-close')) {
                return;
            }
            
            initialX = e.clientX - xOffset;
            initialY = e.clientY - yOffset;

            if (e.target === header || header.contains(e.target)) {
                isDragging = true;
                header.style.cursor = 'grabbing';
            }
        }

        function drag(e) {
            if (isDragging) {
                e.preventDefault();
                currentX = e.clientX - initialX;
                currentY = e.clientY - initialY;

                xOffset = currentX;
                yOffset = currentY;

                toolbar.style.transform = `translate(${currentX}px, ${currentY}px)`;
            }
        }

        function dragEnd() {
            if (isDragging) {
                isDragging = false;
                header.style.cursor = '';
            }
        }
    }

    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `neoui-notification neoui-notification-${type}`;
        notification.textContent = message;
        
        const styles = {
            position: 'fixed',
            bottom: '20px',
            left: '20px',
            padding: '12px 20px',
            borderRadius: '8px',
            color: 'white',
            fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif',
            fontSize: '14px',
            fontWeight: '500',
            zIndex: '10001',
            transform: 'translateY(100px)',
            opacity: '0',
            transition: 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)'
        };

        Object.assign(notification.style, styles);

        if (type === 'success') {
            notification.style.background = 'linear-gradient(135deg, #4CAF50, #45a049)';
        } else if (type === 'error') {
            notification.style.background = 'linear-gradient(135deg, #f44336, #d32f2f)';
        } else {
            notification.style.background = 'linear-gradient(135deg, #2196F3, #1976D2)';
        }

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateY(0)';
            notification.style.opacity = '1';
        }, 10);

        // Animate out and remove
        setTimeout(() => {
            notification.style.transform = 'translateY(100px)';
            notification.style.opacity = '0';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
}

// Initialize NeoUI
let neoUI;
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        neoUI = new NeoUI();
    });
} else {
    neoUI = new NeoUI();
}