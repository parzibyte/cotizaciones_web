<?php
if (
    empty($_POST["correo"])
    ||
    empty($_POST["pass"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit("Uno o más datos no fueron enviados");
}

Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);
$logueado = Usuarios::login($_POST["correo"], $_POST["pass"]);
$url = $logueado ? "cotizaciones" : "login&mensaje=1";
Utiles::redireccionar($url);