<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Curso {

    private $curso_id;
    private $nombre;
    private $creditos;
    private $depa_id;

    const TABLA = 'curso';
    
    public function __construct($nombre=null, $creditos=null, $depa_id=null, $curso_id=null) {
        $this->nombre = $nombre;
        $this->creditos = $creditos; 
        $this->depa_id = $depa_id; 
        $this->curso_id = $curso_id;
    }

    public function getCurso_id() {
        return $this->curso_id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function getDepa_id() {
        return $this->depa_id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCreditos($creditos) {
        $this->creditos = $creditos;
    }
    public function setDepa_id($depa_id) {
        $this->depa_id = $depa_id;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->curso_id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, creditos = :creditos, depa_id = :depa_id WHERE curso_id = :curso_id');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':creditos', $this->creditos);
            $consulta->bindParam(':depa_id', $this->depa_id);
            $consulta->bindParam(':curso_id', $this->curso_id);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, creditos, depa_id) VALUES(:nombre, :creditos, :depa_id)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':creditos', $this->creditos);
            $consulta->bindParam(':depa_id', $this->depa_id);
            $consulta->execute();
            $this->curso_id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE curso_id = :curso_id');
        $consulta->bindParam(':curso_id', $this->curso_id);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($curso_id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT nombre, creditos, depa_id FROM ' . self::TABLA . ' WHERE curso_id = :curso_id');
        $consulta->bindParam(':curso_id', $curso_id);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['nombre'], $registro['creditos'], $registro['depa_id'], $curso_id);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT curso_id, nombre, creditos, depa_id FROM ' . self::TABLA . ' ORDER BY nombre;');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}