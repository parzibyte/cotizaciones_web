<?php
$clientes = Clientes::todos();
$tokenCSRF = Utiles::obtenerTokenCSRF();
?>

<div class="row">
    <div class="col-sm">
        <h1>Clientes</h1>
        <p>Aquí aparecen los clientes</p>
    </div>
</div>


<div class="row">
    <div class="col-sm">
        <p>
            <a href="<?php echo BASE_URL ?>/?p=nuevo_cliente" class="btn btn-success">
                <i class="fa fa-plus"></i> Nuevo cliente
            </a>
        </p>
    </div>
    <?php include_once BASE_PATH . "/includes/publicidad.php" ?>
</div>

<div class="row">
    <div class="col-sm">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $cliente) { ?>
                    <tr>
                        <td><?php echo $cliente->id ?></td>
                        <td><?php echo htmlentities($cliente->razonSocial) ?></td>
                        <td>
                            <a class="btn btn-warning"
                               href="<?php echo BASE_URL ?>/?p=editar_cliente&id=<?php echo $cliente->id ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="<?php echo BASE_URL ?>/?p=eliminar_cliente&id=<?php echo $cliente->id ?>&tokenCSRF=<?php echo $tokenCSRF ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>