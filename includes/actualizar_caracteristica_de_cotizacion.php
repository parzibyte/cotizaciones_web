<?php
if (
    empty($_POST["idCaracteristica"])
    ||
    empty($_POST["idCotizacion"])
    ||
    empty($_POST["caracteristica"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit("Uno o más datos no fueron enviados");
}
Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);

Cotizaciones::actualizarCaracteristica(
    $_POST["idCaracteristica"],
    $_POST["caracteristica"]
);
Utiles::redireccionar("detalles_caracteristicas_cotizacion&id=" . $_POST["idCotizacion"]);
