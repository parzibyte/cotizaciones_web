<?php
if (
    empty($_POST["idCotizacion"])
    ||
    empty($_POST["caracteristica"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit;
}
Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);

Cotizaciones::agregarCaracteristica($_POST["idCotizacion"], $_POST["caracteristica"]);
Utiles::redireccionar("detalles_caracteristicas_cotizacion&id=" . $_POST["idCotizacion"]);
