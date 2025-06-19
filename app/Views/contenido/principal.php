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

    <!-- Tabs de Provincias -->
    <ul class="nav nav-pills justify-content-center mb-4 flex-wrap" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="mendoza-tab" data-bs-toggle="pill" data-bs-target="#mendoza" type="button" role="tab">Mendoza</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="cordoba-tab" data-bs-toggle="pill" data-bs-target="#cordoba" type="button" role="tab">Córdoba</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="buenosaires-tab" data-bs-toggle="pill" data-bs-target="#buenosaires" type="button" role="tab">Buenos Aires</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="salta-tab" data-bs-toggle="pill" data-bs-target="#salta" type="button" role="tab">Salta</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="corrientes-tab" data-bs-toggle="pill" data-bs-target="#corrientes" type="button" role="tab">Corrientes</button>
      </li>
    </ul>

    <!-- Contenido de cada provincia -->
    <div class="tab-content" id="pills-tabContent">

      <!-- Mendoza -->
      <div class="tab-pane fade show active" id="mendoza" role="tabpanel">
        <div class="row row-cols-1 row-cols-md-3 g-4">

          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="assets/Img/chivito.jpg" class="card-img-top" alt="Chivito">
              <div class="card-body">
                <h5 class="card-title">Chivito</h5>
                <p class="card-text">Sandwich de tierno chivo cocinado lentamente con especias regionales.</p>
                <p class="fw-bold">$9.500</p>
                <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
                  data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
                 <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
                </button>
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreMendoza1">Ver ingredientes</button>
                <div class="collapse mt-2" id="ingreMendoza1">
                  <p class="small text-muted">Chivo, ajo, romero, vino blanco, pan casero.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="assets/Img/tomatican.jpg" class="card-img-top" alt="Tomatican">
              <div class="card-body">
                <h5 class="card-title">Tomatican</h5>
                <p class="card-text">Guiso tradicional de mendoza, con tomates maiz y huevo. (para 2 personas)</p>
                <p class="fw-bold">$20.000</p>
                <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
                  data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
                   <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
                </button>
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreMendoza2">Ver ingredientes</button>
                <div class="collapse mt-2" id="ingreMendoza2">
                  <p class="small text-muted">Tomate, cebolla, maiz, carne, huevo, albahaca.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="assets/Img/carbonada.jpg" class="card-img-top" alt="Carbonada">
              <div class="card-body">
                <h5 class="card-title">Carbonada criolla</h5>
                <p class="card-text">Guiso calabaza</p>
                <p class="fw-bold">$15.000</p>
                <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
                  data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
                  <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
                </button>
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreMendoza3">Ver ingredientes</button>
                <div class="collapse mt-2" id="ingreMendoza3">
                  <p class="small text-muted">Zapallo, choclo, carne, durazno seco y papas (se sirve dentro de una calabaza).</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Córdoba -->
      <div class="tab-pane fade" id="cordoba" role="tabpanel">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <!-- Locro Cordobés -->
          <div class="col">
            <div class="card h-100">
              <img src="assets/Img/locrito.jpg" class="card-img-top" alt="Locro Cordobés">
              <div class="card-body">
                <h5 class="card-title">Locro Cordobés</h5>
                <p class="card-text">Guiso criollo con maíz, zapallo, carne y embutidos.</p>
                <p class="fw-bold">$6000</p>
                <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
   <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
  </button>
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreCordoba1">Ver ingredientes</button>
                <div class="collapse mt-2" id="ingreCordoba1">
                  <p class="small text-muted">Maíz blanco, zapallo, panceta, chorizo colorado, cebolla.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Cabrito -->
          <div class="col">
            <div class="card h-100">
              <img src="assets/Img/cabrito.jpg" class="card-img-top" alt="Cabrito al horno">
              <div class="card-body">
                <h5 class="card-title">Cabrito al horno</h5>
                <p class="card-text">Cabrito tierno cocinado lentamente al horno.</p>
                <p class="fw-bold">$20000</p>
                <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
   <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
  </button>
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreCordoba2">Ver ingredientes</button>
                <div class="collapse mt-2" id="ingreCordoba2">
                  <p class="small text-muted">Cabrito, limón, sal gruesa, hierbas frescas.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="salta" role="tabpanel">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Tamales salteños -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/tamales.jpg" class="card-img-top" alt="Tamales salteños">
        <div class="card-body">
          <h5 class="card-title">Tamales salteños</h5>
          <p class="card-text">Masa de maíz rellena de carne, envuelta en chala.</p>
          <p class="fw-bold">$3500</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
    <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
  </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreSalta3">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreSalta3">
            <p class="small text-muted">Harina de maíz, carne vacuna, cebolla, pimentón, chala de maíz.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Empanadas salteñas -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/empsalta.jpg" class="card-img-top" alt="Empanadas salteñas">
        <div class="card-body">
          <h5 class="card-title">Empanadas salteñas</h5>
          <p class="card-text">Empanadas rellenas de carne, jugosas y especiadas.</p>
          <p class="fw-bold">$4500</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
             <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreSalta4">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreSalta4">
            <p class="small text-muted">Carne cortada a cuchillo, papa, cebolla, huevo duro, comino.</p>
          </div>
        </div>
      </div>
    </div>

    <!--Humita salteña -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/choclo.jpeg" class="card-img-top" alt="Empanadas salteñas">
        <div class="card-body">
          <h5 class="card-title">Humita envuelto en chala</h5>
          <p class="card-text">Choclo rallado con queso y especias envuelto en chala.</p>
          <p class="fw-bold">$3000 c/u</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
 <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreSalta5">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreSalta5">
            <p class="small text-muted">Choclo rallado, cebolla, manteca, leche, queso, pimienta, chala.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/guiso.jpg" class="card-img-top" alt="Guiso">
        <div class="card-body">
          <h5 class="card-title">Guiso de Arroz</h5>
          <p class="card-text">Guiso hecho a base de arroz, salsa de tomates, carne y verduras.</p>
          <p class="fw-bold">$6000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
             <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
    </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreSalta7">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreSalta7">
            <p class="small text-muted">Arroz, carne, cebolla, condimentos, zanahoria, caldo, aceite.</p>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


<!--corrientes-->
<div class="tab-pane fade" id="corrientes" role="tabpanel">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Mbeyú -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/mbeyu.jpg" class="card-img-top" alt="Mbeyú">
        <div class="card-body">
          <h5 class="card-title">Mbeyú</h5>
          <p class="card-text">Torta de almidón de mandioca, queso y manteca.</p>
          <p class="fw-bold">$4000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
    <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
  </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreCorrientes1">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreCorrientes1">
            <p class="small text-muted">Almidón de mandioca, queso, leche, manteca, sal.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Chipa so'o -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/chipasoo.jpg" class="card-img-top" alt="Chipa so'o">
        <div class="card-body" >
          <h5 class="card-title">Chipa so'o</h5>
          <p class="card-text">Pan de queso relleno de carne picada.</p>
          <p class="fw-bold">$5500</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
           <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreCorrientes2">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreCorrientes2">
            <p class="small text-muted">Almidón de mandioca, queso, carne picada, cebolla, huevos.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/pacu.jpg" class="card-img-top" alt="Pacu">
        <div class="card-body" style="width: 18rem;">
          <h5 class="card-title">Pacu</h5>
          <p class="card-text">Pescado de río.</p>
          <p class="fw-bold">$12000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
           <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreCorrientes3">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreCorrientes3">
            <p class="small text-muted">Filete de pacú, limon, ajo, perejil, aceite de oliva, sal y pimienta.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/chipaMboca.jpg" class="card-img-top" alt="Chipa Mboca">
        <div class="card-body">
          <h5 class="card-title">Chipa Mboca</h5>
          <p class="card-text">Chipá de almidon de mandioca y queso, alargado.</p>
          <p class="fw-bold">$5000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
          <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreCorrientes4">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreCorrientes4">
            <p class="small text-muted">Almidón de mandioca, queso semiduro, huevos, manteca, leche, sal.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<!--Buenos aires-->
<div class="tab-pane fade" id="buenosaires" role="tabpanel">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Milanesa Napolitana -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/napolitana.jpg" class="card-img-top" alt="Milanesa Napolitana">
        <div class="card-body">
          <h5 class="card-title">Milanesa Napolitana</h5>
          <p class="card-text">Milanesa de carne con salsa de tomate y queso gratinado.</p>
          <p class="fw-bold">$12000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
    <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
  </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreBsAs1">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreBsAs1">
            <p class="small text-muted">Carne vacuna, pan rallado, huevo, salsa de tomate, jamón, queso mozzarella.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Empanadas Fritas -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/empfritas.jpg" class="card-img-top" alt="Empanadas Fritas">
        <div class="card-body">
          <h5 class="card-title">Empanadas Fritas</h5>
          <p class="card-text">Empanadas rellenas de carne fritas en grasa.</p>
          <p class="fw-bold">$5500</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
           <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreBsAs2">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreBsAs2">
            <p class="small text-muted">Carne picada, cebolla, pimentón, huevo duro, masa para empanadas.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Choripán -->
    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/choripa.jpg" class="card-img-top" alt="Choripán">
        <div class="card-body">
          <h5 class="card-title">Choripán</h5>
          <p class="card-text">Chorizo a la parrilla servido en pan crujiente con chimichurri.</p>
          <p class="fw-bold">$5000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
           <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreBsAs3">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreBsAs3">
            <p class="small text-muted">Chorizo criollo, pan francés, chimichurri (ajo, perejil, vinagre, aceite).</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="assets/Img/achura.jpg" class="card-img-top" alt="Empanadas Fritas">
        <div class="card-body">
          <h5 class="card-title">Achuras<h5>
          <p class="card-text">Asado de achura.</p>
          <p class="fw-bold">$15000</p>
          <button type="button" class="btn btn-light border position-absolute" style="bottom: 10px; right: 10px;"
          data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar al carrito">
          <!-- Ícono de carrito -->
      <a href="#" class="nav-link">
        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
      </a>
          </button>
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#ingreBsAs4">Ver ingredientes</button>
          <div class="collapse mt-2" id="ingreBsAs4">
            <p class="small text-muted">Chinchulines, riñones, vacío.</p>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
    
    </div>
  </div>
</section>
