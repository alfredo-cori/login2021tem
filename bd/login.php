<?php

// para utlizar variables de sesion debemos utlizar la funcion session_start()
// con esto iniciamos la sesion entre el usuario y el servidor 
session_start();

include_once 'conexion.php'; //ubicacion del archivo de conexión
$objeto = new Conexion(); //creamos un objeto o instancia
$conexion = $objeto->Conectar(); //creamos la variable conexión para usar

// verificar si hay conexion exitosa 
//print_r($conexion);

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : ''; // recibiendo usuario
$password = (isset($_POST['password'])) ? $_POST['password'] : ''; // recibiendo password

// md5, encripta la clave enviada por el usuario que luego para compararla
// con  la clave que tambien va estar incriptada y almacenada en la BD 
$pass = md5($password); 

// sentencia SELECT y sentencia SQL JOIN
$consulta = "SELECT usuarios.idRol AS idRol, roles.descripcion AS rol 
FROM usuarios JOIN roles ON usuarios.idRol = roles.id 
WHERE usuario='$usuario' AND password='$pass' ";

$resultado = $conexion->prepare($consulta);// prepara la consulta
$resultado->execute(); // ejecuta el resultado 

if($resultado->rowCount() >= 1){ 
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC); // devuelve un array que contiene todas las filas restantes del conjunto de resultados
    // creando variables de sesión    
    $_SESSION["s_usuario"] = $usuario;    
    $_SESSION["s_idRol"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcion"] = $data[0]["rol"];
}else{
    $_SESSION["s_usuario"] = null; // caso contrario le damos null
    $data = null;
}

print json_encode($data);//envio el array final el formato json a AJAX
$conexion=null; //cerrando la conexión a la BD