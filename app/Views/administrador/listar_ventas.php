
<div class="container my-5" style="max-width: 1100px;">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">
                <i class="fa-solid fa-receipt"></i> Lista de Ventas
            </h2>

            <!-- Botón de filtro -->
            <div class="d-flex justify-content-end mb-4">
                <button type="button"
                        class="btn btn-light border rounded-pill shadow-sm d-flex align-items-center px-3 py-2"
                        data-bs-toggle="modal"
                        data-bs-target="#filtrosVentasModal"
                        style="gap: 8px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .4.8l-4.6 6.1V13a1 1 0 0 1-2 0V7.9L1.6 1.8A.5.5 0 0 1 1.5 1.5z"/>
                    </svg>
                    <span class="fw-semibold">Filtros</span>
                </button>
            </div>

            <!-- Modal de filtros -->
            <div class="modal fade" id="filtrosVentasModal" tabindex="-1" aria-labelledby="filtrosVentasModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content rounded-4">
                        <form method="get" action="<?= site_url('listar_ventas'); ?>">
                            <div class="modal-header border-0 pb-0 position-relative">
                                <h4 class="modal-title fw-bold" id="filtrosVentasModalLabel">Filtros</h4>
                                <a href="<?= site_url('listar_ventas'); ?>"
                                   class="btn btn-light border rounded-pill position-absolute end-0 top-0 mt-2 me-5"
                                   style="z-index:2; font-size: 0.95rem;">
                                    Reestablecer
                                </a>
                                <button type="button" class="btn-close ms-2" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body pt-2">
                                <div class="mb-3">
                                    <label for="desde" class="form-label">Desde:</label>
                                    <input type="date" class="form-control" name="desde" id="desde" value="<?= esc($_GET['desde'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="hasta" class="form-label">Hasta:</label>
                                    <input type="date" class="form-control" name="hasta" id="hasta" value="<?= esc($_GET['hasta'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-0 justify-content-center">
                                <button type="submit" class="btn btn-primary rounded-pill px-5">Aplicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('#filtrosVentasModal form');
                if(form){
                    form.addEventListener('submit', function (e) {
                        const desde = document.getElementById('desde').value;
                        const hasta = document.getElementById('hasta').value;
                        if (!desde || !hasta) {
                            e.preventDefault();
                            alert('Por favor, completá ambos campos de fecha: "Desde" y "Hasta".');
                        }
                    });
                }
            });
            </script>

            <?php if (!empty($_GET['desde']) && !empty($_GET['hasta'])): ?>
                <div class="alert alert-info text-center">
                    Mostrando ventas entre <strong><?= date('d/m/Y', strtotime($_GET['desde'])) ?></strong> y <strong><?= date('d/m/Y', strtotime($_GET['hasta'])) ?></strong>.
                </div>
            <?php endif; ?>

            <!-- Mensaje flash -->
            <?php if (session()->getFlashdata('mensaje')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('mensaje') ?>
                </div>
            <?php endif; ?>

            <!-- Tabla de ventas -->
            <?php if (!empty($ventas)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-info">
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Cant. de productos</th>
                                <th>Envio/Retiro</th>
                                <th>Dirección</th>
                                <th>Ver detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $i => $venta): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= esc($venta['nombre_persona']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($venta['fecha_venta'])) ?></td>
                                    <td>$<?= number_format($venta['total_venta'], 2, ',', '.') ?></td>
                                    <td><?= $venta['cantidad_productos'] ?></td>
                                    <td><?= esc($venta['metodo_entrega']) ?></td>
                                    <td><?= esc($venta['direccion_entrega']) ?></td>
                                    <td>
                                        <button 
                                            type="button" 
                                            class="btn btn-sm btn-info btn-ver-detalle" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detalleVentaModal"
                                            data-id="<?= $venta['id_venta'] ?>"
                                            data-cliente="<?= esc($venta['nombre_persona']) ?>"
                                            data-fecha="<?= date('d/m/Y H:i', strtotime($venta['fecha_venta'])) ?>"
                                            data-total="<?= number_format($venta['total_venta'], 2, ',', '.') ?>"
                                            data-cantidad="<?= $venta['cantidad_productos'] ?>"
                                            data-metodo="<?= esc($venta['metodo_entrega']) ?>"
                                            data-direccion="<?= esc($venta['direccion_entrega']) ?>"
                                        >
                                            Ver detalle
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center">No hay ventas registradas.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal detalle venta -->
<div class="modal fade" id="detalleVentaModal" tabindex="-1" aria-labelledby="detalleVentaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detalleVentaModalLabel">Detalle de la venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p><strong>Cliente:</strong> <span id="modalCliente"></span></p>
        <p><strong>Fecha:</strong> <span id="modalFecha"></span></p>
        <p><strong>Total:</strong> $<span id="modalTotal"></span></p>
        <p><strong>Cantidad de productos:</strong> <span id="modalCantidad"></span></p>
        <p><strong>Entrega:</strong> <span id="modalMetodo"></span></p>
        <p><strong>Dirección:</strong> <span id="modalDireccion"></span></p>
        <hr>
        <div id="modalDetalleProductos">
          <p>Cargando detalle...</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var detalleModal = document.getElementById('detalleVentaModal');

  detalleModal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;

    var cliente = button.getAttribute('data-cliente');
    var fecha = button.getAttribute('data-fecha');
    var total = button.getAttribute('data-total');
    var cantidad = button.getAttribute('data-cantidad');
    var metodo = button.getAttribute('data-metodo');
    var direccion = button.getAttribute('data-direccion');
    var idVenta = button.getAttribute('data-id');

    document.getElementById('modalCliente').textContent = cliente;
    document.getElementById('modalFecha').textContent = fecha;
    document.getElementById('modalTotal').textContent = total;
    document.getElementById('modalCantidad').textContent = cantidad;
    document.getElementById('modalMetodo').textContent = metodo;
    document.getElementById('modalDireccion').textContent = direccion;

    var detalleProductosDiv = document.getElementById('modalDetalleProductos');
    detalleProductosDiv.innerHTML = '<p>Cargando detalle...</p>';

    fetch('<?= base_url('api/detalle_venta') ?>/' + idVenta)
      .then(response => response.json())
      .then(data => {
        if(data.length > 0){
          var html = '<table class="table table-sm table-bordered">';
          html += '<thead><tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th></tr></thead><tbody>';

          data.forEach(item => {
           html += `<tr>
    <td>${item.nombre_producto}</td>
    <td>${item.cantidad}</td>
    <td>$${parseFloat(item.precio_unitario).toFixed(2)}</td>
    <td>$${parseFloat(item.subtotal).toFixed(2)}</td>
</tr>`;

          });

          html += '</tbody></table>';
          detalleProductosDiv.innerHTML = html;
        } else {
          detalleProductosDiv.innerHTML = '<p>No hay detalles para esta venta.</p>';
        }
      })
      .catch(error => {
        detalleProductosDiv.innerHTML = '<p>Error cargando detalles.</p>';
        console.error('Error AJAX:', error);
      });
  });
});
</script>