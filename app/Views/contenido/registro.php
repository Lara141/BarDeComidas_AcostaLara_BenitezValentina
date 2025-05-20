<section id="Registro">
  <div style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #fafacb;">
<div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 20px;">
  <i class="fa-solid fa-user-plus" style="font-size: 24px; color: #2C3E50;"></i>
  <h2 style="margin: 0; color: #2C3E50;">Registro</h2>
</div>

    <form action="/path/to/your/registration/handler.php" method="POST">
      <div style="margin-bottom: 15px;">
        <label for="username" style="display: block; font-weight: bold;">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
      </div>
      <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; font-weight: bold;">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
      </div>
      <div style="margin-bottom: 15px;">
        <label for="password" style="display: block; font-weight: bold;">Contraseña:</label>
        <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
      </div>
      <div style="margin-bottom: 15px;">
        <label for="confirm_password" style="display: block; font-weight: bold;">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
      </div>
      <div style="text-align: center;">
        <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">Registrarse</button>
      </div>
    </form>
    <p style="text-align: center; margin-top: 15px;">
      ¿Ya tenés una cuenta? <a href="<?= base_url('inicioSesion') ?>" style="color: #007BFF; text-decoration: none;">Iniciá sesión aquí</a>
    </p>
  </div>
</section>
