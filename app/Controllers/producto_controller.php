<?php
namespace App\Controllers;
use App\Models\producto_model;
use App\Models\Categoria_Model;

class producto_controller extends BaseController {

    public function form_agregar_producto(){
        $categoria= new Categoria_Model();
        $data['categorias']= $categoria->findAll();
        $dara['titulo']= 'Agregar producto ';
        return view('administrador/encabezado_admin', $data).view('administrador/barraNav_admin').view('administrador/agregar_producto');
    }
    public function registrar_producto(){
    //procesa los datos del producto enviados por el formulario
    $validation= \Config\Services::validation();
    $request= \Config\Services::request();

    $validation->setRules(
    [
        //reglas de validacion
        'nombre'=>'required|max_length[255]',
        'precio'=>'required|decimal',
        'descripcion'=>'required|max_length[1000]',
        'estado'=>'required|integer',
        'stock'=>'required|integer',
        'categoria' => 'required',
        'imagen'=>'uploaded[imagen]|max_size[imagen, 4096]|ext_in[imagen,jpg,jpeg,png,gif]',
    ],
    [//errors
       //completar los mensajes
        'nombre' => [
            'required' => 'El nombew es requerido',
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
            'required' => 'El stock es requerido',
        ],

        'categoria'=>[
            'is_not_unique'=> 'Debe seleccionar una categoria',

        ],
        'imagen'=>[
            'uploaded'=> 'Debe seleccionar una imagen',
            'ext_in'=> 'debe ser una imagen valida',

        ],

    ]

    );

    if($validation->withRequest($request)->run()){
    $img=$this->request->getFile('imagen');
    $nombre_aleatorio = $img->getRandomName();
    $img->move(ROOTPATH.'assets/upload/', $nombre_aleatorio);

    $data =[

        'nombre_producto'=> $request->getPost('nombre'),
        'precio_producto'=> $request->getPost('precio'),
        'descripcion_producto'=> $request->getPost('descripcion'),
        'estado_producto'=> 1,
        'stock_producto'=> $request->getPost('stock'),
        'categoria_id'=> $request->getPost('categoria'),
        'imagen_producto'=> $nombre_aleatorio, 
        
    ];

    $producto= new producto_model();
    $producto->insert($data);
    return redirect()->route('agregar_producto')->with('mensaje', 'el producto se registro correctamente!');

    }else{
        $categoria=new Categoria_model();
        $data['validation']= $validation->getErrors();
        $data['categorias']=$categoria->findAll();
        $data['titulo']='agregar producto';

        return view('administrador/encabezado_admin',$data).view('administrador/barraNav_admin').view('administrador/agregar_producto');
    }

 }

function gestionar_producto(){
   $producto_model= new producto_model();
   $categoria=new Categoria_Model();

    $data['producto']= $producto_model->join('categoria_producto','categoria_producto.categoria_id=producto.categoria_id')->findAll();
    $data['titulo']='listar productos';

    return view('administrador/encabezado_admin',$data).view('administrador/barraNav_admin').view('administrador/listar_producto');
}

function editar_producto($id=null){
    $producto_model= new producto_model();
    $categoria= new Categoria_model();
    $data['cateogrias']=$categoria->findAll();
    $data['producto']=$producto_model->where('producto_id', $id)->first();
    $data['titulo']='edicion de producto';

    return view('administrador/encabezado_admin', $data).view('administrador/barraNav_admin').view('administrador/editar_producto');
}

function actualizar_producto(){
$request=\Config\Services::request();
 $validation= \Config\Services::validation();


 
    $validation->setRules(
    [
        //reglas de validacion
        'nombre'=>'required|max_length[255]',
        'precio'=>'required|decimal',
        'descripcion'=>'required|max_length[1000]',
        'estado'=>'required|integer',
        'stock'=>'required|integer',
        'categoria' => 'required',
        'imagen'=>'uploaded[imagen]|max_size[imagen, 4096]|ext_in[imagen,jpg,jpeg,png,gif]',
    ],
     [//errors
       //completar los mensajes
        'nombre' => [
            'required' => 'El nombew es requerido',
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
            'required' => 'El stock es requerido',
        ],

        'categoria'=>[
            'is_not_unique'=> 'Debe seleccionar una categoria',

        ],
        'imagen'=>[
            'uploaded'=> 'Debe seleccionar una imagen',
            'ext_in'=> 'debe ser una imagen valida',

        ],

    ]

    );

//validar los datos
//si pasa la validacion
 $id= $request->getPost('id');

 $data=[

        'nombre_producto'=> $request->getPost('nombre'),
        'precio_producto'=> $request->getPost('precio'),
        'descripcion_producto'=> $request->getPost('descripcion'),
        'estado_producto'=> 1,
        'stock_producto'=> $request->getPost('stock'),
        'categoria_id'=> $request->getPost('categoria'),
        'imagen_producto'=> $nombre_aleatorio, 
        
    ];

    $producto=new producto_model();
    $producto->update($id, $data);
    // mensaje que se actualizo correctamente el producto
     return redirect()->route('gestionar')->with('mensaje', 'el producto se actualizo correctamente!');


}

function listar_productos(){
    $producto_model= new producto_model();
    $data['productos']= $producto_model->where('estado_producto', 1)->where('stock_producto>', 0)->join('categoria_producto', 'categoria_producto.categoria_id=producto.categoria_id')->findAll();
    $data['titulo']='catalogo de productos';
    return view('plantillas/encabezado', $data).view('plantilla/barraNavegacion').view('contenido/catalogo_producto');
}

public function listar_consultas()
{
    $consultaModel = new \App\Models\consulta_model();
    $data['consultas'] = $consultaModel->findAll();
    $data['titulo'] = 'Listado de Consultas';

    return view('administrador/encabezado_admin', $data)
        . view('administrador/barraNav_admin')
        . view('administrador/listar_consulta', $data);
}

}