<?php helper('form'); ?>

<div class="container my-5" style="max-width: 800px;">
  
<div class="text-center mb-4">
  <h2 class="fw-bold text-dark">Mi cuenta</h2>
  <hr class="mx-auto" style="width: 150px; border-top: 3px solid #17a2b8;">
</div>

  <?php if(session('mensaje')): ?>
    <div class="alert alert-success text-center">
      <?= session('mensaje'); ?>
    </div>
  <?php endif; ?>

  <!-- Vista SOLO LECTURA -->
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white fw-bold">Mis datos personales</div>
    <div class="card-body">
      <p><strong>Nombre:</strong> <?= esc($usuario['nombre_persona']) ?></p>
      <p><strong>Apellido:</strong> <?= esc($usuario['apellido_persona']) ?></p>
      <p><strong>Fecha de nacimiento:</strong> <?= esc($usuario['nacimiento_persona']) ?></p>
      <p><strong>DNI:</strong> <?= esc($usuario['dni_persona']) ?></p>
      <p><strong>Correo:</strong> <?= esc($usuario['correo_persona']) ?></p>

      <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="document.getElementById('form-edicion').classList.toggle('d-none')">
          Editar mis datos
        </button>
      </div>
    </div>
  </div>

  <!-- FORMULARIO EDICIÓN OCULTO -->
  <div id="form-edicion" class="card shadow-sm d-none">
    <div class="card-header bg-secondary text-white fw-bold">Editar mis datos</div>
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

