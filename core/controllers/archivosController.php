<?php
require_once '../models/bbdd.php';



if($_POST['metodo'] == "indexArchivo"){		
	'';
	
}elseif($_POST['metodo'] == "createArchivo"){		
	createArchivo($twig, $conexion);


	
}elseif($_POST['metodo'] == "editArchivo"){			
	editArchivo($twig, $conexion, $_POST['id']);

	
}elseif($_POST['metodo'] == "storeArchivo"){
	echo "uno";			
	storeArchivo($twig, $conexion, $_POST['nombre'], $_POST['fecha'], $_POST['id'], $_FILES['archivo']);
	
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
		$sql = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE id_proceso = $id AND tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso";
		$consulta = $conexion->query($sql);
		$proceso = $consulta->fetch_object();

		echo $twig->render('layouts/secretaria/procesos/edit.twig', compact('proceso'));
}



//////////////////////crud procesos///////////////////////////////////

function storeArchivo($twig, $conexion, $nombre, $fecha, $id, $archivo)
{
	echo "dos";
	setlocale(LC_ALL,"es_ES");
	$ff_load = date('Y/m/d');

	$permitidos = array('aplication/pdf');
	$limite = 2000;


	if($archivo['error']>0)
	{
		$clase = "text-danger";
		$respuesta = "el archivo tiene errores ";
	}else{//else de if error

		echo "tres";
		if(in_array($archivo['type'], $permitidos) && $archivo['size']<= $limite_kb * 1048576)
		{
			$ruta = '../../files/'.$id.'/';
			$pdf = $ruta.$archivo["name"];
			$taru = $id.'/'.$archivo['name'];

			if(file_exists($ruta))
			{
				echo "cuatro";
				mkdir($ruta);
			}

			if(!file_exists($pdf))
			{
				echo "cinco";
				$sql = "INSERT INTO archivo (nom_archivo, ff_file, ff_load, ruta, id_proceso) VALUES ('$nombre', '$fecha', '$ff_load', '$taru', $id)";
				$insertar = $conexion->query($sql);

				if($insertar)
				{echo "seis";
					$resultado = @move_uploaded_file($archivo["tmp_name"], $pdf);
					if($resultado)
					{
						$clase = "text-success";
						$respuesta = "Archivo Adjuntado correctamente";
					}else{
						$clase = "text-danger";
						$respuesta = "error al subir archivo en elservidor ";
					}
				}else{
					$clase = "text-danger";
					$respuesta = "error al crear datos del archivo en la bbdd ";
				}
			}

			
		}
	}//endif de error
	$pagina = 'cargarAdjuntarArchivo('.$id.');';

	echo $twig->render('layouts/secretaria/resp.twig', compact('clase', 'respuesta', 'pagina'));
}

/////////////////////function internas//////////////////////////
	
function subirArchivo($twig, $conexion, $id, $nombre, $fecha, $ff_load, $archivo)
{
	echo "tres";
	
}
?>
