<?php

	//$conexion = new mysqli('localhost', 'aruisan', 'oskr1987', 'siex');
	$conexion = new mysqli('localhost', 'root', '', 'siex');
	$acentos = $conexion->query("SET NAMES 'utf8'");
		if ($conexion->connect_error){

			die('Error en la conexion'.$conexion->connect_error);
		}

?>