<?php
date_default_timezone_set("America/Mexico_City");
define("BASE_PATH", __DIR__);

# Cargar todos los controladores y útiles

include_once BASE_PATH . "/BD.php";
include_once BASE_PATH . "/Utiles.php";
include_once BASE_PATH . "/Comun.php";
include_once BASE_PATH . "/Sesion.php";
include_once BASE_PATH . "/SesionService.php";
include_once BASE_PATH . "/controllers/Clientes.php";
include_once BASE_PATH . "/controllers/Cotizaciones.php";
include_once BASE_PATH . "/controllers/Ajustes.php";
include_once BASE_PATH . "/controllers/Usuarios.php";

define("BASE_URL", Comun::env("BASE_URL"));
# Las páginas a las que solamente se puede acceder si la sesión está iniciada
define("PAGINAS_SESION_REQUERIDA", [
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
# Aquellas que se pueden ver incluso sin iniciar sesión
define("PAGINAS_SESION_NO_REQUERIDA", [

    "login", "registro", "guardar_usuario",
    "iniciar_sesion", "logout",
]);
# Pero si la sesión está iniciada, no se puede acceder a estas y en cambio se redirige
define("PAGINAS_REDIRIGIR_SI_SESION", [
    "login", "registro", "guardar_usuario",
    "iniciar_sesion",
]);
# Ver si está en nuestra lista de permitidos
$pagina = $_GET["p"] ?? "cotizaciones";
if (!in_array($pagina, PAGINAS_SESION_REQUERIDA) && !in_array($pagina, PAGINAS_SESION_NO_REQUERIDA)) {
    exit("No permitido. Este incidente será reportado");
}
# Ver si la sesión está iniciada...
if (SesionService::obtenerIdUsuarioLogueado() !== NULL) {
    # En caso de que sí, ver si debemos "denegarlas"
    if (in_array($pagina, PAGINAS_REDIRIGIR_SI_SESION)) {
        Utiles::redireccionar("cotizaciones");
    }
} else {
    # Si no, entonces vemos si intenta acceder a una protegida
    if (in_array($pagina, PAGINAS_SESION_REQUERIDA)) {
        Utiles::redireccionar("login&mensaje=2");
    }
}


# Ahora la vista
include_once BASE_PATH . "/encabezado.php";
include_once BASE_PATH . "/navegacion.php";
include_once BASE_PATH . "/includes/" . $pagina . ".php";
include_once BASE_PATH . "/pie.php";