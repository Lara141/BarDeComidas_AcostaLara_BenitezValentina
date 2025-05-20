    <nav class="navbar navbar-expand-lg" style="background-color: #d0f0ff;">
  <div class="container-fluid">
    
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src="assets/img/carrito.jpg" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
    </a>
    

    <!-- Botón hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenido colapsable -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

  <!-- Menú principal alineado a la izquierda -->
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
      <a class="nav-link" href="<?= base_url('contact') ?>">Contáctanos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('terminoUso') ?>">Términos y Uso</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Menú
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="https://rankea.com.ar/negocio/felix-pub-corrientes/menu-restaurante-mk/">Comida</a></li>
        <li><a class="dropdown-item" href="https://www.gobar.com.ar/vinos">Bebida</a></li>
      </ul>
    </li>
  </ul>

  <!-- Ícono de perfil alineado a la derecha -->
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt="Perfil" style="width: 35px; height: 35px; border-radius: 50%;">
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="<?= base_url('inicioSesion') ?>">Iniciar sesión</a></li>
        <li><a class="dropdown-item" href="<?= base_url('registro') ?>">Registrarse</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Cerrar sesión</a></li>
      </ul>
    </li>
  </ul>

</div>

  </div>
</nav
