<?php

namespace App\Controllers;

use App\Models\Usuarios_model;

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
                'nacimiento' => 'required',
                'dni'        => 'required|max_length[8]',
                'correo'     => 'required|valid_email',
                'pass'       => 'required|min_length[8]|matches[repass]',
                'repass'     => 'required|min_length[8]',
            ],
            [
                'nombre' => ['required' => 'El nombre es requerido'],
                'apellido' => ['required' => 'El apellido es requerido'],
                'nacimiento' => ['required' => 'La fecha de nacimiento es requerida'],
                'dni' => ['required' => 'El DNI es requerido'],
                'correo' => [
                    'required' => 'El correo es obligatorio',
                    'valid_email' => 'Debe ser un correo válido'
                ],
                'pass' => [
                    'required' => 'La contraseña es obligatoria',
                    'min_length' => 'Debe tener al menos 8 caracteres',
                    'matches' => 'Las contraseñas no coinciden'
                ],
                'repass' => [
                    'required' => 'Debes repetir la contraseña',
                    'min_length' => 'Debe tener al menos 8 caracteres'
                ],
            ]
        );

        if ($validation->withRequest($request)->run()) {
            $data = [
                'nombre_persona'       => $request->getPost('nombre'),
                'apellido_persona'     => $request->getPost('apellido'),
                 'nacimiento_persona'   => $request->getPost('nacimiento'),
                'dni_persona'          => $request->getPost('dni'),
                'correo_persona'       => $request->getPost('correo'),
                'contraseña_persona'   => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
                'id_estado_persona'    => 1, // o lo que necesites
                'id_perfil'            => 2  // o el perfil que corresponda
                // 'fecha_persona' se completa sola por default
        ];


            $usuarios = new Usuarios_model();
            $usuarios->insert($data);

            return redirect()->route('contact')->with('mensaje_consulta', '¡Te registraste con éxito!');
        } else {
            $data['titulo'] = 'Registro';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/encabezado', $data)
                . view('plantillas/nav')
                . view('contenido/registro')
                . view('plantillas/footer');
        }
    }
}
