<!-- en este archivo van todas las funciones de los productos (registrar producto, eliminar, editar)-->

<?php

namespace App\Controllers;

use App\Models\consulta_model;
use App\Models\producto_model;

class Usuarios_controller extends BaseController
{

public function add_producto(){

$validation = \Config\Services::validation();
$request = \Config\Services::request();

$validation->setRules(
    [
        'nombre' => 'required|max_length[150]',
         'precio' => 'required|max_length[150]',
         'descripcion' => 'required/date',
         'estado'=> 'required|max_length[8]',
         'stock' => 'required|valid_email',
         'categoria' => 'required_length[8]',
         'imagen' => 'is_image[field_name]',

    ],
    [   // Errors
        'nombre' => [
            'required' => 'El nombre es requerido',
        ],

        'precio' => [
            'required' => 'El precio es requerido',
        ],

         'descripcion' => [
            'required' => 'la descripcion es requerido',
        ],

         'estado' => [
            'required' => 'El estado es requerido',
        ],

         'stock' => [
            'required' => 'El stock es obligatorio',
                ],

          'categoria'   => [
            "required"      => 'elige una categoria',
                
                ],
            
            'imagen'   => [
            "required"      => 'seleccione una imagen',
            "min_length"    => 'la contraseña debe tener al menos 8 caracteres',//aqui va otra validacion, que tiene que ver con el tamaño y el tipo de imagen, ademas de validar que el archivo es una imagen
                ],

       
    ]
);

if ($validation->withRequest($request)->run() ){

     $data = [
        'nombre_producto' => $request->getPost('nombre'),
        'precio_producto' => $request->getPost('precio'),
        'descripcion_producto' => $request->getPost('descripcion'),
        'estado_producto' => 2,
        'stock_producto' => 1,
        'categoria_producto' => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
        'imagen_producto' => $request->getPost('imagen'),
            ];

               $consulta = new producto_model();
               $consulta->insert($data);

              return redirect()->route('contact')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
                        
                }else{

                 $data['titulo'] = 'Registro';
                $data['validation'] = $validation->getErrors();
                return view('plantillas/encabezado', $data).view('plantillas/nav').view('contenido/registro').view('plantillas/footer.php');
 

                }

        }
}