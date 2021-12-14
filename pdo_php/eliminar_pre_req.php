<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Pre_req.php';
    
    $idCurso = (isset($_REQUEST['idCurso'])) ? $_REQUEST['idCurso'] : null;
    
    if($idCurso){
        $pre_req = Pre_req::buscarPorId($idCurso);        
        $pre_req->eliminar();
        header('Location: index.php');
    }

?>