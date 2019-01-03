<?php

class Clientes
{
    public static function nuevo($razonSocial)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("insert into clientes(razonSocial) VALUES (?);");
        return $sentencia->execute([$razonSocial]);
    }

    public static function actualizar($id, $razonSocial)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("update clientes set razonSocial = ? where id = ?;");
        return $sentencia->execute([$razonSocial, $id]);
    }

    public static function todos()
    {
        $bd = BD::obtener();
        $sentencia = $bd->query("select id, razonSocial from clientes;");
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public static function porId($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("select id, razonSocial from clientes where id = ?;");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public static function eliminar($id)
    {
        $bd = BD::obtener();
        $sentencia = $bd->prepare("delete from clientes where id = ?;");
        return $sentencia->execute([$id]);
    }
}
