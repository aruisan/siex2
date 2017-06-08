<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "buscar"){
	buscar($twig, $conexion, $_POST['datos']);
}


	function buscar($twig, $conexion, $datos)
	{
		$results = null;
		$sql = "SELECT * FROM proceso WHERE num_proceso LIKE '$datos' || cc_demandante LIKE '$datos' || cc_demandado LIKE '$datos' || demandante LIKE '$datos' || demandado LIKE '$datos'";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
		{
			$results[] = $datos;
		}

			if($consulta->num_rows > 0){
				//$results = json_encode($rows);
				
				echo $twig->render('layouts/principal/buscar.twig', compact('results'));
			}else{
				echo '<center><h3>Nose encontro ningun registro con el dato:'.$datos.'</h3></center>';
			}

		

	}



?>


