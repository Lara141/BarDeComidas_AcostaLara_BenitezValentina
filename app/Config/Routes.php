<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::principal');
$routes->get('principal', 'Home::principal');
$routes->get('nosotros', 'Home::somos');
$routes->get('comercializacion', 'Home::comercio');
$routes->get('terminoUso', 'Home::terminos');

//registro y login
$routes->get('inicioSesion', 'Sesion_controller::login');
$routes->post('verificar_login', 'Sesion_controller::verificar_login');
$routes->get('registro', 'Home::registro'); // o Sesion_controller::registro preguntar a lara si lo movemos
$routes->post('registro_usuario', 'Usuarios_controller::add_cliente');

//cuenta de usuario
$routes->get('admin', 'Sesion_controller::admin');
$routes->get('cliente', 'Sesion_controller::cliente');
$routes->get('salir', 'Sesion_controller::salir');
$routes->get('mi_cuenta', 'Sesion_controller::mi_cuenta');
$routes->post('actualizar_mi_cuenta', 'Sesion_controller::actualizar_mi_cuenta');

//consultas
$routes->get('contacto', 'Consulta_controller::consulta');
$routes->post('consulta', 'Consulta_controller::add_consulta');
$routes->get('listar_consulta', 'Consulta_controller::listar_consultas');
$routes->get('consulta/leido/(:num)', 'Consulta_controller::marcar_leido/$1');
$routes->get('consulta/noleido/(:num)', 'Consulta_controller::marcar_no_leido/$1');

// productos
$routes->get('agregar_producto', 'producto_controller::form_agregar_producto');
$routes->post('insertar_producto', 'producto_controller::registrar_producto');
$routes->get('eliminar/(:num)', 'producto_controller::eliminar_producto/$1');
$routes->get('activar/(:num)', 'producto_controller::activar_producto/$1');

//listar producto
$routes->get('gestionar', 'producto_controller::gestionar_producto');
$routes->get('editar/(:num)', 'producto_controller::editar_producto/$1');
$routes->post('actualizar', 'producto_controller::actualizar_producto');
$routes->get('listar_producto', 'producto_controller::listar_productos');
$routes->get('catalogo_producto', 'producto_controller::catalogo_productos');

//catalogo
    //$routes->get('productos', 'producto_controller::listar_productos');
$routes->get('comida', 'producto_controller::menu_comida');
$routes->get('bebida', 'producto_controller::menu_bebida');

//filtros
$routes->get('menu_filtrado', 'Producto_controller::menu_filtrado');

//carrito
$routes->get('ver_carrito', 'Carrito_controller::ver_carrito');
$routes->post('agregar_carrito', 'Carrito_controller::agregar_carrito');
$routes->get('eliminar_item/(:any)', 'Carrito_controller::eliminar_item/$1');
$routes->get('vaciar_carrito', 'Carrito_controller::vaciar_carrito');

//ventas
$routes->get('ventas', 'Ventas_controller::guardar_venta');
$routes->post('guardar_venta', 'Ventas_controller::guardar_venta');
$routes->get('listar_ventas', 'Ventas_controller::listar_ventas');
$routes->get('api/detalle_venta/(:num)', 'Ventas_controller::api_detalle_venta/$1');
$routes->get('eliminar_venta/(:num)', 'Ventas_controller::eliminar_venta/$1');
