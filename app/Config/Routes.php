<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::somos');
$routes->get('contact', 'Home::contacto');
$routes->get('comercializacion', 'Home::comercio');
$routes->get('terminoUso', 'Home::terminos');
$routes->get('menuu', 'Home::menu');
$routes->get('inicioSesion', 'Home::inicioSesion');
$routes->get('registro', 'Home::registro');
$routes->post('consulta', 'Usuarios_controller::add_consulta');

$routes->get('register', 'Usuarios_controller::registro');
$routes->post('registro_usuario', 'Usuarios_controller::add_cliente');

$routes->get('agregar', 'libro_controller::form_agregar_libro');
$routes->post('insertar_libro', 'libro_controller::registrar_libro');