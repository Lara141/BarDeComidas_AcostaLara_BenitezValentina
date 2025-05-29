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
            <?php}?>

            <?php echo form_open_multipart('insertar_libro')?>
            <div class="form-group">
                <label for="titulo">Tirtulo del libro</label>
                <?php echo form_imput(['name'=> 'titulo', 'id' => 'titulo', 'class' => 'form-control','placeholder'=>'Ingrese titulo del libro', 'value'=>set_value('titulo')]);?>
            </div>
            <!--Agregar los controles que faltan-->
               <div class="form-group">
                <label for="imagen">Imagen</label>
                <?php echo form_imput(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file','value'=>set_value('imagen')]);?>
            </div>

               <div class="form-group">
                <label for="categoria">Categoria</label>
                <?php 
                $lista['0']='Seleccione categoria';
                foreach (4categorias as $row){
                    $categoria_id=$row['categoria_id'];
                    $categoria_desc=$row['categoria_desc'];
                    $lista[$categoria_id]=$categoria_desc;
                }
                echo form_dropdown('categoria',$lista, '0', 'class="form-control"');
                ?>
            </div>
            <div class="form-group mt-3">
                <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'"); ?>
            </div>
            <?php echo form_close();?>
    </div>

</div>