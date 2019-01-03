<?php

class Comun
{

    public static function env($clave)
    {
        /*
         * Un pequeño sistema de caché
         * Guardar los valores de ENV en la memoria RAM cuyo período de vida será el mismo que el del script
         * Así, en múltiples llamadas a ENV, sólo la primera vez será leído del disco duro, la segunda desde
         * la constante
         * */
        if (defined("_ENV_CACHE")) {
            $configuraciones = _ENV_CACHE;
        } else {
            $archivo = BASE_PATH . "/env.php";
            if (!file_exists($archivo)) {
                throw new Exception("El archivo de configuración ($archivo) no existe");
            }
            $configuraciones = parse_ini_file($archivo);
            define("_ENV_CACHE", $configuraciones);
        }
        if (isset($configuraciones[$clave])) {
            return $configuraciones[$clave];
        } else {
            throw new Exception("No existe la clave (" . $clave . ") en el archivo de configuración");
        }
    }
}

?>