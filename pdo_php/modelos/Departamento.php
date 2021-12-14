<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Departamento {

    private $depa_id;
    private $nombre;

    const TABLA = 'departamento';
    
    public function __construct($nombre=null, $depa_id=null) {
        $this->nombre = $nombre;
       $this->depa_id = $depa_id;
    }

    public function getDepa_id() {
        return $this->depa_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->depa_id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre WHERE depa_id = :depa_id');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':depa_id', $this->depa_id);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre) VALUES (:nombre)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->execute();
            $this->depa_id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE depa_id = :depa_id');
        $consulta->bindParam(':depa_id', $this->depa_id);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($depa_id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT nombre FROM ' . self::TABLA . ' WHERE depa_id = :depa_id');
        $consulta->bindParam(':depa_id', $depa_id);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre'], $depa_id);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT depa_id, nombre FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}