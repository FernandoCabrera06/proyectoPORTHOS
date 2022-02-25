<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: ../../in_out/login.php');
            
        }
    }
?>
<?php
include_once '../../db/conexion_search.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/favicon.ico">
	<title>Ajustes de pozos</title>

	<link rel="stylesheet" href="../../bootstrap/css/styles/search_aju.css">
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<script src="../../bootstrap/js/jquery-3.1.1.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script
  src="../../bootstrap/js/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="../../bootstrap/js/select2.min.js"></script>
</head>
<body>

<ul class="menu">
<li><a class="IconObs" href="../search_obs/index.php">Observación</a></li>
<li><a class="IconAju" href="#">Ajustes de Pozos</a></li>
<li class="dividir"><a href="../../in_out/logout.php">Cerrar Sesión</a></li>
</ul>

<br><br><br>

<h2>Ajustes de pozos</h2>
<br>
	<section style="text-align: center;">
	
		<select id="controlBuscador" style="width: 35%">
			<?php while ($ver=mysqli_fetch_row($result)) {?>

			<option value="<?php echo $ver[2] ?>">
			
				<?php echo "Nombre de Pozo: ".$ver[1]?>
			</option>
			<div>

			<?php  }?>
		</select>
		<input type="button" class="btn btn-success" value="Conectar" onclick="asing() ">	
	
	</section>


	
	<div class="container" id="alerta" style="background: url(../../icons/alerta.jpg) no-repeat 50% -100%" >
	<img class="jm-loadingpage" src="" id="loading">
	<iframe  id="iframe_con" width="700" height="700" src="" frameborder="0" allowfullscreen></iframe>
	</div>
	
	
</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>
<script>
function asing(){
	var con_ip = (document.getElementById('controlBuscador').options[document.getElementById('controlBuscador').selectedIndex].value);
	document.getElementById('alerta').style = "";
	document.getElementById('iframe_con').src = "http\://"+ con_ip + "/ruiz.html";
	document.getElementById('loading').src = "../../icons/gifs/conectando_pozo222.gif";
	
	$("#loading").show();
$("#iframe_con").load("http\://"+ con_ip + "/ruiz.html", function () {
    $("#loading").hide();
});

	$.ajax({
		type: 'POST',
		url: 'recibe.php',
		data: ('con_ip='+ con_ip),
		success: function(respuesta){}
	})	
}
</script>


</body>
</html>
