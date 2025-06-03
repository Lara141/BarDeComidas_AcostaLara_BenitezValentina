<?php

namespace App\Controllers;

use App\Models\UserModel; 

class Usuarios_controller extends BaseController
{
    public function add_cliente()
    {
        helper('form');

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        // Reglas de validación
        $validation->setRules([
            'nombre'    => 'required|max_length[150]',
            'apellido'  => 'required|max_length[150]',
            'nacimiento'=> 'required',
            'dni'       => 'required|max_length[8]',
            'correo'    => 'required|valid_email',
            'pass'      => 'required|min_length[8]',
            'repass'    => 'required|matches[pass]',
        ],
        [ // Mensajes personalizados
            'nombre' => [
                'required' => 'Ingrese nombre, es requerido',
            ],
            'apellido' => [
                'required' => 'Ingrese apellido, es requerido',
            ],
            'nacimiento' => [
                'required' => 'La fecha de nacimiento es requerida',
            ],
            'dni' => [
                'required' => 'El DNI es obligatorio',
            ],
            'correo' => [
                'required' => 'Ingrese correo electrónico, es obligatorio',
                'valid_email' => 'La dirección de correo debe ser válida',
            ],
            'pass' => [
                'required' => 'Ingrese contraseña, es obligatoria',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres',
            ],
            'repass' => [
                'required' => 'Debe confirmar la contraseña, es obligatorio',
                'matches' => 'Las contraseñas no coinciden',
            ],
        ]);

        // Si pasa la validación
        if ($validation->withRequest($request)->run()) {
            $data = [
                'nombre_persona'     => $request->getPost('nombre'),
                'apellido_persona'   => $request->getPost('apellido'),
                'nacimiento_persona' => $request->getPost('nacimiento'),
                'dni_persona'        => $request->getPost('dni'),
                'correo_persona'     => $request->getPost('correo'),
                'contraseña_persona' => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
                'id_perfil'          => 2,
                'id_estado_persona'  => 1,
            ];

            $persona = new UserModel();
            $persona->insert($data);

            return redirect()->to('/inicioSesion')->with('mensaje_exito', '¡Cuenta creada con éxito!');

        } else {
            $data['titulo'] = 'Registro';
             return redirect()->back()->withInput()->with('validation', $validation);
            /**$data['validation'] = $validation->getErrors();
            return view('plantillas/encabezado', $data)
                . view('plantillas/barraNavegacion')
                . view('contenido/registro')
                . view('plantillas/piePagina.php');**/
        }
    }

}
