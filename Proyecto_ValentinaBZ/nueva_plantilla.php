<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $titulo ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('../../assets/css/estilo.css'); ?>"/>
</head>

<body>

    <div class="container">
        <header>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <i class="nav link" href="fa-brands fa-facebook"></i> <i class="fa-brands fa-facebook fa-2x1"></i>
                </li>
            </ul>
        </header>
    </div>

    <!-- Barra de navegación -->
    <section>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <img src="assets/Img/Logo2.jpg" alt="Logo2" width="50" height="44">
                <a class="navbar-brand" href="#">Barra de navegación</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ubicación de Sucursales</a>
                        </li>
                        <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="https://menu.fu.do/mirandalegal/qr-menu">Comida</a></li>
                                <li><a class="dropdown-item" href="#">Bebida</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
        
    <!-- Contenido principal -->
    <div class="contenedor">
        <h1 class="titulo">Tacos&Tekila </h1>
        <!---<img src="assets/Img/Logo2.jpg" alt="Logo2" width="50" height="44"> --->
        <p>¡Sabor que te envuelve, fiesta que te enamora!</p>
        <button class="boton">Ver más</button>
    </div>

    <!-- Carrusel de imágenes -->
    <section>
        <h5>
            Promos disponibles ¡No te los pierdas!
            <small class="text-body-secondary">Válidas solo de lunes a miercoles</small>
        </h5>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/Img/imag_2.jpg" class="d-block w-100" alt="..." class="img-fluid">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tacos primavera </h5>
                        <h4>$3500 c/u</h4>
                        <p>Carne picada-Verdeo-Tomates-Choclo</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/Img/imag_3.jpg" class="d-block w-100" alt="..."class="img-fluid">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/Img/imag_4.jpg" class="d-block w-100" alt="..."class="img-fluid">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Información sobre el bar -->
    <section>
       <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3">
            <div class="p-2 marg">
            <p class="titulo fs-2 text-uppercase fst-italic text-center fw-boldbadge">Tacos y Tequila ¡Tu boca te lo pide!</p>  
            </div>
            <div class="p-2 marg">
                Tenemos ambiente climatizado, la mejor musica y atención, tambien contamos con chefs profesionales listos para 
                preparar lo que usted desee!
            </div>
            <div class="p-2 marg">
                Hacemos envios a toda la provincia de 20:30hs a 23:30hs, solo pídelo ;)
            </div>
            <div class="p-2 marg">
                Abrimos todos los dias a partir de las 20hs. Visitanos, te esperamos!
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer> <img src="assets/Img/Insta.avif" alt="Insta" width="30" height="24">Instagram @Tacos&Tequila - 
            <img src="assets/Img/Feis.png" alt="Feis" width="40" height="24">Facebook @Tacos&Tequi_Corrientes
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/js/estilos.js'); ?>"></script>
</body>
</html>
