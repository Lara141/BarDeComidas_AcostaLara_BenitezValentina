
<div class="container my-5" style="max-width: 500px;">
  <div class="card p-4 shadow-sm bg-white rounded-4">

    <div class="d-flex align-items-center mb-3">
      <i class="fa-solid fa-circle-user fa-2x me-2"></i>
      <h2 class="fw-bold mb-0">Crear cuenta</h2>
    </div>

    <p class="mb-4">Todo lo que te gusta, al alcance de un clic. ¡Registrate ahora!</p>

    <form action="registro.php" method="POST">

  <div class="mb-3">
    <label class="form-label fw-bold">Nombre</label>
    <input type="text" name="nombre" class="form-control" placeholder="ej.: María Laura" required>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Apellido</label>
    <input type="text" name="apellido" class="form-control" placeholder="ej.: Perez" required>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Fecha de nacimiento</label>
    <input type="text" name="fechaNac" class="form-control" placeholder="ej.: 12/07/05" pattern="\d{2}/\d{2}/\d{2}" title="Formato válido: dd/mm/aa" required>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">DNI</label>
    <input type="text" name="dni" class="form-control" placeholder="ej.: 38123456" required>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Email</label>
    <input type="email" name="email" class="form-control" placeholder="ej.: tunombre@email.com" required>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Teléfono</label>
    <input type="tel" name="telefono" class="form-control" placeholder="ej.: 1123445567" required>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Contraseña</label>
    <div class="input-group">
      <input type="password" name="password" class="form-control" required>
      <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
    </div>
  </div>

  <div class="mb-4">
    <label class="form-label fw-bold">Confirmar contraseña</label>
    <div class="input-group">
      <input type="password" name="passwordConfirm" class="form-control" required>
      <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
    </div>
  </div>

  <button type="submit" class="btn btn-dark w-100 py-2">CREAR CUENTA</button>
</form>


    <p class="text-center mt-3">
      ¿Ya tenés una cuenta?
      <a href="<?= base_url('inicioSesion') ?>" class="text-primary text-decoration-none">Iniciá sesión aquí</a>
    </p>

  </div>
</div>
</form>