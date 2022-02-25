<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

if($fil['rol_ini']== 1){
    $rol= "<span id='obs_ini'> Observador </span>";
}else{
    if($fil['rol_ini']== 2){
        $rol= 'Usuario Operador';
}else{
    if($fil['rol_ini']== 3){
        $rol= 'Usuario Avanzado';
}else{
    if($fil['rol_ini']== 4){
        $rol= 'Administrador';
}}}}

?>