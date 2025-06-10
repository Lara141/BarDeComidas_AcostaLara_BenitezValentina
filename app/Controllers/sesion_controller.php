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
                return redirect()->to('/');
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
        $data['titulo'] = "Cliente";
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/cliente')
            . view('plantillas/piePagina');
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/inicioSesion');
    }
}
