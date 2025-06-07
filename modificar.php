<?php
    include 'conexion.php';

    if( ( isset($_POST['Modificar'])) ){
        

        extract($_POST);

        $sql = "update seg_usuarios set nombre ='$nombre', 
                                        apellido = '$apellido',
                                        usuario = '$usuario',
                                        perfil = '$perfil'
                                        where id = '$id'";
                                    

    $result = mysqli_query($conexion,$sql);
    
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-abm.css">
    <title>Modificar usuario</title>
</head>
<body>

    <header>
        <nav>
            <!--<a href="index.php">Index</a>-->
        </nav>
        <?php
            $id = $_REQUEST["id"];
            $sql = "select * from seg_usuarios where id='$id'";
            $result = mysqli_query($conexion,$sql);
            $row = mysqli_fetch_array($result);

        ?>  
    </header>

        <main>

            <section class="contenido">
                <h1>Modificar usuario</h1>
            <?php
            
            if( ( isset($_POST['Modificar'])) ){
                echo "<p class='success-msg'>Operación exitosa: el usuario " . $row["usuario"] . " fue modificado correctamente</p>";

            }

            ?>
                    <div class="user-datos">
                        <p>Acá vas a poder modificar un usuario existente.</p><br>
                        <p>Para volver al menu principal, haz click en <a class="link-main" href="index.php">Volver</a></p>
                    </div>
                    <div class="form-alta">
                        <form action="modificar.php" method="post" enctype="multipart/form-data" name="form-modificar-usuario">
                            <br>
                            <input name="id" type="hidden"  value="<?php echo $row["id"] ?>" >
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $row["nombre"] ?>" aria-label="Nombre" required>
                            <br><br>
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" value = "<?php echo $row["apellido"] ?>" required>
                            <br><br>
                            <label for="usuario">Usuario</label>
                            <input type="email" disabled="disabled" name="usuario" id="usuario" value = "<?php echo $row["usuario"] ?>" required>
                            <br><br>
                        <!-- <label for="clave">Password</label>
                            <input type="password" name="clave" id="clave" required>
                            <br><br> -->
                            <label for="perfil">Perfil</label>
                            <select name="perfil" id="perfil" >
                                    
                                    <?php
                            $sqlperfil = "select * from perfiles order by perfil asc";
                            $resultperfil=mysqli_query($conexion, $sqlperfil);
                            while ($rowperfil = mysqli_fetch_array($resultperfil)) {
                            if  ($rowperfil['id_perfil'] == $row['perfil']) {
                            ?>
                                    <option value="<?php echo $rowperfil['id_perfil']; ?>" selected="selected"><?php echo $rowperfil['perfil']; ?></option>
                                    <?php }else{ ?>
                                    <option value="<?php echo $rowperfil['id_perfil']; ?>" ><?php echo $rowperfil['perfil']; ?></option>
                                    <?php } } ?>
                                    </select>
                            

                            <br><br>


                            <div class="buttons">
                                <button class="btn" type="submit" name="Modificar" >Modificar</button>
                                <button class="btn" type="reset">Limpiar</button>
                            </div>
                        
                        </form>



                    </div>

            </section>
        </main>

</body>
</html>