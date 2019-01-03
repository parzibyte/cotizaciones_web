<?php
date_default_timezone_set("America/Mexico_City");
define("BASE_URL", "http://localhost/cotizaciones");
define("BASE_PATH", __DIR__);
define("LISTA_BLANCA_PAGINAS", [
    # Clientes
    "clientes", "nuevo_cliente", "guardar_cliente",
    "editar_cliente", "actualizar_cliente", "eliminar_cliente",
    # Cotizaciones
    "cotizaciones", "nueva_cotizacion", "guardar_cotizacion",
    "eliminar_cotizacion", "editar_cotizacion", "actualizar_cotizacion",
    #Detalles y características de cotizaciones
    "detalles_caracteristicas_cotizacion",
    #Servicios de cotizaciones
    "agregar_servicio_a_cotizacion",
    "editar_servicio_de_cotizacion", "eliminar_servicio_de_cotizacion",
    "actualizar_servicio_de_cotizacion",
    # Características de cotizaciones
    "agregar_caracteristica_a_cotizacion", "editar_caracteristica_de_cotizacion",
    "eliminar_caracteristica_de_cotizacion", "actualizar_caracteristica_de_cotizacion",
    # Imprimir
    "imprimir_cotizacion",
    # Ajustes
    "editar_ajustes", "actualizar_ajustes",
    # Acerca de
    "creditos",
]);
$pagina = $_GET["p"] ?? "cotizaciones";
if (!in_array($pagina, LISTA_BLANCA_PAGINAS)) {
    exit("No permitido. Este incidente será reportado");
}

# Cargar todos los controladores y útiles

include_once BASE_PATH . "/BD.php";
include_once BASE_PATH . "/Utiles.php";
include_once BASE_PATH . "/Comun.php";
include_once BASE_PATH . "/controllers/Clientes.php";
include_once BASE_PATH . "/controllers/Cotizaciones.php";
include_once BASE_PATH . "/controllers/Ajustes.php";

# Ahora la vista
include_once BASE_PATH . "/encabezado.php";
include_once BASE_PATH . "/navegacion.php";
include_once BASE_PATH . "/includes/" . $pagina . ".php";
include_once BASE_PATH . "/pie.php";