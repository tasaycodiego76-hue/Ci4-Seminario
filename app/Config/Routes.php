<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::dashboard');
$routes->get('/senati', 'Home::index');


$routes->get('/programador', 'Carrera::showIngenieria');
$routes->get('/coder', 'Carrera::showIngenieria');

$routes->get('/creativo', 'Carrera::showDesign');
$routes->get('/marketing', 'Carrera::showDesign');

//dashboard

//Nuevas rutas para navegar desde DASHBOARD
$routes->get('/clientes', 'Cliente::index');
$routes->get('/clientes/registrar', 'Cliente::create');
$routes->post('/clientes/guardar', 'Cliente::registrarCliente');
$routes->get('/clientes/eliminar/(:num)', 'Cliente::eliminar/$1');
$routes->get('/clientes/buscar/', 'Cliente::buscar');
$routes->get('clientes/buscar/(:num)', 'Cliente::buscar/$1');
$routes->post('/clientes/actualizar', 'Cliente::actualizar');

$routes->get('/productos', 'Producto::index');
$routes->get('/productos/registrar', 'Producto::create');
$routes->post('/productos/guardar', 'Producto::registrarProducto');
$routes->get('/productos/eliminar/(:num)', 'Producto::eliminar/$1');
$routes->get('/productos/buscar/', 'Producto::buscar');
$routes->get('productos/buscar/(:num)', 'Producto::buscar/$1');
$routes->post('/productos/actualizar', 'Producto::actualizar');

$routes->get('/proveedores', 'Proveedor::index');
$routes->get('/proveedores/registrar', 'Proveedor::create');
$routes->post('/proveedores/guardar', 'Proveedor::registrarProveedor');
$routes->get('/proveedores/eliminar/(:num)', 'Proveedor::eliminar/$1');
$routes->get('/proveedores/buscar/', 'Proveedor::buscar');
$routes->get('proveedores/buscar/(:num)', 'Proveedor::buscar/$1');
$routes->post('/proveedores/actualizar', 'Proveedor::actualizar');


$routes->get('/vehiculos', 'Vehiculo::index');
//BD > MODELO > CONTROLADOR > RUTAS > JS > HTML
$routes->get('/vehiculos/listar', 'vehiculo::getVehiculos');
$routes->post('/vehiculos/registrar', 'Vehiculo::registrarVehiculo');

$routes->get('/marcas/listar', 'Marca::getMarcas');

//reporte 
$routes->get(from: '/diario', to: 'Reporte::diario');
$routes->get(from: '/semanal', to: 'Reporte::semanal');
$routes->get(from: '/mensual', to: 'Reporte::mensual');
$routes->get(from: '/personalizado', to: 'Reporte::personalizado');


// Rutas para XProducto
$routes->get('/xproductos',             'XProductos::index'); 
$routes->get('/xproductos/listar',      'XProductos::getProductos');
$routes->post('/xproductos/registrar',   'XProductos::registrarProducto');

//Rutas para reportes PDF
$routes->get('/reportes/vehiculos','ReporteController::generarReporteVehiculos');
