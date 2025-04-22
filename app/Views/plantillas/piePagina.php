<footer>
  <div class="footer-container">
    <div class="footer-row d-flex flex-wrap justify-content-between">
      
      <!-- Columna 1: Enlaces institucionales -->
      <div class="footer-col">
        <p><strong>Ayuda</strong></p>
        <ul>
          <li><a href="<?= base_url('contact') ?>">Contacto</a></li>
          <li><a href="<?= base_url('comercializacion') ?>">Comercialización</a></li>
        </ul>

        <p><strong>Conocenos</strong></p>
        <ul>
          <li><a href="<?= base_url('nosotros') ?>">Quiénes somos</a></li>
          <li><a href="<?= base_url('terminoUso') ?>">Términos y usos</a></li>
        </ul>
      </div>

      <!-- Columna 2: Redes sociales -->
      <div class="footer-col">
        <p><strong>Redes sociales</strong></p>
        <ul class="social-icons">
          <li><a href="https://www.facebook.com/" target="_blank" class="social-icon" title="Facebook"><i class="fa-brands fa-facebook fa-beat"></i></a></li>
          <li><a href="https://www.instagram.com/" target="_blank" class="social-icon" title="Instagram"><i class="fa-brands fa-instagram fa-beat"></i></a></li>
          <li><a href="https://www.tiktok.com/" target="_blank" class="social-icon" title="TikTok"><i class="fa-brands fa-tiktok fa-beat"></i></a></li>
          <li><a href="https://wa.me/1234567890" target="_blank" class="social-icon" title="Whatsapp"><i class="fa-brands fa-whatsapp fa-beat"></i></a></li>
        </ul>
      </div>


      <!-- Columna 3: Formulario de suscripción -->
      <div class="footer-col footer-subscribe">
        <h4><strong>Suscribete a Sabor Argentino</strong></h4>
        <p>¡Enterate primero! Suscribite y disfrutá beneficios y promos exclusivos.</p>
        <form action="ruta/del/servidor" method="POST" class="subscribe-form">
          <div class="input-group">
            <input type="email" class="form-control" name="email" placeholder="Ingresá tu Gmail" required>
            <button type="submit" class="btn btn-info">Suscribirme</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</footer>
