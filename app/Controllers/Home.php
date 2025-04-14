<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('contenido/contacto_view.php');//si esta en una carpeta escribimos view(nombre de carpeta/archivo)
    }
}
