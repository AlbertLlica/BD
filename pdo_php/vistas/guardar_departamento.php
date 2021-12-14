<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Guardar departamento </title>
    </head>
    <body>
        <h1> Guardar departameto </h1>
        <form method="post" action="guardar_departamento.php">
            <label for="nombre"> Nombre </label>
            <br />
            <input type="text" name="nombre" id="nombre" value="<?php echo $departamento->getNombre() ?>" required />
            <br />
            <?php if ($departamento->getDepa_id()): ?>
                <input type="hidden" name="departamento_id" value="<?php echo $departamento->getDepa_id() ?>" />
            <?php endif; ?>
            <input type="submit" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
    </body>
</html>