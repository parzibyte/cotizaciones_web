<?php
if (
    empty($_POST["tokenCSRF"])
    ||
    empty($_POST["idCliente"])
    ||
    empty($_POST["descripcion"])
    ||
    empty($_POST["fecha"])
) {
    exit;
}
Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);
Cotizaciones::nueva($_POST["idCliente"], $_POST["descripcion"], $_POST["fecha"]);
Utiles::redireccionar("cotizaciones");