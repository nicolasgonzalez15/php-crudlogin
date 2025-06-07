<?php
    include 'conexion.php';

    $id = $_REQUEST["id"];

    //echo "El usuario ".$rstDeleted["usuario"]." ha sido desactivado del sistema.";
    
    $sql = "update seg_usuarios set activo=0
            where id = '$id'";
    $result = mysqli_query($conexion,$sql);

    /*
    echo "<br>";
    echo "Usuario desactivado ".$id;
    echo "Mail ".$result;
    echo "<br>";
    echo "<a href=index.php>Volver</a>";
    */
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-abm.css">
    <title>Desactivar usuario</title>
</head>
<body>
    <section class="contenido">
        <h1>Desactivar usuario</h1>
        <div class="user-datos">
                <p>El usuario fue desactivado exitosamente.</p></p><br>
                <p>Para volver al menu principal, haz click en <a class="link-main" href="index.php">Volver</a></p>
            </div>
    </section>
    

</body>
</html>