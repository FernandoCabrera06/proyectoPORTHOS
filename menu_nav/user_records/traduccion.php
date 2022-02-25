<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

if($fila['l_ini']== 'Monday'){
    $l_dia = 'Lunes';
}else{
    if($fila['l_ini']== 'Tuesday'){
        $l_dia = 'Martes';
}else{
    if($fila['l_ini']== 'Wednesday'){
            $l_dia = 'Miércoles';
}else{
    if($fila['l_ini']== 'Thursday'){
                $l_dia = 'Jueves';
 }else{
if($fila['l_ini']== 'Friday'){
  $l_dia = 'Viernes';
}else{
    if($fila['l_ini']== 'Saturday'){
                $l_dia = 'Sábado';
}else{
if($fila['l_ini']== 'Sunday'){
 $l_dia = 'Domingo';
                }}}}}}}                     

if($fila['f_ini']== 'January'){
    $f_mes = 'Enero';
}else{
    if($fila['f_ini']== 'February'){
        $f_mes = 'Febrero';
}else{
    if($fila['f_ini']== 'March'){
            $f_mes = 'Marzo';
}else{
    if($fila['f_ini']== 'April'){
                $f_mes = 'Abril';
}else{
if($fila['f_ini']== 'May'){
$f_mes = 'Mayo';
}else{
    if($fila['f_ini']== 'June'){
                $f_mes = 'Junio';
}else{
if($fila['f_ini']== 'July'){
$f_mes = 'Julio';
}else{
    if($fila['f_ini']== 'August'){
        $f_mes = 'Agosto';
}else{
    if($fila['f_ini']== 'September'){
            $f_mes = 'Septiembre';
}else{
    if($fila['f_ini']== 'October'){
                $f_mes = 'Octubre';
}else{
if($fila['f_ini']== 'November'){
         $f_mes = 'Noviembre';
}else{
    if($fila['f_ini']== 'December'){
                $f_mes = 'Diciembre';
}}}}}}}}}}}}
?>