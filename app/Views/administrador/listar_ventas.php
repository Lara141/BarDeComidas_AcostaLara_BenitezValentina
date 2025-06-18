<div class="container my-5" style="max-width: 1100px;">
    <div class="card shadow rounded-4">
        <div class="card-body">
            <h2 class="text-center mb-4 fw-bold">
                <i class="fa-solid fa-receipt"></i> Lista de Ventas
            </h2>

            <?php if (session()->getFlashdata('mensaje')): ?>
                <div class="alert alert-success text-center">
                    <?= session()->getFlashdata('mensaje') ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($ventas)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-info">
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Cantidad de productos</th>
                                <th>Acciones</th>
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

    // Obtener datos del botón
    var cliente = button.getAttribute('data-cliente');
    var fecha = button.getAttribute('data-fecha');
    var total = button.getAttribute('data-total');
    var cantidad = button.getAttribute('data-cantidad');
    var idVenta = button.getAttribute('data-id');

    // Setear datos en el modal
    document.getElementById('modalCliente').textContent = cliente;
    document.getElementById('modalFecha').textContent = fecha;
    document.getElementById('modalTotal').textContent = total;
    document.getElementById('modalCantidad').textContent = cantidad;

    // Mostrar texto "Cargando..." mientras hacemos la petición AJAX
    var detalleProductosDiv = document.getElementById('modalDetalleProductos');
    detalleProductosDiv.innerHTML = '<p>Cargando detalle...</p>';

    // Petición AJAX para obtener el detalle de productos de la venta
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
