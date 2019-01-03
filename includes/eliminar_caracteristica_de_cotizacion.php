<?php
if (
    empty($_GET["idCaracteristica"])
    ||
    empty($_GET["tokenCSRF"])
    ||
    empty($_GET["idCotizacion"])
) {
    exit("Uno o más parámetros no fueron proporcionados");
}
Utiles::salirSiTokenCSRFNoCoincide($_GET["tokenCSRF"]);
Cotizaciones::eliminarCaracteristica($_GET["idCaracteristica"]);
Utiles::redireccionar("detalles_caracteristicas_cotizacion&id=" . $_GET["idCotizacion"]);
