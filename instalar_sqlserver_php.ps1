# Script de instalación de SQL Server para PHP 8.3 en Laragon
# Ejecutar como Administrador

Write-Host "🔧 Instalador de SQL Server para PHP 8.3 en Laragon" -ForegroundColor Green
Write-Host "================================================" -ForegroundColor Green

# Verificar si se ejecuta como administrador
if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "❌ Este script debe ejecutarse como Administrador" -ForegroundColor Red
    Write-Host "Haz clic derecho en PowerShell y selecciona 'Ejecutar como administrador'" -ForegroundColor Yellow
    pause
    exit 1
}

# Configuración
$phpPath = "C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64"
$extPath = "$phpPath\ext"
$phpIniPath = "$phpPath\php.ini"
$tempPath = "$env:TEMP\sqlserver_php"

# URLs de descarga
$odbcUrl = "https://go.microsoft.com/fwlink/?linkid=2249006"  # ODBC Driver 18
$sqlsrvUrl = "https://github.com/microsoft/msphpsql/releases/download/v5.12.0/Windows-8.3.zip"

Write-Host "📁 Verificando rutas..." -ForegroundColor Yellow

if (!(Test-Path $phpPath)) {
    Write-Host "❌ No se encontró PHP 8.3 en: $phpPath" -ForegroundColor Red
    exit 1
}

Write-Host "✅ PHP 8.3 encontrado" -ForegroundColor Green

# Crear directorio temporal
if (!(Test-Path $tempPath)) {
    New-Item -ItemType Directory -Path $tempPath -Force | Out-Null
}

Write-Host "📥 Descargando Microsoft ODBC Driver 18..." -ForegroundColor Yellow
try {
    $odbcFile = "$tempPath\msodbcsql.msi"
    Invoke-WebRequest -Uri $odbcUrl -OutFile $odbcFile -UseBasicParsing
    Write-Host "✅ ODBC Driver descargado" -ForegroundColor Green
    
    Write-Host "🔧 Instalando ODBC Driver..." -ForegroundColor Yellow
    Start-Process msiexec.exe -ArgumentList "/i", $odbcFile, "/quiet", "/norestart" -Wait
    Write-Host "✅ ODBC Driver instalado" -ForegroundColor Green
} catch {
    Write-Host "❌ Error descargando ODBC Driver: $($_.Exception.Message)" -ForegroundColor Red
}

Write-Host "📥 Descargando SQL Server DLLs para PHP 8.3..." -ForegroundColor Yellow
try {
    $sqlsrvZip = "$tempPath\sqlserver_php83.zip"
    Invoke-WebRequest -Uri $sqlsrvUrl -OutFile $sqlsrvZip -UseBasicParsing
    Write-Host "✅ DLLs descargadas" -ForegroundColor Green
    
    # Extraer archivos
    Expand-Archive -Path $sqlsrvZip -DestinationPath $tempPath -Force
    
    # Buscar las DLL correctas (Thread Safe x64)
    $sqlsrvDll = Get-ChildItem -Path $tempPath -Recurse -Name "*sqlsrv*83*ts*x64*.dll" | Select-Object -First 2
    
    if ($sqlsrvDll.Count -eq 2) {
        Write-Host "🔧 Copiando DLLs a directorio de extensiones..." -ForegroundColor Yellow
        
        foreach ($dll in $sqlsrvDll) {
            $sourcePath = Get-ChildItem -Path $tempPath -Recurse -Filter $dll | Select-Object -First 1
            $destPath = "$extPath\$($dll -replace '_83_ts_x64', '')"
            Copy-Item -Path $sourcePath.FullName -Destination $destPath -Force
            Write-Host "✅ Copiado: $dll -> $destPath" -ForegroundColor Green
        }
    } else {
        Write-Host "❌ No se encontraron las DLL correctas" -ForegroundColor Red
        Write-Host "Archivos encontrados:" -ForegroundColor Yellow
        Get-ChildItem -Path $tempPath -Recurse -Name "*.dll" | ForEach-Object { Write-Host "  - $_" }
    }
} catch {
    Write-Host "❌ Error descargando DLLs: $($_.Exception.Message)" -ForegroundColor Red
}

Write-Host "🔧 Verificando configuración de php.ini..." -ForegroundColor Yellow

# Verificar si las extensiones están habilitadas
$phpIniContent = Get-Content $phpIniPath
$sqlsrvEnabled = $phpIniContent | Where-Object { $_ -match "^extension=sqlsrv" }
$pdoSqlsrvEnabled = $phpIniContent | Where-Object { $_ -match "^extension=pdo_sqlsrv" }

if (!$sqlsrvEnabled) {
    Add-Content -Path $phpIniPath -Value "extension=sqlsrv"
    Write-Host "✅ Agregada extensión sqlsrv a php.ini" -ForegroundColor Green
} else {
    Write-Host "✅ Extensión sqlsrv ya está habilitada" -ForegroundColor Green
}

if (!$pdoSqlsrvEnabled) {
    Add-Content -Path $phpIniPath -Value "extension=pdo_sqlsrv"
    Write-Host "✅ Agregada extensión pdo_sqlsrv a php.ini" -ForegroundColor Green
} else {
    Write-Host "✅ Extensión pdo_sqlsrv ya está habilitada" -ForegroundColor Green
}

# Limpiar archivos temporales
Write-Host "🧹 Limpiando archivos temporales..." -ForegroundColor Yellow
Remove-Item -Path $tempPath -Recurse -Force -ErrorAction SilentlyContinue

Write-Host "" 
Write-Host "🎉 ¡Instalación completada!" -ForegroundColor Green
Write-Host "================================================" -ForegroundColor Green
Write-Host "📋 Próximos pasos:" -ForegroundColor Yellow
Write-Host "1. Reinicia Laragon (detén y vuelve a iniciar Apache)" -ForegroundColor White
Write-Host "2. Ejecuta: php -m | findstr sqlsrv" -ForegroundColor White
Write-Host "3. Prueba la conexión ejecutando test_db.php" -ForegroundColor White
Write-Host "" 
Write-Host "💡 Si hay errores, verifica que ODBC Driver 18 esté instalado" -ForegroundColor Cyan
Write-Host "" 

pause