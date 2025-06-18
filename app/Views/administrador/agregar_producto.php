<?php helper('form'); ?>
<div class="container my-5" style="max-width: 700px;">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Registrar Producto</h2>
        </div>
        <div class="card-body">

            <?php if(!empty($validation)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach($validation as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <?php if(session('mensaje')): ?>
                <div class="alert alert-success">
                    <?= session('mensaje'); ?>
                </div>
            <?php endif ?>

            <?= form_open_multipart('insertar_producto') ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <?= form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre del producto', 'value' => set_value('nombre')]) ?>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <?= form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Ingrese precio del producto', 'value' => set_value('precio')]) ?>
                
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
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <?= form_input(['name' => 'estado', 'id' => 'estado', 'class' => 'form-control', 'placeholder' => 'Ingrese estado del producto', 'value' => set_value('estado')]) ?>
            </div>
 
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <?= form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control', 'placeholder' => 'Ingrese stock del producto', 'value' => set_value('stock')]) ?>
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
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <?= form_input(['name'=> 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control']) ?>
            </div>

            <div class="text-center">
                <?= form_submit('Agregar', 'Agregar Producto', "class='btn btn-success px-4'"); ?>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
