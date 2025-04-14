<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url('assets/css/estilo.css'); ?>"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>

.color-fuente {
  color:rgb(4, 188, 250); /* Código hexadecimal para celeste claro */
}
.color-titulo{
    color: rgb(53, 157, 192);
}

p{
    color:rgb(3, 45, 59);
}
/* Si prefieres un celeste más oscuro, puedes usar: */
/* .color-fuente {
  color: #87CEEB; /* Código hexadecimal para celeste estándar */
/* } */
</style>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3 class="color-titulo">Dejanos tus datos</h3>
      <p >Para que un encargado pueda responder sus preguntas, por favor déjenos sus datos y sus dudas. Muchas gracias.</p>
      <form class="row g-3 needs-validation" id="miFormulario" novalidate>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip01" class="form-label color-fuente">Nombre</label>
          <input type="text" class="form-control" id="validationTooltip01" value=" " required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip02" class="form-label color-fuente">Apellido</label>
          <input type="text" class="form-control" id="validationTooltip02" value=" " required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        
        <div class="col-md-6 position-relative">
          <label for="validationTooltipProvincia" class="form-label color-fuente">Provincia</label>
          <select class="form-select" id="validationTooltipProvincia" required>
            <option selected disabled value="">Elegir</option>
            <option>Corrientes</option>
            <option>Formosa</option>
            <option>Santa Fe</option>
            <option>Chaco</option>
          </select>
          <div class="invalid-tooltip">
            Por favor, selecciona una provincia válida.
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltipLocalidad" class="form-label color-fuente">Localidad</label>
          <select class="form-select" id="validationTooltipLocalidad" required>
            <option selected disabled value="">Elegir</option>
            <option>Corrientes</option>
            <option>Colonia Pando</option>
            <option>San Roque</option>
            <option>Itati</option>
          </select>
          <div class="invalid-tooltip">
            Por favor, selecciona una localidad válida.
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltipTelefono" class="form-label color-fuente">Teléfono para contactar</label>
          <input type="text" class="form-control" id="validationTooltipTelefono" value=" " required>
          <div>
            <select class="form-select" id="validationTooltipTipoTelefono" required>
              <option selected disabled value="">Teléfono Particular</option>
              <option>Celular propio</option>
            </select>
            <div class="invalid-tooltip">
              Por favor, selecciona un tipo de teléfono válido.
            </div>
          </div>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-12 position-relative">
          <label for="validationTooltipPregunta" class="form-label color-fuente">Pregunta</label>
          <input type="text" class="form-control" id="validationTooltipPregunta" required>
          <div class="invalid-tooltip">
            Por favor, ingresa tu pregunta.
          </div>
        </div>
        <div class="col-12">
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormulario">
  Enviar Formulario
</button>
        </div>
        
      </form>
    </div>
  </div>
</div>


<!--Modal Formulario-->

<div class="modal fade" id="modalFormulario" tabindex="-1" aria-labelledby="modalFormularioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>Su formulario a sido eviado, pronto responderemos a sus dudas</p>
      </div>
      
    </div>
  </div>
</div>


<!--Lado Derecho-->

<div class="container">
  <div class="row justify-content-end">
    <div class="col-md-6">
      <h3 class="color-titulo">Dejanos tus datos</h3>
      <p >Para que un encargado pueda responder sus preguntas, por favor déjenos sus datos y sus dudas. Muchas gracias.</p>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>