<?php

namespace App\Controllers;

//use App\Models\consulta_model;
use App\Models\producto_model;

class Usuarios_controller extends BaseController
{

public function add_cliente(){

$validation = \Config\Services::validation();
$request = \Config\Services::request();

$validation->setRules(
    [
        'nombre' => 'required|max_length[150]',
         'apellido' => 'required|max_length[150]',
         'nacimiento' => 'required/date',
         'dni'=> 'required|max_length[8]',
         'correo' => 'required|valid_email',
         'pass' => 'required_length[8]',
         'repass' => 'required_length[8]',

    ],
    [   // Errors
        'nombre' => [
            'required' => 'El nombre es requerido',
        ],

        'apellido' => [
            'required' => 'El apellido es requerido',
        ],

         'nacimiento' => [
            'required' => 'la fecha de nacimiento es requerido',
        ],

         'dni' => [
            'required' => 'El dni es requerido',
        ],

         'correo' => [
            'required' => 'El correo electrónico es obligatorio',
            'valid_email' => 'La dirección de correo debe ser válida'
                ],

          'pass'   => [
            "required"      => 'repetir contrasaeña es obligatorio',
            "min_length"    => 'repetir contraseña debe tener al menos 8 caracteres',
            'matches' => 'Las contraseñas no coinciden',
                
                ],
            
            'repass'   => [
            "required"      => 'la contraseña es obligatoria',
            "min_length"    => 'la contraseña debe tener al menos 8 caracteres',
                ],

       
    ]
);

if ($validation->withRequest($request)->run() ){

     $data = [
        'mensaje_nombre' => $request->getPost('nombre'),
        'mensaje_correo' => $request->getPost('apellido'),
        'mensaje_motivo' => $request->getPost('correo'),
        'perfil_id' => 2,
        'persona_estado' => 1,
        'persona_password' => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
            ];

               $consulta = new Usuarios_model();
               $consulta->insert($data);

              return redirect()->route('contact')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
                        
                }else{

                 $data['titulo'] = 'Registro';
                $data['validation'] = $validation->getErrors();
                return view('plantillas/encabezado', $data).view('plantillas/nav').view('contenido/registro').view('plantillas/footer.php');
 

                }

        }
}