<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: ../in_out/login.php');
            
        }
    }
?>

<!doctype html>
<html>
    
    <head>
    
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/comprobar_pozo.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/styles/registro_poz.css">
        <title>Añadir pozo</title>
    </head>
    
    <body>
    <body>

<h2 style="text-align:center">Añadir pozo</h2>
<br><br>
<div class="container">
<div class="row">
<form class="form-horizontal" action="signup_poz_3.php" method="POST" autocomplete="off">

<div class="form-group">
<label for="nombre" style="text-align:left"  class="col-xs-2 col-sm-offset-2">Nombre de pozo</label>
<div class="col-xs-5" id="resul"> 
<input name="nombre" class="form-control" id="usuario" type="text" placeholder="ingrese nombre de pozo" oninvalid="setCustomValidity('El campo nombre es obligatorio')"  oninput="setCustomValidity('')" required/>
</div>
<div id="resultado" class="col-xs-5"></div>
  </div> 



  <div class="form-group">
  <label for="ip" style="text-align:left"  class="col-xs-2 col-sm-offset-2">N° de IP</label>
  <div class="col-xs-5">
  <input name="ip" class="form-control" type="text" placeholder="ingrese N° de IP" oninvalid="setCustomValidity('El campo IP es obligatorio')"  oninput="setCustomValidity('')" required/>
  </div>
  </div>
  <div class="form-group">
  <label for="net_mask" style="text-align:left"  class="col-xs-2 col-sm-offset-2">Máscara de subred</label>
  <div class="col-xs-5">
  <input name="net_mask" class="form-control" type="text" placeholder="ingrese N° máscara de subred">
  </div>
  </div>
  <div class="form-group">
  <label for="gw" style="text-align:left"  class="col-xs-2 col-sm-offset-2">N° de puerta de enlace</label>
  <div class="col-xs-5">
  <input name="gw" type="text" class="form-control" placeholder="ingrese N° de puerta de enlace">
  </div>
  </div>
  <div class="form-group">
  <label for="prod_est" style="text-align:left"  class="col-xs-2 col-sm-offset-2">Producción estimada</label>
  <div class="col-xs-5">
  <input name="prod_est" type="text" class="form-control" placeholder="ingrese producción estimada del pozo">
  </div>
  </div>
  <br>
  <div style="text-align:center">
  <a href="../menu_nav_3/crud_pozos/admin_crud_poz.php" class="btn btn-default">Regresar</a>
  <input type="submit" class="btn btn-primary" value="Agregar pozo">
  </div>
  </div>
  </div>
</form>

</body>
    </body>
    
</html>