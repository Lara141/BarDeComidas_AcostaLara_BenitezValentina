
<?php $session = session(); ?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid justify-content-end">

    <!-- Íconos alineados a la derecha -->
    <div class="d-flex align-items-center gap-3">

      <?php if (!$session->get('logueado')): ?>
        <!-- VISITANTE -->
        <a class="nav-link" href="<?= base_url('inicioSesion') ?>">
          <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt="Perfil" style="width: 28px; height: 28px;"></a>

      <?php elseif ($session->get('perfil') == 2): ?>
        <!-- CLIENTE REGISTRADO -->
        <a class="nav-link" href="<?= base_url('/ver_carrito') ?>">
          <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 26px; height: 26px;">
        </a>
        <span class="nav-link"> <?= esc($session->get('nombre')) ?></span>
        <a class="nav-link" href="<?= base_url('/salir') ?>">Salir</a>
      <?php endif; ?>

      <!-- Botón hamburguesa -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </div>

  <!-- Offcanvas lateral -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('nosotros') ?>">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('comercializacion') ?>">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contacto') ?>">Contáctanos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('terminoUso') ?>">Términos y Uso</a>
        </li>
       
        <!-- Ítems adicionales para visitante -->
        <?php if (!$session->get('logueado')): ?>
          <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/catalogo_producto') ?>">Catálogo</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('inicioDeSesion') ?>">Iniciar sesión</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('registro') ?>">Registrarse</a>
            </li>
        <?php endif; ?>

        <!-- Ítems adicionales para cliente -->
        <?php if ($session->get('perfil') == 2): ?>
          <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/catalogo_producto') ?>">Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/ver_carrito') ?>">Ver carrito</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/mi_cuenta') ?>">Mi cuenta</a>
          </li>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menú
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?= base_url('comida') ?>">Comida</a></li>
            <li><a class="dropdown-item" href="<?= base_url('bebida') ?>">Bebida</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>