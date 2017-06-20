<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "indexProceso"){
	indexProceso($twig, $conexion);

}elseif($_POST['metodo'] == "createProceso"){
	createProceso($twig, $conexion);

}elseif($_POST['metodo'] == "editProceso"){	
	editProceso($twig, $conexion, $_POST['id']);


		}elseif($_POST['metodo'] == "indexArchivo"){
			indexArchivo($twig, $conexion, $_POST['id']);

		}elseif($_POST['metodo'] == "createArchivo"){
			createArchivo($twig, $conexion);

		}elseif($_POST['metodo'] == "editArchivo"){	
			editArchivo($twig, $conexion, $_POST['id']);

				}else{
					header('location:../../index.php');
				}




///////////////////////vistas procesos/////////////////////////////


function indexProceso($twig, $conexion)
	{
		$procesos = null;
		$sql = "SELECT procesos.*, tipo_procesos.nom_tipo_proceso FROM procesos, tipo_procesos WHERE tipo_procesos.id_tipo_proceso = procesos.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
				{
					$procesos[] = $datos;
					$id = $datos->id_proceso;
					$demandantes[] = demandanteProceso($twig, $conexion, $id );
					$demandados[] = demandadoProceso($twig, $conexion, $id );
				}

		/*foreach($procesos as $proceso){
					$id = $proceso->id_proceso;
					$demandantes[] = demandanteProceso($twig, $conexion, $id );
					$demandados[] = demandadoProceso($twig, $conexion, $id );									
		}*/
		
		echo $twig->render('layouts/secretaria/procesos/index.twig', compact('procesos','demandantes', 'demandados'));
	
	}


function createProceso($twig, $conexion)
{
		echo $twig->render('layouts/secretaria/procesos/create.twig');
}

function editProceso($twig, $conexion, $id)
{
		$sql = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE id_proceso = $id AND tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		$proceso = $consulta->fetch_object();

		echo $twig->render('layouts/secretaria/procesos/edit.twig', compact('proceso'));
}



//////////////////////crud procesos///////////////////////////////////



/////////////////////function internas//////////////////////////
	function demandanteProceso($twig, $conexion, $id)
	{
		$sql = "SELECT datos.nom_datos, datos.num_dc, relaciones_procesos.id_proceso  
				FROM relaciones_procesos, datos 
				WHERE id_proceso = $id AND cargo = 'demandante' 
				AND datos.id_datos = relaciones_procesos.id_datos";
		$consulta = $conexion->query($sql);
		return $datos = $consulta->fetch_object();
	}


	function demandadoProceso($twig, $conexion, $id)
	{
		$sql = "SELECT datos.nom_datos, datos.num_dc, relaciones_procesos.id_proceso  
				FROM relaciones_procesos, datos 
				WHERE id_proceso = $id AND cargo = 'demandado' 
				AND datos.id_datos = relaciones_procesos.id_datos";
		$consulta = $conexion->query($sql);
		return $datos = $consulta->fetch_object();
	}


?>
