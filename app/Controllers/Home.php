<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $productoModel = new \App\Models\Producto_model();
        $data['productos'] = $productoModel->findAll(); 
        $data['titulo'] = "Inicio";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion', $data)
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
