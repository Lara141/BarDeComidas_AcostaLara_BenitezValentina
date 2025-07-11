
<div class="container my-5" style="max-width: 1100px;">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold text-primary">
                <i class="fa-solid fa-boxes-stacked"></i> Gestión de productos
            </h2>
            <!-- Barra de búsqueda -->
            <form method="get" action="<?= base_url('/gestionar') ?>" class="mb-4">
                <div class="input-group" style="max-width: 400px; margin: 0 auto;">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar producto por nombre..." value="<?= esc($_GET['buscar'] ?? '') ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i> Buscar
                    </button>
                </div>
            </form>
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
                                <th>Descuento</th>
                                <th>Provincia</th>
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
                                    <td>
                                        <?php if (isset($row['descuento_producto'])): ?>
                                            <?= esc($row['descuento_producto']) ?>%
                                        <?php else: ?>
                                            0%
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= esc($row['provincia_producto'] ?? '') ?>
                                    </td>
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
                                        <img src="<?= base_url('assets/upload/'.$row['imagen_producto']) ?>"
                                             alt="Imagen del producto"
                                             class="img-thumbnail rounded"
                                             style="max-width: 80px;">
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a class="btn btn-sm btn-primary" href="<?= base_url('editar/'.$row['id_producto']) ?>">
                                                Editar
                                            </a>
                                            <?php if ($row['estado_producto'] == 1): ?>
                                                <a class="btn btn-sm btn-danger" href="<?= base_url('eliminar/'.$row['id_producto']) ?>">
                                                    Eliminar
                                                </a>
                                            <?php else: ?>
                                                <a class="btn btn-sm btn-success" href="<?= base_url('activar/'.$row['id_producto']) ?>">
                                                    Activar
                                                </a>
                                            <?php endif; ?>
                                        </div>
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