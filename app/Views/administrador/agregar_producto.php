<?php helper('form'); ?>
<h1 class="text-center">Registrar producto</h1>
<div class="conteiner">
    <div class="w-50 mx-auto">
        <?php if(!empty($validation)):?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach($validation as $error):?>
                        <li><?=esc($error)?></li>
                        <?php endforeach?>
                </ul>
            </div>
            <?php endif?>
            <?php if(session('mensaje')) {?>
            <div class="alert alert-success">
                <?=session('mensaje');?>
            </div>
            <?php }?>

            <?php echo form_open_multipart('insertar_producto')?>
            <div class="form-group">
                <label for="titulo">Nombre</label>
                <?php echo form_input(['name'=> 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder'=>'Ingrese nombre del producto', 'value'=>set_value('nombre')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Precio</label>
                <?php echo form_input(['name'=> 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder'=>'Ingrese precio del producto', 'value'=>set_value('precio')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Descripcion</label>
                <?php echo form_input(['name'=> 'descripcion', 'id' => 'descripcion', 'class' => 'form-control','placeholder'=>'Ingrese la descripcion del producto', 'value'=>set_value('descripcion')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Estado</label>
                <?php echo form_input(['name'=> 'estado', 'id' => 'estado', 'class' => 'form-control','placeholder'=>'Ingrese estado del producto', 'value'=>set_value('estado')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Stock</label>
                <?php echo form_input(['name'=> 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder'=>'Ingrese stock del producto', 'value'=>set_value('stock')]);?>
            </div>

               <div class="form-group">
                <label for="categoria">Categoria</label>
                <?php
$lista = ['' => 'Seleccione una categoría'];
foreach ($categorias as $row){
    $categoria_id = $row['categoria_id'];
    $categoria_desc = $row['categoria_desc'];
    $lista[$categoria_id] = $categoria_desc;
}
echo form_dropdown('categoria', $lista, set_value('categoria'), 'class="form-control"');
 ?>
            </div>
            <!--Agregar los controles que faltan-->
               <div class="form-group">
                <label for="imagen">Imagen</label>
                <?php echo form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file','value'=>set_value('imagen')]);?>
            </div>
            
            <div class="form-group mt-3">
                <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'"); ?>
            </div>
            <?php echo form_close();?>
    </div>

</div>