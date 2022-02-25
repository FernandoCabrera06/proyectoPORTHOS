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
		$cargo = "";

    $query = "SELECT * FROM usuarios WHERE username NOT LIKE '' ORDER By rol_id, username";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM usuarios WHERE username LIKE '%$q%' OR sso LIKE '%$q%' OR dni LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {

		
			$salida.="
			<div class='row table-responsive'>
			<table class='table table-fixed table-striped'>
    			<thead>
    				<tr id='titulo'>
    				<th><div class='size_nom_th'>Nombre</th>
							<th><div class='size_dni_th'>Nº DNI</th>
							<th><div class='size_cargo_th'>Cargo</th>
							<th><div class='size_sso_th'>Nº SSO</th>
							<th><div class='size_tel_th'>Nº Teléfono</th>
							<th><div class='size_rol_th'>Nivel de seguridad</th>
							<th><div class='size_edit_th'>Editar</th>
							<th><div class='size_elim_th'>Eliminar</th>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
				
				if($fila['rol_id']== 1){
					$rol= 'Observador';
				}else{
					if($fila['rol_id']== 2){
						$rol= 'Usuario Operador';
				}else{
					if($fila['rol_id']== 3){
						$rol= 'Usuario Avanzado';
				}else{
					if($fila['rol_id']== 4){
						$rol= 'Administrador';
				}}}}

				if($fila['cargo']== 1){
					$cargo= 'Asistente';
				}else{
					if($fila['cargo']== 2){
						$cargo= 'Operador';
				}else{
					if($fila['cargo']== 3){
						$cargo= 'Supervisor';
				}else{
					if($fila['cargo']== 4){
						$cargo= 'Ingeniero';
				}else{
					if($fila['cargo']== 5){
						$cargo= 'Otros';
					}}}}}
				$salida.=
				"<tr>
    					<td><div class='size_nom_td'>".$fila['username']."</td>
							<td><div class='size_dni_td'>".$fila['dni']."</td>
							<td><div class='size_cargo_td'>".$cargo."</td>
							<td><div class='size_sso_td'>".$fila['sso']."</td>
							<td><div class='size_tel_td'>".$fila['num_tel']."</td>
    					<td><div class='size_rol_td'>".$rol."</td>
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