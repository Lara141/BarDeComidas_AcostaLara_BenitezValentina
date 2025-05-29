<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        $data['titulo'] = "Inicio";
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
            . view('contenido/nosotros')
            . view('plantillas/piePagina');
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

    public function inicioSesion()
    {
        $data['titulo'] = "Inicio de Sesion";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/inicioDeSesion')
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

<<<<<<< HEAD
    
=======
    public function admin()
    {
        $data['titulo'] = "Administrador";
         return view('plantillas/encabezado')
            . view('plantillas/barraNavegacion')
            . view('contenido/admin')
            . view('plantillas/piePagina');
    }

    public function cliente()
    {
        $data['titulo'] = "Cliente";
        return view('plantillas/encabezado')
            . view('plantillas/barraNavegacion')
            . view('contenido/cliente')
            . view('plantillas/piePagina');
    }

>>>>>>> 13defa8261cfbac8da81eb83c0193a340fe166c5
}
