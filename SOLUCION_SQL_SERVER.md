# 🔧 Solución: Configurar SQL Server en Laragon PHP 8.3

## 📋 Problema Identificado
El proyecto Plastimarket está intentando conectarse a SQL Server pero Laragon no tiene las extensiones PDO_SQLSRV instaladas, causando el error:
```
Fatal error: Undefined constant PDO::SQLSRV_ATTR_ENCODING
```

## ✅ Solución Paso a Paso

### Paso 1: Instalar Microsoft ODBC Driver 17+ para SQL Server

1. **Descargar el driver oficial:**
   - Visita: https://learn.microsoft.com/en-us/sql/connect/odbc/download-odbc-driver-for-sql-server
   - Descarga **Microsoft ODBC Driver 18 for SQL Server** (recomendado) o **Driver 17**
   - Selecciona la versión para Windows x64

2. **Instalar el driver:**
   - Ejecuta el instalador como administrador
   - Sigue las instrucciones del asistente
   - Reinicia el sistema si es necesario

### Paso 2: Descargar las DLL de SQL Server para PHP 8.3

1. **Acceder al repositorio oficial:**
   - Ve a: https://github.com/Microsoft/msphpsql/releases
   - Busca la versión **5.12.0** (compatible con PHP 8.3)

2. **Descargar los archivos:**
   - Descarga el archivo ZIP de "Assets" para Windows
   - Extrae los archivos en una carpeta temporal
   - Busca los archivos:
     - `php_sqlsrv_83_ts_x64.dll`
     - `php_pdo_sqlsrv_83_ts_x64.dll`

### Paso 3: Configurar las extensiones en Laragon

1. **Copiar las DLL:**
   ```
   Origen: [Carpeta de descarga]
   Destino: C:\laragon\bin\php\php-8.3.16\ext\
   ```

2. **Editar php.ini:**
   - Abre: `C:\laragon\bin\php\php-8.3.16\php.ini`
   - Busca la sección `[PHP]` o donde están las otras extensiones
   - Agrega las siguientes líneas:
   ```ini
   extension=sqlsrv
   extension=pdo_sqlsrv
   ```

3. **Reiniciar servicios:**
   - Abre Laragon
   - Detén todos los servicios
   - Inicia Apache nuevamente

### Paso 4: Verificar la instalación

1. **Crear archivo de prueba:**
   ```php
   <?php
   phpinfo();
   ?>
   ```

2. **Buscar en la salida:**
   - `sqlsrv`
   - `pdo_sqlsrv`
   - Verificar que aparezcan como "enabled"

3. **Probar la conexión:**
   - Ejecuta: `C:\laragon\www\Plastimarket\api\test_db.php`
   - Debería conectarse sin errores

## 🔍 Información del Sistema
- **PHP Version:** 8.3.16
- **Driver Version:** 5.12.0
- **ODBC Required:** 17.4.2+
- **Database:** PlastimarketTest (3.130.56.128:1433)

## 🚨 Notas Importantes

1. **Compatibilidad:** Asegúrate de descargar las DLL específicas para:
   - PHP 8.3
   - Thread Safe (TS)
   - x64 architecture

2. **Dependencias:** El Microsoft ODBC Driver es OBLIGATORIO antes de instalar las extensiones PHP

3. **Seguridad:** Las credenciales de la base de datos están hardcodeadas en `config.php`. Considera usar variables de entorno en producción.

## 📚 Enlaces Útiles
- [Microsoft ODBC Driver](https://learn.microsoft.com/en-us/sql/connect/odbc/download-odbc-driver-for-sql-server)
- [PHP SQL Server Drivers](https://github.com/Microsoft/msphpsql/releases)
- [Documentación oficial](https://learn.microsoft.com/en-us/sql/connect/php/overview-of-the-php-sql-driver)

---
**Fecha:** $(Get-Date -Format "yyyy-MM-dd HH:mm:ss")
**Generado por:** Asistente de Código Trae AI