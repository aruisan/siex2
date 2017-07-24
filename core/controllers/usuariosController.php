<?php
require_once '../models/bbdd.php';


if($_POST['metodo'] == "storeUsuario"){
	crearDatos($twig, $conexion, $_POST['nom'], $_POST['dc'], $_POST['persona'], $_POST['email'], $_POST['direccion'], $_POST['telefono'],$_POST['nick'], $_POST['password']);

}elseif($_POST['metodo'] == "ingresarUsuario"){
	IngresarUsuario($twig, $conexion, $_POST['id']);

}elseif($_POST['metodo'] == "loguearse"){
	loguearUsuario($twig, $conexion, $_POST['nick'], $_POST['password']);
}





//////crud/////////////

function crearDatos($twig, $conexion, $nom, $dc, $persona, $email, $direccion, $telefono, $nick, $password)
{
	$sql = "INSERT INTO datos (nom, num_dc, email, direccion, telefono, tipo_persona, nick,  password, activo) 
						VALUES('$nom', $dc, '$email', '$direccion', '$telefono', '$persona', '$nick',  '$password', 1)";
	$ingresar = $conexion->query($sql);

	if($ingresar)
	{
		session_start();
		$_SESSION['num_user'] = $dc;
		header('location:views/visitantes.php');
	}else{
		
		echo "error al crear datos ";
	}
}



function loguearUsuario($twig, $conexion, $nick, $password)
{
	$sql= "SELECT a.id_usuarios, b.nom_datos nombre FROM usuarios a, datos b WHERE a.nick = '$nick' AND a.password = '$password' AND a.id_datos = b.id_datos";
	$consulta = $conexion->query($sql);
	if($consulta->num_rows > 0)
	{
		$datos = $consulta->fetch_object();
		session_start();
		$_SESSION['id_secre'] = $datos->id_usuarios;

		header('location:../../views/secretaria.php?nom_user='.$datos->nombre);
	}else{
		echo "Usuario o Contraseña incorrectos";
	}
}






/*
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

*/

?>
