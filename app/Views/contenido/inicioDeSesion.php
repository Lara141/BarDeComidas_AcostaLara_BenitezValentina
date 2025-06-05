
<div class="container my-5" style="max-width: 500px;">
<div class="card p-4 shadow-sm bg-white rounded-4"> 
   
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
      <li class="breadcrumb-item"><a href="#">Mi Cuenta</a></li>
      <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
  </nav>

  <?php if (session()->getFlashdata('mensaje_exito')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje_exito') ?>
    </div>
<?php endif; ?>

  <h2 class="mb-4 fw-bold">Iniciar sesión</h2>

  <form action="<?= base_url('verificar_login') ?>" method="POST" id="loginForm">

  <div class="mb-3">
    <label for="email" class="form-label text-uppercase small">Email</label>
    <input type="email" class="form-control" id="correo" name="correo" placeholder="ej.: tunombre@email.com">
    <?php if (isset($validation['correo'])): ?>
      <div class="text-danger"><?= $validation['correo'] ?></div>
    <?php endif; ?>
  </div>

  <div class="mb-2">
    <label for="password" class="form-label text-uppercase small">Contraseña</label>
    <div class="input-group">
      <input type="password" class="form-control" id="pass" name="pass">
      <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
    </div>
    <small id="error-login" class="text-danger"></small>
    <?php if (isset($validation['pass'])): ?>
  <div class="text-danger"><?= $validation['pass'] ?></div>
<?php endif; ?>
  </div>
<!--
  <div class="mb-3 text-end">
    <a href="#" style="color: #007BFF; text-decoration: none;">¿Olvidaste tu contraseña?</a>
  </div-->

  <button type="submit" class="btn btn-dark w-100 py-2" >INICIAR SESIÓN</button>

  <p class="text-center mt-3">
    ¿No tenés cuenta aún?
    <a href="<?= base_url('registro') ?>" style="color: #007BFF; text-decoration: none;">Crear cuenta</a>
  </p>
</form>

</div>
</div>
