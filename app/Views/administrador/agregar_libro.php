<<<<<<< HEAD:app/Views/contenido/agregar_libro_view.php
<?php helper('form'); ?>
=======

>>>>>>> 5dcf08a9f3b3828339315dfc40ee815ca5994314:app/Views/administrador/agregar_libro.php
<h1 class="text-center">Registrar libros</h1>
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

            <?php echo form_open_multipart('insertar_libro')?>
            <div class="form-group">
                <label for="titulo">Tirtulo del libro</label>
                <?php echo form_input(['name'=> 'titulo', 'id' => 'titulo', 'class' => 'form-control','placeholder'=>'Ingrese titulo del libro', 'value'=>set_value('titulo')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Autor</label>
                <?php echo form_input(['name'=> 'autor', 'id' => 'autor', 'class' => 'form-control','placeholder'=>'Ingrese autor del libro', 'value'=>set_value('autor')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Descripcion</label>
                <?php echo form_input(['name'=> 'descripcion', 'id' => 'descripcion', 'class' => 'form-control','placeholder'=>'Ingrese descripcion del libro', 'value'=>set_value('descripcion')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Stock</label>
                <?php echo form_input(['name'=> 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder'=>'Ingrese stock del libro', 'value'=>set_value('stock')]);?>
            </div>
            <div class="form-group">
                <label for="titulo">Precio</label>
                <?php echo form_input(['name'=> 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder'=>'Ingrese precio del libro', 'value'=>set_value('precio')]);?>
            </div>
            <!--Agregar los controles que faltan-->
               <div class="form-group">
                <label for="imagen">Imagen</label>
                <?php echo form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file','value'=>set_value('imagen')]);?>
            </div>

               <div class="form-group">
                <label for="categoria">Categoria</label>
                <?php 
                $lista['0']='categoria';
                $lista['1']='recetas';
                $lista['2']='historias';
                foreach ($categorias as $row){
                    $categoria_id=$row['categoria_id'];
                    $categoria_desc=$row['categoria_desc'];
                    $lista[$categoria_id]=$categoria_desc;
                }
                echo form_dropdown('categoria',$lista,set_value('categoria'), 'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <label for="titulo">Estado</label>
                <?php echo form_input(['name'=> 'estado', 'id' => 'estado', 'class' => 'form-control','placeholder'=>'Ingrese estado del libro', 'value'=>set_value('estado')]);?>
            </div>
            <div class="form-group mt-3">
                <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'"); ?>
            </div>
            <?php echo form_close();?>
    </div>

</div>