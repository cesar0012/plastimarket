# 🚀 Solución Rápida: SQL Server en Laragon PHP 8.3

## ❌ Problema Detectado
Las DLL de SQL Server en Laragon son incompatibles con PHP 8.3.16. Error:
```
Warning: PHP Startup: Unable to load dynamic library 'pdo_sqlsrv'
(%1 no es una aplicación Win32 válida)
```

## ✅ Solución en 3 Pasos

### Paso 1: Descargar Microsoft ODBC Driver 18

**🔗 Enlace directo:** https://go.microsoft.com/fwlink/?linkid=2249006

1. Descarga el instalador
2. Ejecuta como administrador
3. Instala con configuración predeterminada
4. Reinicia si es necesario

### Paso 2: Descargar DLL Correctas para PHP 8.3

**🔗 Enlace directo:** https://github.com/microsoft/msphpsql/releases/download/v5.12.0/Windows-8.3.zip

1. Descarga el archivo ZIP
2. Extrae el contenido
3. Busca estos archivos específicos:
   - `php_sqlsrv_83_ts_x64.dll`
   - `php_pdo_sqlsrv_83_ts_x64.dll`

### Paso 3: Reemplazar DLL en Laragon

1. **Navega a:** `C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\ext\`

2. **Respalda las DLL actuales:**
   - Renombra `php_sqlsrv.dll` a `php_sqlsrv.dll.backup`
   - Renombra `php_pdo_sqlsrv.dll` a `php_pdo_sqlsrv.dll.backup`

3. **Copia las nuevas DLL:**
   - Copia `php_sqlsrv_83_ts_x64.dll` como `php_sqlsrv.dll`
   - Copia `php_pdo_sqlsrv_83_ts_x64.dll` como `php_pdo_sqlsrv.dll`

4. **Reinicia Laragon:**
   - Detén todos los servicios
   - Inicia Apache nuevamente

## 🧪 Verificación

### Comando de prueba:
```powershell
c:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\php.exe -m | findstr sqlsrv
```

**Resultado esperado:**
```
pdo_sqlsrv
sqlsrv
```

### Prueba de conexión:
1. Ve a: http://localhost/Plastimarket/api/test_db.php
2. Debería mostrar: "✅ Conexión exitosa a la base de datos!"

## 🔧 Script Automático (Opcional)

Si prefieres automatizar el proceso:

1. Abre PowerShell como **Administrador**
2. Navega a: `cd C:\laragon\www\Plastimarket`
3. Ejecuta: `.\instalar_sqlserver_php.ps1`

## 🚨 Notas Importantes

- **Arquitectura:** Asegúrate de usar las DLL x64 (64-bit)
- **Thread Safety:** Usa las versiones TS (Thread Safe)
- **Versión PHP:** Específicamente para PHP 8.3
- **ODBC Driver:** Versión 17.4.2 o superior es obligatoria

## 📞 Soporte

Si el problema persiste:

1. Verifica que ODBC Driver 18 esté instalado:
   ```powershell
   Get-WmiObject -Class Win32_Product | Where-Object {$_.Name -like "*ODBC Driver*"}
   ```

2. Revisa los logs de PHP:
   ```
   C:\laragon\tmp\php_errors.log
   ```

3. Verifica la configuración:
   ```powershell
   c:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\php.exe -i | findstr sqlsrv
   ```

---
**⚡ Esta solución debería resolver el problema en menos de 10 minutos**