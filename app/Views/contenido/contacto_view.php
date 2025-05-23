
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3 class="color-titulo">Dejanos tus datos</h3>
      <p >Para que un encargado pueda responder sus preguntas, por favor déjenos sus datos y sus dudas. Muchas gracias.</p>
      <form class="row g-3 needs-validation" id="miFormulario" novalidate>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip01" class="form-label color-fuente">Nombre</label>
          <input type="text" name="nombre" class="form-control" id="validationTooltip01" value=" " required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip02" class="form-label color-fuente">Apellido</label>
          <input type="text" name="apellido" class="form-control" id="validationTooltip02" value=" " required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-md-6 position-relative">
          <label for="validationTooltipProvincia" class="form-label color-fuente">Provincia</label>
          <select class="form-select" id="validationTooltipProvincia" required>
            <option selected disabled value="">Elegir</option>
            <option>Corrientes</option>
            <option>Chaco</option>
          </select>
          <div class="invalid-tooltip">
            Por favor, selecciona una provincia válida.
          </div>
        </div>
        <div class="col-md-6 position-relative">
          <label for="validationTooltip01" class="form-label color-fuente">Localidad</label>
          <input type="text" name="nombre" class="form-control" id="validationTooltip01" value=" " required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-md-6 position-relative">
          <label for="validationTooltipTelefono" class="form-label color-fuente">Correo</label>
          <input type="text" name="correo" class="form-control" id="validationTooltipoCorreo" value=" " required>

          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        <div class="col-md-12 position-relative">
          <label for="validationTooltipPregunta" class="form-label color-fuente">Pregunta</label>
          <input type="text" name="descripcion" class="form-control" id="validationTooltipPregunta" required>
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
      <p > estos son los horario en los cual el bar esta abierto, y el telefono para contactar con el encargado, para sus dudas inmediatas y reservas</p>
      <p>
  <p class="fw-bold">Horarios:</p>
  <p>-De Lunes a Viernes: 20:00 a 02:00 </p>
  <p>-Fines de Semana: 20:30 a 05:00</p>
      <p>
  <span class="fw-bold">Teléfono:</span> +54 3795-684058
</p>
<p>
  <span style="font-weight: bold;">Direccion Corrientes:</span> Av. 3 de abril y chacabuco
</p>
<p>
  <span style="font-weight: bold;">Direccion Chaco:</span> Leandro N. Alem Oeste 1866, H3500
</p>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Nuestra Ubicación</h2>
      <div class="map-responsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3369.1758447904986!2d-58.814632099999955!3d-27.47832729999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b6fd548d5e1%3A0x87590c858f7f62d8!2sAv.%20Chacabuco%20%26%20Av.%203%20de%20Abril%2C%20W3402%20Corrientes!5e1!3m2!1ses-419!2sar!4v1745872539290!5m2!1ses-419!2sar" 
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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


