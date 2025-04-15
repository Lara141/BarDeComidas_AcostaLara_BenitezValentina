<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = "ProyectoValentina";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/principal')
            . view('plantillas/piePagina');
    }

    public function somos()
    {
        $data['titulo'] = "Somos";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/nosotros');
    }

    public function contacto()
    {
        $data['titulo'] = "Contacto";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/contacto_view')
            . view('plantillas/piePagina');
    }

    public function comercio()
    {
        $data['titulo'] = "Comercialización";
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

    public function menu()
    {
        $data['titulo'] = "Menu bar";
        return view('menu/menuu', $data);
    }

    public function servicios() 
    {
        $data['titulo'] = "Servicios ofrecidos";
        return view('terminos/servicios');
    }

    public function privacidad() 
    {
        $data['titulo'] = "politicas de privacidad";
        return view('terminos/privacidad');
    }

    public function garantias() 
    {
        $data['titulo'] = "Garantias";
        return view('terminos/garantias');
    }

    public function entregas() 
    {
        $data['titulo'] = "Servicios ofrecidos";
        return view('terminos/entregas');
    }

}
