<?php $session = session(); ?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid justify-content-between">

    <!-- Marca / Título -->
    <a class="navbar-brand" href="<?= base_url('/') ?>">Sabor Argentino</a>

    <!-- Íconos alineados a la derecha -->
    <div class="d-flex align-items-center gap-3">
      <span class="nav-link"><?= esc($session->get('nombre')) ?></span>
      <a class="nav-link" href="<?= base_url('/salir') ?>">Salir</a>

      <!-- Botón hamburguesa -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAdmin" aria-controls="offcanvasAdmin" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>

  <!-- Offcanvas lateral administrador -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAdmin" aria-labelledby="offcanvasAdminLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasAdminLabel">Menú administrador</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/listar_consulta') ?>">Ver consultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/gestionar') ?>">Listar productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/listarVentas') ?>">Listar ventas</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?= base_url('agregar_producto') ?>">Registrar producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/agregar_libro') ?>">Gestionar libros</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Scripts necesarios para Bootstrap 5 y el menú hamburguesa -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
