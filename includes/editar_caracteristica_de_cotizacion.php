<?php

if (empty($_GET["idCaracteristica"])) {
    exit("No proporcionaste un id de servicio");
}

if (empty($_GET["idCotizacion"])) {
    exit("No proporcionaste un id de cotización");
}
$caracteristica = Cotizaciones::obtenerCaracteristicaPorId($_GET["idCaracteristica"]);
if (!$caracteristica) {
    exit("No existe la cotización");
}
$tokenCSRF = Utiles::obtenerTokenCSRF();
?>


<div class="col-sm-4">
    <h3>Editar cotización</h3>
    <form method="post" action="<?php echo BASE_URL ?>/?p=actualizar_caracteristica_de_cotizacion">
        <input type="hidden" name="idCotizacion" value="<?php echo $caracteristica->idCotizacion ?>">
        <input type="hidden" name="idCaracteristica" value="<?php echo $caracteristica->id ?>">
        <input type="hidden" name="tokenCSRF" value="<?php echo $tokenCSRF ?>">
        <div class="form-group">
            <label for="caracteristica">Característica</label>
            <input value="<?php echo $caracteristica->caracteristica; ?>" autofocus name="caracteristica"
                   autocomplete="off" required type="text" class="form-control" id="caracteristica"
                   placeholder="Algo que describa a la cotización">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-success"
           href="<?php echo BASE_URL ?>/?p=detalles_caracteristicas_cotizacion&id=<?php echo $_GET["idCotizacion"] ?>">&larr;
            Volver</a>
    </form>
</div>