<?php
if (
    empty($_POST["id"])
    ||
    empty($_POST["idCliente"])
    ||
    empty($_POST["descripcion"])
    ||
    empty($_POST["fecha"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit;
}
Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);

Cotizaciones::actualizar($_POST["id"], $_POST["idCliente"], $_POST["descripcion"], $_POST["fecha"]);
Utiles::redireccionar("cotizaciones");
