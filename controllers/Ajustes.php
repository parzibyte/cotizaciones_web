<?php

class Ajustes
{
    public static function guardar($remitente, $mensajePresentacion, $mensajeAgradecimiento, $mensajePie)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("update ajustes set
        remitente = ?,
        mensajePresentacion = ?,
        mensajeAgradecimiento = ?,
        mensajePie = ? 
        where idUsuario = ?");
        return $sentencia->execute([$remitente, $mensajePresentacion, $mensajeAgradecimiento, $mensajePie, SesionService::obtenerIdUsuarioLogueado()]);
    }

    public static function obtener()
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select remitente, mensajePresentacion, mensajeAgradecimiento, mensajePie from ajustes where idUsuario = ?;");
        $sentencia->execute([SesionService::obtenerIdUsuarioLogueado()]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}

?>