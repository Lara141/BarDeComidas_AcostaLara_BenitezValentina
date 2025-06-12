<div class="container mt-4">
    <h1 class="display-4 text-center mb-4">Catálogo de productos</h1>

    <div class="row">
        <?php foreach ($productos as $row) { ?>
            
<div class="col-md-4 mb-4">
    <div class="card h-100 text-center position-relative">
        <img class="card-img-top" src="<?= base_url('assets/upload/' . $row['imagen_producto']); ?>" width="150" height="150" alt="Imagen del producto">
        <div class="card-body">
            <h5 class="card-title"><?= esc($row['nombre_producto']); ?></h5>
            <p class="card-text"><?= esc($row['descripcion_producto']); ?></p>
            <p class="card-text fw-bold">$<?= number_format($row['precio_producto'], 2, ',', '.'); ?></p>
            <p class="card-text">Categoría: <?= esc($row['categoria_desc']); ?></p>
            <p class="card-text">Stock: <?= esc($row['stock_producto']); ?></p>
            <hr>
            <?php if (session('login')) { ?>
                <?= form_open('add_cart'); ?>
                    <?= form_hidden('id', $row['id_producto']); ?>
                    <?= form_hidden('titulo', $row['nombre_producto']); ?>
                    <?= form_hidden('precio', $row['precio_producto']); ?>
                    <div class="mb-2">
                        <input type="number" name="qty" value="1" min="1" max="<?= $row['stock_producto'] ?>" class="form-control text-center" style="width: 80px; margin: 0 auto;">
                    </div>
                    <!-- Botón con ícono de carrito -->
                    <button type="submit" class="btn btn-outline-success rounded-circle position-absolute" style="bottom: 10px; right: 10px; width: 40px; height: 40px; padding: 5px;">
                        <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Carrito" style="width: 24px; height: 24px;">
                    </button>
                <?= form_close(); ?>
            <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
