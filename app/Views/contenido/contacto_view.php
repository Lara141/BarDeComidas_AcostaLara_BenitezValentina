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

/* Si prefieres un celeste más oscuro, puedes usar: */
/* .color-fuente {
  color: #87CEEB; /* Código hexadecimal para celeste estándar */
/* } */
</style>

<div class="container">
  <div class="row">
    <h3 class="color-tirulo">Dejanos tus datos</h3>
    <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label color-fuente">Nombre</label>
        <input type="text" class="form-control" id="validationTooltip01" value=" " required>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label color-fuente">Apellido</label>
        <input type="text" class="form-control" id="validationTooltip02" value=" " required>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label color-fuente">telefono para contactar</label>
        <input type="text" class="form-control" id="validationTooltip01" value=" " required>
        <div >

        <select class="form-select" id="validationTooltip04" required>
          <option selected disabled value="">Telefono Particular</option>
          <option>Celular propio</option>
          
        </select>
        <div class="invalid-tooltip">
          Please select a valid state.
        </div>
      </div>
        <div class="valid-tooltip">
          Looks good!
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label color-fuente">provincia</label>
        <select class="form-select" id="validationTooltip04" required>
          <option selected disabled value="">Elegir</option>
          <option>Corrientes</option>
          <option>Formosa</option>
          <option>Santa Fe</option>
          <option>Chaco</option>
        </select>
        <div class="invalid-tooltip">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label color-fuente">Localidad</label>
        <select class="form-select" id="validationTooltip04" required>
          <option selected disabled value="">Elegir</option>
          <option>Corrientes</option>
          <option>Colonia Pando</option>
          <option>San Roque</option>
          <option>Itati</option>
        </select>
        <div class="invalid-tooltip">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip05" class="form-label color-fuente">Pregunta</label>
        <input type="text" class="form-control" id="validationTooltip05" required>
        <div class="invalid-tooltip">
          Please provide a valid zip.
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>