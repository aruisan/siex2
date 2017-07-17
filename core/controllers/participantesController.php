<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "indexParticipante"){
	indexParticipante($twig, $conexion);

}elseif($_POST['metodo'] == "createParticipante"){
	createParticipante($twig, $conexion);

}elseif($_POST['metodo'] == "editParticipante"){	
	editParticipante($twig, $conexion, $_POST['id']);
	
}elseif($_POST['metodo'] == "storeParticipante"){	
	storeParticipante($twig, $conexion, $_POST['nom'], $_POST['dc'], $_POST['persona'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $_POST['representante']);
	
}elseif($_POST['metodo'] == "storeParticipanteProceso"){	
	storeParticipanteProceso($twig, $conexion, $_POST['nom'], $_POST['dc'], $_POST['persona'], $_POST['email'], $_POST['direccion'], $_POST['telefono']);

}elseif($_POST['metodo'] == "updateParticipante"){	
	updateParticipante($twig, $conexion, $_POST['nom'], $_POST['dc'], $_POST['persona'], $_POST['email'], $_POST['direccion'], $_POST['telefono'], $_POST['id']);

}elseif($_POST['metodo'] == "indexUsuarioParticipante"){
	indexUsuarioParticipante($twig, $conexion);

}elseif($_POST['metodo'] == "validarDcParticipante"){
	validarDcParticipante($twig, $conexion, $_POST['dc']);

}else{
   
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

function editParticipante($twig, $conexion, $id)
{
		$sql = "SELECT * FROM `datos` WHERE id_datos = $id";
		$consulta = $conexion->query($sql);
		$edit = $consulta->fetch_object();

		echo $twig->render('layouts/secretaria/participantes/edit.twig', compact('edit'));
}



//////////////////////crud procesos///////////////////////////////////

function storeParticipante($twig, $conexion, $nom, $dc, $persona, $email, $direccion, $telefono, $representante)
{
	$sql = "INSERT INTO datos (nom_datos, num_dc, email, direccion, telefono, tipo_persona, representante) VALUES('$nom', $dc, '$email', '$direccion', '$telefono', '$persona', '$representante')";
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

function storeParticipanteProceso($twig, $conexion, $nom, $dc, $persona, $email, $direccion, $telefono)
{
	$sql = "INSERT INTO datos (nom_datos, num_dc, email, direccion, telefono, tipo_persona) 
							VALUES('$nom', $dc, '$email', '$direccion', '$telefono', '$persona')";
	$ingresar = $conexion->query($sql);

	if($ingresar)
	{
		$sql2 = "SELECT * FROM datos WHERE num_dc = $dc";
		$consulta = $conexion->query($sql2);
		$datos = $consulta->fetch_object();
		echo json_encode($datos);
	}

}




function updateParticipante($twig, $conexion, $nom, $dc, $persona, $email, $direccion, $telefono, $id)
{
	$sql = "UPDATE `datos` SET `nom_datos`='$nom',`num_dc`='$dc',`email`='$email',`direccion`='$direccion',`tipo_persona`='$persona',`telefono`=$telefono WHERE id_datos=$id";
	$actualizar = $conexion->query($sql);

	if($actualizar)
	{
		$clase = "text-success";
		$respuesta = "participante Editado correctamente";
	}else{
		$clase = "text-danger";
		$respuesta = "error al Editar el participante ";
	}
	$pagina = "cargarParticipantes();";

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));

}

////////////vistas roles//////////////

	function indexUsuarioParticipante($twig, $conexion)
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


function validarDcParticipante($twig, $conexion, $dc)
{
	$datos = 0;
	$sql = "SELECT * FROM datos WHERE num_dc = $dc";
	$consulta = $conexion->query($sql);
	if($consulta->num_rows > 0)
	{
	 $datos = $consulta->fetch_object(); 
	}
	echo json_encode($datos);

}

?>
