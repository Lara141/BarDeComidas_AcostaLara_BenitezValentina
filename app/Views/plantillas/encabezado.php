<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= isset($titulo) ? $titulo : 'Título por defecto' ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>

<!-- Encabezado -->
<header style="height: 27px;">
  <div class="container-header d-flex flex-column align-items-center"  >
  <a class="nav-link active" aria-current="page" href="<?= base_url() ?>"><img src="assets/img/titulo2.png" alt="Logo del Bar" style="width: 120px; height: auto;">
  </a>

  </div>
</header>

<section class="mt-5 pt-5">
  <div id="bienvenidaCarrusel" class="carousel slide mx-auto" data-bs-ride="carousel" style="max-width: 600px;">
    <div class="carousel-inner">
      
     <div class="carousel-item active">
        <div class="d-flex flex-column align-items-center">
          <h2 class="fw-bold" style="color:rgb(13, 58, 106);">¡Bienvenidos!</h2> 
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex flex-column align-items-center">
          <h2 class="fw-bold" style="color:rgb(14, 67, 125);">Una experiencia inolvidable</h2> 
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex flex-column align-items-center">
          <h2 class="fw-bold" style="color:rgb(14, 67, 125);">Sabores que enamoran</h2> 
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex flex-column align-items-center">
          <h2 class="fw-bold" style="color:rgb(14, 67, 125);">Ambiente Familiar</h2> 
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex flex-column align-items-center">
          <h2 class="fw-bold" style="color:rgb(17, 63, 112);">¡Promociones todos los días!</h2> 
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#bienvenidaCarrusel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bienvenidaCarrusel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</section>
