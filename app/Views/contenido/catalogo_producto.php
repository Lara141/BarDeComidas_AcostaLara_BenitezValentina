<?php helper('form'); ?>
<div class="container mt-5">
  <div class="row">
    <!-- Columna de Comidas -->
    <div class="col-md-6">
      <h2 class="mb-4 fw-bold text-secondary border-bottom pb-2">Comidas</h2>
      <div class="row row-cols-1 g-4">
        <?php foreach ($productos as $row): ?>
          <?php if (strtolower($row['categoria_desc']) === 'comida'): ?>
            <div class="col" style="max-width: 260px;">
              <div class="card h-100 shadow-sm border-0 rounded-4" style="width: 100%; min-width: 200px;">
                <img src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>" class="card-img-top rounded-top-4" alt="Imagen del producto" style="height: 150px; object-fit: cover;">
                <div class="card-body text-center p-2">
                  <h5 class="card-title fw-bold"><?= esc($row['nombre_producto']); ?></h5>
                  <p class="card-text text-muted small"><?= esc($row['descripcion_producto']); ?></p>
                  <p class="text-success fw-bold fs-5">$<?= number_format($row['precio_producto'], 2, ',', '.'); ?></p>
                  <p class="mb-1"><strong>Stock:</strong> <?= esc($row['stock_producto']); ?></p>
                  <?php if (session('logueado')): ?>
                    <?= form_open('agregar_carrito'); ?>
                      <?= form_hidden('id', $row['id_producto']); ?>
                      <?= form_hidden('titulo', $row['nombre_producto']); ?>
                      <?= form_hidden('precio', $row['precio_producto']); ?>
                      <input type="hidden" name="qty" value="1">
                      <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
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
    <!-- Columna de Bebidas -->
    <div class="col-md-6">
      <h2 class="mb-4 fw-bold text-secondary border-bottom pb-2">Bebidas</h2>
      <div class="row row-cols-1 g-4">
        <?php foreach ($productos as $row): ?>
          <?php if (strtolower($row['categoria_desc']) === 'bebida'): ?>
            <div class="col" style="max-width: 260px;">
              <div class="card h-100 shadow-sm border-0 rounded-4" style="width: 100%; min-width: 200px;">
                <img src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>" class="card-img-top rounded-top-4" alt="Imagen del producto" style="height: 150px; object-fit: cover;">
                <div class="card-body text-center p-2">
                  <h5 class="card-title fw-bold"><?= esc($row['nombre_producto']); ?></h5>
                  <p class="card-text text-muted small"><?= esc($row['descripcion_producto']); ?></p>
                  <p class="text-success fw-bold fs-5">$<?= number_format($row['precio_producto'], 2, ',', '.'); ?></p>
                  <p class="mb-1"><strong>Stock:</strong> <?= esc($row['stock_producto']); ?></p>
                  <?php if (session('logueado')): ?>
                    <?= form_open('agregar_carrito'); ?>
                      <?= form_hidden('id', $row['id_producto']); ?>
                      <?= form_hidden('titulo', $row['nombre_producto']); ?>
                      <?= form_hidden('precio', $row['precio_producto']); ?>
                      <input type="hidden" name="qty" value="1">
                      <button type="submit" class="btn btn-link p-0 border-0 bg-transparent">
                        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
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
  </div>
</div>