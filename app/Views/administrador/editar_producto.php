<?php helper('form'); ?>
<h1 class="text-center">Edición de productos</h1>
<div class="container">
    <div class="w-50 mx-auto">
        <?= form_open_multipart('actualizar'); ?>

        <div class="form-group mb-3">
            <label for="nombre">Nombre del producto</label>
            <?= form_input(['name' => 'nombre', 'id' => 'nombre_producto', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['nombre_producto'] ?? '']) ?>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <?= form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'value' => $producto['precio_producto'] ?? '']) ?>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <?= form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'value' => $producto['descripcion_producto'] ?? '']) ?>
        </div>

        <div class="mb-3">
            <label for="categoria">Categoría</label>
            <?php
            $lista = ['' => 'Seleccione una categoría'];
            foreach ($categorias as $row) {
                $lista[$row['categoria_id']] = $row['categoria_desc'];
            }
            echo form_dropdown('categoria', $lista, $producto['categoria_id'] ?? '', 'class="form-control"');
            ?>
        </div>

        <div class="mb-3">
            <label for="stock">Stock</label>
            <?= form_input(['name' => 'stock', 'id' => 'stock_producto', 'class' => 'form-control', 'value' => $producto['stock_producto'] ?? '']) ?>
        </div>
 
        <div class="mb-3">
            <label for="descuento">Descuento (%)</label>
            <?= form_input(['name' => 'descuento', 'id' => 'descuento', 'class' => 'form-control', 'placeholder' => 'Ej: 15', 'value' => $producto['descuento_producto'] ?? '']) ?>
        </div>

        <div class="mb-3">
            <label for="provincia">Provincia</label>
            <?= form_input(['name' => 'provincia', 'id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Ej: Corrientes', 'value' => $producto['provincia_producto'] ?? '']) ?>
        </div>

        <div class="mb-3">
            <label for="imagen">Imagen actual</label><br>
            <img src="<?= base_url('assets/upload/' . ($producto['imagen_producto'] ?? 'default.png')); ?>" alt="Imagen" height="100" width="100" class="mb-2" />
            <?= form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control']) ?>
        </div>

        <?php if (!empty($producto['id_producto'])): ?>
            <?= form_hidden('id', $producto['id_producto']); ?>
        <?php endif; ?>

        <div class="text-center">
            <?= form_submit('Modificar', 'Modificar', "class='btn btn-success px-4'"); ?>
        </div>

        <?= form_close(); ?>
    </div>
</div>
