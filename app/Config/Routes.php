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
$routes->get('servicios', 'Home::servicios');
$routes->get('privacidad', 'Home::privacidad');
$routes->get('garantias', 'Home::garantias');
$routes->get('entregas', 'Home::entregas');




