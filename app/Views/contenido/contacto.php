
<section id="nosotros" style="margin-top: 20px;">
<form action="<?= base_url('contacto/enviar') ?>" method="post">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Correo:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="message">Mensaje:</label><br>
    <textarea id="message" name="message" required></textarea><br>

    <button type="submit">Enviar</button>
</form>

</section>
