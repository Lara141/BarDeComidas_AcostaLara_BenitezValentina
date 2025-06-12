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
    $lista = ['' => 'Seleccione una categoría'];
    foreach($categorias as $row){
        $lista[$row['categoria_id']] = $row['categoria_desc'];
    }
    $sel = $producto['categoria_id']; // Asegúrate que este campo exista en tu array $producto
    echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');
    ?>
</div>

<?php echo form_hidden('id', $producto['id_producto']);?>
<div class="form-group">
    <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-success'");?>

</div>
<?php echo form_close();?>
    </div>
</div>