<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-index.css">
    <title>Datos de usuarios</title>
</head>
<body>
    <section class="contenido">
    <h1>Portal de usuarios</h1>
    <div class="user-datos">

        <p>Hola <b><?php echo $_SESSION['Nombre'] ?></b>, ya estas logueado en el sistema.
        Tu correo electrónico es: <b><?php echo $_SESSION['Usuario'] ?></b>.</p><br>


        <?php
           /* echo "La variable de sesión es:" .session_id();
            echo '<br>';
            print_r($_SESSION);
            echo $nombre;*/
        ?>
            <p>Para salir del sistema, haz click en <a class="link-logout" href="logout.php">Salir</a></p>
            
    </div>
    </section>
    

    <section class="datos-usuarios">
        <h2>Usuarios registrados</h2>
        <p>Detalle de usuarios registrados en el sistema.</p>
        <a class="btn-nuevo" href="alta.php">Crear nuevo usuario</a><br>
   
    <div class="tabla-usuarios">
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Modificar</th>
            <th>Borrar</th>
        </tr>
        <tr>
    
            <?php

                $sql = "select u.id,u.nombre,u.apellido,u.usuario,p.perfil FROM seg_usuarios u
                         join perfiles p
                         on u.perfil=p.id_perfil
                         where u.activo='1'";

                $result = mysqli_query($conexion,$sql);

                while($row = mysqli_fetch_array($result)){

                    /* 
                    
                    $idperfil = $row['perfil'];
                    $sqlperfil = "select * from perfiles
                                    where id_perfil = '$idperfil' ";
                    

                    $resultperfil = mysqli_query($conexion,$sqlperfil);
                    $rowperfil = mysqli_fetch_array($resultperfil);
                    
                    #reemplazar en vez de $row["perfil]
                                          $rowperfil["perfil"]
                    */
            ?>        

            <tr>
                    <td><?php echo $row["nombre"] ?></td>
                    <td><?php echo $row["apellido"] ?></td>
                    <td><?php echo $row["usuario"] ?></td>
                    <td><?php echo $row["perfil"] ?></td>
                    <td><a href="modificar.php?id=<?php echo $row["id"] ?>">Modificar</a></td>
                    <td>
                        <a href="borrar.php?id=<?php echo $row["id"]?>" onClick="return confirm('¿Desea borrar este usuario?')">Borrar</a>
                    </td>
 
            </tr>

            <?php } 
            ?>
                


        
        </tr>
    </table>
    </div>
    
    </section>

</body>
</html>