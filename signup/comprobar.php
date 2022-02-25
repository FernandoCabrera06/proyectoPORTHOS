<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            $con = mysqli_connect('localhost','root','porthos*13100','porthos');

            $sql="SELECT * FROM pozos WHERE nombre = '".$b."'";

            $result=mysqli_query($con,$sql);
             
            $contar = mysqli_num_rows($result);
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'>Nombre de pozo disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:red;'>El nombre de pozo ya existe.</span>";
            }
      }     
?>