<?php helper('form'); ?>
<div class="container my-5" style="max-width: 700px;">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Registrar Producto</h2>
        </div>
        <div class="card-body">

            <?php if(session('mensaje')): ?>
                <div class="alert alert-success">
                    <?= session('mensaje'); ?>
                </div>
            <?php endif ?>

            <?= form_open_multipart('insertar_producto') ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <?= form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre del producto', 'value' => set_value('nombre')]) ?>
                <?php if(isset($validation['nombre'])): ?>
                    <div class="text-danger"><?= esc($validation['nombre']) ?></div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <?= form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese precio del producto', 'value' => set_value('precio')]) ?>
                <?php if(isset($validation['precio'])): ?>
                    <div class="text-danger"><?= esc($validation['precio']) ?></div>
                <?php endif ?>
            </div>
            
            <div class="mb-3">
                <label for="descuento" class="form-label">Descuento (%)</label>
                <?= form_input(['name' => 'descuento', 'id' => 'descuento', 'type' => 'number', 'class' => 'form-control', 'placeholder' => 'Ingrese porcentaje de descuento (opcional)', 'value' => set_value('descuento')]) ?>
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <?= form_input(['name' => 'provincia', 'id' => 'provincia', 'class' => 'form-control', 'placeholder' => 'Ingrese provincia (opcional)', 'value' => set_value('provincia')]) ?>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <?= form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Ingrese la descripción del producto', 'value' => set_value('descripcion')]) ?>
                <?php if(isset($validation['descripcion'])): ?>
                    <div class="text-danger"><?= esc($validation['descripcion']) ?></div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <?= form_input(['name' => 'estado', 'id' => 'estado', 'class' => 'form-control', 'placeholder' => 'Ingrese estado del producto', 'value' => set_value('estado')]) ?>
                <?php if(isset($validation['estado'])): ?>
                    <div class="text-danger"><?= esc($validation['estado']) ?></div>
                <?php endif ?>
            </div>
 
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <?= form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese stock del producto', 'value' => set_value('stock')]) ?>
                    <?php if(isset($validation['stock'])): ?>
                        <div class="text-danger"><?= esc($validation['stock']) ?></div>
                    <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <?php
                $lista = ['' => 'Seleccione una categoría'];
                foreach ($categorias as $row){
                    $lista[$row['categoria_id']] = $row['categoria_desc'];
                }
                echo form_dropdown('categoria', $lista, set_value('categoria'), 'class="form-select"');
                ?>
                <?php if(isset($validation['categoria'])): ?>
                    <div class="text-danger"><?= esc($validation['categoria']) ?></div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <?= form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control']) ?>
                <?php if(isset($validation['imagen'])): ?>
                    <div class="text-danger"><?= esc($validation['imagen']) ?></div>
                <?php endif ?>
            </div>

            <div class="text-center">
                <?= form_submit('Agregar', 'Agregar Producto', "class='btn btn-success px-4'"); ?>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
