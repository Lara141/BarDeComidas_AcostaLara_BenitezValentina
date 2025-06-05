<?php $cart = \Config\Services::cart(); ?>

<h1 class="text-center">Carrito de compras</h1>
<a href="productos" class="btn btn-success" role="button">Continuar comprando</a>

<?php if($cart->contents() == NULL) { ?>
    <h2 class="text-center">No hay productos en el carrito</h2>
<?php } else { ?>
    <table id="mytable" class="table table-bordred table-striped">
        <thead>
            <tr>
                <th>Nº item</th>
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
            foreach($cart->contents() as $item): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo $item['subtotal']; $total += $item['subtotal']; ?></td>
                    <td><?php echo anchor('eliminar_item/'.$item['rowid'],'Eliminar'); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" class="text-end fw-bold">Total Compra:</td>
                <td colspan="2">$ <?php echo $total; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="<?php echo base_url('vaciar_carrito/all'); ?>" class="btn btn-danger">Vaciar carrito</a>
                </td>
                <td colspan="2">
                    <a href="ventas" class="btn btn-success" role="button">Ordenar compra</a>
                </td>
            </tr>
        </tbody>
    </table>
<?php } ?>