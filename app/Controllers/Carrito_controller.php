<?php

namespace App\Controllers;

use App\Models\Libro_model;
use App\Models\Categoria_Model;

class Carrito_controller extends BaseController
{
    public function ver_carrito()
    {
        $cart=\Config\Services::cart();
        $data['titulo'] = 'Carrito de Compras';

        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/carrito')
            . view('plantillas/piePagina');
    }


    public function agregar_carrito()
    {
        $cart=\Config\Services::cart();
        $request = \Config\Services::request();
        $data = array(
            'id' => $request->getPost('id'),
            'name' => $request->getPost('titulo'),
            'price' => $request->getPost('precio'),
            'qty' => 1
        );
        $cart->insert($data);
         //mensaje de que se agrego al carrito
        return redirect()->route('ver_carrito');
    }

     public function guardar_venta()
    {
        $cart=\Config\Services::cart();
        $venta=new Venta_Model();
        $detalle=new Detalle_Venta_Model();
        $productos=new producto_Model;
        
        $cart1=$cart->conts();

        foreach($cart1 as $item){
            $producto = $productos->where('id_producto', $item['id'])->first();
            if($producto['producto_stock']<$item['qty']){
                //mensaje de producto sin stock
                return redirect()->route('ver_carrito')->with('mensaje', 'No hay suficiente stock para el producto: ' . $item['name']);
                

            }
        }

        $data = array('id_persona' => session('id'),
                      'fecha_venta' => date('Y-m-d H:i:s'),
                      'total_venta' => $cart->total(),
                      'estado_venta' => 1);
        $venta_id = $venta->insert($data);
        $cart1=$cart->contents();
        foreach($cart1 as $item){
            $detalle_data = array(
                'venta_id' => $venta_id,
                'producto_id' => $item['id'],
                'cantidad' => $item['qty'],
                'precio' => $item['price']
            );
            $producto=$productos->where('id_producto', $item['id'])->first();
            $data=[
                'producto_stock'=> $producto['producto_stock'] - $item['qty'],
            ];
            $detalle->insert($detalle_data);

            // Actualizar el stock del producto
            $productos->update($item['id'], $data);
            //insertar deatlle de venta
            $detalle->insert($detalle_venta);
        }

        //mesnaje de agradecimiento por la compra
        $cart->destroy();
        return redirect()->route('ver_carrito')->with('mensaje', 'Gracias por su compra! Su venta ha sido registrada correctamente.');
    }

    

}
