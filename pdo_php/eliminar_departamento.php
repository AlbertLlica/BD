<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Departamento.php';
    
    $depa_id = (isset($_REQUEST['depa_id'])) ? $_REQUEST['depa_id'] : null;
    
    if($depa_id){
        $departamento = Departamento::buscarPorId($depa_id);        
        $departamento->eliminar();
        header('Location: index.php');
    }
    
?>