<?php
if (
    empty($_GET["id"])
    ||
    empty($_GET["tokenCSRF"])
) {
    exit;
}

Utiles::salirSiTokenCSRFNoCoincide($_GET["tokenCSRF"]);

Cotizaciones::eliminar($_GET["id"]);
Utiles::redireccionar("cotizaciones");
