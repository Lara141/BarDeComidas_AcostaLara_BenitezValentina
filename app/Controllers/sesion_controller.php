<?php

namespace App\Controllers;

class Sesion_controller extends BaseController
{
    public function login()
    {
        $data['titulo'] = 'Iniciar Sesión';
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/inicioDeSesion')
            . view('plantillas/piePagina');
    }

    public function verificar_login()
    {
        $session = session();
        $request = \Config\Services::request();
        $correo = $request->getPost('correo');
        $pass = $request->getPost('pass');

        $modelo = new \App\Models\UserModel();
        $usuario = $modelo->where('correo_persona', $correo)->first();

        if ($usuario && password_verify($pass, $usuario['contrasenia_persona'])) {
            $session->set([
                'id_usuario' => $usuario['id_persona'],
                'nombre'     => $usuario['nombre_persona'],
                'correo'     => $usuario['correo_persona'],
                'perfil'     => $usuario['id_perfil'],
                'logueado'   => true
            ]);


            if ($usuario['id_perfil'] == 1) {
                return redirect()->to('/admin');
            } elseif ($usuario['id_perfil'] == 2) {
                return redirect()->to('/cliente');
            } else {
                return redirect()->to('/');
            }
        } else {
            $data['titulo'] = 'Login';
            $data['error'] = 'Correo o contraseña incorrectos';
            return view('plantillas/encabezado', $data)
                . view('plantillas/barraNavegacion')
                . view('contenido/inicioDeSesion')
                . view('plantillas/piePagina');
        }
    }

    public function admin()
    {
        $data['titulo'] = "Administrador";
        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin');
    }

    public function cliente()
    {
        $data['titulo'] = "cliente";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/principal')
            . view('plantillas/piePagina');
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/inicioSesion');
    }

    public function mi_cuenta() 
    {
    $usuario_id = session('id_usuario'); // o el campo de sesión que uses

    // Modelo de usuario
    $usuarioModel = new \App\Models\UserModel();
    $data['usuario'] = $usuarioModel->find($usuario_id);
    $data['titulo'] = 'Mi cuenta';

    // Modelo de compras o pedidos
    //$compraModel = new \App\Models\Compra_model(); 
    //$data['compras'] = $compraModel->where('usuario_id', $usuario_id)->orderBy('fecha', 'DESC')->findAll();

    $data['titulo'] = 'Mi cuenta';
    return view('plantillas/encabezado', $data)
         . view('plantillas/barraNavegacion')
         . view('contenido/mi_cuenta', $data);
    }

    public function actualizar_mi_cuenta()
    {
        $usuario_id = session('id_usuario');
        $request = \Config\Services::request();

        $usuarioModel = new \App\Models\UserModel();

        $datosActualizados = [
            'nombre_persona' => $request->getPost('nombre'),
            'apellido_persona' => $request->getPost('apellido'),
            'nacimiento_persona' => $request->getPost('nacimiento'),
            'dni_persona' => $request->getPost('dni'),
            'correo_persona' => $request->getPost('correo')
        ];

        $usuarioModel->update($usuario_id, $datosActualizados);

        return redirect()->to('/mi_cuenta')->with('mensaje', 'Datos actualizados correctamente.');
    }


}
