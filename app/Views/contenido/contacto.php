<?php if(session()->getFlashdata('mensaje_consulta')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('mensaje_consulta') ?>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3 class="color-titulo">Dejanos tus datos</h3>
      <p >Para que un encargado pueda responder sus preguntas, por favor déjenos sus datos y sus dudas. Muchas gracias.</p>
      
      <form action="<?= base_url('consulta') ?>" method="post" class="row g-3 needs-validation" id="miFormulario" novalidate>

  <!-- Nombre -->
  <div class="col-md-6 position-relative">
    <label for="validationTooltipNombre" class="form-label color-fuente">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="validationTooltipNombre" placeholder="ej.: María" value="<?= old('nombre') ?>" required>
    <?php if (isset($validation['nombre'])): ?>
      <div class="text-danger"><?= $validation['nombre'] ?></div>
    <?php endif; ?>
  </div>

  <!-- Apellido -->
  <div class="col-md-6 position-relative">
    <label for="validationTooltipApellido" class="form-label color-fuente">Apellido</label>
    <input type="text" name="apellido" class="form-control" id="validationTooltipApellido" placeholder="ej.: Gómez" value="<?= old('apellido') ?>" required>
    <?php if (isset($validation['apellido'])): ?>
      <div class="text-danger"><?= $validation['apellido'] ?></div>
    <?php endif; ?>
  </div>

  <!-- Provincia -->
  <div class="col-md-6 position-relative">
    <label for="validationTooltipProvincia" class="form-label color-fuente">Provincia</label>
    <select class="form-select" name="provincia" id="validationTooltipProvincia" required>
      <option disabled selected value="">Elegir</option>
      <option <?= old('provincia') == 'Corrientes' ? 'selected' : '' ?>>Corrientes</option>
      <option <?= old('provincia') == 'Chaco' ? 'selected' : '' ?>>Chaco</option>
    </select>
    <?php if (isset($validation['provincia'])): ?>
      <div class="text-danger"><?= $validation['provincia'] ?></div>
    <?php endif; ?>
  </div>

  <!-- Localidad -->
  <div class="col-md-6 position-relative">
    <label for="validationTooltipLocalidad" class="form-label color-fuente">Localidad</label>
    <input type="text" name="localidad" class="form-control" id="validationTooltipLocalidad" placeholder="ej.: Resistencia" value="<?= old('localidad') ?>" required>
    <?php if (isset($validation['localidad'])): ?>
      <div class="text-danger"><?= $validation['localidad'] ?></div>
    <?php endif; ?>
  </div>

  <!-- Correo -->
  <div class="col-md-6 position-relative">
    <label for="validationTooltipCorreo" class="form-label color-fuente">Correo</label>
    <input type="email" name="correo" class="form-control" id="validationTooltipCorreo" placeholder="ej.: ejemplo@gmail.com" value="<?= old('correo') ?>" required>
    <?php if (isset($validation['correo'])): ?>
      <div class="text-danger"><?= $validation['correo'] ?></div>
    <?php endif; ?>
  </div>

  <!-- Mensaje -->
  <div class="col-md-12 position-relative">
    <label for="validationTooltipMensaje" class="form-label color-fuente">Mensaje</label>
    <textarea name="mensaje" class="form-control" id="validationTooltipMensaje" rows="4" required><?= old('mensaje') ?></textarea>
    <?php if (isset($validation['mensaje'])): ?>
      <div class="text-danger"><?= $validation['mensaje'] ?></div>
    <?php endif; ?>
  </div>

  <!-- Botón -->
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Enviar Formulario</button>
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
