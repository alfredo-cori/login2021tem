<?php
    session_start(); // crea una sesion 
    unset($_SESSION["s_usuario"]); // elimina las varibales de sesión
    unset($_SESSION["s_idRol"]);
    unset($_SESSION["s_rol_descripcion"]);
    session_destroy(); // destruye toda la información asociada con la sesion actual
    header("Location: ../index.php");
?>
