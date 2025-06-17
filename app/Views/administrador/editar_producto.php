<?php helper('form'); ?>
<h1 class="text-center">Edicion de productos</h1>
<div class="container">
    <div class="w-50 mx-auto">
<?php echo form_open_multipart('actualizar');?>
<div class="form-group">
    <label for="nombre">Nombre del producto</label>
    <?php echo form_input(['name' => 'nombre', 'id'=>'nombre_producto', 'class' => 'form-control', 'autofocus' =>'autofocus', 'value'=> $producto['nombre_producto']??'']); ?>

</div>
<div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
         <?= form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese precio del producto', 'value' => set_value('precio')]) ?>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
         <?= form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese la descripción del producto', 'value' => set_value('descripcion')]) ?>
    </div>

    <div class="form-group">
    <label for="categoria">Categoria</label>
    <?php
    $lista = ['' => 'Seleccione una categoría'];
    foreach($categorias as $row){
        $lista[$row['categoria_id']] = $row['categoria_desc'];
    }
    $sel = $producto['categoria_id']??''; 
    echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');
    ?>
</div>

<div class="form-group">
    <label for="stock">Stock</label>
    <?php echo form_input(['name' => 'stock', 'id'=>'stock_producto', 'class' => 'form-control', 'value' => $producto['stock_producto']??'']); ?>

</div>

<div class="form-group">
    <label for="imagen">Imagen</label>
  <img src="  <?php echo base_url('assets/upload/'.$producto['imagen_producto']??'default.png');?>" alt="" height="100" width="100"/>
     <?= form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control']) ?>
</div>


<?php if (!empty($producto['id_producto']?? null)): ?>
    <?php echo form_hidden('id', $producto['id_producto']); ?>
<?php endif; ?>
<div class="form-group">
    <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-success'");?>

</div>
<?php echo form_close();?>
    </div>
</div>