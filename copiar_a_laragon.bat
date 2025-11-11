@echo off
echo ========================================
echo    COPIANDO PROYECTO A LARAGON
echo ========================================
echo.

:: Variables de rutas
set ORIGEN=C:\Users\Cesar\Documents\Plastimarket
set DESTINO=C:\laragon\www\Plastimarket

echo Origen: %ORIGEN%
echo Destino: %DESTINO%
echo.

:: Verificar si existe la carpeta de origen
if not exist "%ORIGEN%" (
    echo ERROR: La carpeta de origen no existe: %ORIGEN%
    pause
    exit /b 1
)

:: Verificar si existe Laragon
if not exist "C:\laragon\www" (
    echo ERROR: Laragon no encontrado en C:\laragon\www
    echo Verifique que Laragon este instalado correctamente
    pause
    exit /b 1
)

:: Verificar si existe la carpeta de destino y limpiarla
if exist "%DESTINO%" (
    echo La carpeta de destino ya existe: %DESTINO%
    echo Eliminando contenido anterior...
    rd /s /q "%DESTINO%" 2>nul
    if exist "%DESTINO%" (
        echo Advertencia: No se pudo eliminar completamente la carpeta anterior
    )
)

:: Crear carpeta de destino
echo Creando carpeta de destino...
mkdir "%DESTINO%"

:: Preguntar si desea continuar
echo ATENCION: Se eliminara todo el contenido anterior y se copiara el proyecto completo
echo Destino: %DESTINO%
echo.
set /p CONTINUAR=Desea continuar? (S/N): 
if /i not "%CONTINUAR%"=="S" (
    echo Operacion cancelada
    pause
    exit /b 0
)

echo.
echo Copiando archivos...
echo Por favor espere...
echo.

:: Copiar todos los archivos y carpetas
robocopy "%ORIGEN%" "%DESTINO%" /E /R:3 /W:1 /MT:8 /XD ".git" "node_modules" ".vscode" /XF "*.log" "*.tmp"

:: Verificar resultado
if %ERRORLEVEL% LEQ 1 (
    echo.
    echo ========================================
    echo        COPIA COMPLETADA EXITOSAMENTE
    echo ========================================
    echo.
    echo Proyecto copiado a: %DESTINO%
    echo.
    echo URLs de acceso:
    echo - Sitio web: http://localhost/Plastimarket/
    echo - API: http://localhost/Plastimarket/api/
    echo - Test DB: http://localhost/Plastimarket/api/test_db.php
    echo.
    echo IMPORTANTE:
    echo 1. Inicie Laragon si no esta ejecutandose
    echo 2. Verifique que Apache y MySQL esten activos
    echo 3. Configure la base de datos si es necesario
    echo.
) else (
    echo.
    echo ERROR: Hubo problemas durante la copia
    echo Codigo de error: %ERRORLEVEL%
    echo.
)

echo Presione cualquier tecla para continuar...
pause >nul