<?php helper('form'); ?>

<div class="container my-5" style="max-width: 1000px;">
  <h2 class="mb-4 text-center">Mi cuenta</h2>

  <?php if(session('mensaje')): ?>
    <div class="alert alert-success text-center">
      <?= session('mensaje'); ?>
    </div>
  <?php endif; ?>

  <div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white fw-bold">Editar mis datos personales</div>
    <div class="card-body">
      <?= form_open('actualizar_mi_cuenta') ?>

      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?= esc($usuario['nombre_persona']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="<?= esc($usuario['apellido_persona']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name="nacimiento" value="<?= esc($usuario['nacimiento_persona']) ?>">
      </div>

      <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" class="form-control" name="dni" value="<?= esc($usuario['dni_persona']) ?>">
      </div>

      <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" name="correo" value="<?= esc($usuario['correo_persona']) ?>">
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success">Guardar cambios</button>
      </div>

      <?= form_close() ?>
    </div>
  </div>
</div>
