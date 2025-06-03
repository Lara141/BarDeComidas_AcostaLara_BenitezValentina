<?php
namespace App\Controllers;
use App\Models\producto_model;
use App\Models\Categoria_Model;

class producto_controller extends BaseController{

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
    $img->move(ROOTPATH.'public/asset/upload', $nombre_aleatorio);

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
    $producto_model= new peoducto_model();
    $categoria=new Categoria_Model();

    $data['producto']= producto_model->join('producto_categoria','producto_categoria.categoria_id=producto.producto_categoria')->findAll();
    $data['titulo']='listar productos';

    return view('administrador/encabezado_admin',$data).view('administrador/barraNav_admin').view('administrador/listar_productos');
}

function editar_producto($id=null){
    $produc
}

}