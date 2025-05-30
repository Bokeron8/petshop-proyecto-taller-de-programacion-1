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


$routes->get('tarjeta/(:num)', 'Home::tarjeta/$1');
$routes->get('saludo/(:segment)', 'Home::saludo/$1');
$routes->post('/contacto', 'Mensaje::enviar');
$routes->post('/login', 'Usuario::login');
$routes->post('/register', 'Usuario::register');
$routes->get('logout', 'Usuario::logout');


$routes->get('/admin/agregar-productos', 'ProductoController::form_gestionar_producto');
$routes->post('/admin/agregar-productos', 'ProductoController::registrarProducto');