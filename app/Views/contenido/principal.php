<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Promos Imperdibles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .promo-title {
      font-size: 1.1rem;
      font-weight: bold;
      color: #e91e63;
    }
    .promo-price {
      font-size: 1.2rem;
      color: #4caf50;
    }
    .card-img-top {
      height: 160px;
      object-fit: cover;
    }
    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 1rem;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<!-- 🌀 Carrusel automático -->
<section class="mb-5">
  <div class="container">
    <!--<div class="text-center text-uppercase fw-bold mb-3">
      <h3>🔥 Promos del día 🔥</h3>
    </div-->

    <div id="carouselPromos" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
      <div class="carousel-inner rounded shadow">
        <div class="carousel-item active">
          <img src="assets/Img/imag_1.jpg" class="d-block w-100" alt="Empanadas">
          <div class="carousel-caption">
            <h5>Empanadas de Carne</h5>
            <p>$10.000 doc - Fritas u horno 🍴</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/Img/imag2.jpg" class="d-block w-100" alt="Promo 2">
          <div class="carousel-caption">
            <h5>Combo Envueltitos</h5>
            <p>$7.000 - ¡Los favoritos de siempre!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/Img/imag3.jpg" class="d-block w-100" alt="Promo 3">
          <div class="carousel-caption">
            <h5>Mega Milanesa</h5>
            <p>$12.000 - Para compartir 🍽️</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 🧃 Cards de promos estilo PedidosYa -->
<section class="mb-5">
  <div class="container">
    <h4 class="text-uppercase fw-bold text-center mb-4">Promociones Rápidas</h4>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
      
      <!-- 🥖 Arrollado -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="assets/Img/arrollado.jpg" class="card-img-top" alt="Arrollado">
          <div class="card-body">
            <p class="promo-title">Arrollado</p>
            <p class="promo-price">$5500</p>
            <p class="card-text">Carne, huevo, morrón... un clásico infalible.</p>
          </div>
        </div>
      </div>

      <!-- 🌽 Envueltitos -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="assets/Img/choclo.jpeg" class="card-img-top" alt="Envueltitos">
          <div class="card-body">
            <p class="promo-title">Envueltitos</p>
            <p class="promo-price">$4500</p>
            <p class="card-text">Choclo y más sorpresas deliciosas.</p>
          </div>
        </div>
      </div>

      <!-- 🍖 Milanesa -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="assets/Img/mila.jpg" class="card-img-top" alt="Milanesa">
          <div class="card-body">
            <p class="promo-title">Milanesa</p>
            <p class="promo-price">$6000</p>
            <p class="card-text">Clásica, sabrosa, enorme. Ideal para matar el hambre.</p>
          </div>
        </div>
      </div>

      <!-- 🥩 Matambre -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="assets/Img/matam.jpg" class="card-img-top" alt="Matambre">
          <div class="card-body">
            <p class="promo-title">Matambre Casero</p>
            <p class="promo-price">$7000</p>
            <p class="card-text">Receta familiar, sabor que no falla 💯</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


</body>
</html>

