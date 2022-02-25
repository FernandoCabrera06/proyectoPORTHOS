<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 4){
            header('location: ../../in_out/login.php');
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/favicon.ico">
    <title>Registros de Sesiones</title>
    <link rel="stylesheet" href="../../bootstrap/css/styles/records.css">
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../porthos/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../bootstrap/js/jquery-3.1.1.min.js"></script>
</head>
<body>

<ul class="menu">
<li><a class="IconObs" href="../search_obs/index.php">Observación</a></li>
<li><a class="IconAju" href="../search_aju/index.php">Ajustes de Pozos</a></li>
<li><a class="IconPoz" a href="../crud_pozos/admin_crud_poz.php">Pozos</a></li>
<li><a class="IconUsu" href="../crud_usuarios/admin_crud_usu.php">Usuarios</a></li>
<li><a class="IconSes" href="#">Registro de Sesiones</a></li>
<li class="dividir"><a href="../../in_out/logout.php" >Cerrar Sesión</a></li>
</ul>

<br><br><br>

<h2 style="text-align:center">Registro de Sesiones</h2>

<?php
    
    
	$servername = "localhost";
    $username = "root";
  	$password = "porthos*13100";
  	$dbname = "porthos";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

		$salida = "";
		$rol = "";
		$cargo = "";
        $fech = "";
        $cant = 0;
        $l_dia = "";
        $f_mes = "";

    require 'clean_records.php';
    

    $query = "SELECT * FROM registros WHERE fecha_ini NOT LIKE '' ORDER By id DESC";
   
    $salida.="<div class='centrar'>
    <ul id='tree1'>";
    $resultado = $conn->query($query);

    	while ($fila = $resultado->fetch_assoc()) {
          
				if($fech != $fila['fecha_ini']){

                require 'traduccion.php';

                $fech = $fila['fecha_ini'];
    
    
     $salida.=

                
        "<li>
            $l_dia ".$fila['j_ini']." $f_mes ".$fila['y_ini']."
               
            
            <ul>";

            
              $quer = "SELECT * FROM registros WHERE hora_ini NOT LIKE '' ORDER By hora_ini";
              $resu= $conn->query($quer);
    	        while ($fil = $resu->fetch_assoc()) {
                    if($fech == $fil['fecha_ini']){
                        require 'traduccion_rol.php';
                        $querw = "SELECT * FROM conex WHERE hora_ini_conex NOT LIKE '' ORDER By hora_conex";
                  $resuw= $conn->query($querw);
                  $cant = 0;
                    while ($filw = $resuw->fetch_assoc()) {
                       
                        if($fil['hora_ini'] == $filw['hora_ini_conex']&& $fil['fecha_ini'] == $filw['fecha_ini_conex']){
                            $cant = $cant + 1;
                        }}
                        if($cant == 0){
            $salida.="  
            <li id='ini_sesion'><span id='ini'> Inicio de Sesión: </span> ".$fil['hora_ini']." - $rol - ".$fil['nom_ini']."  <span class='badge badge-danger'> &nbsp&nbsp&nbsp&nbsp$cant&nbsp&nbsp</span></li>";    
           
                        }else{
            $salida.="
            <li id='ini_sesion'><span id='ini'> Inicio de Sesión: </span> ".$fil['hora_ini']." - $rol - ".$fil['nom_ini']." <span class='badge'> &nbsp&nbsp&nbsp&nbsp$cant&nbsp&nbsp</span>
            
             
        ";
                        }
        
            
            $salida.="  
                  <ul>";
                  
                  $querw = "SELECT * FROM conex WHERE hora_ini_conex NOT LIKE '' ORDER By hora_conex";
                  $resuw= $conn->query($querw);
                    while ($filw = $resuw->fetch_assoc()) {
                        if($fil['hora_ini'] == $filw['hora_ini_conex'] && $fil['fecha_ini'] == $filw['fecha_ini_conex']){

                  $salida.="
                <li id='conexion'><b>Pozo:</b> ".$filw['pozo_conex']."&nbsp <b>IP:</b> ".$filw['ip_conex']."&nbsp <b>Usuario:</b> ".$fila['nom_ini']."&nbsp <b>DNI:</b> ".$fila['dni_ini']."<b>&nbspHora de conexión:</b> ".$filw['hora_conex']."</li>";
                
                
          

                        }}

                $salida.="
                </ul>";
                        }}

                $salida.="
              </li>
              </li>
              
          </ul>
            ";
    
            
          
            }}
             
            $salida.= "</ul></div>";
        
    echo $salida;
    $conn->close();
?>
 <script type="text/javascript">
    $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
     
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
     
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
      
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
       
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

$('#tree1').treed();

$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});

</script>

</body>
</html>