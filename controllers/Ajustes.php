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
        mensajePie = ? limit 1");
        return $sentencia->execute([$remitente, $mensajePresentacion, $mensajeAgradecimiento, $mensajePie]);
    }

    public static function obtener()
    {
        $bd = BD::obtener();
        $sentencia = $bd->query("select remitente, mensajePresentacion, mensajeAgradecimiento, mensajePie from ajustes;");
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}

?>