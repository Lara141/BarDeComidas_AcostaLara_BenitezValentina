<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function principal()
    {
        $producto_model = new \App\Models\producto_model();

        $data['productos'] = $producto_model
        ->select('producto.*, categoria_producto.categoria_desc')
        ->where('estado_producto', 1)
        ->where('stock_producto >', 0)
        ->join('categoria_producto', 'categoria_producto.categoria_id=producto.categoria_id')
        ->findAll();

        $data['titulo'] = 'Inicio';

        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/principal', $data)
            . view('plantillas/piePagina', $data);
    }

    public function somos()
    {
        $data['titulo'] = "Somos";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/nosotros')
            . view('plantillas/piePagina');
    }

    public function comercio()
    {
        $data['titulo'] = "Comercializacion";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/comercializacion')
            . view('plantillas/piePagina');
    }

    public function terminos()
    {
        $data['titulo'] = "Términos y Uso";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/terminoUso')
            . view('plantillas/piePagina');
    }

    public function registro()
    {
        $data['titulo'] = "Registro";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/registro')
            . view('plantillas/piePagina');
    }
}
