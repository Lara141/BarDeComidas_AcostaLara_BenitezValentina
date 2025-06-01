<?php
namespace App\Controllers;
use App\Models\libro_model;
use App\Models\Categoria_Model;

class Libro_controller extends BaseController{

public function form_agregar_libro(){
    $categoria= new Categoria_Model();
    $data['categorias']= $categoria->findAll();
    $dara['titulo']= 'Agregar Libro ';
    return view('plantillas/encabezado', $data).view('plantillas/barraNavegacion').view('contenido/agregar_libro_view');
}
public function registrar_libro(){
//procesa los datos del producto enviados por el formulario
$validation= \Config\Services::validation();
$request= \Config\Services::request();

$validation->setRules(
[
//reglas de validacion
'titulo'=>'required|max_length[255]',
'autor'=>'required|max_length[255]',
'descripcion'=>'required|max_length[1000]',
'stock'=>'required|integer',
'precio'=>'required|decimal',
'imagen'=>'uploaded[imagen]|max_size[imagen, 4096]|ext_in[imagen,jpg,jpeg,png,gif]',
'categoria' => 'required',//'is_not_unique[libro_categoria.categoria_id]',
'estado'=>'required|integer',
],
[//errors
//completar los mensajes
'titulo' => [
            'required' => 'El titulo es requerido',
        ],
'autor' => [
            'required' => 'El autor es requerido',
        ],
'descripcion' => [
            'required' => 'la descripcion es requerido',
        ],
'stock' => [
            'required' => 'El stock es requerido',
        ],
'precio' => [
            'required' => 'El precio es requerido',
        ],

'imagen'=>[
    'uploaded'=> 'Debe seleccionar una imagen',
   'ext_in'=> 'debe ser una imagen valida',

],
'categoria'=>[
    'is_not_unique'=> 'Debe seleccionar una categoria',

],
'estado' => [
            'required' => 'El estado es requerido',
        ],

]

);

if($validation->withRequest($request)->run()){
    $img=$this->request->getFile('imagen');
    $nombre_aleatorio = $img->getRandomName();
    $img->move(ROOTPATH.'public/asset/upload', $nombre_aleatorio);

    $data =[

        'libro_titulo'=> $request->getPost('titulo'),
        'libro_autor'=> $request->getPost('autor'),
        'libro_descripcion'=> $request->getPost('descripcion'),
        'libro_stock'=> $request->getPost('stock'),
        'libro_precio'=> $request->getPost('precio'),
        'libro_imagen'=> $nombre_aleatorio,
        'libro_categoria'=> $request->getPost('categoria'),
        'libro_estado'=> 1,
    ];

    $libro= new libro_model();
    $libro->insert($data);
    return redirect()->route('agregar')->with('mensaje', 'el producto se registro correctamente!');

}else{
    $categoria=new Categoria_model();
    $data['validation']= $validation->getErrors();
    $data['categorias']=$categoria->findAll();
    $data['titulo']='agregar libro';

    return view('plantillas/encabezado',$data).view('plantillas/barraNavegacion').view('contenido/agregar_libro_view');

}

}

}