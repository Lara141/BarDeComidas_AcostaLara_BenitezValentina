
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
    <div class="col-md-6">
      <h3 class="color-titulo">CONTACTO</h3>
      <p > estos son los horario en los cual el restaurante esta abierto, y el telefono para contactar con el encargado, para sus dudas inmediatas y reservas</p>
      <p>
  <p class="fw-bold">Horarios:</p>
  <p>-De Lunes a Viernes: 10 am a 14 pm - 17 pm a 22 pm </p>
  <p>-Fines de Semana: 8 am a 23 pm </p>
      <p>
  <span class="fw-bold">Teléfono:</span> +54 3795-684058
</p>
<p>
  <span style="font-weight: bold;">Direccion:</span> Av. 3 de abril y chacabuco
</p>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Nuestra Ubicación</h2>
      <div class="map-responsive">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.184587945613!2d-58.8383989!3d-27.4606587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca8983b9021%3A0x4c8289c24c020a8!2sPlaza%2025%20de%20Mayo!5e0!3m2!1ses-AR!2sar!4v1713141508765!5m2!1ses-AR!2sar"
          width="600"
          height="450"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalFormulario" tabindex="-1" aria-labelledby="modalFormularioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <p>Su formulario ha sido enviado, pronto responderemos a sus dudas</p>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
