<?php
include 'conexion.php';

$error = "username/password incorrect";

if(isset($_POST['Login'])){
    //include 'conexion.php';
    
    $u = $_POST['usuario'];
    $p = md5($_POST['clave']);


    $sql = "select * from seg_usuarios where usuario ='".$u."' and clave='".$p."' and activo='1'";
    $result = mysqli_query($conexion,$sql);
    $rstlogin = mysqli_fetch_array($result);

    if ($rstlogin){
        session_name('back');
        session_start();
        $_SESSION['Usuario'] = $rstlogin['usuario'];
        $_SESSION['IDUsuario'] = $rstlogin['id'];
        $_SESSION['Nombre'] = $rstlogin['nombre'];
        $_SESSION['is_logged'] = 1;
        
    header('location: index.php');
    exit();
    } else {
        $_SESSION['error']= $error;
        $_SESSION['errorMessage'] = true;
        $error_message = "Nombre de usuario o contraseña incorrectos. Ingresar nuevamente.";
        header("Location: login.php?error=" . urlencode($error_message)); // Redirigir con el mensaje
        //header('location: login.php?mensaje=Usuario o Password Incorrectos');
        
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <nav>
            <!--<div>Formulario de Login</div>-->
        </nav>
    </header>
    <main>
        <section class="contenido">
            <h1>Login de usuario</h1>
            <?php
             /*  if ($_SESSION['errorMessage']){
                    echo $_SESSION['error'];
                    echo "User o pass incorrectos. Por favor, vuelva a ingresarlos";
                }*/
                if (isset($_GET["error"])) {
                    echo "<p class='error-msg'>Error: " . htmlspecialchars(urldecode($_GET["error"])) . "</p>";

                  }
            ?>

            <div class="contacto">
                

            
    
            <form action="login.php" method="post" name="contact_form">

            <label for="nombreorador">Usuario (email)</label>
            <br>
            <input type="email" name="usuario" id="nombreorador" placeholder="Ej: user@mail.com" aria-label="Nombre" required><br>
            <label for="passorador">Password</label>
            <br>
            <input type="password" name="clave" id="passorador" placeholder="Contraseña" aria-label="Contraseña" required><br>
            <button type="submit" name="Login" class="btn">Ingresar</button>

            </form>
            

            </div>
            <!--<a class="link-index" href="index.php">Volver a Index</a>-->
        </section>
    </main>
    <footer id="footer" class="footer">
        <div id="footer-container">
            <p>© 2025 NINODEV · Desarrollado por Nicolás González </p>
        </div>
    </footer>
</body>
</html>