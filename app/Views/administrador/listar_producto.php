<h1 class="text-center">Listado de productos</h1>
<div class="container">
    <tablev id="mytable" class="table table-bordered border-info-subtle">
  
    <thead class="table-info">
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Estado</th>
      <th scope="col">Stock</th>
      <th scope="col">Categoria</th>
      <th scope="col">Imagen</th>
      <th scope="col">Activar/Eliminar</th>
    </thead>
  
  <tbody>
    <?php foreach($producto as $row){?>
    <tr>
      <td><?php echo $row['nombre_producto'];?></td>
        <td><?php echo $row['precio_producto'];?></td>
        <td><?php echo $row['descripcion_producto'];?></td>
        <td><?php echo $row['estado_producto'];?></td>
        <td><?php echo $row['stock_producto'];?></td>
        <td><?php echo $row['categoria_desc'];?></td>
        <td><img src="<?php echo base_url('public/assets/uploads/'.$row['imagen_producto']);?>" alt="Imagen del producto" width="100"></td>
<td>
    <a class="btn btn-success" href="<?php echo base_url('producto_controller/editar_producto/'.$row['id_producto']);?>">Editar</a>
</td>

<?php
if($row['estado_producto'] == 1)
{?>
<td>
    <a class="btn btn-danger" href="<?php echo base_url('producto_controller/eliminar_producto/'.$row['id_producto']);?>">Eliminar</a>
</td>
<?php } else {
     ?>
     <td>
        <a class="btn btn-danger" href="<?php echo base_url('producto_controller/activar_producto/'.$row['id_producto']);?>">Activar</a>
     </td>
     <?php}?>
    </tr>
    <?php } ?>
  </tbody>
</table>

</div>