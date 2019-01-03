<?php

class Cotizaciones
{
    public static function nueva($idCliente, $descripcion, $fecha)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("insert into cotizaciones(idCliente, descripcion, fecha) VALUES (?, ?, ?);");
        return $sentencia->execute([$idCliente, $descripcion, $fecha]);
    }

    public static function eliminarServicio($idServicio)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("delete from servicios_cotizaciones where id = ?;");
        return $sentencia->execute([$idServicio]);
    }

    public static function eliminarCaracteristica($idCaracteristica)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("delete from caracteristicas_cotizaciones where id = ?;");
        return $sentencia->execute([$idCaracteristica]);
    }

    public static function obtenerServicioPorId($idServicio)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, idCotizacion, servicio, costo, tiempoEnMinutos, multiplicador
        from servicios_cotizaciones where id = ?");
        $sentencia->execute([$idServicio]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public static function obtenerCaracteristicaPorId($idCaracteristica)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, idCotizacion, caracteristica from caracteristicas_cotizaciones where id = ?");
        $sentencia->execute([$idCaracteristica]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public static function serviciosPorId($idCotizacion)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, servicio, costo, tiempoEnMinutos, multiplicador
        from servicios_cotizaciones
        where idCotizacion = ?");
        $sentencia->execute([$idCotizacion]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function caracteristicasPorId($idCotizacion)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, idCotizacion, caracteristica from caracteristicas_cotizaciones
        where idCotizacion = ?");
        $sentencia->execute([$idCotizacion]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function agregarServicio($idCotizacion, $servicio, $costo, $tiempoEnMinutos, $multiplicador)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("insert into servicios_cotizaciones
        (idCotizacion, servicio, costo, tiempoEnMinutos, multiplicador)
        values
        (?, ?, ?, ?, ?);");
        return $sentencia->execute([$idCotizacion, $servicio, $costo, $tiempoEnMinutos, $multiplicador]);
    }

    public static function agregarCaracteristica($idCotizacion, $caracteristica)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("insert into caracteristicas_cotizaciones
        (idCotizacion, caracteristica)
        values
        (?, ?);");
        return $sentencia->execute([$idCotizacion, $caracteristica]);
    }

    public static function actualizarServicio($idServicio, $servicio, $costo, $tiempoEnMinutos, $multiplicador)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("update servicios_cotizaciones set
        servicio = ?,
        costo = ?,
        tiempoEnMinutos = ?,
        multiplicador = ?
        where id = ?;");
        return $sentencia->execute([$servicio, $costo, $tiempoEnMinutos, $multiplicador, $idServicio]);
    }

    public static function actualizarCaracteristica($idCaracteristica, $caracteristica)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("update caracteristicas_cotizaciones set
        caracteristica = ?
        where id = ?;");
        return $sentencia->execute([$caracteristica, $idCaracteristica]);
    }

    public static function todas()
    {
        $bd = BD::obtener();
        $sentencia = $bd->query("select
            cotizaciones.id, clientes.razonSocial, cotizaciones.descripcion, cotizaciones.fecha
            from clientes inner join cotizaciones
            on cotizaciones.idCliente = clientes.id;");
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function porId($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select
            cotizaciones.id, clientes.razonSocial, cotizaciones.descripcion, cotizaciones.fecha, cotizaciones.idCliente
            from clientes inner join cotizaciones
            on cotizaciones.idCliente = clientes.id
            where cotizaciones.id = ?;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public static function actualizar($id, $idCliente, $descripcion, $fecha)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("update cotizaciones set
        idCliente = ?,
        descripcion = ?,
        fecha = ?
        where id = ?");
        return $sentencia->execute([$idCliente, $descripcion, $fecha, $id]);
    }

    public static function eliminar($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("delete from cotizaciones where id = ?;");
        return $sentencia->execute([$id]);
    }
}
