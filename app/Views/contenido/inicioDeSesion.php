<section id="InicioDeSesion">
    <div style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h2 style="text-align: center;">Inicio de Sesión</h2>
        <form action="/procesarInicioSesion.php" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: bold;">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; font-weight: bold;">Contraseña:</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="text-align: center;">
                <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer;">Iniciar Sesión</button>
            </div>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            ¿No tienes una cuenta? <a href="<?= base_url('registro') ?>">Regístrate aquí</a>
        </p>
    </div>
</section>