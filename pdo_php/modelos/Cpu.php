<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Cpu {

    private $id;
    private $marca;
    private $serie;
    private $modelo;

    const TABLA = 'cpu';
    
    public function __construct($marca=null, $serie=null, $modelo=null, $id=null) {
        $this->marca = $marca;
        $this->serie = $serie; 
        $this->modelo = $modelo; 
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function getModelo() {
        return $this->modelo;
    }
    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }
    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->id) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET marca = :marca, serie = :serie, modelo = :modelo WHERE id = :id');
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':serie', $this->serie);
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->bindParam(':id', $this->id);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (marca, serie, modelo) VALUES(:marca, :serie, :modelo)');
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':serie', $this->serie);
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->execute();
            $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $this->id);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT marca, serie, modelo FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['marca'], $registro['serie'], $registro['modelo'], $id);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT id, marca, serie, modelo FROM ' . self::TABLA . ' ORDER BY marca;');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}
