<div class="container my-5">
  <div class="card shadow p-4 rounded-4 bg-light text-center">
    <div class="mb-3">
      <i class="bi bi-person-circle" style="font-size: 4rem; color:rgb(246, 151, 219);"></i>
    </div>
    <h1 class="display-4 mb-3">¡Hola, <span class="text-primary"><?= esc(session()->get('nombre')) ?></span>!</h1>
    <p class="lead">Bienvenido/a a tu cuenta de cliente. Aquí podrás gestionar tus pedidos y acceder a todas las funcionalidades.</p>
    <hr class="my-4">
    <a href="<?= base_url('/') ?>" class="btn btn-primary btn-lg">Ir al inicio</a>
  </div>
</div>

