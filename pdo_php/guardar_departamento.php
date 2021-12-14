<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Departamento.php';
    
    $idDepa = (isset($_REQUEST['idDepa'])) ? $_REQUEST['idDepa'] : null;
    
    if($idDepa){        
        $departamento = Departamento::buscarPorId($idDepa);        
    }else{
        $departamento = new Departamento();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $departamento->setNombre($nombre);
        $departamento->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_departamento.php';
    }
    
?>
