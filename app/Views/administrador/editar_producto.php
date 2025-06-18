<?php helper('form'); ?>
<div class="container my-5" style="max-width: 700px;">
    <div class="card shadow rounded-4 border-0" style="background-color: #fff8f2;">
        <div class="card-header text-center rounded-top-4" style="background-color: #ffa94d; color: white;">
            <h2 class="mb-0">Editar Producto</h2>
        </div>
        <div class="card-body px-5 py-4">

            <?php if(session('mensaje')): ?>
                <div class="alert alert-success text-center">
                    <?= session('mensaje'); ?>
                </div>
            <?php endif ?>

            <?= form_open_multipart('actualizar'); ?>

            <div class="form-group mb-3">
                <label for="nombre">Nombre del producto</label>
                <?= form_input(['name' => 'nombre', 'id' => 'nombre_producto', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['nombre_producto'] ?? '']) ?>
                <?php if(isset($validation['nombre'])): ?>
                    <div class="text-danger small"><?= esc($validation['nombre']) ?></div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="precio">Precio</label>
                <?= form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'value' => $producto['precio_producto'] ?? '']) ?>
                <?php if(isset($validation['precio'])): ?>
                    <div class="text-danger small"><?= esc($validation['precio']) ?></div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <?= form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'value' => $producto['descripcion_producto'] ?? '']) ?>
                <?php if(isset($validation['descripcion'])): ?>
                    <div class="text-danger small"><?= esc($validation['descripcion']) ?></div>
                <?php endif ?>
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
                <?php if(isset($validation['categoria'])): ?>
                    <div class="text-danger small"><?= esc($validation['categoria']) ?></div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="stock">Stock</label>
                <?= form_input(['name' => 'stock', 'id' => 'stock_producto', 'class' => 'form-control', 'value' => $producto['stock_producto'] ?? '']) ?>
                <?php if(isset($validation['stock'])): ?>
                    <div class="text-danger small"><?= esc($validation['stock']) ?></div>
                <?php endif ?>
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
                <img src="<?= base_url('assets/upload/' . ($producto['imagen_producto'] ?? 'default.png')); ?>" alt="Imagen" height="100" width="100" class="rounded mb-2 shadow-sm" />
                <?= form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control']) ?>
                <?php if(isset($validation['imagen'])): ?>
                    <div class="text-danger small"><?= esc($validation['imagen']) ?></div>
                <?php endif ?>
            </div>

            <?php if (!empty($producto['id_producto'])): ?>
                <?= form_hidden('id', $producto['id_producto']); ?>
            <?php endif; ?>

            <div class="text-center mt-4">
                <?= form_submit('Modificar', 'Modificar', "class='btn btn-outline-warning px-4 fw-bold'"); ?>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
