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
        $data = array(
            'id' => $request->getPost('id'),
            'name' => $request->getPost('titulo'),
            'price' => $request->getPost('precio'),
            'qty' => 1
        );
        $cart->insert($data);
    
        return redirect()->route('ver_carrito')->with('mensaje', 'Producto agregado al carrito');
    }

     public function guardar_venta()
    {
        $cart = \Config\Services::cart();
        $venta = new Venta_Model();
        $detalle = new Detalle_Venta_Model();
        $productos = new Producto_model();

        $cartItems = $cart->contents();

        // Verificar stock
        foreach ($cartItems as $item) {
            $producto = $productos->where('id_producto', $item['id'])->first();
            if ($producto['stock_producto'] < $item['qty']) {
                return redirect()->route('ver_carrito')->with('mensaje', 'No hay suficiente stock para el producto: ' . $item['name']);
            }
        }

        // Insertar venta
        $data = [
            'id_persona'    => session('id_usuario'),
            'fecha_venta'   => date('Y-m-d H:i:s'),
            'total_venta'   => $cart->total(),
            'estado_venta'  => 1
        ];
        $venta_id = $venta->insert($data);

        // Insertar detalle de venta y actualizar stock
        foreach ($cartItems as $item) {
            $detalle_data = [
                'id_venta'     => $venta_id,
                'id_producto'  => $item['id'],
                'cantidad'     => $item['qty'],
                'precio_unitario'       => $item['price'],
                'subtotal'         => $item['qty'] * $item['price'],
                'activo'           => 1
            ];
            $detalle->insert($detalle_data);

            $producto = $productos->where('id_producto', $item['id'])->first();
            $nuevo_stock = $producto['producto_stock'] - $item['qty'];
            $productos->update($item['id'], ['stock_producto' => $nuevo_stock]);
        }

        $cart->destroy();
        return redirect()->route('ver_carrito')->with('mensaje', '¡Gracias por su compra! Su venta ha sido registrada correctamente.');
    }

    

}
