<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Guardar curso </title>
    </head>
    <body>
        <h1> Guardar curso </h1>
        <form method="post" action="guardar_curso.php">
            <label for="nombre"> Nombre </label>
            <br />
            <input type="text" name="nombre" id="nombre" value="<?php echo $curso->getNombre() ?>" required />
            <br />
            <label for="creditos"> Creditos </label>
            <br />
            <input type="text" name="creditos" id="creditos" value="<?php echo $curso->getCreditos() ?>" required />
            <br />
            <label for="depa_id"> Depa_id </label>
            <br />
            <input type="text" name="depa_id" id="depa_id" value="<?php echo $curso->getDepa_id() ?>" required />
            <br />            
            <?php if ($curso->getCurso_id()): ?>
                <input type="hidden" name="curso_id" value="<?php echo $curso->getCurso_id() ?>" />
            <?php endif; ?>
            <input type="submit" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
    </body>
</html>