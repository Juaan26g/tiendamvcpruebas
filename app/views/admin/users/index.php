<?php include_once(VIEWS . 'header.php')?>
<script src="<?= ROOT . 'js/adminUSER-User.js' ?>"></script>
<div>
    <input type="button" id="change" value="Mostrar usuarios estandar" class="btn btn-info mb-2" onclick="au()">
    <div class="card p-4 bg-light" id="adminuser">
        <div class="card-header">
            <h1 class="text-center">Usuarios Administradores</h1>
           
        <div class="card-body">
            <table class="table text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Editar</th>
                <th>Borrar</th>
                </thead>
                <tbody>
                <?php foreach ($data['adminusers'] as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user->id ?></td>
                        <td class="text-center"><?= $user->name ?></td>
                        <td class="text-center"><?= $user->email ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminUser/update/<?= $user->id ?>"
                                class="btn btn-info"
                            >Editar</a>
                        </td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminUser/delete/<?= $user->id ?>"
                               class="btn btn-danger"
                            >Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?= ROOT ?>adminUser/create" class="btn btn-success">
                        Crear Usuario
                    </a>
                    <a href="<?= ROOT ?>adminShop" class="btn btn-info">Regresar</a>
                </div>
                <div class="col-sm-6">
                
                </div>
            </div>
        </div>
    </div>


    <div class="card p-4 bg-light" id="user">
        <div class="card-header">
            <h1 class="text-center">Usuarios {experimental}</h1>
            
        </div>
        <div class="card-body">
            <table class="table text-center" width="100%">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Editar</th>
                <th>Borrar</th>
                </thead>
                <tbody>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user->id ?></td>
                        <td class="text-center"><?= $user->first_name . ' ' . $user->last_name_1 . ' ' . $user->last_name_2 ?></td>
                        <td class="text-center"><?= $user->email ?></td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminUser/update/<?= $user->id ?>"
                                class="btn btn-info"
                            >Editar</a>
                        </td>
                        <td class="text-center">
                            <a href="<?= ROOT ?>adminUser/delete/<?= $user->id ?>"
                               class="btn btn-danger"
                            >Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-6">
                    <a href="" class="btn btn-success">
                        Experimental
                    </a>
                    <a href="" class="btn btn-info">Experimental</a>
                </div>
                <div class="col-sm-6">
                
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once(VIEWS . 'footer.php')?>