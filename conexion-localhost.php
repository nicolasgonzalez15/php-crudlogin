<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "curso_php";

$conexion = mysqli_connect($servidor,$usuario,$contrasena) or die("No se pudo conectar al servidor.");

$db = mysqli_select_db($conexion,$basededatos) or die("No se pudo conectar a la base de datos");

if($conexion -> connect_errno){
    die("Conexión fallida".$conexion->connect_errno);
} else {
    //echo "Conexión exitosa.";
}

?>