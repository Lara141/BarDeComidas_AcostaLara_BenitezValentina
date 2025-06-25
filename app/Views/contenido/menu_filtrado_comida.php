<?php helper('form'); ?>

<!-- Botón de filtro a la derecha -->
<div class="d-flex justify-content-end mb-4">
  <button type="button"
          class="btn btn-light border rounded-pill shadow-sm d-flex align-items-center px-3 py-2"
          data-bs-toggle="modal"
          data-bs-target="#filtrosPedidosYaModal"
          style="gap: 8px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
      <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .4.8l-4.6 6.1V13a1 1 0 0 1-2 0V7.9L1.6 1.8A.5.5 0 0 1 1.5 1.5z"/>
    </svg>
    <span class="fw-semibold">Filtros</span>
  </button>
</div>

<!-- Modal  -->
<div class="modal fade" id="filtrosPedidosYaModal" tabindex="-1" aria-labelledby="filtrosPedidosYaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-4">
      <form method="get" action="<?= site_url('menu_filtrado'); ?>">
        <input type="hidden" name="categoria" value="comida">
        <div class="modal-header border-0 pb-0 position-relative">
          <h4 class="modal-title fw-bold" id="filtrosPedidosYaModalLabel">Filtros</h4>
          <a href="<?= site_url('comida'); ?>" class="btn btn-light border rounded-pill position-absolute end-0 top-0 mt-2 me-5" style="z-index:2; font-size: 0.95rem;">
            Reestablecer
          </a>
          <button type="button" class="btn-close ms-2" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body pt-2">
          <h6 class="fw-semibold mb-3">Provincias</h6>
          <div class="d-flex flex-wrap gap-2 mb-4">
            <?php
              $provincias = [
                "Buenos Aires", "Córdoba", "Corrientes", "Mendoza", "Salta"
              ];
              $provinciaSeleccionada = $_GET['provincia'] ?? '';
              foreach ($provincias as $prov) {
                $active = ($provinciaSeleccionada === $prov) ? 'btn-primary text-white' : 'btn-outline-primary';
                echo '<button type="button" name="btn-provincia" value="'.$prov.'" class="btn '.$active.' rounded-pill px-3 btn-provincia">'.$prov.'</button>';
              }
            ?>
            <input type="hidden" name="provincia" id="provinciaSeleccionada" value="<?= esc($provinciaSeleccionada) ?>">
          </div>

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="solo_promociones" id="soloPromociones"
              <?= isset($_GET['solo_promociones']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="soloPromociones">
              Solo promociones
            </label>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0 justify-content-center">
          <button type="submit" class="btn btn-primary rounded-pill px-5">Aplicar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // JS para seleccionar provincia y marcar el botón
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-provincia').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('provinciaSeleccionada').value = this.value;
        document.querySelectorAll('.btn-provincia').forEach(b => b.classList.remove('btn-primary', 'text-white'));
        this.classList.add('btn-primary', 'text-white');
      });
    });
  });
</script>

<!-- COMIDAS -->
<div class="container-fluid mt-5">
  <h2 class="mb-4 fw-bold text-secondary text-center border-bottom pb-2">Comidas</h2>
  <div class="row g-4">
    <?php if (empty($productos)): ?>
      <div class="col-12 text-center">
        <p class="text-muted">No hay productos que coincidan con el filtro seleccionado.</p>
      </div>
    <?php endif; ?>

    <?php foreach ($productos as $row): ?>
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

            <?php if (!empty($row['provincia_producto'])): ?>
              <p class="small fst-italic">Comida típica de: <?= esc($row['provincia_producto']); ?></p>
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
    <?php endforeach; ?>
  </div>
</div>
