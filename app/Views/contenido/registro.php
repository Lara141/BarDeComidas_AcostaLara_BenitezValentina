<<<<<<< HEAD
<section id="Registro">
  <div style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #fafacb;">
<div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 20px;">
  <i class="fa-solid fa-user-plus" style="font-size: 24px; color: #2C3E50;"></i>
  <h2 style="margin: 0; color: #2C3E50;">Registro</h2>
</div>
=======

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 300px; /* Reduce el ancho máximo */
    }
    h1 {
        text-align: center;
        color: #333333;
        margin-bottom: 1rem; /* Reduce el margen inferior */
        font-size: 1.25rem; /* Reduce el tamaño del texto */
    }
    .form-group {
        margin-bottom: 0.75rem; /* Reduce el margen inferior */
    }
    label {
        display: block;
        margin-bottom: 0.4rem; /* Reduce el margen inferior */
        color: #555555;
        font-size: 0.9rem; /* Reduce el tamaño del texto */
    }
    input {
        width: 100%;
        padding: 0.5rem; /* Reduce el padding */
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 0.9rem; /* Reduce el tamaño del texto */
    }
    button {
        width: 100%;
        padding: 0.6rem; /* Reduce el padding */
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-size: 0.9rem; /* Reduce el tamaño del texto */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #45a049;
    }
    .form-group input:focus {
        border-color: #4CAF50;
        outline: none;
    }
</style>
>>>>>>> ec13a799d4b599925b60f9705e5370fd478758e7

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
