<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Curso.php';
    
    $curso_id = (isset($_REQUEST['curso_id'])) ? $_REQUEST['curso_id'] : null;
    
    if($curso_id){        
        $curso = Curso::buscarPorId($curso_id);        
    }else{
        $curso = new Curso();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $creditos = (isset($_POST['creditos'])) ? $_POST['creditos'] : null;
        $depa_id = (isset($_POST['depa_id'])) ? $_POST['depa_id'] : null;
        $curso->setNombre($nombre);
        $curso->setCreditos($creditos);
        $curso->setDepa_id($depa_id);
        $curso->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_curso.php';
    }
    
?>
