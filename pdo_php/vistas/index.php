<?php if (!defined('CONTROLADOR')) exit; ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Listar personajes </title>
    </head>
    <body>
        <h1> Personajes </h1>
        <p> <a href="guardar_personaje.php"> Crear nuevo personaje </a> </p>
        <?php if (count($personajes) > 0): ?>
            <ul>
                <?php foreach ($personajes as $item): ?>
                <li> 
                    <p> <?php echo $item['nombre'] . ' - ' . $item['descripcion']; ?>  </p>
                    <p> 
                        <a href="guardar_personaje.php?personaje_id=<?php echo $item['id'] ?>"> Editar </a> 
                        |
                        <a href="eliminar_personaje.php?personaje_id=<?php echo $item['id'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay personajes para mostrar </p>
        <?php endif; ?>


        <h1> Cpus </h1>
        <p> <a href="guardar_cpu.php"> Crear nuevo cpu </a> </p>
        <?php if (count($cpus) > 0): ?>
            <ul>
                <?php foreach ($cpus as $item): ?>
                <li> 
                    <p> <?php echo $item['marca'] . ' - ' . $item['serie'] . ' - ' . $item['modelo']; ?>  </p>
                    <p> 
                        <a href="guardar_cpu.php?cpu_id=<?php echo $item['id'] ?>"> Editar </a> 
                        |
                        <a href="eliminar_cpu.php?cpu_id=<?php echo $item['id'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay cpus para mostrar </p>
        <?php endif; ?>


        <h1> Cursos </h1>
        <p> <a href="guardar_curso.php"> Crear nuevo curso </a> </p>
        <?php if (count($cursos) > 0): ?>
            <ul>
                <?php foreach ($cursos as $item): ?>
                <li> 
                    <p> <?php echo $item['nombre'] . ' - ' . $item['creditos'] . ' - ' . $item['depa_id']; ?>  </p>
                    <p> 
                        <a href="guardar_curso.php?curso_id=<?php echo $item['curso_id'] ?>"> Editar </a> 
                        |
                        <a href="eliminar_curso.php?curso_id=<?php echo $item['curso_id'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay cursos para mostrar </p>
        <?php endif; ?>

        <h1> Curso Prerequisito </h1>
        <p> <a href="guardar_pre_req.php"> Crear nuevo Curso Prerequisito </a> </p>
        <?php if (count($pre_reqs) > 0): ?>
            <ul>
                <?php foreach ($pre_reqs as $item): ?>
                <li> 
                    <p> <?php echo $item['curso_id_2'] ; ?>  </p>
                    <p> 
                        <a href="Guardar_pre_req.php?curso_id_1=<?php echo $item['curso_id_1'] ?>"> Editar </a> 
                        |
                        <a href="Eliminar_pre_req.php?curso_id_1=<?php echo $item['curso_id_1'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay cursos Prerequisitos para mostrar </p>
        <?php endif; ?>


        <h1> Departamento </h1>
        <p> <a href="Guardar_departamento.php"> Crear nuevo departamento </a> </p>
        <?php if (count($departamentos) > 0): ?>
            <ul>
                <?php foreach ($departamentos as $item): ?>
                <li> 
                    <p> <?php echo $item['nombre'] ; ?>  </p>
                    <p> 
                        <a href="Guardar_departamento.php?depa_id=<?php echo $item['depa_id'] ?>"> Editar </a> 
                        |
                        <a href="Eliminar_departamento.php?depa_id=<?php echo $item['depa_id'] ?>"> Eliminar </a> 
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p> No hay departamentos para mostrar </p>
        <?php endif; ?>


    </body>
</html>
