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
<?php

  include '../db/database.php';

  $message = '';

  if (!empty($_POST['username'])&& !empty($_POST['password'])&& !empty($_POST['rol'])&& !empty($_POST['confirm_password'])) {
	  if(($_POST['password'])==($_POST['confirm_password'])){

    $db = new Database();
    $sql = "INSERT INTO usuarios (username, dni, password, rol_id, cargo, num_tel, sso) VALUES (:username, :dni, :password, :rol, :cargo, :num_tel, :sso)";
    $stmt = $db->connect()->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':dni', $_POST['dni']);

   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':rol', $_POST["rol"]);
    $stmt->bindParam(':sso', $_POST["sso"]);
    $stmt->bindParam(':cargo', $_POST["cargo"]);
    $stmt->bindParam(':num_tel', $_POST["num_tel"]);
    $stmt->execute();
  }
  
}
  
?>


<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../bootstrap/css/styles/signup_usu.css">	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($stmt) { ?>
						<h3>¡Usuario creado con éxito!</h3>
						<?php } else { ?>
						<h3 class="error_crear">Error al crear usuario</h3>
						
					<?php } ?>
					
					<a href="../menu_nav/crud_usuarios/admin_crud_usu.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
