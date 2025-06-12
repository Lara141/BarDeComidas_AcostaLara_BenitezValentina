  <div class="container my-5" style="max-width: 1000px;">
  <h2 class="mb-4 text-center">Mi cuenta</h2>

  <div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white fw-bold">Mis datos personales</div>
    <div class="card-body">

      <?php 
      // Mapea cada campo con su etiqueta
      $datos = [
        'Nombre' => $usuario['nombre_persona'],
        'Apellido' => $usuario['apellido_persona'],
        'Fecha de nacimiento' => $usuario['nacimiento_persona'],
        'DNI' => $usuario['dni_persona'],
        'Correo' => $usuario['correo_persona'],
      ];

      foreach ($datos as $etiqueta => $valor) : ?>
        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
          <div><strong><?= $etiqueta ?>:</strong> <?= esc($valor) ?></div>
          <a href="<?= base_url('editar_campo/' . strtolower(str_replace(' ', '_', $etiqueta))) ?>" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-pencil-square"></i> Editar
          </a>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>


  <!-- Compras realizadas -->
  <div class="table-responsive shadow rounded-4">
    <table class="table table-bordered border-info-subtle align-middle mb-0">
      <thead class="table-info text-center">
        <tr>
          <th>Fecha</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio unitario</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($compras)) : ?>
          <?php foreach ($compras as $compra) : ?>
            <tr>
              <td><?= esc($compra['fecha']) ?></td>
              <td><?= esc($compra['nombre_producto']) ?></td>
              <td><?= esc($compra['cantidad']) ?></td>
              <td>$<?= number_format($compra['precio_unitario'], 2, ',', '.') ?></td>
              <td>$<?= number_format($compra['total'], 2, ',', '.') ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="5" class="text-center">Aún no realizaste compras.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>


