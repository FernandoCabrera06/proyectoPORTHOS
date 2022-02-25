<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

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

    $query = "SELECT * FROM pozos WHERE nombre NOT LIKE '' ORDER By nombre";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM pozos WHERE nombre LIKE '%$q%' OR ip LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

		
			$salida.="
			<div class='row table-responsive'>
			<table class='table table-striped'>
    			<thead>
    				<tr id='titulo'>
    				<th><div class='size_nom_th'>Nombre</th>
							<th><div class='size_ip_th'>Nº IP</th>
							<th><div class='size_mask_th'>Máscara de subred</th>
							<th><div class='size_gw_th'>Puerta de enlace</th>
							<th><div class='size_prod_th'>Producción estimada ( m³ )</th>
							<th><div class='size_edit_th'>Editar</th>
							<th><div class='size_elim_th'>Eliminar</th>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {

				$salida.=
				"<tr>
    					<td><div class='size'>".$fila['nombre']."</td>
    					<td><div class='size_ip_td'>".$fila['ip']."</td>
							<td><div class='size_mask_td'>".$fila['net_mask']."</td>
    					<td><div class='size_gw_td'>".$fila['gw']."</td>
    					<td><div class='size_prod_td'>".$fila['prod_est']."</td>
						  <td><div class='size_edit_td'><a href='modificar.php?id=".$fila['id']."'><span class='glyphicon glyphicon-pencil'></span></a></td>
							<td><div class='size_elim_td'><a href='#' data-href='eliminar.php?id=".$fila['id']."' data-toggle='modal' data-target='#confirm-delete'><span class='glyphicon glyphicon-trash'></span></a></td>
							</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="¡No se han encontrado resultados para tu búsqueda!";
    }


    echo $salida;

    $conn->close();



?>