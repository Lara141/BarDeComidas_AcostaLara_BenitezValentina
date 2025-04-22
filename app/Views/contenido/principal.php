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

<!--  Carrusel automático -->
<section class="mb-5">
  <div class="container">
    <!--<div class="text-center text-uppercase fw-bold mb-3">
      <h3> Promos del día </h3>
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
            <p>$12.000 - Para compartir </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Cards de promos estilo PedidosYa -->
<section class="mb-5">
  <div class="container">
    <h4 class="text-uppercase fw-bold text-center mb-4">Promociones Rápidas</h4>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
      
      <!--  Arrollado -->
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

      <!-- Envueltitos -->
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

      <!--  Milanesa -->
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

      <!--  Matambre -->
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="assets/Img/matam.jpg" class="card-img-top" alt="Matambre">
          <div class="card-body">
            <p class="promo-title">Matambre Casero</p>
            <p class="promo-price">$7000</p>
            <p class="card-text">Receta familiar, sabor que no falla </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="mb-5 py-5 bg-pastel">
  <div class="container">
    <h4 class="text-uppercase fw-bold text-center mb-4">Elegí una Provincia y explora sus delicias</h4>

    <!-- Botones de Provincias -->
    <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
      <button class="btn btn-outline-dark" onclick="mostrarComidas('mendoza')">Mendoza</button>
      <button class="btn btn-outline-dark" onclick="mostrarComidas('cordoba')">Córdoba</button>
      <button class="btn btn-outline-dark" onclick="mostrarComidas('buenosaires')">Buenos Aires</button>
      <button class="btn btn-outline-dark" onclick="mostrarComidas('salta')">Salta</button>
      <button class="btn btn-outline-dark" onclick="mostrarComidas('corrientes')">Corrientes</button>
    </div>

    <!-- Contenedor dinámico de comidas -->
    <div id="comidasPorProvincia" class="row row-cols-1 row-cols-md-3 g-4">
      <!-- Aquí se insertarán las cards -->
    </div>
  </div>
</section>

<script>
  const comidasData = {
    mendoza: [
      {
        nombre: "Chivito",
        descripcion: "Sandwich de tierno chivo cocinado lentamente con especias regionales.",
        precio: "$9500",
        imagen: "assets/Img/chivito.jpg",
        ingredientes: "Chivo, ajo, romero, vino blanco, pan casero."
      }
    ],
    salta: [
      {
        nombre: "Tamales salteños",
        descripcion: "Masa de maíz rellena de carne, envuelta en chala.",
        precio: "$3500",
        imagen: "assets/Img/tamales.jpg",
        ingredientes: "Harina de maíz, carne vacuna, cebolla, pimentón, chala de maíz."
      },
      {
        nombre: "Empanadas salteñas",
        descripcion: "Empanadas rellenas de carne, jugosas y especiadas.",
        precio: "$4500",
        imagen: "assets/Img/empsalta.jpg",
        ingredientes: "Carne cortada a cuchillo, papa, cebolla, huevo duro, comino."
      }
    ],
    cordoba: [
      {
        nombre: "Locro Cordobés",
        descripcion: "Guiso criollo con maíz, zapallo, carne y embutidos.",
        precio: "$6000",
        imagen: "assets/Img/locrito.jpg",
        ingredientes: "Maíz blanco, zapallo, panceta, chorizo colorado, cebolla."
      },
      {
        nombre: "Cabrito al horno",
        descripcion: "Cabrito tierno cocinado lentamente al horno.",
        precio: "$20000",
        imagen: "assets/Img/cabrito.jpg",
        ingredientes: "Cabrito, limón, sal gruesa, hierbas frescas."
      }
    ],
    corrientes: [
      {
        nombre: "Mbeyú",
        descripcion: "Torta de almidón de mandioca, queso y manteca.",
        precio: "$4000",
        imagen: "assets/Img/mbeyu.jpg",
        ingredientes: "Almidón de mandioca, queso, leche, manteca, sal."
      },
      {
        nombre: "Chipa so'o",
        descripcion: "Pan de queso relleno de carne picada.",
        precio: "$5500",
        imagen: "assets/Img/chipasoo.jpg",
        ingredientes: "Almidón de mandioca, queso, carne picada, cebolla, huevos."
      },
    ],
    buenosaires: [
      {
        nombre: "Milanesa Napolitana",
        descripcion: "Milanesa de carne con salsa de tomate y queso gratinado.",
        precio: "$12000",
        imagen: "assets/Img/napolitana.jpg",
        ingredientes: "Carne vacuna, pan rallado, huevo, salsa de tomate, jamón, queso mozzarella."
      },
      {
        nombre: "Empanadas Fritas",
        descripcion: "Empanadas rellenas de carne fritas en grasa.",
        precio: "$5500",
        imagen: "assets/Img/empfritas.jpg",
        ingredientes: "Carne picada, cebolla, pimentón, huevo duro, masa para empanadas."
      },
      {
        nombre: "Choripán",
        descripcion: "Chorizo a la parrilla servido en pan crujiente con chimichurri.",
        precio: "$5000",
        imagen: "assets/Img/choripa.jpg",
        ingredientes: "Chorizo criollo, pan francés, chimichurri (ajo, perejil, vinagre, aceite)."
      }
    ]
  };

  function mostrarComidas(provincia) {
    const contenedor = document.getElementById("comidasPorProvincia");
    contenedor.innerHTML = "";

    comidasData[provincia].forEach(plato => {
      contenedor.innerHTML += `
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="${plato.imagen}" class="card-img-top" alt="${plato.nombre}">
            <div class="card-body">
              <h5 class="card-title">${plato.nombre}</h5>
              <p class="card-text">${plato.descripcion}</p>
              <p class="promo-price fw-bold">${plato.precio}</p>

              <button class="btn btn-sm btn-outline-secondary" 
                      type="button" 
                      data-bs-toggle="collapse" 
                      data-bs-target="#collapse${plato.nombre.replace(/\s+/g, '')}" 
                      aria-expanded="false">
                Ver ingredientes
              </button>

              <div class="collapse mt-2" id="collapse${plato.nombre.replace(/\s+/g, '')}">
                <p class="small text-muted mb-0">
                  ${plato.ingredientes}
                </p>
              </div>
            </div>
          </div>
        </div>
      `;
    });
  }
</script>


