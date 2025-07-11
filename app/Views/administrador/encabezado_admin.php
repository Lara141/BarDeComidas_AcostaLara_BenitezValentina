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
  <a class="nav-link active" aria-current="page" href="<?= base_url('admin') ?>"><img src="<?= base_url('assets/img/Adm.png') ?>" alt="Logo del Bar" style="width: 120px; height: auto;">
</a>

  </div>
</header>

<section class="mt-5 pt-5">
  <div class="text-center">
    <h2 class="fw-bold text-dark"><i class="fa-solid fa-user-shield"></i> Panel de Administración</h2>

  </div>
</section>
