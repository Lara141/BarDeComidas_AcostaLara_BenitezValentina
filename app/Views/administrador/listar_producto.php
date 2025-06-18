<?php helper('form'); ?>

<div class="container mt-5">
    <h1 class="display-5 text-center mb-5 fw-bold text-info">Lista de Productos</h1>

    <?php
    $categorias = ['comida' => 'Comidas', 'bebida' => 'Bebidas'];

    foreach ($categorias as $clave => $tituloCategoria):
        $productosFiltrados = array_filter($productos, fn($p) => strtolower($p['categoria_desc']) === $clave);
        if (count($productosFiltrados) > 0):
    ?>
        <div class="mb-5">
            <h2 class="mb-4 fw-bold text-secondary border-bottom pb-2"><?= $tituloCategoria ?></h2>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($productosFiltrados as $row): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 rounded-4">
                            <img src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>" class="card-img-top rounded-top-4" alt="Imagen del producto" style="height: 220px; object-fit: cover;">

                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold"><?= esc($row['nombre_producto']); ?></h5>
                                <p class="card-text text-muted small"><?= esc($row['descripcion_producto']); ?></p>
                                <p class="text-success fw-bold fs-5">$<?= number_format($row['precio_producto'], 2, ',', '.'); ?></p>
                                <p class="mb-1"><strong>Categoría:</strong> <?= esc($row['categoria_desc']); ?></p>
                                <p><strong>Stock:</strong> <?= esc($row['stock_producto']); ?></p>

                                <?php if (session('logueado')): ?>
                                    <?= form_open('add_cart'); ?>
                                        <?= form_hidden('id', $row['id_producto']); ?>
                                        <?= form_hidden('titulo', $row['nombre_producto']); ?>
                                        <?= form_hidden('precio', $row['precio_producto']); ?>
                                        <div class="d-flex justify-content-center mb-3">
                                            <input type="number" name="qty" value="1" min="1" max="<?= $row['stock_producto'] ?>" class="form-control text-center" style="width: 80px;">
                                        </div>
                                        <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                                            <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
                                        </button>
                                    <?= form_close(); ?>
                                <?php else: ?>
                                    <p class="text-muted">Iniciá sesión para comprar</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php
        endif;
    endforeach;
    ?>
</div>
