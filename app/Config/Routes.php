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


$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('agregar-productos', 'ProductoController::form_agregar_producto');
    $routes->post('agregar-productos', 'ProductoController::registrarProducto');

    $routes->get('gestionar-productos', 'ProductoController::gestionar_productos');
    $routes->get('activar/(:num)', 'ProductoController::activar/$1');
    $routes->get('desactivar/(:num)', 'ProductoController::desactivar/$1');
    $routes->get('editar-producto/(:num)', 'ProductoController::editar_Producto/$1');
    $routes->post('editar-producto/(:num)', 'ProductoController::actualizarProducto/$1');

    $routes->get('mensajes', 'Mensaje::verMensajes');
    $routes->get('usuarios', 'Usuario::listarUsuarios');
});


$routes->get('carrito', 'CarritoController::verCarrito', ['filter' => 'auth']);
$routes->post('agregar-carrito', 'CarritoController::agregarProducto');
$routes->get('vaciarCarrito', 'CarritoController::vaciarCarrito');
$routes->get('eliminarProducto/(:any)', 'CarritoController::eliminarProducto/$1');
$routes->get('reducirProducto/(:any)', 'CarritoController::reducirCantidad/$1');

$routes->get('producto/(:num)', 'ProductoController::ver_producto/$1');

$routes->get('usuarios/eliminarUsuario/(:num)', 'Usuario::eliminarUsuario/$1');
$routes->get('usuarios/activarUsuario/(:num)', 'Usuario::activarUsuario/$1');

$routes->get('carrito/finalizar', 'CarritoController::finalizarCompra');
$routes->post('carrito/procesarVenta', 'CarritoController::procesarVenta');
