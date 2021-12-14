<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Cpu.php';
    
    $cpu_id = (isset($_REQUEST['cpu_id'])) ? $_REQUEST['cpu_id'] : null;
    
    if($cpu_id){        
        $cpu = Cpu::buscarPorId($cpu_id);        
    }else{
        $cpu = new Cpu();
    }
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $marca = (isset($_POST['marca'])) ? $_POST['marca'] : null;
        $serie = (isset($_POST['serie'])) ? $_POST['serie'] : null;
        $modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : null;
        $cpu->setMarca($marca);
        $cpu->setSerie($serie);
        $cpu->setModelo($modelo);
        $cpu->guardar();
        header('Location: index.php');
    }else{
        include 'vistas/guardar_cpu.php';
    }
    
?>
