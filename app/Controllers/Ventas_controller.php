<?php

namespace App\Controllers;

use App\Models\VentaModel; 

class Ventas_controller extends BaseController
{
    public function listar_ventas()
    {
        $detalle_venta = new Detalle_venta_model;
        $data['titulo'] = "Listado de ventas";
        $data['ventas'] = $venta->join('personas', 'personas.id_persona=venta.id_cliente')->findAll();
        $data['detalle'] = $detalle_venta->join('producto', 'producto.producto_id = detalle_venta.id_producto')->findAll();

        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin')
            . view('administrador/listar_ventas');

    }

    public function listar_detalle_ventas($id=NUL)
    {
        $venta = new Venta_model();
        $detalle_venta=new detalle_venta_model;

        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin')
            . view('administrador/listar_ventas');

    }
}