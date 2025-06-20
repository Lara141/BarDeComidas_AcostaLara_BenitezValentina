<?php


namespace App\Controllers;
use App\Models\Venta_Model;
use App\Models\Detalle_Venta_Model;
use App\Models\producto_Model;

class Ventas_controller extends BaseController
{
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

    $request = \Config\Services::request();
    $metodo_entrega = $request->getPost('metodo_entrega');

    // Validación para que se seleccione método de entrega
    if (empty($metodo_entrega)) {
        return redirect()->route('ver_carrito')->with('mensaje', 'Debe seleccionar un método de entrega.');
    }

    $direccion = $metodo_entrega === 'envio' ? $request->getPost('direccion') : 'Retiro en el local';
    
    if ($metodo_entrega === 'envio' && empty($direccion)) {
        return redirect()->route('ver_carrito')->with('mensaje', 'Por favor, ingrese la dirección de entrega.');
    }

    $data = [
        'id_persona'        => session('id_usuario'),
        'fecha_venta'       => date('Y-m-d H:i:s'),
        'total_venta'       => $cart->total(),
        'estado_venta'      => 1,
        'metodo_entrega'    => $metodo_entrega,
        'direccion_entrega' => $direccion
    ];

    $venta_id = $venta->insert($data);

    // Insertar detalle de venta y actualizar stock
    foreach ($cartItems as $item) {
        $detalle_data = [
            'id_venta'     => $venta_id,
            'id_producto'  => $item['id'],
            'cantidad'     => $item['qty'],
            'precio_unitario' => $item['price'],
            'subtotal'     => $item['qty'] * $item['price'],
            'activo'       => 1
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
    $desde = $this->request->getGet('desde');
    $hasta = $this->request->getGet('hasta');
    $metodoEntrega = $this->request->getGet('metodo_entrega');

        $data['ventas'] = $query->getResultArray();

        // Traer los detalles de cada venta
        $detalleBuilder = $db->table('detalle_venta');
        $detalleBuilder->select('detalle_venta.id_venta, producto.nombre_producto, detalle_venta.cantidad, detalle_venta.precio_unitario, detalle_venta.subtotal');
        $detalleBuilder->join('producto', 'producto.id_producto = detalle_venta.id_producto');
        $detalleQuery = $detalleBuilder->get();

        // Organizar los detalles por ID de venta
        $detallesRaw = $detalleQuery->getResultArray();
        $detallesPorVenta = [];

        foreach ($detallesRaw as $detalle) {
            $idVenta = $detalle['id_venta'];
            if (!isset($detallesPorVenta[$idVenta])) {
                $detallesPorVenta[$idVenta] = [];
            }
            $detallesPorVenta[$idVenta][] = $detalle;
        }

        $data['detallesPorVenta'] = $detallesPorVenta;
        $data['titulo'] = 'Lista de Ventas';

        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin')
            . view('administrador/listar_ventas', $data);
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