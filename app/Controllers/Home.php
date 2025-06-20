<?php

namespace App\Controllers;
use App\Models\producto_model;

class Home extends BaseController
{
    
public function principal()
{
    $producto_model = new producto_model();
    $provincia = $this->request->getGet('provincia');
    if (empty($provincia)) {
        $provincia = 'Mendoza';
    }
 $provincia = $this->request->getGet('provincia') ?? 'Mendoza';


    // Productos filtrados por provincia (para la sección de comidas)
    $builder = $producto_model
        ->select('producto.*, categoria_producto.categoria_desc')
        ->where('estado_producto', 1)
        ->where('stock_producto >', 0)
        ->join('categoria_producto', 'categoria_producto.categoria_id=producto.categoria_id');

    if (!empty($provincia)) {
        $builder->where('provincia_producto', $provincia);
    }

    $data['productos'] = $builder->findAll();

    // --- Usá un nuevo modelo para evitar acumulación de condiciones ---
    $producto_model2 = new producto_model();
    $data['promociones'] = $producto_model2
        ->select('producto.*, categoria_producto.categoria_desc')
        ->where('estado_producto', 1)
        ->where('stock_producto >', 0)
        ->where('descuento_producto >', 0)
        ->join('categoria_producto', 'categoria_producto.categoria_id=producto.categoria_id')
        ->findAll();

    $data['titulo'] = 'Inicio';

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
