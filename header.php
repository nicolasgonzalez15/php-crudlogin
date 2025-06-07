<?php
session_name('back');
  session_start();

  if(!isset($_SESSION['is_logged'])) {
    $_SESSION['is_logged'] = 'PHPSESSID';
    $_SESSION['is_logged'] == 0;
} 

if  ($_SESSION['is_logged']==0) {
    header('location: login.php?mensaje=Se ha desconectado del sistema');
}

include 'conexion.php';

?>