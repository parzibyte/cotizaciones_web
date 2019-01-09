<?php
if (
    !isset($_POST["remitente"])
    ||
    !isset($_POST["mensajePresentacion"])
    ||
    !isset($_POST["mensajeAgradecimiento"])
    ||
    !isset($_POST["mensajePie"])
    ||
    empty($_POST["tokenCSRF"])
) {
    exit("Uno o más parámetros no fueron proporcionados");
}
Utiles::salirSiTokenCSRFNoCoincide($_POST["tokenCSRF"]);

$resultado = Ajustes::guardar($_POST["remitente"], $_POST["mensajePresentacion"], $_POST["mensajeAgradecimiento"], $_POST["mensajePie"]);
Utiles::redireccionar("editar_ajustes&mensaje=" . intval($resultado));
