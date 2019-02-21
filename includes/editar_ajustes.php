<?php
$ajustes = Ajustes::obtener();
$tokenCSRF = Utiles::obtenerTokenCSRF();
?>
<div class="row">
    <div class="col-sm">
        <h1>Editar ajustes</h1>
        <?php if (isset($_GET["mensaje"])) { ?>
            <div class="alert alert-<?php echo($_GET["mensaje"] == "1" ? "success" : "danger") ?>">
                <?php if ($_GET["mensaje"] == "1"): ?>
                    Ajustes guardados
                <?php endif; ?>
                <?php if ($_GET["mensaje"] == "0"): ?>
                    Error al guardar ajustes. Intenta de nuevo
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        <form method="post" action="<?php echo BASE_URL ?>/?p=actualizar_ajustes">
            <input name="tokenCSRF" type="hidden" value="<?php echo $tokenCSRF ?>">
            <div class="form-group">
                <label for="remitente">Remitente</label>
                <input maxlength="100" value="<?php echo htmlentities($ajustes->remitente) ?>" autofocus
                       name="remitente" autocomplete="off" type="text" class="form-control" id="razonSocial"
                       placeholder="El nombre de quien hace la cotización">
            </div>
            <div class="form-group">
                <label for="mensajePresentacion">Mensaje de presentación</label>
                <textarea placeholder="Un mensaje que aparece al inicio de la cotización" maxlength="255"
                          name="mensajePresentacion" id="mensajePresentacion" cols="30" rows="3"
                          class="form-control"><?php echo htmlentities($ajustes->mensajePresentacion) ?></textarea>
            </div>
            <div class="form-group">
                <?php include_once BASE_PATH . "/includes/publicidad.php" ?>
            </div>
            <div class="form-group">
                <label for="mensajeAgradecimiento">Mensaje de agradecimiento</label>
                <textarea placeholder="Mensaje que sale casi al final de la cotización" maxlength="255"
                          name="mensajeAgradecimiento" id="mensajeAgradecimiento" cols="30" rows="3"
                          class="form-control"><?php echo htmlentities($ajustes->mensajeAgradecimiento) ?></textarea>
            </div>
            <div class="form-group">
                <label for="mensajePie">Mensaje al final</label>
                <textarea placeholder="Mensaje que sale en el pie de página, después del remitente" maxlength="255"
                          name="mensajePie" id="mensajePie" cols="30" rows="3"
                          class="form-control"><?php echo htmlentities($ajustes->mensajePie) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-success" href="<?php echo BASE_URL ?>/?p=cotizaciones">&larr; Volver</a>
        </form>
        <br>
    </div>
</div>