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

}
