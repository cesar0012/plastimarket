<?php
require_once '../header.php'; // Incluye el header principal para <head> y dependencias
$user_page = basename($_SERVER['PHP_SELF'], '.php'); 
?>

<style>
/* ===================================
   NUEVO Diseño del Dashboard de Usuario (Glassmorphism)
==================================== */

:root {
    --brand-primary: #1e3c72;
    --brand-primary-dark: #0a1931;
    --brand-accent-orange: #fc4a1a;
    --brand-accent-yellow: #f7b733;
    --glass-bg: rgba(255, 255, 255, 0.1);
    --glass-border: rgba(255, 255, 255, 0.2);
    --text-primary: #ffffff;
    --text-secondary: #adb5bd; 
}

/* Oculta los elementos del layout principal */
.main-header, .main-footer, .announcement-bar, .navbar {
    display: none !important;
}

body {
    background: linear-gradient(135deg, var(--brand-primary-dark), var(--brand-primary));
    color: var(--text-primary);
}

.dashboard-main {
    display: flex;
    min-height: 100vh;
}

/* --- Sidebar de Vidrio --- */
.dashboard-sidebar {
    width: 260px;
    background: var(--glass-bg);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-right: 1px solid var(--glass-border);
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    z-index: 1020;
    display: flex;
    flex-direction: column;
}

.sidebar-logo {
    padding: 2rem 1.5rem;
    text-align: center;
}

.sidebar-logo img {
    max-width: 150px;
    height: auto;
}

.sidebar-nav {
    flex-grow: 1;
    margin-top: 2rem;
}

.sidebar-nav a {
    display: flex;
    align-items: center;
    padding: 1rem 1.5rem;
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
    margin: 0.5rem 0;
}

.sidebar-nav a i {
    margin-right: 1rem;
    width: 20px;
    text-align: center;
    font-size: 1.1rem;
}

.sidebar-nav a:hover {
    background: var(--glass-bg);
    color: var(--text-primary);
}

.sidebar-nav a.active {
    background: linear-gradient(90deg, var(--brand-accent-orange), var(--brand-accent-yellow));
    color: var(--text-primary);
    border-left-color: var(--brand-accent-yellow);
    font-weight: 700;
    box-shadow: 0 2px 15px rgba(0,0,0,0.2);
}

.sidebar-footer {
    padding: 1.5rem;
    border-top: 1px solid var(--glass-border);
}

.sidebar-footer a {
    color: var(--text-secondary);
    text-decoration: none;
    display: block;
    text-align: center;
    transition: color 0.3s ease;
}

.sidebar-footer a:hover {
    color: var(--brand-accent-orange);
}

/* --- Contenido Principal --- */
.dashboard-content {
    margin-left: 260px;
    width: calc(100% - 260px);
    padding: 2.5rem;
}

.page-title {
    text-align: center;
    font-weight: 700;
    font-size: 2.5rem;
    color: var(--text-primary);
    margin-bottom: 2.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

/* --- Tarjetas de Vidrio --- */
.card-glass {
    background: var(--glass-bg);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
    color: var(--text-primary);
}

.card-glass .card-header {
    background: rgba(255, 255, 255, 0.15);
    border-bottom: 1px solid var(--glass-border);
}

/* --- Tablas de Vidrio --- */
.table-glass {
    color: var(--text-primary);
}

.table-glass th, .table-glass td {
    border-color: var(--glass-border) !important;
    vertical-align: middle;
}

.table-glass thead th {
    color: var(--text-primary);
    font-weight: 600;
}

.table-glass tbody tr:hover {
    background-color: var(--glass-bg);
}

/* --- Otros --- */
.text-primary {
    color: var(--brand-accent-yellow) !important;
}

.badge.bg-success {
    background: linear-gradient(135deg, #28a745, #218838) !important;
}
.badge.bg-warning {
     background: linear-gradient(135deg, var(--brand-accent-yellow), #ffc107) !important;
}
.badge.bg-danger {
     background: linear-gradient(135deg, #dc3545, #c82333) !important;
}

.btn-primary {
    background-color: var(--brand-accent-orange);
    border-color: var(--brand-accent-orange);
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

@media (max-width: 992px) {
    .dashboard-sidebar {
        left: -260px;
    }
    .dashboard-content {
        margin-left: 0;
        width: 100%;
    }
    /* Se necesitaría JS para un menú hamburguesa */
}
</style>

<div class="dashboard-main">
    <aside class="dashboard-sidebar">
        <div class="sidebar-logo">
            <a href="/">
                <img src="https://f7df04-41.myshopify.com/cdn/shop/files/Logo_PLASTIMARKET.png?v=1728149508&width=170" alt="Plastimarket Logo">
            </a>
        </div>
        <nav class="sidebar-nav">
            <a href="/users/dashboard" class="<?= ($user_page === 'dashboard') ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="/users/pedidos" class="<?= ($user_page === 'pedidos') ? 'active' : '' ?>">
                <i class="fas fa-box-open"></i> Mis Pedidos
            </a>
            <a href="/users/perfil" class="<?= ($user_page === 'perfil') ? 'active' : '' ?>">
                <i class="fas fa-user-circle"></i> Mi Perfil
            </a>
        </nav>
        <div class="sidebar-footer">
             <a href="/login" title="Cerrar Sesión">
                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
            </a>
        </div>
    </aside>

    <main class="dashboard-content">
        <!-- El contenido específico de la página comienza aquí -->
