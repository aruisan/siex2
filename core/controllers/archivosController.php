<?php
require_once '../models/bbdd.php';
require_once '../models/complemento.php';

session_start();




if($_POST['metodo'] == "indexArchivo"){		
	'';
	
}elseif($_POST['metodo'] == "createArchivo"){		
	createArchivo($twig, $conexion);


	
}elseif($_POST['metodo'] == "editArchivo"){			
	editArchivo($twig, $conexion, $_POST['id']);

	
}elseif($_POST['metodo'] == "storeArchivo"){	
	storeArchivo($twig, $conexion, $_POST['nombre'], $_POST['fecha'], $_POST['id'], $_FILES['archivo']);
	
}elseif($_POST['metodo'] == "updateArchivo"){	
	updateArchivo($twig, $conexion, $_POST['nombre'], $_POST['fecha'], $_POST['id'], $_FILES['archivo'], $_POST['ruta']);

}elseif($_POST['metodo'] == "createImpulso"){		
	createImpulso($twig, $conexion, $_POST['id']);

}elseif($_POST['metodo'] == "storeImpulso"){		
	storeImpulso($twig, $conexion, $_POST['impulso'], $_POST['ff_notificacion'], $_POST['ff_vencimiento'], $_POST['id']);



	
		}else{	
			header('location:../../index.php');	
		}




///////////////////////vistas procesos/////////////////////////////




function createArchivo($twig, $conexion)
{
		echo $twig->render('layouts/secretaria/archivos/create.twig');
}

function editArchivo($twig, $conexion, $id)
{
		$sql = "SELECT * FROM archivos WHERE id_archivo = $id";
		$consulta = $conexion->query($sql);
		$archivo = $consulta->fetch_object();

		echo $twig->render('layouts/secretaria/archivos/edit.twig', compact('archivo'));
}



//////////////////////crud procesos///////////////////////////////////

function storeArchivo($twig, $conexion, $nombre, $fecha, $id, $archivo)
{
	setlocale(LC_ALL,"es_ES");
	$ff_load = date('Y/m/d');

	//$permitidos = array('aplication/pdf');
	$permitidos = 'application/pdf';
	$limite_kb = 200000 * 1024;


	if($archivo['error']>0)
	{
		$clase = "text-danger";
		$respuesta = "el archivo tiene errores ";

	}else if($archivo["type"]!= $permitidos)
	{

		$clase = "text-warning";
		$respuesta = "tipo de archivo no permitidos ";

	}else if( $archivo["size"] > $limite_kb)
	{
		$clase = "text-warning";
		$respuesta = "tamaño de archivo no permitidos ";
	}else{

				$ruta = '../../files/'.$id.'/';
				$pdf = $ruta.$archivo["name"];
				$taru = $id.'/'.$archivo['name'];
				if(!file_exists($ruta))
				{
					mkdir($ruta);
				}

				if(!file_exists($pdf))
				{

					$sql = "INSERT INTO archivos (nom_archivo, ff_file, ff_load, ruta, id_proceso) VALUES ('$nombre', '$fecha', '$ff_load', '$taru', $id)";
					$insertar = $conexion->query($sql);

					if($insertar)
					{
						$resultado = @move_uploaded_file($archivo["tmp_name"], $pdf);
						if($resultado)
						{
							$clase = "text-success";
							$respuesta = "Archivo Adjuntado correctamente";
						}else{
							$clase = "text-danger";
							$respuesta = "error al subir archivo en el servidor ";
						}
					}else{
						$clase = "text-danger";
						$respuesta = "error al crear datos del archivo en la bbdd ";
					}
				}
		
	}	

	$pagina = 'cargarAdjuntarArchivo('.$id.');';

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));
}


function updateArchivo($twig, $conexion, $nombre, $fecha, $id, $archivo, $ruta2)
{

	if($archivo['error']>0)
	{
		updatesinarchivo($twig, $conexion, $nombre, $fecha, $id);

	}else{
		updateconarchivo($twig, $conexion, $nombre, $fecha, $id, $archivo, $ruta2);
	}
}

/////////////////////function internas//////////////////////////
function updatesinarchivo($twig, $conexion, $nombre, $fecha, $id)
{
		echo $nombre.'<br>';
		echo $fecha.'<br>';
		echo $id.'<br>';
		$sql = "UPDATE archivos SET nom_archivo = '$nombre', ff_file = '$fecha' WHERE id_archivo = $id";
		$actualizar = $conexion->query($sql);

		if($actualizar){
			$clase = "text-success";
			$respuesta = "Archivo Actualizado correctamente";
		}else{
			$clase = "text-danger";
			$respuesta = "error al Actualizar archivo en la bbdd ";
		}

		$pagina = 'cargarAdjuntarArchivo('.$id.');';

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));
}

function updateconarchivo($twig, $conexion, $nombre, $fecha, $id, $archivo, $ruta2)
{
	$permitidos = 'application/pdf';
	$limite_kb = 200000 * 1024;

	if($archivo["type"]!= $permitidos)
	{
		$clase = "text-warning";
		$respuesta = "tipo de archivo no permitidos ";

	}else if( $archivo["size"] > $limite_kb)
	{
		$clase = "text-warning";
		$respuesta = "tamaño de archivo no permitidos ";
	}else{

				$ruta = '../../files/'.$id.'/';
				$pdf = $ruta.$archivo["name"];
				$taru = $id.'/'.$archivo['name'];
				if(!file_exists($ruta))
				{
					mkdir($ruta);
				}

				if(!file_exists($pdf))
				{

					$sql = "UPDATE archivos SET nom_archivo = '$nombre', ff_file = '$fecha', ruta ='$taru' WHERE id_archivo = $id";
					$actualizar = $conexion->query($sql);

					if($actualizar)
					{
						echo $pdf;
						$resultado = @move_uploaded_file($archivo["tmp_name"], $pdf);
						if($resultado)
						{
							$file = "../../files/".$ruta2;
								if(is_file($file))
								{
									chmod($file,0777);
									if(!unlink($file))
									{
									echo false;
									}
								}
							$clase = "text-success";
							$respuesta = "Archivo Editado correctamente";
						}else{
							$clase = "text-danger";
							$respuesta = "error al Editararchivo en el servidor ";
						}
					}else{
						$clase = "text-danger";
						$respuesta = "error al Editar datos del archivo en la bbdd ";
					}
				}
		
	}	

	$pagina = 'cargarAdjuntarArchivo('.$id.');';

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));
}

















////vistas impulso////

function createImpulso($twig, $conexion, $id_proceso_impulso)
{
	$tablas = tabla($conexion, $id_proceso_impulso);
	$tipo_impulsos = tipo_impulso($conexion);

	echo $twig->render('layouts/secretaria/impulso/index.twig', compact('tipo_impulsos', 'tablas', 'id_proceso_impulso'));
}

///////crud impulso


function storeImpulso($twig, $conexion, $impulso, $ff_notificacion, $ff_vencimiento, $id)
{
	$id_secretaria = $_SESSION['id_secre'];
	$conteo = conteo($conexion,  $id_secretaria, $impulso );
	$ff_load = date('Y/m/d');


	$sql="INSERT INTO impulso (`id_tipo_impulso`, `id_proceso`, `ff_notificacion`, `ff_vencimiento`, `conteo`, `ff`, `secretaria`)
			VALUES($impulso, '$id', '$ff_notificacion', '$ff_vencimiento', $conteo, '$ff_load', $id_secretaria)";
	$insertar = $conexion->query($sql);

	if($insertar)
	{
		$clase = "text-success";
		$respuesta = "Impulso creado correctamente";
	}else{
		$clase = "text-danger";
		$respuesta = "error al Crear Impulso ";
	}

	$pagina = 'cargarCreateImpulso('.$id.');';

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));

}

///////otras funciones impulso



function tabla($conexion, $id_proceso_impulso)
{
	echo $id_proceso_impulso;
	$sql = "SELECT a.*, b.nom_tipo_impulso FROM impulso a, tipo_impulso b WHERE a.id_tipo_impulso = b.id_tipo_impulso AND a.id_proceso = $id_proceso_impulso";
	$consulta = $conexion->query($sql);


	if($consulta->num_rows > 0){
		while($datos = $consulta->fetch_object())
		{
			$data[] = $datos;
		}

	}else{
		$data = 0;
	}

		return $data;

}


function tipo_impulso($conexion)
{
	$sql = "SELECT * FROM tipo_impulso";
	$consulta = $conexion->query($sql);

		while($datos = $consulta->fetch_object())
		{
			$data[] = $datos;
		}

		return $data;

}

function conteo($conexion,  $id_secretaria, $impulso)
{
	$sql = "SELECT MAX(conteo) AS conteo from impulso WHERE id_tipo_impulso = $impulso AND secretaria = $id_secretaria";
	$consulta = $conexion->query($sql);
	if($consulta->num_rows > 0)
	{
		$datos = $consulta->fetch_object();
		$data = $datos->conteo+1;
	}else{
		$data = 1;
	}
	return $data;
}
?>
