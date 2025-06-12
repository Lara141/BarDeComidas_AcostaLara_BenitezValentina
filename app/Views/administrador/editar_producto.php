<?php helper('form'); ?>
<h1 class="text-center">Edicion de productos</h1>
<div class="container">
    <div class="w-50 mx-auto">
<?php echo form_open_multipart('actualizar');?>
<div class="form-group">
    <label for="nombre">Nombre del producto</label>
    <?php echo form_input(['name' => 'nombre_producto', 'id'=>'nombre_producto', 'class' => 'form-control', 'autofocus' =>'autofocus', 'value'=> $producto['nombre_producto']]); ?>

</div>

<div class="form-group">
    <label for="stock">Stock</label>
    <?php echo form_input(['name' => 'stock_producto', 'id'=>'stock_producto', 'class' => 'form-control', 'value' => $producto['stock_producto']]); ?>

</div>

<div class="form-group">
    <label for="imagen">Imagen</label>
  <img src="  <?php echo base_url('public/assets/upload/'.$producto['imagen_producto']);?>" alt="" height="100" width="100"/>
  <?php echo form_input(['name'=> 'imagen', 'id'=> 'imagen', 'type'=>'filr']);?>

</div>

<div class="form-group">
    <label for="categoria">Categoria</label>
    <?php
<<<<<<< HEAD
    $lista['0']='seleccione categoria';
    foreach($categorias as $row){
        $lista[$row['categoria_id']]=$row['categoria_desc'];

    }
    $sel=$producto['categoria_id'];
    echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');?>


</div>
<?php echo form_hidden('id', $producto['id_producto']);?>
=======
    $lista = ['' => 'Seleccione una categoría'];
    foreach($categoria as $row){
        $lista[$row['categoria_id']] = $row['categoria_desc'];
    }
    $sel = $producto['categoria_id']; // Asegúrate que este campo exista en tu array $producto
    echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');
    ?>
</div>

<?php echo form_hidden('id', $producto['producto_id']);?>
>>>>>>> 88553ba12d30c9cba8d332a51de0d73dfe392beb
<div class="form-group">
    <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-success'");?>

</div>
<?php echo form_close();?>
    </div>
</div>