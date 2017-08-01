<?php
require_once '../models/bbdd.php';
require_once '../models/complemento.php';


if($_POST['metodo'] == "indexProceso"){
	indexProceso($twig, $conexion);

}elseif($_POST['metodo'] == "createProceso"){
	createProceso($twig, $conexion);

}elseif($_POST['metodo'] == "editProceso"){	
	editProceso($twig, $conexion, $_POST['id']);

}elseif($_POST['metodo'] == "storeProceso"){	
	storeProceso($twig, $conexion, $_POST['expediente'], $_POST['ciudad'], $_POST['valor'], $_POST['demandante'], $_POST['demandado'], $_POST['abo_demandante'], $_POST['abo_demandado'], $_POST['juez']);

}elseif($_POST['metodo'] == "updateProceso"){	
	updateProceso($twig, $conexion, $_POST['expediente'], $_POST['ciudad'], $_POST['valor'], $_POST['demandante'], $_POST['demandado'], $_POST['abo_demandante'], $_POST['abo_demandado'], $_POST['juez'], $_POST['id']);

}elseif($_POST['metodo'] == "indexPredioProceso"){	
	indexPredioProceso($conexion, $twig, $_POST['id'] );

}elseif($_POST['metodo'] == "cargarAdjuntarArchivo"){	
	cargarAdjuntarArchivo($conexion, $twig, $_POST['id'] );

}else{
	header('location:../../index.php');
}




///////////////////////vistas procesos/////////////////////////////


function indexProceso($twig, $conexion)
	{
		$procesos = null;
		$sql = "SELECT procesos.*, tipo_procesos.nom_tipo_proceso 
				FROM procesos, tipo_procesos 
				WHERE tipo_procesos.id_tipo_proceso = procesos.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
				{
					$procesos[] = $datos;
					$id = $datos->num_expediente;
					$demandantes[] = demandanteProceso($conexion, $id );
					$demandados[] = demandadoProceso($conexion, $id );
				}
		
		echo $twig->render('layouts/secretaria/procesos/index.twig', compact('procesos','demandantes', 'demandados'));
	
	}

function indexPredioProceso($conexion, $twig, $id)
{
	$sql = "SELECT * FROM predial WHERE id_proceso = $id";
		$consulta = $conexion->query($sql);
		while($datos = $consulta->fetch_object())
				{
					$predios[] = $datos;
				}

		echo $twig->render('layouts/secretaria/predios/index.twig', compact('predios','id'));
}

function createProceso($twig, $conexion)
{
		$sql ="SELECT id_datos, nom_datos, num_dc FROM datos";
		$consulta = $conexion->query($sql);
		while($result = $consulta->fetch_object())
		{
			$datos[]=$result;
		}

		$sql2 = "SELECT	 usuarios.id_datos, nom_datos, num_dc 
				FROM datos, usuarios, roles
				WHERE datos.id_datos = usuarios.id_datos 
				AND usuarios.id_rol = roles.id_rol
				AND roles.nom_rol = 'abogado' 
				AND activo =1";
		$consulta2 = $conexion->query($sql2);
	
		while($result2 = $consulta2->fetch_object())
		{
			$abogados[]=$result2;
		}

		
		$sql3 = "SELECT	 usuarios.id_datos, nom_datos, num_dc 
				FROM datos, usuarios, roles
				WHERE datos.id_datos = usuarios.id_datos 
				AND usuarios.id_rol = roles.id_rol
				AND roles.nom_rol = 'juez' 
				AND activo =1";
		$consulta3 = $conexion->query($sql3);

		while($result3 = $consulta3->fetch_object())
		{
			$jueces[]=$result3;
		}

		echo $twig->render('layouts/secretaria/procesos/create.twig', compact('datos','abogados', 'jueces'));
}

function editProceso($twig, $conexion, $id)
{

		$sql = "SELECT procesos.*, tipo_procesos.nom_tipo_proceso 
				FROM procesos, tipo_procesos 
				WHERE id_proceso = $id 
				AND tipo_procesos.id_tipo_proceso = procesos.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		$proceso = $consulta->fetch_object();
		$di = $proceso->num_expediente;
		
		$participantes = participantesProceso($conexion, $di );


		if($participantes != 0)
		{
			foreach($participantes as $participante){

				if($participante->cargo=='DEMANDANTE'){
					$edit_demandante = $participante->id_datos;

				}elseif($participante->cargo=='DEMANDADO'){
					$edit_demandado = $participante->id_datos;

				}elseif($participante->cargo=='ABOGADO DEMANDANTE'){
					$edit_abo_demandante = $participante->id_datos;

				}elseif($participante->cargo=='ABOGADO DEMANDADO'){
					$edit_abo_demandado = $participante->id_datos;

				}elseif($participante->cargo=='JUEZ'){
					$edit_juez = $participante->id_datos;

				}
															
			}
		}
	

		$sql ="SELECT id_datos, nom_datos, num_dc FROM datos";
		$consulta = $conexion->query($sql);
		while($result = $consulta->fetch_object())
		{
			$datos[]=$result;
		}

		$sql2 = "SELECT	 usuarios.id_datos, nom_datos, num_dc 
				FROM datos, usuarios, roles
				WHERE datos.id_datos = usuarios.id_datos 
				AND usuarios.id_rol = roles.id_rol
				AND roles.nom_rol = 'abogado' 
				AND activo =1";
		$consulta2 = $conexion->query($sql2);

		while($result2 = $consulta2->fetch_object())
		{
			$abogados[]=$result2;
		}

		
		$sql3 = "SELECT	 usuarios.id_datos, nom_datos, num_dc 
				FROM datos, usuarios, roles
				WHERE datos.id_datos = usuarios.id_datos 
				AND usuarios.id_rol = roles.id_rol
				AND roles.nom_rol = 'juez' 
				AND activo =1";
		$consulta3 = $conexion->query($sql3);

		while($result3 = $consulta3->fetch_object())
		{
			$jueces[]=$result3;
		}



		echo $twig->render('layouts/secretaria/procesos/edit.twig', compact('proceso', 'datos', 'abogados', 'jueces','edit_demandante', 'edit_demandado', 'edit_abo_demandado', 'edit_abo_demandante', 'edit_juez'));
}


function cargarAdjuntarArchivo($conexion, $twig, $id )
{
		$procesos = null;
		$sql = "SELECT procesos.*, tipo_procesos.nom_tipo_proceso 
				FROM procesos, tipo_procesos 
				WHERE tipo_procesos.id_tipo_proceso = procesos.id_tipo_proceso
				AND id_proceso = $id";
				$consulta = $conexion->query($sql);
				$proceso = $consulta->fetch_object();

					$expediente = $proceso->num_expediente;
					$id = $proceso->id_proceso;

					$demandante = demandanteProceso($conexion, $expediente );
					$demandado = demandadoProceso($conexion, $expediente );
					$archivos= archivosProceso($conexion, $id);
		
		echo $twig->render('layouts/secretaria/archivos/index.twig', compact('proceso','demandante', 'demandado', 'archivos', 'id'));
}

//////////////////////crud procesos///////////////////////////////////
function storeProceso($twig, $conexion, $expediente, $ciudad, $valor, $demandante, $demandado, $abo_demandante, $abo_demandado, $juez)
{		
		$id = 1;
		$proceso = 2;
		$ff = date('Y-m-d');
		$sql = "INSERT INTO procesos (ff, id_secretaria, id_tipo_proceso, valor, num_expediente, ciudad) 
				VALUES('$ff', '$id', $proceso, $valor, '$expediente', '$ciudad')";
		$insertar = $conexion->query($sql);

		if($insertar)
		{
			/*
			$sql2 = "SELECT id_proceso FROM procesos WHERE num_expediente = '$expediente'";
			$consulta = $conexion->query($sql2);
			$proceso = $consulta->fetch_object();
			$id_proceso = $proceso->id_proceso;*/

			$sql2 = "INSERT INTO relaciones_procesos (expediente, id_datos, cargo)
						VALUES('$expediente', $demandante, 'DEMANDANTE'),
								('$expediente', $demandado, 'DEMANDADO'),
								('$expediente', $abo_demandante, 'ABOGADO DEMANDANTE'),
								('$expediente', $abo_demandado, 'ABOGADO DEMANDADO'),
								('$expediente', $juez, 'JUEZ')";
			$insertar2 = $conexion->query($sql2);
			if($insertar2)
			{
				$sql3= "SELECT id_proceso FROM procesos WHERE num_expediente = '$expediente'";
				$consulta3 = $conexion->query($sql3);
				$datos = $consulta3->fetch_object();

				$clase = "text-success";
				$respuesta = "Proceso creado correctamente";
			}else{
				$clase = "text-danger";
				$respuesta = "error en las relaciones al crear el proceso ";
			}
		}else{
			$clase = "text-danger";
			$respuesta = "error en el proceso al crear el proceso ";
		}

		$pagina = 'indexPredioProceso('.$datos->id_proceso.');';

		echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));

}




function updateProceso($twig, $conexion, $expediente, $ciudad, $valor, $demandante, $demandado, $abo_demandante, $abo_demandado, $juez, $id)
{	

	$resp_demandante = 0;
	$resp_demandado = 0;
	$resp_abo_demandante = 0;
	$resp_abo_demandado = 0;
	$resp_juez = 0;
	


		$sql = "UPDATE procesos SET valor=$valor, num_expediente = '$expediente', ciudad = '$ciudad' WHERE num_expediente = '$id'";
		$actualizar_proceso = $conexion->query($sql);



		$sql_con_demandante ="SELECT * FROM relaciones_procesos WHERE expediente = '$id'  AND cargo = 'DEMANDANTE'";
		$consulta_demandante = $conexion->query($sql_con_demandante);
		echo 'demandante'.$consulta_demandante->num_rows.'<br>';
		if($consulta_demandante->num_rows > 0)
		{
			$sql_demandante = "UPDATE relaciones_procesos SET id_datos = $demandante, expediente='$expediente'  WHERE expediente = '$id' AND cargo = 'DEMANDANTE'";
			$actualizar_demandante = $conexion->query($sql_demandante);
			$resp_demandante = 1;
		}else{
			$sql_insert_demandante = "INSERT INTO relaciones_procesos (expediente, id_datos, cargo) VALUES('$expediente', $demandante, 'DEMANDANTE')";
			$insert_demandante = $conexion->query($sql_insert_demandante);
			$resp_demandante = 1;
		}


		$sql_con_demandado ="SELECT * FROM relaciones_procesos WHERE expediente = '$id'  AND cargo = 'DEMANDADO'";
		$consulta_demandado = $conexion->query($sql_con_demandado);
		echo 'demandado'.$consulta_demandado->num_rows.'<br>';
		if($consulta_demandado->num_rows > 0)
		{
			$sql_demandado = "UPDATE relaciones_procesos SET id_datos = $demandado, expediente='$expediente'  WHERE expediente = '$id' AND cargo = 'DEMANDADO'";
			$actualizar_demandado = $conexion->query($sql_demandado);
			$resp_demandado = 1;
		}else{
			$sql_insert_demandado = "INSERT INTO relaciones_procesos (expediente, id_datos, cargo) VALUES('$expediente', $demandado, 'DEMANDADO')";
			$insert_demandado = $conexion->query($sql_insert_demandado);
			$resp_demandado = 1;
		}


		
		$sql_con_abo_demandante ="SELECT * FROM relaciones_procesos WHERE expediente = '$id'  AND cargo = 'ABOGADO DEMANDANTE'";
		$consulta_abo_demandante = $conexion->query($sql_con_abo_demandante);
		echo 'abo demandante'.$consulta_abo_demandante->num_rows.'<br>';
		if($consulta_abo_demandante->num_rows > 0)
		{
			$sql_abo_demandante = "UPDATE relaciones_procesos SET id_datos = $abo_demandante, expediente='$expediente'  WHERE expediente = '$id' AND cargo = 'ABOGADO DEMANDANTE'";
			$actualizar_abo_demandante = $conexion->query($sql_abo_demandante);
			$resp_abo_demandante = 1;
		}else{
			$sql_insert_abo_demandante = "INSERT INTO relaciones_procesos (expediente, id_datos, cargo) VALUES('$expediente', $abo_demandante, 'ABOGADO DEMANDANTE')";
			$insert_abo_demandante = $conexion->query($sql_insert_abo_demandante);
			$resp_abo_demandante = 1;
		}


		$sql_con_abo_demandado ="SELECT * FROM relaciones_procesos WHERE expediente = '$id'  AND cargo = 'ABOGADO DEMANDADO'";
		$consulta_abo_demandado = $conexion->query($sql_con_abo_demandado);
		echo 'abo demandado'.$consulta_abo_demandado->num_rows.'<br>';
		if($consulta_abo_demandado->num_rows > 0)
		{
			$sql_abo_demandado = "UPDATE relaciones_procesos SET id_datos = $abo_demandado, expediente='$expediente'  WHERE expediente = '$id' AND cargo = 'ABOGADO DEMANDADO'";
			$actualizar_abo_demandado = $conexion->query($sql_abo_demandado);
			$resp_abo_demandado = 1;
		}else{
			$sql_insert_abo_demandado = "INSERT INTO relaciones_procesos (expediente, id_datos, cargo) VALUES('$expediente', $abo_demandado, 'ABOGADO DEMANDADO')";
			$insert_abo_demandado = $conexion->query($sql_insert_abo_demandado);
			$resp_abo_demandado = 1;
		}
		

		$sql_con_juez ="SELECT * FROM relaciones_procesos WHERE expediente = '$id' AND cargo = 'JUEZ'";
		$consulta_juez = $conexion->query($sql_con_juez);
		echo 'juez'.$consulta_juez->num_rows.'<br>';
		if($consulta_juez->num_rows > 0)
		{
			$sql_juez = "UPDATE relaciones_procesos SET id_datos = $juez, expediente='$expediente'  WHERE expediente = '$id' AND cargo = 'JUEZ'";
			$actualizar_juez = $conexion->query($sql_juez);
			$resp_juez = 1;
		}else{
			$sql_insert_juez = "INSERT INTO relaciones_procesos (expediente, id_datos, cargo) VALUES('$expediente', $juez, 'JUEZ')";
			$insert_juez = $conexion->query($sql_insert_juez);
			$resp_juez = 1;
		}
		


		

		if($actualizar_proceso && $resp_demandante = 1 && $resp_demandado = 1 && $resp_abo_demandante = 1 && $resp_abo_demandado = 1 && $resp_juez = 1)
		{
				$clase = "text-success";
				$respuesta = "Proceso Actualizado correctamente";
		}else{
				$clase = "text-danger";
				$respuesta = "error al Actualizar el proceso ";
		}

		//$pagina = "cargarProcesos();";

		echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));

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

	function participantesProceso($conexion, $id )
	{
		$sql = "SELECT id_datos, cargo 
				FROM relaciones_procesos
				WHERE expediente = '$id'";
		$consulta = $conexion->query($sql);
		if($consulta->num_rows > 0){
	
				while($datos = $consulta->fetch_object())
				{
					$participantes[] = $datos;
				}
		
		}else{
			$participantes = 0;
		}

		return $participantes;
	}

	function archivosProceso($conexion, $id )
	{
		$sql = "SELECT * 
				FROM archivos
				WHERE id_proceso = '$id'";
		$consulta = $conexion->query($sql);
		if($consulta->num_rows > 0){
	
				while($datos = $consulta->fetch_object())
				{
					$participantes[] = $datos;
				}
		
		}else{
			$participantes = 0;
		}

		return $participantes;
	}

?>
