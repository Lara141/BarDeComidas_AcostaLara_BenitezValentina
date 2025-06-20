

<div class="container my-5" style="max-width: 900px;">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold text-primary">
                <i class="fa-solid fa-envelope"></i> Consultas recibidas
            </h2>
            <?php if (isset($consultas) && count($consultas) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-info text-center">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                 <th>Provincia</th>
                                <th>Localidad</th>
                                <th>Mensaje</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultas as $i => $consulta): ?>
                                <tr>
                                    <td class="text-center"><?= $i + 1 ?></td>
                                    <td>
                                        <?= esc($consulta['nombre_consulta'] ?? '') ?>
                                        <?= esc($consulta['apellido_consulta'] ?? '') ?>
                                    </td>
                                    <td><?= esc($consulta['correo_consulta'] ?? '') ?></td>
                                    <td><?= esc($consulta['provincia_consulta'] ?? '') ?></td>
                                    <td><?= esc($consulta['localidad_consulta'] ?? '') ?></td>
                                    <td><?= esc($consulta['mensaje_consulta'] ?? '') ?></td>
                                    <!--td class="text-center"><?= esc($consulta['fecha_consulta'] ?? '') ?></td-->              
                                    <td class="text-center">
                                        <?php if (isset($consulta['estado_consulta']) && $consulta['estado_consulta'] == 1): ?>
                                            <span class="badge bg-primary">Leído</span>
                                            <a href="<?= base_url('consulta/noleido/' . $consulta['id_consulta']) ?>" class="btn btn-sm btn-outline-secondary ms-2">
                                                Marcar como no leído
                                            </a>
                                        <?php else: ?>
                                            <span class="badge bg-light text-dark border border-secondary">No leído</span>
                                            <a href="<?= base_url('consulta/leido/' . $consulta['id_consulta']) ?>" class="btn btn-sm btn-outline-primary ms-2">
                                                Marcar como leído
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
                    No hay consultas registradas.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>