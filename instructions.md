# Instrucciones para Cursor - Sistema de Administración de Contenidos

## Estructura del Proyecto

```
/
├── admin/
│   ├── data/
│   │   └── global_settings.json     # Configuración global del sitio
│   ├── includes/
│   │   ├── config.php               # Configuraciones y funciones auxiliares
│   │   └── database.php             # Gestión de base de datos
│   ├── quienes-somos.php           # Administración de equipo/empresa
│   ├── upload-image.php            # Validación de imágenes
│   ├── logout.php                  # Cierre de sesión
│   └── test.php                    # Archivo de prueba
├── uploads/                        # Directorio de archivos subidos
│   └── team/                       # Imágenes del equipo
├── quienes-somos.html              # Página pública (implícita)
└── index.html                      # Página principal (implícita)
```

## Flujo de Trabajo del Sistema

### 1. Configuración Global
**Archivo:** `admin/data/global_settings.json`
- Contiene datos como logos, redes sociales, copyright
- Estos datos se cargan en las páginas públicas
- Se edita desde el panel de administración

### 2. Administración de Imágenes
**Archivos:** `admin/quienes-somos.php`, `admin/upload-image.php`
- Validación de tipos de archivo: JPG, PNG, GIF, WebP
- Límite de tamaño: 5MB
- Almacenamiento en `uploads/team/`
- Generación de nombres únicos con UUID

### 3. Proceso de Edición de Contenido

#### Paso 1: Acceso al Panel Admin
- El usuario inicia sesión (no mostrado pero implícito)
- Accede a archivos como `admin/quienes-somos.php`

#### Paso 2: Modificación de Datos
- El admin modifica contenido en formularios
- Se procesan imágenes con `handleImageUpload()`
- Se validan archivos con `validateImageFile()`

#### Paso 3: Guardado de Datos
- Los datos se guardan en archivos o base de datos
- Las imágenes se almacenan en `uploads/`
- Se actualizan referencias en configuraciones

#### Paso 4: Visualización Pública
- Las páginas en raíz cargan datos desde `admin/data/`
- Las imágenes se sirven desde `uploads/`
- El contenido se muestra con la nueva información

## Funciones Clave

### Validación de Imágenes
**Ubicación:** `admin/includes/config.php`, `admin/upload-image.php`
```php
// Verifica tipos de imagen permitidos
function is_valid_image($filename) {
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    // ...
}

// Validación completa de archivos
function validateImageFile($file) {
    // Verifica tamaño, tipo MIME, extensión
    // Retorna array con éxito y mensajes
}
```

### Manejo de Carga de Archivos
**Ubicación:** `admin/quienes-somos.php`
```php
function handleImageUpload($fileKey, $category = 'team') {
    // Crea directorios si no existen
    // Genera nombres únicos
    // Mueve archivos y retorna ruta
}
```

### Registro de Actividad
**Ubicación:** `admin/includes/database.php`
```php
public function getRecentActivity($limit = 10) {
    // Obtiene y ordena logs de actividad
}
```

## Convenciones Importantes

1. **Rutas de Archivos:**
   - Imágenes: `uploads/{categoría}/{uuid}.{extensión}`
   - Configuración: `admin/data/{archivo}.json`

2. **Tipos de Archivo Permitidos:**
   - Imágenes: JPG, PNG, GIF, WebP
   - Tamaño máximo: 5MB

3. **Nombres de Archivos:**
   - Generados con UUID para evitar conflictos
   - Mantienen su extensión original

## Solución de Problemas Comunes

### Error de Formulario "not focusable"
**Causa:** Campo `type="url"` con valor de archivo local
**Solución:** Usar `type="text"` o `type="file"` para archivos locales

### Problemas de Permisos
**Verificar:** Directorio `uploads/` debe tener permisos 0755
**Comando:** `chmod 0755 uploads/ uploads/team/`

### Errores de Validación
**Revisar:** 
- Tamaño de archivo máximo en `php.ini` (upload_max_filesize)
- Tipos MIME permitidos en funciones de validación
- Espacio disponible en disco

## Flujo de Datos

```
[Admin Interface] 
     ↓ (modifica)
[admin/*.php archivos] 
     ↓ (guarda)
[admin/data/*.json o base de datos]
     ↓ (lee)
[Páginas públicas en raíz]
     ↓ (muestra)
[Usuarios finales]
```

## Consideraciones de Seguridad

1. **Validación de Archivos:**
   - Verificar tipo MIME y extensión
   - Limitar tamaño de archivos
   - Sanitizar nombres de archivo

2. **Permisos:**
   - Directorios: 0755
   - Archivos: 0644
   - Evitar ejecución de archivos subidos

3. **Sesiones:**
   - `admin/logout.php` maneja cierre seguro
   - Proteger páginas admin con autenticación
~~~