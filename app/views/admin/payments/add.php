<?php include_once(VIEWS . 'header.php')?>
    <div class="card p-4 bg-light">
        <div class="card-header">
            <h1 class="text-center">Creación de un metodo de pago</h1>
        </div>
        <div class="card-body">
            <form action="<?= ROOT ?>adminPayment/add/" method="POST">
            <div class="form-group text-left">
                <label for="name">Nombre:</label>
                <input type="text" name="name" class="form-control"
                       placeholder="Escribe el nombre del metodo" required
                       value="<?= $data['data']['name'] ?? '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="description">Descripción:</label>
                <textarea name="description" id="editor" rows="10"><?= $data['data']['description'] ?? '' ?></textarea>
                </div>
                <div class="form-group text-left">
                    <input type="submit" value="Enviar" class="btn btn-success">
                    <a href="<?= ROOT ?>adminPayment" class="btn btn-info">Regresar</a>
                </div>
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php include_once(VIEWS . 'footer.php')?>