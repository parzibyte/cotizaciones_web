<?php

class Comun
{

    public static function env($clave)
    {
        $archivo = BASE_PATH . "/env.php";
        if (!file_exists($archivo)) {
            throw new Exception("El archivo de configuración ($archivo) no existe");
        }
        $configuraciones = parse_ini_file($archivo);
        if (isset($configuraciones[$clave])) {
            return $configuraciones[$clave];
        } else {
            throw new Exception("No existe la clave (" . $clave . ") en el archivo de configuración");
        }
    }
}
