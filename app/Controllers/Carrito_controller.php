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
        $productos = new producto_model();

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
            $nuevo_stock = $producto['stock_producto'] - $item['qty'];
            $productos->update($item['id'], ['stock_producto' => $nuevo_stock]);
        }

        $cart->destroy();
        return redirect()->route('ver_carrito')->with('mensaje', '¡Gracias por su compra! Su venta ha sido registrada correctamente.');
    }
    public function listar_ventas()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ventas');
        $builder->select('ventas.id_venta, persona.nombre_persona, ventas.fecha_venta, ventas.total_venta, COUNT(detalle_venta.id_detalle_venta) as cantidad_productos');
        $builder->join('persona', 'persona.id_persona = ventas.id_persona');
        $builder->join('detalle_venta', 'detalle_venta.id_venta = ventas.id_venta');
        $builder->groupBy('ventas.id_venta');
        $builder->orderBy('ventas.fecha_venta', 'DESC');
        $query = $builder->get();

        $data['ventas'] = $query->getResultArray();
        $data['titulo'] = 'Lista de Ventas';

        return view('administrador/encabezado_admin', $data). view('administrador/barraNav_admin').view('administrador/listar_ventas', $data);
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

        public function eliminar_venta($id_venta)
            {
                $ventaModel = new Venta_Model();
                $detalleModel = new Detalle_Venta_Model();

                // Eliminamos primero los detalles relacionados
                $detalleModel->where('id_venta', $id_venta)->delete();

                // Luego eliminamos la venta principal
                $ventaModel->delete($id_venta);

                return redirect()->to(base_url('listar_ventas'))->with('mensaje', 'Venta eliminada correctamente');
            }

            public function api_detalle_venta($id_venta)
            {
                $db = \Config\Database::connect();
                $builder = $db->table('detalle_venta');
                $builder->select('producto.nombre_producto, detalle_venta.cantidad, detalle_venta.precio_unitario, detalle_venta.subtotal');
                $builder->join('producto', 'producto.id_producto = detalle_venta.id_producto');
                $builder->where('detalle_venta.id_venta', $id_venta);
                $query = $builder->get();

                return $this->response->setJSON($query->getResultArray());
            }


}
