<?php
if (
    empty($_GET["idServicio"])
    ||
    empty($_GET["tokenCSRF"])
    ||
    empty($_GET["idCotizacion"])
) {
    exit("Uno o más parámetros no fueron proporcionados");
}
Utiles::salirSiTokenCSRFNoCoincide($_GET["tokenCSRF"]);
Cotizaciones::eliminarServicio($_GET["idServicio"]);
Utiles::redireccionar("detalles_caracteristicas_cotizacion&id=" . $_GET["idCotizacion"]);
