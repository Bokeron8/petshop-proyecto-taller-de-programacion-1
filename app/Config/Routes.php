<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/quienes-somos', 'Home::quienes_somos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/terminos-usos', 'Home::terminos');
$routes->get('/login', 'Home::login');
$routes->get('/productos', 'Home::productos');

$routes->get('tarjeta/(:num)', 'Home::tarjeta/$1');
$routes->get('saludo/(:segment)', 'Home::saludo/$1');
$routes->post('/contacto', 'Mensaje::enviar');
$routes->post('/login', 'Usuario::login');
$routes->post('/register', 'Usuario::register');
$routes->get('logout', 'Usuario::logout');


$routes->get('/admin/agregar-productos', 'ProductoController::form_agregar_producto');
$routes->post('/admin/agregar-productos', 'ProductoController::registrarProducto');

$routes->get('admin/gestionar-productos', 'ProductoController::gestionar_productos');
$routes->get('admin/activar/(:num)', 'ProductoController::activar/$1');
$routes->get('admin/desactivar/(:num)', 'ProductoController::desactivar/$1');
$routes->get('admin/editar-producto/(:num)', 'ProductoController::editar_Producto/$1');
$routes->post('admin/editar-producto/(:num)', 'ProductoController::actualizarProducto/$1');

$routes->get('carrito', 'CarritoController::verCarrito');
$routes->post('agregar-carrito', 'CarritoController::agregarProducto');