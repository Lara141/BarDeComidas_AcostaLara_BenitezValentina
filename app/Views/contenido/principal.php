<?php helper('form'); ?>
<div class="galeria-circular">
  <div class="imagen-con-texto">
    <img src="assets/img/FotoBar.jpeg" alt="Foto Bar">
    <div class="texto-sobre-imagen">
      <a>Ambiente y atención aseguradas! </a>
    </div>
  </div>

  <div class="imagen-con-texto">
    <img src="assets/img/terrasa2.jpg" alt="Terraza">
    <div class="texto-sobre-imagen">
      <a>Disfruta de cada bocado al aire libre</a>
    </div>
  </div>

  <div class="imagen-con-texto">
    <img src="assets/img/bebidas2.jpg" alt="Bebidas">
    <div class="texto-sobre-imagen">
      <a href="<?= base_url('bebida') ?>">Ver Bebidas</a>
    </div>
  </div>

  <div class="imagen-con-texto">
    <img src="assets/img/cumple.jpg" alt="Promociones">
    <div class="texto-sobre-imagen">
      <a href="<?= base_url('contacto') ?>">Contactanos para festejar tu cumpleaños!</a>
    </div>
  </div>
</div>


<!-- promos -->
<section class="mb-5">
  <div class="container">
    <h4 class="text-uppercase fw-bold text-center mb-4">
     <i class="fa-solid fa-burger fa-beat"></i>  
      Promociones </h4>
    <div class="row g-4">
      
      <?php foreach ($productos as $row): ?>
  <?php if (
    !empty($row['descuento_producto']) &&
    $row['descuento_producto'] > 0
  ): ?>
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="card h-100 shadow-sm border-0 rounded-4 w-100">
        <img src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>"
             class="card-img-top rounded-top-4 img-fluid"
             alt="Imagen del producto"
             style="height: 150px; object-fit: contain;">

        <div class="card-body text-center p-2">
          <h5 class="card-title fw-bold"><?= esc($row['nombre_producto']); ?></h5>
          <p class="card-text text-muted small"><?= esc($row['descripcion_producto']); ?></p>
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

          <?php if (!empty($row['provincia_producto'])): ?>
            <p class="small fst-italic">Provincia: <?= esc($row['provincia_producto']); ?></p>
          <?php endif; ?>

          <p class="mb-1"><strong>Categoría:</strong> <?= esc($row['categoria_id']); ?></p>
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
</section>



<!--Comidas por provincias-->
<section class="mb-5 py-5 bg-pastel">
  <div class="container">
    <h4 class="text-uppercase fw-bold text-center mb-4">
      <i class="fa-solid fa-earth-americas fa-spin"></i>
      Elíge una Provincia y explora sus delicias
      <i class="fa-regular fa-face-smile-beam fa-beat"></i>
    </h4>

    <?php
    $provincias = [
      'mendoza' => 'Mendoza',
      'cordoba' => 'Córdoba',
      'buenosaires' => 'Buenos Aires',
      'salta' => 'Salta',
      'corrientes' => 'Corrientes'
    ];
    ?>

    <!-- Tabs de Provincias -->
    <ul class="nav nav-pills justify-content-center mb-4 flex-wrap" id="pills-tab" role="tablist">
      <?php $i = 0; foreach ($provincias as $slug => $nombre): ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $i === 0 ? 'active' : '' ?>" id="<?= $slug ?>-tab"
            data-bs-toggle="pill" data-bs-target="#<?= $slug ?>" type="button" role="tab">
            <?= $nombre ?>
          </button>
        </li>
      <?php $i++; endforeach; ?>
    </ul>

    <!-- Contenido de cada provincia -->
    <div class="tab-content" id="pills-tabContent">
      <?php $i = 0; foreach ($provincias as $slug => $nombre): ?>
        <div class="tab-pane fade <?= $i === 0 ? 'show active' : '' ?>" id="<?= $slug ?>" role="tabpanel">
          <div class="row row-cols-1 row-cols-md-3 g-4">
           <?php
$hayComidas = false;

foreach ($productos as $row):
  $provSlug = strtolower(str_replace(' ', '', $slug));
  $provBD = strtolower(str_replace(' ', '', $row['provincia_producto']));
  $categoria = strtolower(trim($row['categoria_desc']));

  if ($provBD === $provSlug && $categoria === 'comida'):
    $hayComidas = true;
?>
  <div class="col-12 col-sm-6 col-lg-4">
    <div class="card h-100 shadow-sm border-0 rounded-4 w-100">
      <img src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>"
           class="card-img-top rounded-top-4 img-fluid"
           alt="Imagen del producto"
           style="height: 150px; object-fit: contain;">
      <div class="card-body text-center p-2">
        <h5 class="card-title fw-bold"><?= esc($row['nombre_producto']); ?></h5>
        <p class="card-text text-muted small"><?= esc($row['descripcion_producto']); ?></p>
        <?php
          $precioOriginal = $row['precio_producto'];
          $descuento = $row['descuento_producto'];
          $precioFinal = $precioOriginal - ($precioOriginal * $descuento / 100);
        ?>
        <?php if ($descuento > 0): ?>
          <p class="text-muted text-decoration-line-through mb-1">
            $<?= number_format($precioOriginal, 2, ',', '.'); ?>
          </p>
          <p class="text-success fw-bold fs-5 mb-1">
            $<?= number_format($precioFinal, 2, ',', '.'); ?>
          </p>
          <p class="text-danger fw-bold small mb-2">Descuento: <?= $descuento; ?>%</p>
        <?php else: ?>
          <p class="text-success fw-bold fs-5 mb-1">
            $<?= number_format($precioOriginal, 2, ',', '.'); ?>
          </p>
        <?php endif; ?>
        <?php if (!empty($row['provincia_producto'])): ?>
          <p class="small fst-italic">Provincia: <?= esc($row['provincia_producto']); ?></p>
        <?php endif; ?>
        <p class="mb-1"><strong>Categoría:</strong> <?= esc($row['categoria_desc']); ?></p>
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
<?php 
endif;
endforeach;
if (!$hayComidas):
?>
  <div class="alert alert-info text-center">No hay comidas registradas para <?= $nombre ?>.</div>
<?php endif; ?>
          </div>
        </div>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</section>