<?php

class Usuarios
{
    public static function nuevo($correo, $pass)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("insert into usuarios(correo, pass) VALUES (?, ?);");
        $pass = password_hash(md5($pass), PASSWORD_DEFAULT);
        $resultadoInsercion = $sentencia->execute([$correo, $pass]);
        $idUsuario = $bd->lastInsertId();
        $consulta = "insert into ajustes (idUsuario, remitente, mensajePresentacion, mensajeAgradecimiento, mensajePie)
values ('$idUsuario', '', '', '', '');";
        return $resultadoInsercion && $bd->exec($consulta);
    }

    public static function login($correo, $pass)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, correo, pass from usuarios where correo = ? limit 1;");
        $sentencia->execute([$correo]);
        if ($sentencia->rowCount() < 0) {
            return false;
        }

        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        $pass = md5($pass);
        $coinciden = password_verify($pass, $usuario->pass);
        if ($coinciden) {
            SesionService::propagarIdUsuario($usuario->id);
        }
        return $coinciden;
    }

    public static function porId($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, correo from usuarios where id = ? limit 1;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

}
