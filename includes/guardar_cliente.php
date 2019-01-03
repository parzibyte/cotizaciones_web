<?php
if (
    empty($_POST["razonSocial"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit;
}

Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);
Clientes::nuevo($_POST["razonSocial"]);
Utiles::redireccionar("clientes");
