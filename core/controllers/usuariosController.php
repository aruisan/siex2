<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "index"){
	buscarProceso($twig, $conexion, $_POST['id']);
}


	function buscarProceso($twig, $conexion, $datos)
	{
		$sql = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE id_proceso = '$datos' AND tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso";
		$consulta = $conexion->query($sql);


		$proceso = $consulta->fetch_object();
		$documentos = buscarDocumentos($conexion, $proceso->id_proceso);

		echo $twig->render('layouts/usuarios/index.twig', compact('proceso', 'documentos'));

		

	}

	function buscarDocumentos($conexion, $id)
	{
		$results = null;
		$sql = "SELECT * FROM documento WHERE id_proceso = $id";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
		{
			$results[] = $datos;
		}
		return $results;
	}



?>
