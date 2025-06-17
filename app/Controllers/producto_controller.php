<?php
namespace App\Controllers;
use App\Models\producto_model;
use App\Models\Categoria_Model;


class producto_controller extends BaseController {

    public function form_agregar_producto(){
        helper('form');
        $categoria= new Categoria_Model();
        $data['categorias']= $categoria->findAll();
        $data['titulo']= 'Agregar producto ';
        $data['producto'] = [
        'nombre_producto' => '',
        'stock_producto' => '',
        'imagen_producto' => '',
        'categoria_id' => ''
    ];
        return view('administrador/encabezado_admin', $data).view('administrador/barraNav_admin', $data).view('administrador/agregar_producto', $data);
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
    $categoria = new Categoria_model();
    $data['categorias']=$categoria->findAll();
    $data['producto']=$producto_model->where('id_producto', $id)->first();
    $data['titulo']='edicion de producto';

    return view('administrador/encabezado_admin', $data).view('administrador/barraNav_admin').view('administrador/editar_producto', $data);
}

public function actualizar_producto()
{
    $request = \Config\Services::request();
    $validation = \Config\Services::validation();
    $producto_model = new producto_model();

    // Obtener el producto actual
    $id = $request->getPost('id');
    $producto = $producto_model->where('id_producto', $id)->first();

    // Reglas de validación
    $rules = [
        'nombre'      => 'required|max_length[255]',
        'precio'      => 'required|decimal',
        'descripcion' => 'required|max_length[1000]',
        'stock'       => 'required|integer',
        'categoria'   => 'required',
    ];

    // Solo valida la imagen si se sube una nueva
    $img = $this->request->getFile('imagen');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $rules['imagen'] = 'uploaded[imagen]|max_size[imagen,4096]|ext_in[imagen,jpg,jpeg,png,gif]';
    }

    $validation->setRules($rules);

    if (!$validation->withRequest($request)->run()) {
        // Si falla la validación, vuelve a la vista con errores
        $categoria = new Categoria_model();
        $data['validation'] = $validation->getErrors();
        $data['categorias'] = $categoria->findAll();
        $data['producto'] = $producto;
        $data['titulo'] = 'edicion de producto';

        return view('administrador/encabezado_admin', $data)
            . view('administrador/barraNav_admin')
            . view('administrador/editar_producto', $data);
    }

    // Procesar imagen
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $nombre_aleatorio = $img->getRandomName();
        $img->move(ROOTPATH . 'assets/upload/', $nombre_aleatorio);
    } else {
        $nombre_aleatorio = $producto['imagen_producto'];
    }

    // Actualizar datos
    $data = [
        'nombre_producto'    => $request->getPost('nombre'),
        'precio_producto'    => $request->getPost('precio'),
        'descripcion_producto' => $request->getPost('descripcion'),
        'estado_producto'    => 1,
        'stock_producto'     => $request->getPost('stock'),
        'categoria_id'       => $request->getPost('categoria'),
        'imagen_producto'    => $nombre_aleatorio,
    ];

    $producto_model->update($id, $data);

    return redirect()->route('gestionar')->with('mensaje', 'El producto se actualizó correctamente!');
}


public function listar_productos() {
    $producto_model = new producto_model();
    $data['productos'] = $producto_model->where('estado_producto', 1)->where('stock_producto >', 0)->join('categoria_producto', 'categoria_producto.categoria_id=producto.categoria_id')->findAll();
    $data['titulo'] = 'Catálogo de productos';
    return view('administrador/encabezado_admin', $data).view('administrador/barraNav_admin').view('contenido/catalogo_producto', $data); 
}

public function eliminar_producto($id=null){
    //se actualiza el estado del producto
    $data=array('estado_producto'=>'0');
    $producto= new producto_model();
    $producto->update($id, $data);
    return redirect()-> route('gestionar');

}

public function activar_producto($id=null){
    //se actualiza el estado del producto
    $data=array('estado_producto'=>'1');
    $producto= new producto_model();
    $producto->update($id, $data);
    return redirect()-> route('gestionar');
}
}
