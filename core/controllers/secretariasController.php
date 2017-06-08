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
		$sql = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
				{
					$procesos[] = $datos;
				}

		echo $twig->render('layouts/secretaria/procesos/index.twig', compact('procesos'));
	
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


	





///////////////////////vistas Archivos/////////////////////////////

function indexArchivo($twig, $conexion, $id)
{
		$sql = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE id_proceso = '$id' AND tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso";
		$consulta = $conexion->query($sql);


		$proceso = $consulta->fetch_object();
		$documentos = buscarDocumentos($conexion, $proceso->id_proceso);

		echo $twig->render('layouts/secretaria/archivos/index.twig', compact('proceso', 'documentos'));

}



function createArchivo($twig, $conexion)
{
		echo $twig->render('layouts/secretaria/archivos/create.twig');
}



function editArchivo($twig, $conexion, $id)
{
		$sql = "SELECT * FROM documento WHERE id_documento = $id";
		$consulta = $conexion->query($sql);
		$archivo = $consulta->fetch_object();

		echo $twig->render('layouts/secretaria/archivos/edit.twig', compact('archivo'));

}

//////////////////////crud Archivos///////////////////////////////////
	



/////////////////////function internas//////////////////////////
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
