<?php
if (
    empty($_GET["id"])
    ||
    empty($_GET["tokenCSRF"])
) {
    exit;
}

Utiles::salirSiTokenCSRFNoCoincide($_GET["tokenCSRF"]);

Clientes::eliminar($_GET["id"]);
Utiles::redireccionar("clientes");
