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

<div class="container">
    <h1><i class="fas fa-user-plus"></i> Registro</h1>
    <form action="/path/to/your/registration/handler.php" method="POST">
        <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirma tu contraseña" required>
        </div>
        <button type="submit"><i class="fas fa-check"></i> Registrarse</button>
    </form>
</div>