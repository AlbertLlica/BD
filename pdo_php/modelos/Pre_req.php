<?php

if (!defined('CONTROLADOR'))
    exit;

require_once 'Conexion.php';

class Pre_req {

    private $curso_id_1;
    private $curso_id_2;

    const TABLA = 'pre_req';
    
    public function __construct($curso_id_2=null, $curso_id_1 =null) {
        $this->curso_id_2 = $curso_id_2;
       $this->curso_id_1  = $curso_id_1;
    }

    public function getCurso_1_ID() {
        return $this->curso_id_1 ;
    }

    public function getCurso_2_ID() {
        return $this->curso_id_2;
    }

    public function setCurso_2_ID($curso_id_2) {
        $this->curso_id_2 = $curso_id_2;
    }

    public function guardar() {
        $conexion = new Conexion();
        if ($this->curso_id_1 ) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET curso_id_2 = :curso_id_2 WHERE curso_id_1  = :curso_id_1 ');
            $consulta->bindParam(':curso_id_2', $this->curso_id_2);
            $consulta->bindParam(':curso_id_1 ', $this->curso_id_1 );
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (curso_id_2) VALUES(:curso_id_2)');
            $consulta->bindParam(':curso_id_2', $this->curso_id_2);
            $consulta->execute();
            $this->curso_id_1  = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    
    public function eliminar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE curso_id_1  = :curso_id_1');
        $consulta->bindParam(':curso_id_1 ', $this->curso_id_1 );
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($curso_id_1) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT curso_id_2 FROM ' . self::TABLA . ' WHERE curso_id_1  = :curso_id_1 ');
        $consulta->bindParam(':curso_id_1 ', $curso_id_1);
        $consulta->execute();
        $registro = $consulta->fetch();
        $conexion = null;
        if ($registro) {
            return new self($registro['curso_id_2'], $curso_id_1);
        } else {
            return false;
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT curso_id_1 , curso_id_2 FROM ' . self::TABLA . ' ORDER BY curso_id_2');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

}