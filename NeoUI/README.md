# NeoUI - Advanced AI Prompt Generator

🚀 **Una herramienta de UI avanzada para generar prompts de IA optimizados para Cursor y Windsurf**

## 🎯 Características Principales

### 🎨 Diseño Moderno
- **Colores**: Esquema de azul y amarillo con gradientes sofisticados
- **Glassmorphism**: Efectos de vidrio esmerilado para una apariencia futurista
- **Animaciones**: Transiciones suaves y microinteracciones deliciosas
- **Responsive**: Optimizado para todos los dispositivos
- **Dark Mode**: Soporte nativo para modo oscuro

### 🛠️ Funcionalidades

#### 📍 Selector de Elementos
- Selecciona cualquier elemento de la página con un clic
- Resaltado visual con efectos de brillo
- Información detallada del elemento seleccionado

#### 🎭 Acciones de Diseño
- **Modernizar**: Aplica estilos modernos y tendencias actuales
- **Responsive**: Optimiza para todos los dispositivos
- **Animaciones**: Añade transiciones y efectos visuales
- **Accesibilidad**: Mejora la accesibilidad web

#### 🧩 Acciones de Componentes
- **Crear Componente**: Genera nuevos componentes desde cero
- **Duplicar**: Crea copias de elementos existentes
- **Optimizar**: Mejora el rendimiento y la estructura
- **Refactorizar**: Reorganiza y limpia el código

#### 🤖 Generador de Prompts Personalizado
- Campo de texto para prompts específicos
- Generación automática de prompts contextuales
- Optimizado para Cursor y Windsurf
- Copia al portapapeles con un clic

## 🚀 Instalación

1. **Incluir los archivos en tu proyecto:**
   ```html
   <!-- En el <head> de tu HTML -->
   <link rel="stylesheet" href="NeoUI/neoui.css">
   
   <!-- Antes del cierre de </body> -->
   <script src="NeoUI/neoui.js"></script>
   ```

2. **La herramienta se carga automáticamente** en entornos de desarrollo (localhost, 127.0.0.1, o file://)

## 🎮 Uso

### Activación
NeoUI se activa automáticamente cuando:
- Estás en un entorno de desarrollo local
- La página se carga completamente
- Aparece como un toolbar flotante en la esquina superior derecha

### Flujo de Trabajo
1. **Seleccionar Elemento**: Haz clic en "🎯 Seleccionar" y luego en cualquier elemento de la página
2. **Elegir Acción**: Selecciona una de las acciones predefinidas o escribe un prompt personalizado
3. **Generar Prompt**: El sistema genera automáticamente un prompt optimizado
4. **Copiar y Usar**: Copia el prompt y úsalo en Cursor, Windsurf o cualquier IA de código

### Ejemplos de Prompts Generados

```
🎯 ELEMENTO SELECCIONADO: <button class="btn-primary">
📝 ACCIÓN: Modernizar elemento

🤖 PROMPT GENERADO:
Moderniza este botón aplicando las últimas tendencias de diseño web:
- Añade gradientes sutiles y efectos glassmorphism
- Implementa hover effects con transiciones suaves
- Asegura accesibilidad completa (ARIA, contraste, focus)
- Optimiza para responsive design
- Mantén la funcionalidad existente

Elemento actual: <button class="btn-primary">
```

## 🎨 Personalización

### Colores del Tema
NeoUI utiliza un esquema de colores azul y amarillo:
- **Azul Principal**: `#1e3c72` → `#2a5298`
- **Amarillo Acento**: `#f7b733` → `#fc4a1a`
- **Gradientes**: Combinaciones dinámicas para profundidad visual

### Modificar Estilos
Puedes personalizar los estilos editando `neoui.css`:
```css
/* Cambiar colores principales */
:root {
    --neoui-primary: #1e3c72;
    --neoui-accent: #f7b733;
    --neoui-gradient: linear-gradient(135deg, #1e3c72, #2a5298);
}
```

## 🔧 Configuración Avanzada

### Entornos de Desarrollo
Por defecto, NeoUI solo se carga en:
- `localhost`
- `127.0.0.1`
- Protocolo `file://`

Para modificar esto, edita la función `isDevelopment()` en `neoui.js`.

### Prompts Personalizados
Puedes añadir tus propios templates de prompts modificando el array `promptTemplates` en `neoui.js`:

```javascript
const promptTemplates = {
    'mi-accion': {
        title: 'Mi Acción Personalizada',
        template: 'Mi prompt personalizado para {element}...'
    }
};
```

## 🌟 Características Técnicas

### Rendimiento
- **Lazy Loading**: Carga solo cuando es necesario
- **Optimización CSS**: Estilos minificados y optimizados
- **JavaScript Eficiente**: Código modular y reutilizable
- **Memory Management**: Limpieza automática de event listeners

### Accesibilidad
- **WCAG 2.1 AA**: Cumple estándares de accesibilidad
- **Keyboard Navigation**: Navegación completa por teclado
- **Screen Readers**: Compatible con lectores de pantalla
- **High Contrast**: Soporte para modo de alto contraste

### Compatibilidad
- **Navegadores**: Chrome 80+, Firefox 75+, Safari 13+, Edge 80+
- **Dispositivos**: Desktop, Tablet, Mobile
- **Frameworks**: Compatible con React, Vue, Angular, Vanilla JS

## 🤝 Integración con IDEs de IA

### Cursor
1. Copia el prompt generado
2. Pégalo en Cursor
3. Presiona Enter para ejecutar

### Windsurf
1. Selecciona el elemento en NeoUI
2. Copia el prompt
3. Úsalo en Windsurf para modificaciones precisas

### Otros IDEs
Los prompts están optimizados para cualquier IA de código que entienda contexto HTML/CSS/JS.

## 📝 Changelog

### v1.0.0 (Actual)
- ✨ Lanzamiento inicial
- 🎨 Diseño con esquema azul/amarillo
- 🛠️ Selector de elementos interactivo
- 🤖 Generador de prompts para IA
- 📱 Diseño responsive completo
- ♿ Accesibilidad integrada

## 🔮 Roadmap

### v1.1.0 (Próximo)
- 🎯 Selector múltiple de elementos
- 📊 Analytics de uso
- 🎨 Más templates de prompts
- 🔧 Configuración visual

### v1.2.0 (Futuro)
- 🤖 Integración directa con APIs de IA
- 📸 Captura de pantalla automática
- 🔄 Historial de prompts
- 🌐 Soporte multiidioma

## 📄 Licencia

MIT License - Libre para uso personal y comercial.

## 🙋‍♂️ Soporte

Para reportar bugs o solicitar características:
1. Abre las herramientas de desarrollador (F12)
2. Revisa la consola para errores
3. Documenta los pasos para reproducir el problema

---

**¡Disfruta creando con NeoUI! 🚀✨**