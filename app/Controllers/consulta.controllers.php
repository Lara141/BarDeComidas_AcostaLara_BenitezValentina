<?php

namespace App\Controllers;

use App\Models\consulta_model;

class Usuarios_controller extends BaseController
{
    public function add_cliente()
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
                'pass'       => 'required|min_length[8]|matches[repass]',
                'mensaje'    => 'required|max_length[200]',
            ],
            [
                'nombre' => ['required' => 'El nombre es requerido'],
                'apellido' => ['required' => 'El apellido es requerido'],
                'provincia' => ['required' => 'Es necesario que seleccione su provincia'],
                'localidad' => ['required' => 'La localidad es requerida'],
                'correo' => [
                    'required' => 'El correo es obligatorio',
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
                'mensaje_consulta'   => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
                'id_estado_persona'    => 1, // o lo que necesites
                'id_perfil'            => 2  // o el perfil que corresponda
                // 'fecha_persona' se completa sola por default
        ];


            $usuarios = new Usuarios_model();
            $usuarios->insert($data);

            return redirect()->route('contact')->with('mensaje_consulta', '¡Tu consulta fue enviada con éxito!');
        } else {
            $data['titulo'] = 'Consulta';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/encabezado', $data)
                . view('plantillas/nav')
                . view('contenido/registro')
                . view('plantillas/footer');
        }
    }
}
