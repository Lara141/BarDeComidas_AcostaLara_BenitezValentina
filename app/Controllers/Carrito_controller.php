<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_Model;
use App\Models\Venta_Model;
use App\Models\Detalle_Venta_Model;


class Carrito_controller extends BaseController
{
    public function ver_carrito()
    {
        $cart=\Config\Services::cart();
        $data['titulo'] = 'Carrito de Compras';

        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/carrito', ['cart' => $cart])
            . view('plantillas/piePagina');
    }

    public function agregar_carrito()
    {
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $producto_model = new Producto_model();

        // Obtener el producto desde la base
        $producto = $producto_model->find($request->getPost('id'));

        if (!$producto) {
            return redirect()->route('ver_carrito')->with('mensaje', 'Producto no encontrado.');
        }

        // Calcular precio con descuento
        $precio = $producto['precio_producto'];
        $descuento = $producto['descuento_producto'] ?? 0;
        $precio_final = $precio - ($precio * $descuento / 100);

        // Armar datos para insertar al carrito
        $data = [
            'id'    => $producto['id_producto'],
            'name'  => $producto['nombre_producto'],
            'price' => $precio_final,
            'qty'   => 1,
            'options' => [
                'precio_original' => $precio,
                'descuento' => $descuento,
                'imagen' => $producto['imagen_producto']
            ]
        ];

        $cart->insert($data);

        return redirect()->route('ver_carrito')->with('mensaje', 'Producto agregado al carrito correctamente');
    }


    public function eliminar_item($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->route('ver_carrito')->with('mensaje', 'Producto eliminado del carrito');
    }

    public function vaciar_carrito()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->route('ver_carrito')->with('mensaje', 'Carrito vaciado correctamente');
    }

}
