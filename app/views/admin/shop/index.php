<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center"><?= $data['subtitle'] ?></h1>
        </div>
        <div class="card-body">
    <h2 class="text-center">Bienvenido a la administración de la tienda</h2>
    <p class="text-center">Acceso al menú de administación en el header</p>

                    <a href="<?= ROOT ?>adminPayment" class="btn btn-info">Pagos</a>
                    <a href="<?= ROOT ?>adminProduct" class="btn btn-info">Productos</a>
                    <a href="<?= ROOT ?>adminUser" class="btn btn-info">Usuarios</a>
                
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>

    