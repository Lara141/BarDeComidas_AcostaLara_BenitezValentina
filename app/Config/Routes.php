<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::somos');

$routes->get('comercializacion', 'Home::comercio');
$routes->get('terminoUso', 'Home::terminos');
$routes->get('menuu', 'Home::menu'); //Preguntar a lara xq tenemos esto

$routes->get('inicioSesion', 'Sesion_controller::login');
$routes->post('verificar_login', 'Sesion_controller::verificar_login');
$routes->get('registro', 'Home::registro'); // o Sesion_controller::registro preguntar a lara si lo movemos

$routes->get('admin', 'Sesion_controller::admin');
$routes->get('cliente', 'Sesion_controller::cliente');
$routes->get('salir', 'Sesion_controller::salir');

$routes->post('registro_usuario', 'Usuarios_controller::add_cliente');
$routes->get('mi_cuenta', 'Sesion_controller::mi_cuenta');
$routes->post('actualizar_mi_cuenta', 'Sesion_controller::actualizar_mi_cuenta');


$routes->get('contacto', 'Consulta_controller::consulta');
$routes->post('consulta', 'Consulta_controller::add_consulta');

// productos

$routes->get('agregar_producto', 'producto_controller::form_agregar_producto');
$routes->post('insertar_producto', 'producto_controller::registrar_producto');

//listar producto
$routes->get('gestionar', 'producto_controller::gestionar_producto');
$routes->get('editar/(:num)', 'producto_controller::editar_producto/$1');
$routes->post('actualizar', 'producto_controller::actualizar_producto');


$routes->get('eliminar/(:num)', 'producto_controller::eliminar_producto/$1');
$routes->get('activar/(:num)', 'producto_controller::activar_producto/$1');
//catalogo
$routes->get('productos', 'producto_controller::listar_productos');

//carrito
$routes->get('ver_carrito', 'Carrito_controller::ver_carrito');
$routes->post('add_cart', 'Carrito_controller::agregar_carrito');
$routes->get('ventas', 'Carrito_controller::guardar_venta');

//consultas
$routes->get('listar_consulta', 'Consulta_controller::listar_consultas');


$routes->get('catalogo_producto', 'producto_controller::listar_productos');
$routes->get('listarVentas', 'Carrito_controller::listar_ventas');