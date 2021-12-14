<?php
    
    define('CONTROLADOR', TRUE);
    
    require_once 'modelos/Personaje.php';
    require_once 'modelos/Curso.php';
    require_once 'modelos/Cpu.php';
    require_once 'modelos/Pre_req.php';
    require_once 'modelos/Departamento.php';
    
    $personajes = Personaje::recuperarTodos();
    $cursos = Curso::recuperarTodos();
    $cpus = Cpu::recuperarTodos();
    $pre_reqs = Pre_req::recuperarTodos();
    $departamentos = Departamento::recuperarTodos();
    require_once 'vistas/index.php';
    
?>