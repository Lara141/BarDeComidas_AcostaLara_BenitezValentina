<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $titulo ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="assets/css/estilo.css">

</head>
<body>

<!-- Encabezado con estilo directo en el HTML -->
<header class="encabezado-top text-center" style="background-color:rgb(43, 43, 81); color: #f1ecec; padding: 10px 0; position: fixed; top: 0; width: 100%; z-index: 1040; border-bottom: 1px solid #444;">
  <div class="container d-flex justify-content-center align-items-center gap-3 flex-wrap">
    <i class="fa-solid fa-utensils fa-beat-fade" style="color: #ffffff;"></i>
    <span id="frase-dinamica" style="color: #ffffff;">Comer rico no tiene por qué ser caro</span>
</div>
</header>

<section class="mt-5 pt-5">
  <!-- Aquí empieza el contenido principal -->
</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
  const frases = [
    "Comer rico no tiene por qué ser caro!",
    "Elige lo mejor de cada provincia",
    "Tradición, sabor y calidad en cada bocado",
    "¡Probá nuestras promos imperdibles hoy!"
  ];

  let indice = 0;
  const fraseElemento = document.getElementById("frase-dinamica");

  setInterval(() => {
    indice = (indice + 1) % frases.length;
    fraseElemento.textContent = frases[indice];
  }, 4000); // cambia cada 4 segundos
</script>

</body>
</html>
