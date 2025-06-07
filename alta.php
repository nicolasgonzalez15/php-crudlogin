<?php

include "conexion.php";


if((isset($_POST['Alta']))){

    extract($_POST);
    
    $sqlMailExists = "SELECT * FROM seg_usuarios WHERE usuario='$usuario'";
    $resMail = mysqli_query($conexion,$sqlMailExists);

    if(mysqli_num_rows($resMail)>0){
        $row = mysqli_fetch_assoc($resMail);
        if($usuario==isset($row['usuario'])){
            echo "Usuario ya existente";
            $error_message = "Correo ya existente. Por favor, ingrese nuevamante los datos.";
            header("Location: alta.php?error=" . urlencode($error_message)); // Redirigir con el mensaje
        }
    }else{
        echo "Se puede insertar registro.";
        $passwd = md5($clave);

        $sql = "INSERT INTO seg_usuarios (nombre,apellido,usuario,clave,perfil) 
                VALUES ('$nombre','$apellido','$usuario','$passwd','$perfil')";
    
        $result=mysqli_query($conexion,$sql);
        $successMsg="Usuario creado correctamente.";
        header("Location: alta.php?success=" . urlencode($successMsg)); // Redirigir con el mensaje
    }


    /*
    $passwd = md5($clave);

    $sql = "INSERT INTO seg_usuarios (nombre,apellido,usuario,clave,perfil) 
            VALUES ('$nombre','$apellido','$usuario','$passwd','$perfil')";

    $result=mysqli_query($conexion,$sql);
    */
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-abm.css">
    <title>Alta de usuario</title>
</head>
<body>
    <header>
        <nav>
            
        </nav>
    </header>
    <main>
    <?php



            /*if( ( isset($_POST['Alta'])) ){
                echo "Alta de usuario exitosa";
            }
            if (isset($_GET["error"])) {
                echo "<p class='error-msg'>Error: " . htmlspecialchars(urldecode($_GET["error"])) . "</p>";

              }*/

            ?>
        <section class="contenido">
            <h1>Alta de usuario</h1>
            <?php

                            if (isset($_GET["success"])) {
                                echo "<p class='success-msg'>Operación exitosa: " . htmlspecialchars(urldecode($_GET["success"])) . "</p>";

                            }

                            if (isset($_GET["error"])) {
                                echo "<p class='error-msg'>Error: " . htmlspecialchars(urldecode($_GET["error"])) . "</p>";
                
                              }

            ?>
            <div class="user-datos">
                <p>Acá vas a poder dar de alta un nuevo usuario.</p><br>
                <p>Para volver al menu principal, haz click en <a class="link-main" href="index.php">Volver</a></p>
            </div>
        
        <div class="form-alta">
            <form action="alta.php" method="post" enctype="multipart/form-data" name="form-alta-usuario">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" aria-label="nombre" placeholder="Nombre" required>
                
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                
                <label for="usuario">Usuario</label>
                <input type="email" name="usuario" id="usuario" placeholder="Ej: mail@dominio.com" required>
               
                <label for="perfil">Perfil</label>
                <select name="perfil" id="perfil">
                <?php
                    $sqlperfil = "select * from perfiles order by perfil asc";
                    $resultperfil = mysqli_query($conexion,$sqlperfil);

                    while($rowperfil = mysqli_fetch_array($resultperfil)){
                    ?>
                        <option value="<?php echo $rowperfil['id_perfil'] ?>"><?php echo $rowperfil['perfil'] ?></option>

                <?php  }  ?>

                </select>
                
                <label for="clave">Password</label>
                <input type="password" name="clave" id="clave" placeholder="Ej: clave123" required>
                
                <div class="buttons">
                    <button class="btn" type="submit" name="Alta" >Enviar</button>
                    <button class="btn" type="reset">Limpiar</button>
                </div>
            
            </form>

        </div>
        </section>
        <a href="index.php">Volver</a>
    </main>
</body>
</html>