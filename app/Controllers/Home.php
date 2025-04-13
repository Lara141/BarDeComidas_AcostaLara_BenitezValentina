<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('PracticoUno/principal.php');//si esta en una carpeta escribimos view(nombre de carpeta/archivo)
    }
}
