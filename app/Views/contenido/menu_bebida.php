<?php helper('form'); ?>
<div class="container-fluid mt-5">
      <h2 class="mb-4 fw-bold text-secondary text-center border-bottom pb-2">Bebidas</h2>
      <div class="row g-4">
        <?php foreach ($productos as $row): ?>
          <?php if (strtolower($row['categoria_desc']) === 'bebida'): ?>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="card h-100 shadow-sm border-0 rounded-4 w-100">
                <img src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>"
                     class="card-img-top rounded-top-4 img-fluid"
                     alt="Imagen del producto"
                     style="height: 150px; object-fit: contain;">

                <div class="card-body text-center p-2">
                  <h5 class="card-title fw-bold"><?= esc($row['nombre_producto']); ?></h5>
                  <p class="card-text text-muted small"><?= esc($row['descripcion_producto']); ?></p>

                  <?php if (!empty($row['descuento_producto']) && $row['descuento_producto'] > 0): ?>
                    <?php
                      $precioOriginal = $row['precio_producto'];
                      $descuento = $row['descuento_producto'];
                      $precioFinal = $precioOriginal - ($precioOriginal * $descuento / 100);
                    ?>
                    <p class="text-muted text-decoration-line-through mb-1">
                      $<?= number_format($precioOriginal, 2, ',', '.'); ?>
                    </p>
                    <p class="text-success fw-bold fs-5 mb-1">
                      $<?= number_format($precioFinal, 2, ',', '.'); ?>
                    </p>
                    <p class="text-danger fw-bold small mb-2">Descuento: <?= $descuento; ?>%</p>
                  <?php else: ?>
                    <p class="text-success fw-bold fs-5 mb-2">
                      $<?= number_format($row['precio_producto'], 2, ',', '.'); ?>
                    </p>
                  <?php endif; ?>

                  <p class="mb-1"><strong>Stock:</strong> <?= esc($row['stock_producto']); ?></p>

                  <?php if (session('logueado')): ?>
                    <?= form_open('agregar_carrito'); ?>
                      <?= form_hidden('id', $row['id_producto']); ?>
                      <?= form_hidden('titulo', $row['nombre_producto']); ?>
                      <?= form_hidden('precio', $row['precio_producto']); ?>
                      <?= form_hidden('descuento', $row['descuento_producto']); ?>
                      <?= form_hidden('provincia', $row['provincia_producto']); ?>
                      <input type="hidden" name="qty" value="1">
                      <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png"
                             alt="Carrito" style="width: 26px; height: 26px;">
                      </button>
                    <?= form_close(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>