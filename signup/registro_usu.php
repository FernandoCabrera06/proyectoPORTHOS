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

<!doctype html>
<html>
    
    <head>
    

    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/comprobar_pass.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/styles/registro_usu.css">
        <title>Añadir usuario</title>
    </head>
    
    <body>
    <body>

<h2 style="text-align:center">Añadir usuario</h2>
<br><br>
<div class="container">
<div class="row">
<form  class="form-horizontal" action="signup_usu.php" method="POST"  autocomplete="off">

  <div class="form-group">
  <label for="nombre" style="text-align:left" class="col-xs-2 col-sm-offset-2">Nombre</label>
  <div class="col-xs-5">
  <input name="username" type="text"  class="form-control" placeholder="ingrese nombre" oninvalid="setCustomValidity('El campo nombre es obligatorio')"  oninput="setCustomValidity('')" required/>
  </div>
  </div>

  <div class="form-group">
  <label for="dni" style="text-align:left" class="col-xs-2 col-sm-offset-2">Nº de DNI</label>
  <div class="col-xs-5">
  <input name="dni" type="text"  class="form-control" placeholder="ingrese DNI" oninvalid="setCustomValidity('El campo DNI es obligatorio')"  oninput="setCustomValidity('')" required/>
  </div>
  </div>

  <div class="form-group">
  <label for="cargo" style="text-align:left" class="col-xs-2 col-sm-offset-2">Cargo</label>
  <div class="col-xs-5">
   <select name="cargo" class="form-control" required>
   <option value="">Elija una opción...</option>
	<option value="1">Asistente</option> 
	<option value="2">Operador</option> 
    <option value="3">Supervisor</option>
	<option value="4">Ingeniero</option>  
	<option value="5">Otros</option>  

   </select>
    </div>
    </div>


  <div class="form-group">
  <label for="sso" style="text-align:left" class="col-xs-2 col-sm-offset-2">Nº de SSO</label>
  <div class="col-xs-5">
  <input name="sso" type="varchar"  class="form-control" placeholder="ingrese N° de SSO">
  </div>
  </div>

  <div class="form-group">
  <label for="num_tel" style="text-align:left" class="col-xs-2 col-sm-offset-2">Nº de teléfono</label>
  <div class="col-xs-5">
  <input name="num_tel" type="varchar"  class="form-control" placeholder="ingrese N° de teléfono">
  </div>
  </div>

  <div class="form-group">
  <label for="rol" style="text-align:left" class="col-xs-2 col-sm-offset-2">Nivel de seguridad</label>
  <div class="col-xs-5">
   <select name="rol" class="form-control" required>
   <option value="">Elija una opción...</option>
   <option value="1">Observador</option> 
   <option value="2">Usuario Operador</option> 
   <option value="3">Usuario Avanzado</option>
   <option value="4">Administrador</option>  
   </select>
</div>
</div>

  <div class="form-group">
  <label for="password" style="text-align:left" class="col-xs-2 col-sm-offset-2">Contraseña</label>
  <div class="col-xs-5">
  <input name="password" type="password" class="form-control" placeholder="ingrese contraseña" oninvalid="setCustomValidity('El campo contraseña es obligatorio')" oninput="setCustomValidity('')" required/>
  </div>
  </div>

  <div class="form-group">
  <label for="confirm_password" style="text-align:left" class="col-xs-2 col-sm-offset-2">Confirmar contraseña</label>
  <div class="col-xs-5">
  <input name="confirm_password" type="password" class="form-control" placeholder="confirmar contraseña" oninvalid="setCustomValidity('Confirmar contraseña es obligatorio')" oninput="setCustomValidity('')" required/>
  </div>
  <div id="resultado" class="col-xs-5"></div>
  </div>
  <br>
  <div style="text-align:center">
  <a href="../menu_nav/crud_usuarios/admin_crud_usu.php" class="btn btn-default">Regresar</a>
  <input type="submit" class="btn btn-primary" value="Crear Usuario">
  </div>
  </div>
  </div>

  
</form>

</body>
    </body>
    
</html>