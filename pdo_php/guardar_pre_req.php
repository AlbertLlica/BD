<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Pre_req.php';
    
    $idCurso = (isset($_REQUEST['idCurso'])) ? $_REQUEST['idCurso'] : null;
    
    if($idCurso){        
        $pre_req = Pre_req::buscarPorId($idCurso);        
    }else{
        $pre_req = new Pre_req();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $prereqid = (isset($_POST['prereqid'])) ? $_POST['prereqid'] : null;
        $pre_req->setCurso_2_ID($prereqid);
        $pre_req->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_pre_req.php';
    }
    
?>
