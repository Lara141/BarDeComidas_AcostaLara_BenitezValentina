<?php $cart = \Config\Services::cart(); ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Carrito de Compras</h1>

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
                            <td><?= esc($item['qty']); ?></td>
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

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('vaciar_carrito/all') ?>" class="btn btn-outline-danger">
                Vaciar carrito
            </a>
            <a href="<?= base_url('ventas') ?>" class="btn btn-success">
                Ordenar compra
            </a>
        </div>
    <?php } ?>
</div>
