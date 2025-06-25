<?php $cart = \Config\Services::cart(); ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Carrito de Compras</h1>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-info text-center">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <div class="mb-3 text-center">
        <a href="<?= base_url('catalogo_producto') ?>" class="btn btn-outline-primary">
            Seguir comprando
        </a>
    </div>

    <?php if (!$cart || $cart->contents() == NULL) { ?>
        <div class="alert alert-warning text-center">No hay productos en el carrito</div>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Item</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $i = 1;
                    foreach ($cart->contents() as $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= esc($item['name']); ?></td>
                            <td>$<?= number_format($item['price'], 2, ',', '.') ?></td>
                            <td>
                                <form action="<?= base_url('actualizar_cantidad') ?>" method="post" class="d-inline">
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <input type="hidden" name="qty" value="<?= $item['qty'] - 1 ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" <?= $item['qty'] <= 1 ? 'disabled' : '' ?>>−</button>
                                </form>
                                <span class="mx-2"><?= esc($item['qty']); ?></span>
                                <form action="<?= base_url('actualizar_cantidad') ?>" method="post" class="d-inline">
                                    <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                    <input type="hidden" name="qty" value="<?= $item['qty'] + 1 ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                </form>
                            </td>
                            <td>$<?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('eliminar_item/' . $item['rowid']) ?>" class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php $total += $item['subtotal']; ?>
                    <?php endforeach; ?>
                    <tr class="table-secondary">
                        <td colspan="4" class="text-end fw-bold">Total:</td>
                        <td colspan="2" class="fw-bold">$<?= number_format($total, 2, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="<?= base_url('vaciar_carrito') ?>" class="btn btn-outline-danger">
                Vaciar carrito
            </a>

            <!-- Botón que abre el modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMetodoEntrega">
                Confirmar compra
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalMetodoEntrega" tabindex="-1" aria-labelledby="modalMetodoEntregaLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('guardar_venta') ?>" method="post" class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalMetodoEntregaLabel">Método de Entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="metodo_entrega_modal" class="form-label">Seleccioná una opción:</label>
                  <select class="form-select" id="metodo_entrega_modal" name="metodo_entrega" required>
                      <option value="" disabled selected>Elegí una opción</option>
                      <option value="retiro">Retiro en el local</option>
                      <option value="envio">Envío a domicilio</option>
                  </select>
                </div>
                <div class="mb-3" id="campo_direccion_modal" style="display: none;">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej. Av. Corrientes 1234">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Finalizar compra</button>
              </div>
            </form>
          </div>
        </div>

        <script>
            const metodoEntrega = document.getElementById('metodo_entrega_modal');
            const campoDireccion = document.getElementById('campo_direccion_modal');
            const direccionInput = document.getElementById('direccion');
            const formulario = document.querySelector('#modalMetodoEntrega form');

            metodoEntrega.addEventListener('change', function () {
                campoDireccion.style.display = this.value === 'envio' ? 'block' : 'none';
            });

            formulario.addEventListener('submit', function (e) {
                // Validar dirección si seleccionó "envio"
                if (metodoEntrega.value === 'envio' && direccionInput.value.trim() === '') {
                    e.preventDefault();
                    alert('Por favor, ingresá una dirección para el envío.');
                    direccionInput.focus();
                }
            });
        </script>

    <?php } ?>
</div>

