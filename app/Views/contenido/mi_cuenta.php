<?php helper('form'); ?>

<div class="container my-5" style="max-width: 800px;">
  
  <div class="text-center mb-4">
    <h2 class="fw-bold text-dark">Mi cuenta</h2>
    <hr class="mx-auto" style="width: 150px; border-top: 3px solid #17a2b8;">
  </div>

  <?php if(session('mensaje')): ?>
    <div class="alert alert-success text-center">
      <?= session('mensaje'); ?>
    </div>
  <?php endif; ?>

  <!-- Vista SOLO LECTURA -->
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white fw-bold">Mis datos personales</div>
    <div class="card-body">
      <p><strong>Nombre:</strong> <?= esc($usuario['nombre_persona']) ?></p>
      <p><strong>Apellido:</strong> <?= esc($usuario['apellido_persona']) ?></p>
      <p><strong>Fecha de nacimiento:</strong> <?= esc($usuario['nacimiento_persona']) ?></p>
      <p><strong>DNI:</strong> <?= esc($usuario['dni_persona']) ?></p>
      <p><strong>Correo:</strong> <?= esc($usuario['correo_persona']) ?></p>

      <div class="text-center mt-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar">
          Editar mis datos
        </button>
      </div>
    </div>
  </div>

  <!-- FORMULARIO EDICIÓN OCULTO -->
  <!-- Modal Edición -->
  <div class="modal fade <?= session('errors') ? 'show d-block' : '' ?>" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true" <?= session('errors') ? 'style="background-color: rgba(0,0,0,0.5);"' : '' ?>>
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-white">
          <h5 class="modal-title" id="modalEditarLabel">Editar mis datos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <?= form_open('actualizar_mi_cuenta') ?>

          <!-- Campos con validaciones -->
          <?php
            function campo($nombre, $label, $type = 'text', $usuario, $errors) {
              $valor = old($nombre, esc($usuario[$nombre.'_persona'] ?? ''));
              $error = $errors[$nombre] ?? null;
              $class = $error ? 'is-invalid' : '';
              echo "
                <div class='mb-3'>
                  <label for='$nombre' class='form-label'>$label</label>
                  <input type='$type' name='$nombre' value='$valor' class='form-control $class'>
                  ".($error ? "<div class='invalid-feedback'>$error</div>" : "")."
                </div>
              ";
            }

            $errors = session('errors') ?? [];

            campo('nombre', 'Nombre', 'text', $usuario, $errors);
            campo('apellido', 'Apellido', 'text', $usuario, $errors);
            campo('nacimiento', 'Fecha de nacimiento', 'date', $usuario, $errors);
            campo('dni', 'DNI', 'text', $usuario, $errors);
            campo('correo', 'Correo', 'email', $usuario, $errors);
          ?>

          <div class="mb-3">
            <label for="pass" class="form-label">Nueva contraseña (opcional)</label>
            <input type="password" name="pass" class="form-control <?= isset($errors['pass']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['pass'])): ?>
              <div class="invalid-feedback"><?= $errors['pass'] ?></div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="repass" class="form-label">Repetir nueva contraseña</label>
            <input type="password" name="repass" class="form-control <?= isset($errors['repass']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['repass'])): ?>
              <div class="invalid-feedback"><?= $errors['repass'] ?></div>
            <?php endif; ?>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar cambios</button>
          </div>

          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>

 <?php if (!empty($compras)): ?>
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white fw-bold">Mis compras realizadas</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Fecha</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($compras as $i => $compra): ?>
              <tr>
                <td><?= $i + 1 ?></td>
                <td><?= date('d/m/Y H:i', strtotime($compra['fecha_venta'])) ?></td>
                <td>$<?= number_format($compra['total_venta'], 2, ',', '.') ?></td>
                <td>
                  <?php if ($compra['activo']): ?>
                    <span class="badge bg-success">Completada</span>
                  <?php else: ?>
                    <span class="badge bg-secondary">Cancelada</span>
                  <?php endif; ?>
                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#detalleModal<?= $i ?>">
                    Ver detalle
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- MODALES DE DETALLE DE COMPRA FUERA DE LA TABLA -->
  <?php foreach ($compras as $i => $compra): ?>
    <div class="modal fade" id="detalleModal<?= $i ?>" tabindex="-1" aria-labelledby="detalleModalLabel<?= $i ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header bg-info text-white">
            <h5 class="modal-title" id="detalleModalLabel<?= $i ?>">Detalle de compra del <?= date('d/m/Y', strtotime($compra['fecha_venta'])) ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <?php if (!empty($compra['detalles'])): ?>
              <table class="table table-sm table-striped">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($compra['detalles'] as $detalle): ?>
                    <tr>
                      <td><?= esc($detalle['nombre_producto']) ?></td>
                      <td><?= esc($detalle['cantidad']) ?></td>
                      <td>$<?= number_format($detalle['precio_unitario'], 2, ',', '.') ?></td>
                      <td>$<?= number_format($detalle['subtotal'], 2, ',', '.') ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p class="text-muted">No hay detalles disponibles para esta compra.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

<?php else: ?>
  <div class="alert alert-warning text-center">
    No tenés compras registradas todavía.
  </div>
<?php endif; ?>