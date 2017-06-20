<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "indexParticipante"){
	indexParticipante($twig, $conexion);

}elseif($_POST['metodo'] == "createParticipante"){
	createParticipante($twig, $conexion);

}elseif($_POST['metodo'] == "editParticipante"){	
	editParticipante($twig, $conexion, $_POST['id']);
	
}elseif($_POST['metodo'] == "storeParticipante"){	
	editParticipante($twig, $conexion, $_POST['nom'], $_POST['dc'], $_POST['persona'], $_POST['email'], $_POST['direccion'], $_POST['telefono']);

}else{
    header('location:../../index.php');
}




///////////////////////vistas procesos/////////////////////////////


function indexParticipante($twig, $conexion)
	{
		$procesos = null;
		$sql = "SELECT * FROM datos";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
				{
					$participantes[] = $datos;
				}

		echo $twig->render('layouts/secretaria/participantes/index.twig', compact('participantes'));
	
	}


function createParticipante($twig, $conexion)
{
		echo $twig->render('layouts/secretaria/participantes/create.twig');
}

function editProceso($twig, $conexion, $id)
{
		$sql = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE id_proceso = $id AND tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		$proceso = $consulta->fetch_object();

		echo $twig->render('layouts/secretaria/procesos/edit.twig', compact('proceso'));
}



//////////////////////crud procesos///////////////////////////////////

function editParticipante($twig, $conexion, $nom, $dc, $persona, $email, $direccion, $telefono)
{
	$sql = "INSERT INTO datos (nom_datos, num_dc, email, direccion, telefono, tipo_persona) VALUES('$nom', $dc, '$email', '$direccion', '$telefono', '$persona')";
	$ingresar = $conexion->query($sql);

	if($ingresar)
	{
		$clase = "text-success";
		$respuesta = "participante creado correctamente";
	}else{
		$clase = "text-danger";
		$respuesta = "error al crear el participante ";
	}
	$pagina = "cargarCreateParticipante();";

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));

}


	




?>
