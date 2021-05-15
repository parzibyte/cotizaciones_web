<?php

class SesionService
{

    public static function escribir($clave, $datos, $sobrescribir = false)
    {
        self::init();
        if (!isset($_SESSION[$clave]) || $sobrescribir) $_SESSION[$clave] = $datos;
    }

    /**
     * Lee una variable almacenada en la sesión.
     * Devuelve la variable, o null si no existe
     * @param $clave
     * @return mixed|null
     */
    public static function leer($clave)
    {
        self::init();
        if (isset($_SESSION[$clave])) {
            return $_SESSION[$clave];
        }
        return null;
    }

    private static function init()
    {
        if (!isset($_SESSION))
            session_set_save_handler(new Sesion());
        if (!self::laSesionEstaIniciada()) {
            session_start();
            session_regenerate_id(true);
        }
    }

    public static function propagarIdUsuario($idUsuario)
    {
        self::init();
        $_SESSION["idUsuario"] = $idUsuario;
    }

    public static function obtenerIdUsuarioLogueado()
    {
        self::init();
        if (isset($_SESSION["idUsuario"])) {
            return $_SESSION["idUsuario"];
        }
        return null;
    }

    public static function obtenerUsuarioLogueado()
    {
        $id = self::obtenerIdUsuarioLogueado();
        if (isset($id)) {
            return Usuarios::porId($id);
        }
        return null;
    }

    private static function laSesionEstaIniciada()
    {
        return session_status() === PHP_SESSION_ACTIVE ? true : false;
    }

    public static function cerrarSesion()
    {
        self::init();
        if (!self::laSesionEstaIniciada()) {
            session_start();
        }
        session_destroy();
    }
}
