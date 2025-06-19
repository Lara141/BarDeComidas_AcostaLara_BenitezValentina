<?php

namespace App\Controllers;
use App\Models\consulta_model;

class Consulta_controller extends BaseController
{
    public function add_consulta()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre'     => 'required|max_length[150]',
                'apellido'   => 'required|max_length[150]',
                'provincia'  => 'required',
                'localidad'  => 'required|max_length[150]',
                'correo'     => 'required|valid_email',
                'mensaje'    => 'required|max_length[200]',
            ],
            [
                'nombre' => ['required' => 'El nombre es requerido'],
                'apellido' => ['required' => 'El apellido es requerido'],
                'provincia' => ['required' => 'Es necesario que seleccione su provincia'],
                'localidad' => ['required' => 'La localidad es requerida, ingrese una'],
                'correo' => [
                    'required' => 'Ingrese correo, es obligatorio',
                    'valid_email' => 'Debe ser un correo válido'
                ],
    
                'mensaje' => [
                    'required' => 'Debes escribir algún mensaje',
                ],
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $data = [
                'nombre_consulta'       => $request->getPost('nombre'),
                'apellido_consulta'     => $request->getPost('apellido'),
                'provincia_consulta'   => $request->getPost('provincia'),
                'localidad_consulta'          => $request->getPost('localidad'),
                'correo_consulta'       => $request->getPost('correo'),
                'mensaje_consulta'   => $request->getPost('mensaje'),
                'id_estado_persona'    => 1,
                'id_perfil'            => 2  
        ];


            $usuarios = new consulta_model();
            $usuarios->insert($data);

            return redirect()->route('contacto')->with('mensaje_consulta', '¡Tu consulta fue enviada con éxito!');
        } else {
            $data['titulo'] = 'Consulta';
            return redirect()->back()->withInput()->with('validation', $validation);
        }
    }

    public function consulta()
    {
        $data['titulo'] = 'Contacto';
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/contacto')
            . view('plantillas/piePagina');
    }

    public function listar_consultas()
    {
        $consulta = new consulta_model();
        $data['consultas'] = $consulta->findAll();
        $data['titulo'] = 'Consultas';

        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin')
            . view('administrador/listar_consulta');
    }
}
