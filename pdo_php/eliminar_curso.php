<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Curso.php';
    
    $curso_id = (isset($_REQUEST['curso_id'])) ? $_REQUEST['curso_id'] : null;
    
    if($curso_id){
        $curso = Curso::buscarPorId($curso_id);        
        $curso->eliminar();
        header('Location: index.php');
    }
    
?>