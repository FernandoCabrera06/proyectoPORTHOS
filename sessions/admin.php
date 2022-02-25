<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 4){
            header('location: ../in_out/login.php');
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Administrador</title>
    <link rel="stylesheet" href="../bootstrap/css/styles/admin.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>	
</head>
<body>

<ul class="menu">
<li><a class="IconObs" href="../menu_nav/search_obs/index.php">Observación</a></li>
<li><a class="IconAju" href="../menu_nav/search_aju/index.php">Ajustes de Pozos</a></li>
<li><a class="IconPoz" a href="../menu_nav/crud_pozos/admin_crud_poz.php">Pozos</a></li>
<li><a class="IconUsu" href="../menu_nav/crud_usuarios/admin_crud_usu.php">Usuarios</a></li>
<li><a class="IconSes" href="../menu_nav/user_records/records.php">Registro de Sesiones</a></li>
<li class="dividir"><a href="../in_out/logout.php">Cerrar Sesión</a></li>
</ul>

<br><br><br><br><br><br><br><br><br><br>

<h1 class="bienvenida">¡Bienvenido a Porthos <strong><i><?php
echo $_SESSION['username'];
?></i></strong>!</h1>

</body>
</html>