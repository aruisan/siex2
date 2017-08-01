<?php
require_once '../models/bbdd.php';
require_once '../models/complemento.php';


if($_POST['metodo'] == "indexPredio"){
	indexPredios($twig, $conexion);

}elseif($_POST['metodo'] == "createPredio"){
	createPredio($twig, $conexion);

}elseif($_POST['metodo'] == "createPredioProceso"){
	createPredioProceso($twig, $conexion, $_POST['id']);

}elseif($_POST['metodo'] == "editPredio"){	
	editPredio($twig, $conexion, $_POST['id']);
	
}elseif($_POST['metodo'] == "storePredio"){	
	storePredio($twig, $conexion, $_POST['catastral'], $_POST['matricula'], $_POST['expediente'], $_POST['age_declarado'], $_POST['ff_pago'], $_POST['barrio'], $_POST['direccion'], $_POST['valor'], $_POST['cargar']);
	
}elseif($_POST['metodo'] == "storeParticipanteProceso"){	
	storeParticipanteProceso($twig, $conexion, $_POST['nom'], $_POST['dc'], $_POST['persona'], $_POST['email'], $_POST['direccion'], $_POST['telefono']);

}elseif($_POST['metodo'] == "updatePredio"){	
	updatePredio($twig, $conexion, $_POST['catastral'], $_POST['matricula'], $_POST['expediente'], $_POST['age_declarado'], $_POST['ff_pago'], $_POST['barrio'], $_POST['direccion'], $_POST['valor'], $_POST['id']);

}elseif($_POST['metodo'] == "indexUsuarioParticipante"){
	indexUsuarioParticipante($twig, $conexion);


}elseif($_POST['metodo'] == "validarDcParticipante"){
	validarDcParticipante($twig, $conexion, $_POST['dc']);

}elseif($_POST['metodo'] == "indexPropietarioPredio"){
	indexPropietarioPredio($twig, $conexion, $_POST['id']);

}elseif($_POST['metodo'] == "storeParticipantePredio"){
	storeParticipantePredio($twig, $conexion, $_POST['dueno'], $_POST['porcentaje'], $_POST['id'], $_POST['carga']);

}else{
    header('location:../../index.php');
}





///////////////////////vistas procesos/////////////////////////////


function indexPredios($twig, $conexion)
	{
		$sql = "SELECT * FROM predial";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
				{
					$predios[] = $datos;
				}

		echo $twig->render('layouts/secretaria/predios/index.twig', compact('predios'));
	}


function createPredio($twig, $conexion)
{
		$expedientes = expedientes($conexion);
		$input = "ocultar";
		$name_select 	= "expediente";
		$cargar = "predio";
		echo $twig->render('layouts/secretaria/predios/create.twig', compact('expedientes', 'input', 'name_select', 'cargar'));
}

function createPredioProceso($twig, $conexion, $id)
{
		$select = "ocultar";
		$name_input = "expediente";
		$cargar = "proceso";
		echo $twig->render('layouts/secretaria/predios/create.twig', compact('expedientes', 'proceso', 'id', 'select', 'name_input', 'cargar'));
}

function editPredio($twig, $conexion, $id)
{
		$sql = "SELECT * FROM `predial` WHERE id_predial = $id";
		$consulta = $conexion->query($sql);
		$edit = $consulta->fetch_object();


		$expedientes = expedientes($conexion);

		echo $twig->render('layouts/secretaria/predios/edit.twig', compact('edit', 'expedientes'));
}


function indexPropietarioPredio($twig, $conexion, $id)
{
	$sql="SELECT datos.nom_datos ,participantes_predios.porcentaje FROM participantes_predios, datos where id_predio = $id AND participantes_predios.id_participante = datos.id_datos" ;
	$consulta = $conexion->query($sql);
	if($consulta->num_rows > 0){
		while($datos = $consulta->fetch_object())
				{
					$duenos[] = $datos;
				}
			$cuadro = 1;

	}else{
		$cuadro = 0;
	}



			echo $twig->render('layouts/secretaria/duenos/index.twig', compact('duenos', 'id', 'cuadro'));


}
//////////////////////crud procesos///////////////////////////////////

function storePredio($twig, $conexion, $catastral, $matricula, $expediente, $age_declarado, $ff_pago, $barrio, $direccion, $valor, $cargar)
{
	$sql = "INSERT INTO predial (num_ficha_catastral, num_matricula_inmoviliaria, direccion_predio, barrio_predio, valor_declarado, ultimo_age_declarado, ff_ultimo_pago, id_proceso) VALUES ('$catastral', '$matricula', '$direccion', '$barrio', $valor, '$age_declarado', '$ff_pago', '$expediente')";
	$ingresar = $conexion->query($sql);

	if($ingresar)
	{
		$clase = "text-success";
		$respuesta = "predial creado correctamente";
	}else{
		$clase = "text-danger";
		$respuesta = "error al crear el predial ";
	}
	if($cargar == 'predio'){
		$pagina = "cargarCreatePredio();";
	}elseif($cargar == 'proceso'){
		$pagina = 'indexPredioProceso('.$expediente.');';
	}
	

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


function storeParticipantePredio($twig, $conexion, $dueno, $porcentaje, $id, $carga)
{
	$sql = "INSERT INTO `participantes_predios`(`id_predio`, `id_participante`, `porcentaje`) VALUES ($id, $dueno, $porcentaje )";
	$ingresar = $conexion->query($sql);
	if($ingresar)
	{
		$clase = "text-success";
		$respuesta = "Dueño relacionado al predio correctamente";
	}else{
		$clase = "text-danger";
		$respuesta = "error al relacionar Dueño al predial ";
	}

	if($carga == 'predio'){
		$pagina = "agregarPropietarioPredio(".$id.");";
	}elseif($carga == 'proceso'){
		$pagina = "agregarParticipantePredioProceso(".$id.");";
	}
	

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));
	
}






function updatePredio($twig, $conexion, $catastral, $matricula, $expediente, $age_declarado, $ff_pago, $barrio, $direccion, $valor, $id)
{
	$sql = "UPDATE `predial` SET `num_ficha_catastral`='$catastral', `num_matricula_inmoviliaria`='$matricula', `direccion_predio`='$direccion',`barrio_predio`='$barrio', `valor_declarado`='$valor', `ultimo_age_declarado`='$age_declarado', `ff_ultimo_pago`='$ff_pago', `id_proceso`='$expediente' WHERE id_predial= $id";
	$actualizar = $conexion->query($sql);

	if($actualizar)
	{
		$clase = "text-success";
		$respuesta = "predio Editado correctamente";
	}else{
		$clase = "text-danger";
		$respuesta = "error al Editar el predio ";
	}
	$pagina = "cargarPredios();";

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

function expedientes($conexion)
{
	$sql = "SELECT id_proceso, num_expediente FROM procesos";
		$consulta= $conexion->query($sql);
			while($datos = $consulta->fetch_object())
				{
					$expedientes[] = $datos;
				}

			return $expedientes;
}

?>
