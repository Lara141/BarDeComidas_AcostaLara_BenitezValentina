    <!-- Nueva barra de navegación con estilo Offcanvas -->
    <nav class="navbar " style=" background-color: #d0f0ff;">
    <div class="container-fluid">
    <!-- Logo -->
    <a class="nav-link active" aria-current="page" href="#">
      <img src="assets/img/carrito.jpg" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
    </a>
    
    <!-- Botón para abrir el offcanvas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
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
            <a class="nav-link" href="<?= base_url('contact') ?>">Contáctanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('terminoUso') ?>">Términos y Uso</a>
          </li>
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false" id="navbarDropdown">
              Menú
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="https://rankea.com.ar/negocio/felix-pub-corrientes/menu-restaurante-mk/">Comida</a></li>
              <li><a class="dropdown-item" href="https://www.gobar.com.ar/vinos">Bebida</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    
  </div>
</nav>
