<?php if (!defined('CONTROLADOR')) exit; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Guardar Curso Prerequisito </title>
    </head>
    <body>
        <h1> Guardar Curso Prerequisito </h1>
        <form method="post" action="guardar_pre_req.php">
            <label for="curso_id_2"> Prereqid </label>
            <br />
            <input type="int" name="curso_id_2" id="curso_id_2" value="<?php echo $pre_req->getCurso_2_ID() ?>" required />
            <br />
            <?php if ($pre_req->getCurso_1_ID()): ?>
                <input type="hidden" name="id" value="<?php echo $pre_req->getCurso_1_ID() ?>" />
            <?php endif; ?>
            <input type="submit" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
    </body>
</html>