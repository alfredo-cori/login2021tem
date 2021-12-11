<?php 
    // habilitar para usar las variables de sesión
    session_start();

    if ($_SESSION["s_usuario"] === null){
        // no hay sesión iniciada
        header("Location: ../index.php");
    }else{
        // variables de sesion s_idRol, 1=administrador, 2=data entry
        if($_SESSION["s_idRol"]!=1){
            // si, es distinto de 1
            header("Location: pag_error.php");
        }
        // no, no es distinto de 1
    }
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/sweet_alert2/sweetalert2.min.css">
    
    <link rel="stylesheet" href="../styles.css">
    <title>Página Principal</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="paquete">
            <div class="jumbotron">
            <h1 class="display-8 text-center">Página Principal del Sistema</h1>
            <h1 class="display-4 text-center">¡Bienvenido!</h1>
            <h2 class="text-center">Usuario: <span class="badge badge-success"><?php echo $_SESSION["s_usuario"];?></span></h2> 
            <h2 class="text-center">Su permiso es: <span class="badge badge-warning"><?php echo $_SESSION["s_rol_descripcion"];?></span></h2>  
            <!--<p class="lead text-center">Esta es la página de inicio, luego de un LOGIN correcto.</p>-->
            <p class="lead text-center">Usted tiene todo el permiso como administrador</p>
            <hr class="my-4">   
                     
            <a class="btn btn-danger btn-lg" href="../bd/logout.php" role="button">Cerrar Sesión</a>
            </div>
            </div>
            </div>
        </div>
    </div>    

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../plugins/sweet_alert2/sweetalert2.all.min.js"></script>
<script src="../codigo.js"></script>
</body>
</html>