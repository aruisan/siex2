<?php

	$conexion = new mysqli('localhost', 'root', '', 'siex');
	$acentos = $conexion->query("SET NAMES 'utf8'");
		if ($conexion->connect_error){

			die('Error en la conexion'.$conexion->connect_error);
		}

		require_once '../.././vendor/autoload.php';
		$loader = new Twig_Loader_Filesystem('../.././views');
		$twig = new Twig_Environment($loader, []);

?>