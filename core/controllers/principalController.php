<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "buscar"){
	buscar($twig, $conexion, $_POST['datos']);
}


	function buscar($twig, $conexion, $datos)
	{
		$results = null;
		$sql = "SELECT a.*, d.nom_tipo_proceso 
				FROM procesos a, datos b, relaciones_procesos c, tipo_procesos d 
				WHERE num_expediente LIKE '$datos' AND a.num_expediente = c.expediente AND c.id_datos = b.id_datos AND  d.id_tipo_proceso = a.id_tipo_proceso AND cargo LIKE 'DEMANDANTE' 
				|| num_dc LIKE '$datos' AND a.num_expediente = c.expediente AND c.id_datos = b.id_datos AND  d.id_tipo_proceso = a.id_tipo_proceso AND cargo LIKE 'DEMAN%' 
				|| nom_datos LIKE '$datos' AND a.num_expediente = c.expediente AND c.id_datos = b.id_datos AND  d.id_tipo_proceso = a.id_tipo_proceso AND cargo LIKE 'DEMAN%'";
		$consulta = $conexion->query($sql);
		
			while($data = $consulta->fetch_object())
			{		
							$procesos[] = $data;
							$id = $data->num_expediente;
							$demandantes[] = demandanteProceso($conexion, $id );
							$demandados[] = demandadoProceso($conexion, $id );
			}
			


		if($consulta->num_rows > 0){
				
			echo $twig->render('layouts/principal/buscar.twig', compact('procesos', 'demandantes', 'demandados'));
		}else{
			echo '<center><h3>Nose encontro ningun registro con el dato:'.$datos.'</h3></center>';
		}

		

	}




	/////////////////////function internas//////////////////////////
	function demandanteProceso( $conexion, $id)
	{
		$sql = "SELECT datos.nom_datos, datos.num_dc, relaciones_procesos.expediente  
				FROM relaciones_procesos, datos 
				WHERE expediente = '$id' 
				AND cargo = 'demandante' 
				AND datos.id_datos = relaciones_procesos.id_datos";
		$consulta = $conexion->query($sql);
		return $datos = $consulta->fetch_object();
	}


	function demandadoProceso( $conexion, $id)
	{
		$sql = "SELECT datos.nom_datos, datos.num_dc, relaciones_procesos.expediente  
				FROM relaciones_procesos, datos 
				WHERE expediente = '$id' AND cargo = 'demandado' 
				AND datos.id_datos = relaciones_procesos.id_datos";
		$consulta = $conexion->query($sql);
		return $datos = $consulta->fetch_object();
	}




?>


