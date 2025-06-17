
<div class="container my-5" style="max-width: 1100px;">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold text-primary">
                <i class="fa-solid fa-boxes-stacked"></i> Gestión de productos
            </h2>
            <?php if (session()->getFlashdata('mensaje')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('mensaje') ?>
                </div>
            <?php endif; ?>
            <?php if (isset($producto) && count($producto) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-info text-center">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($producto as $i => $row): ?>
                                <tr>
                                    <td class="text-center"><?= $i + 1 ?></td>
                                    <td><?= esc($row['nombre_producto']) ?></td>
                                    <td>$<?= number_format($row['precio_producto'], 2, ',', '.') ?></td>
                                    <td><?= esc($row['descripcion_producto']) ?></td>
                                    <td class="text-center">
                                        <?php if ($row['estado_producto'] == 1): ?>
                                            <span class="badge bg-success">Activo</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Inactivo</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?= $row['stock_producto'] ?></td>
                                    <td><?= esc($row['categoria_desc'] ?? $row['categoria_nombre'] ?? '') ?></td>
                                    <td>
                                        <img src="<?= base_url('asset/upload/'.$row['imagen_producto']) ?>"
                                             alt="Imagen del producto"
                                             class="img-thumbnail rounded"
                                             style="max-width: 80px;">
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary mb-1" href="<?= base_url('editar/'.$row['producto_id']) ?>">
                                            Editar
                                        </a>
                                        <?php if ($row['estado_producto'] == 1): ?>
                                            <a class="btn btn-sm btn-danger mb-1" href="<?= base_url('eliminar/'.$row['producto_id']) ?>">
                                                Eliminar
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-sm btn-success mb-1" href="<?= base_url('activar/'.$row['producto_id']) ?>">
                                                Activar
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center">
                    No hay productos registrados.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>