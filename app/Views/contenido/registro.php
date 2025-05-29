<h1 class= "display-4 text-center">Registrarse</h1>

<form action="<?= base_url('registro_usuario') ?>" method="post">


<div class="container my-5" style="max-width: 500px;">
  <div class="card p-4 shadow-sm bg-white rounded-4">

    <div class="d-flex align-items-center mb-3">
      <i class="fa-solid fa-circle-user fa-2x me-2"></i>
      <h2 class="fw-bold mb-0">Crear cuenta</h2>
    </div>

    <p class="mb-4">Todo lo que te gusta, al alcance de un clic. ¡Registrate ahora!</p>


  <div class="mb-3">
    <label class="form-label fw-bold">Nombre</label>
      <input name="nombre" placeholder="ej.: Maria" value="<?= old('nombre') ?>">
        <?php if (isset($validation['nombre'])): ?>
        <div class="text-danger"><?= $validation['nombre'] ?></div>
        <?php endif; ?>
  </div>


  <div class="mb-3">
    <label class="form-label fw-bold">Apellido</label>
    <input name="apellido" placeholder="ej.: Benitez" value="<?= old('apellido') ?>">
<?php if (isset($validation['apellido'])): ?>
  <div class="text-danger"><?= $validation['apellido'] ?></div>
<?php endif; ?>

  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Fecha de nacimiento</label>
    <input  name="nacimiento" placeholder="ej.: 12/07/05" pattern="\d{2}/\d{2}/\d{2}" title="Formato válido: dd/mm/aa" value="<?= old('nacimiento') ?>">
    <?php if (isset($validation['nacimiento'])): ?>
  <div class="text-danger"><?= $validation['nacimiento'] ?></div>
<?php endif; ?>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">DNI</label>
    <input  name="dni" placeholder="ej.: 38123456" value="<?= old('dni') ?>">
  <?php if (isset($validation['dni'])): ?>
  <div class="text-danger"><?= $validation['dni'] ?></div>
<?php endif; ?>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Email</label>
    <input type="email" name="correo" placeholder="ej.: tunombre@email.com" value="<?= old('correo') ?>">
  <?php if (isset($validation['correo'])): ?>
  <div class="text-danger"><?= $validation['correo'] ?></div>
<?php endif; ?>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Contraseña</label>
    <div class="input-group">
      <input type="password" name="pass" class="form-control">
      <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
    </div>
    <?php if (isset($validation['pass'])): ?>
  <div class="text-danger"><?= $validation['pass'] ?></div>
<?php endif; ?>
  </div>

  <div class="mb-4">
    <label class="form-label fw-bold">Confirmar contraseña</label>
    <div class="input-group">
      <input type="password" name="repass" class="form-control"> 
      <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
    </div>
    <?php if (isset($validation['repass'])): ?>
  <div class="text-danger"><?= $validation['repass'] ?></div>
<?php endif; ?>
  </div>

  <button type="submit" class="btn btn-dark w-100 py-2">CREAR CUENTA</button>
<!--</form-->


    <p class="text-center mt-3">
      ¿Ya tenés una cuenta?
      <a href="<?= base_url('inicioSesion') ?>" class="text-primary text-decoration-none">Iniciá sesión aquí</a>
    </p>

  </div>
</div>
</form>