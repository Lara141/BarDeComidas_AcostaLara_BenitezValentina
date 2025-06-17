
<div class="container my-5" style="max-width: 1000px;">
  <div class="table-responsive shadow rounded-4">
    <table id="mytable" class="table table-bordered border-info-subtle align-middle mb-0">
      <thead class="table-info text-center">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Descripción</th>
          <th scope="col">Estado</th>
          <th scope="col">Stock</th>
          <th scope="col">Categoría</th>
          <th scope="col">Imagen</th>
          <th scope="col">Editar</th>
          <th scope="col">Activar/Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($producto as $row){?>
          <tr>
            <td><?php echo $row['nombre_producto'];?></td>
            <td>$<?php echo $row['precio_producto'];?></td>
            <td><?php echo $row['descripcion_producto'];?></td>
            <td><?php echo $row['estado_producto'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
            <td><?php echo $row['stock_producto'];?></td>
            <td><?php echo $row['categoria_desc'];?></td>
            <td>
              <img src="<?php echo base_url('assets/upload/'.$row['imagen_producto']);?>" 
                   alt="Imagen del producto" 
                   class="img-thumbnail rounded" 
                   style="max-width: 100px;">
            </td>
            <td>
              <a class="btn btn-sm btn-success" href="<?php echo base_url('editar/'.$row['id_producto']);?>">
                Editar
              </a>
            </td>
            <td>
              <?php if($row['estado_producto'] == 1) { ?>
               <a class="btn btn-sm btn-danger" href="<?php echo base_url('eliminar/'.$row['id_producto']);?>">
                Eliminar
                </a>
              <?php } else { ?>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('activar/'.$row['id_producto']);?>">
                Activar
                </a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
