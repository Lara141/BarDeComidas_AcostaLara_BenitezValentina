<?php helper('form'); ?>
<<<<<<< HEAD
<!-- Botón de filtrar alineado a la derecha -->
<div class="d-flex justify-content-end mb-4">
  <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#infoModal">
    Filtrar
  </button>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold" id="infoModalLabel">Filtros</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <h6 class="fw-semibold mb-2">Provincias</h6>
        <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
          <a href="<?= site_url('filtrar_bebidas?provincia=Buenos Aires'); ?>" class="btn btn-outline-primary">Buenos Aires</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Catamarca'); ?>" class="btn btn-outline-primary">Catamarca</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Chaco'); ?>" class="btn btn-outline-primary">Chaco</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Chubut'); ?>" class="btn btn-outline-primary">Chubut</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Córdoba'); ?>" class="btn btn-outline-primary">Córdoba</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Corrientes'); ?>" class="btn btn-outline-primary">Corrientes</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Entre Ríos'); ?>" class="btn btn-outline-primary">Entre Ríos</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Formosa'); ?>" class="btn btn-outline-primary">Formosa</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Jujuy'); ?>" class="btn btn-outline-primary">Jujuy</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=La Pampa'); ?>" class="btn btn-outline-primary">La Pampa</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=La Rioja'); ?>" class="btn btn-outline-primary">La Rioja</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Mendoza'); ?>" class="btn btn-outline-primary">Mendoza</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Misiones'); ?>" class="btn btn-outline-primary">Misiones</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Neuquén'); ?>" class="btn btn-outline-primary">Neuquén</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Río Negro'); ?>" class="btn btn-outline-primary">Río Negro</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Salta'); ?>" class="btn btn-outline-primary">Salta</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=San Juan'); ?>" class="btn btn-outline-primary">San Juan</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=San Luis'); ?>" class="btn btn-outline-primary">San Luis</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Santa Cruz'); ?>" class="btn btn-outline-primary">Santa Cruz</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Santa Fe'); ?>" class="btn btn-outline-primary">Santa Fe</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Santiago del Estero'); ?>" class="btn btn-outline-primary">Santiago del Estero</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Tierra del Fuego'); ?>" class="btn btn-outline-primary">Tierra del Fuego</a>
          <a href="<?= site_url('filtrar_bebidas?provincia=Tucumán'); ?>" class="btn btn-outline-primary">Tucumán</a>
        </div>
        <h6 class="fw-semibold mb-2">Promociones</h6>
        <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
          <a href="<?= site_url('filtrar_bebidas?promo=1'); ?>" class="btn btn-outline-success">Solo promociones</a>
        </div>
        <div class="d-flex flex-wrap gap-2 justify-content-center">
          <a href="<?= site_url('filtrar_bebidas'); ?>" class="btn btn-secondary">Aplicar filtro</a>
        </div>
      </div>
    </div>
  </div>
</div>

<h2 class="mb-4 fw-bold text-secondary border-bottom pb-2">Bebidas</h2>
      <div class="row row-cols-1 g-4">
=======
<div class="container-fluid mt-5">
      <h2 class="mb-4 fw-bold text-secondary text-center border-bottom pb-2">Bebidas</h2>
      <div class="row g-4">
>>>>>>> 5b843ed217398f2e6ba74e2a105638a8c29a9bb8
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