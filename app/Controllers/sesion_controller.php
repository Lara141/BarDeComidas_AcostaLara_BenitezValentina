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

    if (!$usuario) {
        // Correo no registrado
        $data['titulo'] = 'Login';
        $data['error_correo'] = 'El correo ingresado no está registrado.';
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion', $data)
            . view('contenido/inicioDeSesion', $data)
            . view('plantillas/piePagina', $data);
    }

    if (!password_verify($pass, $usuario['contrasenia_persona'])) {
        // Contraseña incorrecta
        $data['titulo'] = 'Login';
        $data['error_contras'] = 'La contraseña es incorrecta.';
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion', $data)
            . view('contenido/inicioDeSesion', $data)
            . view('plantillas/piePagina', $data);
    }

    // Login correcto
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
}

    public function admin()
    {
        $data['titulo'] = "Administrador";
        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin');
    }

  public function cliente()
{
    $producto_model = new \App\Models\producto_model();
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

     // Promociones activas
    $data['promociones'] = $producto_model->where('estado_producto', 1)
        ->where('stock_producto >', 0)
        ->where('descuento_producto >', 0)
        ->join('categoria_producto', 'categoria_producto.categoria_id = producto.categoria_id')
        ->findAll();

    $data['titulo'] = "cliente";

    return view('plantillas/encabezado', $data)
        . view('plantillas/barraNavegacion', $data)
        . view('contenido/principal', $data)
        . view('plantillas/piePagina', $data);
}


    public function salir()
    {
        session()->destroy();
        return redirect()->to('/inicioSesion');
    }

    public function mi_cuenta() 
    {
        $usuario_id = session('id_usuario'); 

        // Modelo de usuario
        $usuarioModel = new \App\Models\UserModel();
        $data['usuario'] = $usuarioModel->find($usuario_id);
        $data['titulo'] = 'Mi cuenta';
    

        $ventaModel = new \App\Models\Venta_Model();
        $data['compras'] = $ventaModel->where('id_persona', $usuario_id)->orderBy('fecha_venta', 'DESC')->findAll();

        $data['titulo'] = 'Mi cuenta';
        return view('plantillas/encabezado', $data)
            . view('plantillas/barraNavegacion')
            . view('contenido/mi_cuenta', $data);
    }

    public function actualizar_mi_cuenta()
    {
        helper(['form']);

        $reglas = [
            'nombre'    => 'required|max_length[150]',
            'apellido'  => 'required|max_length[150]',
            'nacimiento'=> 'required',
            'dni'       => 'required|max_length[8]',
            'correo'    => 'required|valid_email',
            'pass'      => 'permit_empty|min_length[8]',
            'repass'    => 'permit_empty|matches[pass]',
        ];

        $mensajes = [
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
                'min_length' => 'La contraseña debe tener al menos 8 caracteres',
            ],
            'repass' => [
                'matches' => 'Las contraseñas no coinciden',
            ],
        ];

        if (!$this->validate($reglas, $mensajes)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $usuarioModel = new \App\Models\Usermodel();
        $session = session();

        $datos = [
            'nombre_persona'     => $this->request->getPost('nombre'),
            'apellido_persona'   => $this->request->getPost('apellido'),
            'nacimiento_persona' => $this->request->getPost('nacimiento'),
            'dni_persona'        => $this->request->getPost('dni'),
            'correo_persona'     => $this->request->getPost('correo'),
        ];

        // Si el usuario ingresó una nueva contraseña válida, la guardamos hasheada
        if ($this->request->getPost('pass')) {
            $datos['pass_persona'] = password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT);
        }

        $usuarioModel->update($session->get('id_usuario'), $datos);

        return redirect()->back()->with('mensaje', 'Tus datos se actualizaron correctamente.');
    }


}
