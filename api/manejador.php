<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejador CRUD - Plastimarket API</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }
        
        .content {
            padding: 30px;
        }
        
        .section {
            margin-bottom: 40px;
            padding: 25px;
            border: 2px solid #ecf0f1;
            border-radius: 10px;
            background: #fafafa;
        }
        
        .section h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.8em;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #bdc3c7;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .btn {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #27ae60, #229954);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f39c12, #e67e22);
        }
        
        .btn-info {
            background: linear-gradient(135deg, #17a2b8, #138496);
        }
        
        .result {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background: #ecf0f1;
            border-left: 5px solid #3498db;
        }
        
        .result pre {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-size: 14px;
            line-height: 1.4;
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .status {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        
        .status.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .status.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🛠️ Manejador CRUD</h1>
            <p>Interfaz de prueba para la API de Productos de Plastimarket</p>
        </div>
        
        <div class="content">
            <!-- Sección de Estado de Conexión -->
            <div class="section">
                <h2>📊 Estado de la Conexión</h2>
                <div class="quick-actions">
                    <button class="btn btn-info" onclick="testConnection()">Probar Conexión</button>
                    <button class="btn btn-warning" onclick="getStats()">Ver Estadísticas</button>
                    <button class="btn btn-success" onclick="getBrands()">Listar Marcas</button>
                </div>
                <div id="connectionResult" class="result" style="display: none;"></div>
            </div>
            
            <div class="grid">
                <!-- Sección de Consultas Básicas -->
                <div class="section">
                    <h2>🔍 Consultas Básicas</h2>
                    
                    <div class="form-group">
                        <label>Obtener Productos (con paginación)</label>
                        <input type="number" id="limit" placeholder="Límite (default: 50)" value="10">
                        <input type="number" id="page" placeholder="Página (default: 1)" value="1">
                        <select id="publicar">
                            <option value="">Todos los productos</option>
                            <option value="1">Solo publicados</option>
                            <option value="0">Solo no publicados</option>
                        </select>
                    </div>
                    <button class="btn" onclick="getProducts()">Obtener Productos</button>
                    
                    <div class="form-group" style="margin-top: 20px;">
                        <label>Buscar Producto por Código</label>
                        <input type="text" id="productCode" placeholder="Ej: PROD-00123">
                    </div>
                    <button class="btn btn-success" onclick="getProductByCode()">Buscar por Código</button>
                    
                    <div id="basicResult" class="result" style="display: none;"></div>
                </div>
                
                <!-- Sección de Búsquedas Avanzadas -->
                <div class="section">
                    <h2>🎯 Búsquedas Avanzadas</h2>
                    
                    <div class="form-group">
                        <label>Búsqueda por Texto</label>
                        <input type="text" id="searchTerm" placeholder="Buscar en descripción, código o grupos">
                        <input type="number" id="searchLimit" placeholder="Límite (default: 20)" value="20">
                    </div>
                    <button class="btn" onclick="searchProducts()">Buscar Productos</button>
                    
                    <div class="form-group" style="margin-top: 20px;">
                        <label>Productos por Marca</label>
                        <input type="number" id="brandId" placeholder="ID de marca (clase1)">
                        <input type="number" id="brandLimit" placeholder="Límite (default: 50)" value="50">
                    </div>
                    <button class="btn btn-warning" onclick="getProductsByBrand()">Buscar por Marca</button>
                    
                    <button class="btn btn-info" onclick="getAvailableProducts()" style="margin-top: 15px;">Productos Disponibles (con stock)</button>
                    
                    <div id="advancedResult" class="result" style="display: none;"></div>
                </div>
            </div>
            
            <!-- Sección de Pruebas de API REST -->
            <div class="section">
                <h2>🌐 Pruebas de API REST</h2>
                <p style="margin-bottom: 20px; color: #7f8c8d;">Estas son las URLs que puedes usar para acceder a la API directamente:</p>
                
                <div class="grid">
                    <div>
                        <h3>Endpoints de Lectura:</h3>
                        <ul style="line-height: 1.8; color: #2c3e50;">
                            <li><code>GET /api/api.php/productos</code> - Lista de productos</li>
                            <li><code>GET /api/api.php/producto/{codigo}</code> - Producto específico</li>
                            <li><code>GET /api/api.php/buscar?q={término}</code> - Búsqueda</li>
                            <li><code>GET /api/api.php/marca/{id}</code> - Productos por marca</li>
                            <li><code>GET /api/api.php/disponibles</code> - Productos con stock</li>
                            <li><code>GET /api/api.php/estadisticas</code> - Estadísticas</li>
                            <li><code>GET /api/api.php/marcas</code> - Lista de marcas</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3>Endpoints de Escritura:</h3>
                        <ul style="line-height: 1.8; color: #2c3e50;">
                            <li><code>POST /api/api.php/producto</code> - Crear producto</li>
                            <li><code>PUT /api/api.php/producto/{codigo}</code> - Actualizar producto</li>
                            <li><code>DELETE /api/api.php/producto/{codigo}</code> - Eliminar producto</li>
                            <li><code>PUT /api/api.php/inventario/{codigo}</code> - Actualizar inventario</li>
                            <li><code>PUT /api/api.php/reservar/{codigo}</code> - Reservar stock</li>
                            <li><code>PUT /api/api.php/liberar/{codigo}</code> - Liberar stock</li>
                            <li><code>PUT /api/api.php/ajustar/{codigo}</code> - Ajustar stock</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3>Parámetros de Query:</h3>
                        <ul style="line-height: 1.8; color: #2c3e50;">
                            <li><code>limit</code> - Límite de resultados</li>
                            <li><code>page</code> - Número de página</li>
                            <li><code>publicar</code> - Filtro de publicación (0/1)</li>
                            <li><code>tipoProducto</code> - Tipo de producto</li>
                            <li><code>clase1</code> - ID de marca</li>
                            <li><code>search</code> - Término de búsqueda</li>
                        </ul>
                    </div>
                </div>
                
                <div class="form-group" style="margin-top: 20px;">
                    <label>Probar URL personalizada:</label>
                    <input type="text" id="customUrl" placeholder="Ej: api.php/productos?limit=5&publicar=1" style="width: 70%; display: inline-block;">
                    <button class="btn" onclick="testCustomUrl()" style="width: 25%; margin-left: 2%;">Probar</button>
                </div>
                
                <div id="apiResult" class="result" style="display: none;"></div>
            </div>
        </div>
        
        <!-- Sección de Operaciones de Escritura -->
        <div class="section">
            <h2>🔧 Operaciones de Escritura</h2>
            
            <!-- Crear Producto -->
            <div class="subsection">
                <h3>Crear Producto</h3>
                <div class="form-group">
                    <label>Código del Producto:</label>
                    <input type="text" id="newProductCode" placeholder="Ej: PROD001">
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <input type="text" id="newProductDesc" placeholder="Descripción del producto">
                </div>
                <div class="form-group">
                    <label>Precio 1:</label>
                    <input type="number" id="newProductPrice1" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label>Precio 2:</label>
                    <input type="number" id="newProductPrice2" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label>Stock Disponible:</label>
                    <input type="number" id="newProductStock" placeholder="0">
                </div>
                <div class="form-group">
                    <label>Publicar (0/1):</label>
                    <select id="newProductPublish">
                        <option value="1">Sí (1)</option>
                        <option value="0">No (0)</option>
                    </select>
                </div>
                <button class="btn" onclick="createProduct()">Crear Producto</button>
                <div id="createResult" class="result" style="display: none;"></div>
            </div>
            
            <!-- Actualizar Producto -->
            <div class="subsection">
                <h3>Actualizar Producto</h3>
                <div class="form-group">
                    <label>Código del Producto:</label>
                    <input type="text" id="updateProductCode" placeholder="Código del producto a actualizar">
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <input type="text" id="updateProductDesc" placeholder="Nueva descripción">
                </div>
                <div class="form-group">
                    <label>Precio 1:</label>
                    <input type="number" id="updateProductPrice1" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label>Precio 2:</label>
                    <input type="number" id="updateProductPrice2" step="0.01" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label>Stock Disponible:</label>
                    <input type="number" id="updateProductStock" placeholder="0">
                </div>
                <button class="btn" onclick="updateProduct()">Actualizar Producto</button>
                <div id="updateResult" class="result" style="display: none;"></div>
            </div>
            
            <!-- Gestión de Inventario -->
            <div class="subsection">
                <h3>Gestión de Inventario</h3>
                <div class="form-group">
                    <label>Código del Producto:</label>
                    <input type="text" id="inventoryProductCode" placeholder="Código del producto">
                </div>
                <div class="form-group">
                    <label>Cantidad:</label>
                    <input type="number" id="inventoryQuantity" placeholder="Cantidad">
                </div>
                <div class="form-group">
                    <button class="btn" onclick="updateInventory()" style="margin-right: 10px;">Actualizar Inventario</button>
                    <button class="btn" onclick="reserveStock()" style="margin-right: 10px;">Reservar Stock</button>
                    <button class="btn" onclick="releaseStock()" style="margin-right: 10px;">Liberar Stock</button>
                    <button class="btn" onclick="adjustStock()">Ajustar Stock</button>
                </div>
                <div id="inventoryResult" class="result" style="display: none;"></div>
            </div>
            
            <!-- Eliminar Producto -->
            <div class="subsection">
                <h3>Eliminar Producto</h3>
                <div class="form-group">
                    <label>Código del Producto:</label>
                    <input type="text" id="deleteProductCode" placeholder="Código del producto a eliminar">
                </div>
                <div class="form-group">
                    <label>Tipo de eliminación:</label>
                    <select id="deleteType">
                        <option value="soft">Eliminación suave (recomendado)</option>
                        <option value="hard">Eliminación permanente</option>
                    </select>
                </div>
                <button class="btn" onclick="deleteProduct()" style="background-color: #e74c3c;">Eliminar Producto</button>
                <div id="deleteResult" class="result" style="display: none;"></div>
            </div>
        </div>
    </div>
    
    <script>
        // Función para mostrar resultados
        function showResult(elementId, data, isError = false) {
            const element = document.getElementById(elementId);
            element.style.display = 'block';
            
            const statusClass = isError ? 'error' : 'success';
            const statusText = isError ? '❌ Error' : '✅ Éxito';
            
            element.innerHTML = `
                <div class="status ${statusClass}">${statusText}</div>
                <pre>${JSON.stringify(data, null, 2)}</pre>
            `;
        }
        
        // Función para hacer requests AJAX
        async function makeRequest(url) {
            try {
                const response = await fetch(url);
                const data = await response.json();
                return { success: response.ok, data };
            } catch (error) {
                return { success: false, data: { error: error.message } };
            }
        }
        
        // Probar conexión
        async function testConnection() {
            const result = await makeRequest('api.php/estadisticas');
            showResult('connectionResult', result.data, !result.success);
        }
        
        // Obtener estadísticas
        async function getStats() {
            const result = await makeRequest('api.php/estadisticas');
            showResult('connectionResult', result.data, !result.success);
        }
        
        // Obtener marcas
        async function getBrands() {
            const result = await makeRequest('api.php/marcas');
            showResult('connectionResult', result.data, !result.success);
        }
        
        // Obtener productos
        async function getProducts() {
            const limit = document.getElementById('limit').value || 50;
            const page = document.getElementById('page').value || 1;
            const publicar = document.getElementById('publicar').value;
            
            let url = `api.php/productos?limit=${limit}&page=${page}`;
            if (publicar) url += `&publicar=${publicar}`;
            
            const result = await makeRequest(url);
            showResult('basicResult', result.data, !result.success);
        }
        
        // Buscar producto por código
        async function getProductByCode() {
            const code = document.getElementById('productCode').value;
            if (!code) {
                showResult('basicResult', { error: 'Código de producto requerido' }, true);
                return;
            }
            
            const result = await makeRequest(`api.php/producto/${encodeURIComponent(code)}`);
            showResult('basicResult', result.data, !result.success);
        }
        
        // Buscar productos por texto
        async function searchProducts() {
            const term = document.getElementById('searchTerm').value;
            const limit = document.getElementById('searchLimit').value || 20;
            
            if (!term) {
                showResult('advancedResult', { error: 'Término de búsqueda requerido' }, true);
                return;
            }
            
            const result = await makeRequest(`api.php/buscar?q=${encodeURIComponent(term)}&limit=${limit}`);
            showResult('advancedResult', result.data, !result.success);
        }
        
        // Buscar productos por marca
        async function getProductsByBrand() {
            const brandId = document.getElementById('brandId').value;
            const limit = document.getElementById('brandLimit').value || 50;
            
            if (!brandId) {
                showResult('advancedResult', { error: 'ID de marca requerido' }, true);
                return;
            }
            
            const result = await makeRequest(`api.php/marca/${brandId}?limit=${limit}`);
            showResult('advancedResult', result.data, !result.success);
        }
        
        // Obtener productos disponibles
        async function getAvailableProducts() {
            const result = await makeRequest('api.php/disponibles');
            showResult('advancedResult', result.data, !result.success);
        }
        
        // Probar URL personalizada
        async function testCustomUrl() {
            const url = document.getElementById('customUrl').value;
            if (!url) {
                showResult('apiResult', { error: 'URL requerida' }, true);
                return;
            }
            
            const result = await makeRequest(url);
            showResult('apiResult', result.data, !result.success);
        }
        
        // Funciones para operaciones de escritura
        
        // Función para hacer requests con método específico
        async function makeWriteRequest(url, method, data = null) {
            try {
                const options = {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                };
                
                if (data) {
                    options.body = JSON.stringify(data);
                }
                
                const response = await fetch(url, options);
                const responseData = await response.json();
                return { success: response.ok, data: responseData };
            } catch (error) {
                return { success: false, data: { error: error.message } };
            }
        }
        
        // Crear producto
        async function createProduct() {
            const productData = {
                producto: document.getElementById('newProductCode').value,
                descripcion: document.getElementById('newProductDesc').value,
                precio1: parseFloat(document.getElementById('newProductPrice1').value) || 0,
                precio2: parseFloat(document.getElementById('newProductPrice2').value) || 0,
                disponible: parseInt(document.getElementById('newProductStock').value) || 0,
                publicar: parseInt(document.getElementById('newProductPublish').value)
            };
            
            if (!productData.producto || !productData.descripcion) {
                showResult('createResult', { error: 'Código y descripción son requeridos' }, true);
                return;
            }
            
            const result = await makeWriteRequest('api.php/producto', 'POST', productData);
            showResult('createResult', result.data, !result.success);
        }
        
        // Actualizar producto
        async function updateProduct() {
            const code = document.getElementById('updateProductCode').value;
            if (!code) {
                showResult('updateResult', { error: 'Código de producto requerido' }, true);
                return;
            }
            
            const productData = {
                descripcion: document.getElementById('updateProductDesc').value,
                precio1: parseFloat(document.getElementById('updateProductPrice1').value),
                precio2: parseFloat(document.getElementById('updateProductPrice2').value),
                disponible: parseInt(document.getElementById('updateProductStock').value)
            };
            
            // Remover campos vacíos
            Object.keys(productData).forEach(key => {
                if (productData[key] === '' || isNaN(productData[key])) {
                    delete productData[key];
                }
            });
            
            const result = await makeWriteRequest(`api.php/producto/${encodeURIComponent(code)}`, 'PUT', productData);
            showResult('updateResult', result.data, !result.success);
        }
        
        // Actualizar inventario
        async function updateInventory() {
            const code = document.getElementById('inventoryProductCode').value;
            const quantity = parseInt(document.getElementById('inventoryQuantity').value);
            
            if (!code || isNaN(quantity)) {
                showResult('inventoryResult', { error: 'Código y cantidad son requeridos' }, true);
                return;
            }
            
            const result = await makeWriteRequest(`api.php/inventario/${encodeURIComponent(code)}`, 'PUT', {
                disponible: quantity
            });
            showResult('inventoryResult', result.data, !result.success);
        }
        
        // Reservar stock
        async function reserveStock() {
            const code = document.getElementById('inventoryProductCode').value;
            const quantity = parseInt(document.getElementById('inventoryQuantity').value);
            
            if (!code || isNaN(quantity) || quantity <= 0) {
                showResult('inventoryResult', { error: 'Código y cantidad válida son requeridos' }, true);
                return;
            }
            
            const result = await makeWriteRequest(`api.php/reservar/${encodeURIComponent(code)}`, 'PUT', {
                cantidad: quantity
            });
            showResult('inventoryResult', result.data, !result.success);
        }
        
        // Liberar stock
        async function releaseStock() {
            const code = document.getElementById('inventoryProductCode').value;
            const quantity = parseInt(document.getElementById('inventoryQuantity').value);
            
            if (!code || isNaN(quantity) || quantity <= 0) {
                showResult('inventoryResult', { error: 'Código y cantidad válida son requeridos' }, true);
                return;
            }
            
            const result = await makeWriteRequest(`api.php/liberar/${encodeURIComponent(code)}`, 'PUT', {
                cantidad: quantity
            });
            showResult('inventoryResult', result.data, !result.success);
        }
        
        // Ajustar stock
        async function adjustStock() {
            const code = document.getElementById('inventoryProductCode').value;
            const quantity = parseInt(document.getElementById('inventoryQuantity').value);
            
            if (!code || isNaN(quantity)) {
                showResult('inventoryResult', { error: 'Código y cantidad son requeridos' }, true);
                return;
            }
            
            const result = await makeWriteRequest(`api.php/ajustar/${encodeURIComponent(code)}`, 'PUT', {
                ajuste: quantity
            });
            showResult('inventoryResult', result.data, !result.success);
        }
        
        // Eliminar producto
        async function deleteProduct() {
            const code = document.getElementById('deleteProductCode').value;
            const deleteType = document.getElementById('deleteType').value;
            
            if (!code) {
                showResult('deleteResult', { error: 'Código de producto requerido' }, true);
                return;
            }
            
            if (!confirm(`¿Está seguro de que desea eliminar el producto ${code}?`)) {
                return;
            }
            
            const url = deleteType === 'hard' ? 
                `api.php/producto/${encodeURIComponent(code)}?hard=true` : 
                `api.php/producto/${encodeURIComponent(code)}`;
            
            const result = await makeWriteRequest(url, 'DELETE');
            showResult('deleteResult', result.data, !result.success);
        }
        
        // Cargar estadísticas al inicio
        window.onload = function() {
            testConnection();
        };
    </script>
</body>
</html>

<?php
/**
 * Sección PHP para manejar requests directas al manejador
 * (cuando se accede sin JavaScript)
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    require_once 'ProductoCRUD.php';
    require_once 'ProductoWriteCRUD.php';
    
    try {
        $crud = new ProductoCRUD();
        $writeCrud = new ProductoWriteCRUD();
        $result = null;
        
        switch ($_POST['action']) {
            case 'test_connection':
                $result = $crud->getStats();
                break;
            case 'get_products':
                $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 10;
                $result = $crud->getAll($limit);
                break;
            case 'search':
                if (isset($_POST['search_term'])) {
                    $result = $crud->search($_POST['search_term']);
                }
                break;
            case 'create_product':
                if (isset($_POST['product_data'])) {
                    $productData = json_decode($_POST['product_data'], true);
                    $result = $writeCrud->create($productData);
                }
                break;
            case 'update_product':
                if (isset($_POST['product_code']) && isset($_POST['product_data'])) {
                    $productData = json_decode($_POST['product_data'], true);
                    $result = $writeCrud->updateByCode($_POST['product_code'], $productData);
                }
                break;
            case 'delete_product':
                if (isset($_POST['product_code'])) {
                    $hard = isset($_POST['hard_delete']) && $_POST['hard_delete'] === 'true';
                    if ($hard) {
                        $result = $writeCrud->hardDeleteByCode($_POST['product_code']);
                    } else {
                        $result = $writeCrud->deleteByCode($_POST['product_code']);
                    }
                }
                break;
            case 'update_inventory':
                if (isset($_POST['product_code']) && isset($_POST['quantity'])) {
                    $result = $writeCrud->updateInventory($_POST['product_code'], (int)$_POST['quantity']);
                }
                break;
            case 'reserve_stock':
                if (isset($_POST['product_code']) && isset($_POST['quantity'])) {
                    $result = $writeCrud->reserveStock($_POST['product_code'], (int)$_POST['quantity']);
                }
                break;
            case 'release_stock':
                if (isset($_POST['product_code']) && isset($_POST['quantity'])) {
                    $result = $writeCrud->releaseStock($_POST['product_code'], (int)$_POST['quantity']);
                }
                break;
            case 'adjust_stock':
                if (isset($_POST['product_code']) && isset($_POST['adjustment'])) {
                    $result = $writeCrud->adjustStock($_POST['product_code'], (int)$_POST['adjustment']);
                }
                break;
        }
        
        if ($result !== null) {
            echo "<script>";
            echo "document.addEventListener('DOMContentLoaded', function() {";
            echo "showResult('connectionResult', " . json_encode($result) . ", false);";
            echo "});";
            echo "</script>";
        }
        
    } catch (Exception $e) {
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function() {";
        echo "showResult('connectionResult', {error: '" . addslashes($e->getMessage()) . "'}, true);";
        echo "});";
        echo "</script>";
    }
}
?>