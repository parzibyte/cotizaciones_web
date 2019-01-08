<?php

class BD
{
    public static function obtener()
    {
        $bd = new PDO(
            "mysql:host=" . Comun::env("HOST_MYSQL") . ";dbname=" . Comun::env("NOMBRE_BD_MYSQL"),
            Comun::env("USUARIO_MYSQL"),
            Comun::env("PASS_MYSQL")
        );
        $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bd->query("SET NAMES 'utf8'");
        return $bd;
    }

    public static function obtenerParaSesion()
    {
        $bd = new PDO(
            "mysql:host=" . Comun::env("HOST_MYSQL_SESION") . ";dbname=" . Comun::env("NOMBRE_BD_MYSQL_SESION"),
            Comun::env("USUARIO_MYSQL_SESION"),
            Comun::env("PASS_MYSQL_SESION")
        );
        $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bd->query("SET NAMES 'utf8'");
        return $bd;
    }
}
