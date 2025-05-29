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
            $data['validation'] = $validation->getErrors();
            return view('plantillas/encabezado', $data)
                . view('plantillas/barraNavegacion')
                . view('contenido/registro')
                . view('plantillas/piePagina.php');
        }
    }

    public function login()
    {
        helper(['form']);
        $session = session();
        $model = new \App\Models\UserModel();

        $validation = \Config\Services::validation();

        // reglas para validar formulario de login
        $validation->setRules([
            'correo' => 'required|valid_email',
            'pass'  => 'required'
        ], [
            'correo' => [
                'required' => 'El correo es obligatorio',
                'valid_email' => 'Debes ingresar un correo válido'
            ],
            'pass' => [
                'required' => 'Ingrese contraseña, es obligatoria'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // si falla la validación, mandamos errores a la vista
            $data['validation'] = $validation->getErrors();
            $data['titulo'] = 'Login';
            return view('plantillas/encabezado', $data)
                . view('plantillas/barraNavegacion')
                . view('contenido/inicioDeSesion')
                . view('plantillas/piePagina');
        }

        // Si pasa la validación, seguimos con login normal
        $email = $this->request->getPost('correo');
        $password = $this->request->getPost('pass'); 

        $usuario = $model->where('correo_persona', $email)->first();

        if ($usuario) {
            if (password_verify($password, $usuario['contraseña_persona'])) {
                $session->set([
    'id_usuario' => $usuario['id_persona'],
    'nombre'     => $usuario['nombre_persona'],
    'correo'     => $usuario['correo_persona'],
    'perfil'     => $usuario['id_perfil'], // Guardamos el perfil
    'logueado'   => true
]);

// Redireccionamos según el perfil
if ($usuario['id_perfil'] == 1) {
    return redirect()->to('/admin');
} elseif ($usuario['id_perfil'] == 2) {
    return redirect()->to('/cliente');
} else {
    return redirect()->to('/'); // por si falta el perfil
}

            } else {
                $data['titulo'] = 'Login';
                $data['validation'] = ['pass' => 'Contraseña incorrecta'];
                return view('plantillas/encabezado', $data)
                    . view('plantillas/barraNavegacion')
                    . view('contenido/inicioDeSesion')
                    . view('plantillas/piePagina');
            }
        } else {
            $data['titulo'] = 'Login';
            $data['validation'] = ['correo' => 'El correo no está registrado']; 
            return view('plantillas/encabezado', $data)
                . view('plantillas/barraNavegacion')
                . view('contenido/inicioDeSesion')
                . view('plantillas/piePagina');
        }
    }

    public function cliente()
    {
        $data['titulo'] = 'Mi Cuenta - Cliente';
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/cliente')
            . view('plantillas/piePagina');
    }

    public function salir()
    {
        $session = session();

        // Eliminar solo las variables relacionadas a login:
        $session->remove(['id_usuario', 'nombre', 'correo', 'perfil', 'logueado']);

        return redirect()->to('/inicioSesion');
    }


}
