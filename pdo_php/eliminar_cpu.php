<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Cpu.php';
    
    $cpu_id = (isset($_REQUEST['cpu_id'])) ? $_REQUEST['cpu_id'] : null;
    
    if($cpu_id){
        $cpu = Cpu::buscarPorId($cpu_id);        
        $cpu->eliminar();
        header('Location: index.php');
    }
    
?>