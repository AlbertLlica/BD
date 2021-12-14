<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Guardar cpu </title>
    </head>
    <body>
        <h1> Guardar cpu </h1>
        <form method="post" action="guardar_cpu.php">
            <label for="marca"> Marca </label>
            <br />
            <input type="text" name="marca" id="marca" value="<?php echo $cpu->getMarca() ?>" required />
            <br />
            <label for="serie"> Serie </label>
            <br />
            <input type="text" name="serie" id="serie" value="<?php echo $cpu->getSerie() ?>" required />
            <br />
            <label for="modelo"> Modelo </label>
            <br />
            <input type="text" name="modelo" id="modelo" value="<?php echo $cpu->getModelo() ?>" required />
            <br />            
            <?php if ($cpu->getId()): ?>
                <input type="hidden" name="cpu_id" value="<?php echo $cpu->getId() ?>" />
            <?php endif; ?>
            <input type="submit" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
    </body>
</html>