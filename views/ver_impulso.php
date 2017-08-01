<?php
require_once '../core/models/bbdd.php';
require_once  dirname(__DIR__) . '.././\vendor\autoload.php';

$mpdf = new mPDF();

$id = $_GET['id'];


$sql = "SELECT a.*, b.*, c.*, d.*, e.* FROM impulso a, tipo_impulso b,  procesos c, usuarios d, alcaldia e
WHERE a.id_tipo_impulso = b.id_tipo_impulso AND a.id_proceso = c.id_proceso AND a.secretaria = d.id_usuarios
AND d.id_alcaldia = e.id_alcaldia AND a.id_impulso = $id";
$consulta = $conexion->query($sql);
$data = $consulta->fetch_object();


//////variables encabezado
$alcaldia = $data->nom_alcaldia;
$conteo = $data->conteo;
$ff_actual = date('Y/m/d');
$expediente = $data->num_expediente;
$tipo_impulso = $data->nom_tipo_impulso;
$logo = $data->logo;
$escudo =$data->escudo;

/////obtener participantes
$participantes = participantesProceso($conexion, $expediente );


		if($participantes != 0)
		{
			foreach($participantes as $participante){

				if($participante->cargo=='DEMANDANTE'){
					$demandante = $participante->nom_datos;

				}elseif($participante->cargo=='DEMANDADO'){
					$demandado = $participante->nom_datos;

				}elseif($participante->cargo=='ABOGADO DEMANDANTE'){
					$abo_demandante = $participante->nom_datos;

				}elseif($participante->cargo=='ABOGADO DEMANDADO'){
					$abo_demandado = $participante->nom_datos;

				}elseif($participante->cargo=='JUEZ'){
					$juez = $participante->nom_datos;

				}
															
			}
		}
////////variables pie



$cabecera = cabecera($alcaldia, $conteo, $ff_actual, $expediente, $tipo_impulso);
$pie = pie($juez);
$cuerpo = cuerpo($conexion, $tipo_impulso, $juez, $demandado);


$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetHTMLFooter($pie);
$stylesheet = file_get_contents('../public/assets/bootstrap/css/bootstrap.min.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($cuerpo);
$mpdf->Output('cambio.pdf', 'I');





function cabecera($alcaldia, $conteo, $ff_actual, $expediente, $tipo_impulso)
{
	return $cabecera = "<br><br><br><br><span><h4  class='text-warning text-center'>REPUBLICA DE COLOMBIA</h4>
						<h4 class='text-primary text-center'>MUNICIPIO DE ". $alcaldia." </h4>
						<h4 class='text-danger text-center'>Tesoreria Municipal--Cobro Coactivo</h4></span><br><br>

					<p>".$tipo_impulso." No. ".$conteo.".<br>
					Fecha: ".$ff_actual.".<br>
					Expediente: ".$expediente.".<br></p>";
}


function pie()
{
	return $pie = "solo informacion de la alcaldia";
}


function participantesProceso($conexion, $id )
{
		$sql = "SELECT a.id_datos, a.cargo, b.nom_datos 
				FROM relaciones_procesos a, datos b
				WHERE expediente = '$id'
				AND a.id_datos = b.id_datos";

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

function cuerpo($conexion, $tipo_impulso, $juez, $demandado)
{
	echo $juez;
	if($tipo_impulso == "ACUERDO DE PAGO")
	{
		$cuerpo = acuerdo_pago();
	}else if($tipo_impulso == "AUTO ORDENA")
	{
		$cuerpo = auto_ordena($juez);
	}else if($tipo_impulso == "OFICIO CITACION")
	{
		$cuerpo = oficio_citacion($juez, $demandado);
	}else if($tipo_impulso == "OFICIO EMBARGO")
	{
		$cuerpo = oficio_embargo();
	}

	return $cuerpo;


}

//////diferentes cuerpos


function acuerdo_pago($conexion)
{
return $cuerpo = "<br><br><br><br><br><br><br><br><br><br><center><p>acuerdo de pago</p></center></br>";

}


function auto_ordena($juez)
{
return $cuerpo = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<p class='text-justify'>El Tesorero General del Municipio de Girardot, de Conformidad con el Código General de Proceso. </p>
					<h3 class='text-center'>CONSIDERANDO:</h3>
					<p class='text-justify'>1. Que existe petición formal de copias de documentos relacionados, la cual reúne los requisitos formales.</p>
					<p class='text-justify'>2. En atención a la citada petición, este Despacho ordenará la expedición de las copias requeridas, conforme lo dispuesto en el artículo 114 del Código General del proceso.</p>
					<p class='text-justify'>En mérito a lo expuesto, el suscrito Tesorero General: </p>
					<h3 class='text-center'>RESUELVE:</h3>
					<p class='text-justify'>Por intermedio de la Secretaría General o Coordinación de la unidad especial de cobro de esta Tesorería expídanse, a costa de los peticionarios, las copias requeridas. </p>
					<br><br><p class='text-justify'>cumplase, </p><br><br><br><br>
					<p class='text-justify'>________________________________<br>
											".$juez."<br>
											Tesorero Municipal.</p>

					";
}


function oficio_citacion($juez, $demandado)
{
return $cuerpo = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<p class='text-justify'>señor(a).<br>
					 ".$demandado."</p><br><br>
					<p class='text-justify'>Por  medio  del  presente  escrito  me  permito solicitarle  se sirva comparecer a este despacho dentro de los diez (10) días siguientes al recibo del presente,  con el fin de notificarlo personalmente del contenido de la resolución No. xxxx de .</p>
					<p class='text-justify'>“Por medio del cual  se reconoce la prescripción de unas obligaciones y se dictan disposiciones” .</p>
					<p class='text-justify'>En mérito a lo expuesto, el suscrito Tesorero General: </p>
					<br><br><p class='text-justify'>cordialmente, </p><br><br><br><br>
					<p class='text-justify'>________________________________<br>
											".$juez."<br>
											Tesorero Municipal.</p>

					";

}


function oficio_embargo($conexion)
{
return $cuerpo = "<br><br><br><br><br><br><br><br><br><br><center><p>OFICIO EMBARGO</p></center></br>";

}
?>



