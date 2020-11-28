<?php

ini_set('date.timezone', 'America/El_Salvador');
//hora atual
$hora = date('H:i:s', time());
//fecha actual
$fechaActual = date('Y-m-d', time());
//fecha y hora de la adquisicion
$fechaInicio = $fechaActual . " " . $hora;
//fecha y hora dentro de una semana
$fechaEntrega = date('Y-m-d', strtotime($fechaActual . "+ 1 week")) . " ". $hora;


?>