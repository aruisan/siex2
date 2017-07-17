<?php
session_start();
	require 'cp/conexion.php';
$id = $_GET['id'];

$_SESSION['proceso']=$id;

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
/*	
$consulta = "SELECT proceso.*, tipo_proceso.nom_tipo_proceso FROM proceso, tipo_proceso WHERE id_proceso = '$id' AND tipo_proceso.id_tipo_proceso = proceso.id_tipo_proceso ";
$resultado = $conexion->query($consulta);
$result  = $resultado->fetch_object();

$sql = "SELECT * FROM documento WHERE id_proceso = $id ";
$archivo = $conexion->query($sql);*/
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Secretario de Procesos</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Procesos/</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Editar Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="" id="procesos"><i class="fa fa-indent fa-fw"></i> Procesos </a>
                        </li>
                        <li>
                            <a href="" id="usuarios"><i class="fa  fa-users fa-fw"></i> Usuarios </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Procesos /<small>Archivos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../"><i class="fa fa-dashboard"></i> Procesos </a>
                            </li>
                            <li class="active">Archivos de Procesos</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="container">
						<center><h3>Numero de Proceso: <?= $result->num_proceso; ?></h3></center>
						<div class="col-md-3"></div>
						<div class="col-md-6">		
							<table class="table">
								<tbody>
									<tr>
										<td>CIUDAD: </td>
										<td><?= $result->ciudad; ?></td>
									</tr>
									<tr>
										<td>NOMBRE EMPRESA: </td>
										<td><?= $result->nom_empresa; ?></td>
									</tr>
									<tr>
										<td>DEMANDANTE: </td>
										<td><?= $result->demandante.' ('.$result->cc_demandante.')'; ?></td>
									</tr>
									<tr>
										<td>DEMANDADO: </td>
										<td><?= $result->demandado.' ('.$result->cc_demandado.')'; ?></td>
									</tr>
									<tr>
										<td>Tipo: </td>
										<td><?= $result->nom_tipo_proceso; ?></td>
									</tr>
									<tr>
										<td>VALOR: </td>
										<td><?= $result->valor; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

						<div class="container">
							<div class="row">
								<h2 style="text-align:center">Archivos del Proceso</h2>
							</div>
							
							<div class="row">
								<a href="php/vistas/nuevo.php" class="btn btn-primary">Nuevo Registro</a>
							</div>
							
							<br>
							
						
								<div id="table" class="col-md-10">
								<table class="table table-condensed table-responsive" id="myTable">
									<thead>
										<tr>
											<th>Archivo</th>
											<th>Fecha de Archivo</th>
											<th>Fecha de Cargue</th>
											<th>pdf</th>
											<th><i class="glyphicon glyphicon-pencil"></i></th>
										</tr>
									</thead>
									<tbody>
										<?php while($datos = $archivo->fetch_object()){ ?>
										<tr>
											<td><?= $datos->nom_documento; ?></td>
											<td><?= $datos->ff_file; ?></td>
											<td><?= $datos->ff_load; ?></td>
											<td><a href="<?= $ruta_files.'files/'.$datos->ruta; ?>" target="_blank"><img src="<?= $ruta_files;?>files/pdf.ico" width="40"></a></td>
											<td><a href="php/vistas/modificar.php?id=<?= $datos->id_documento; ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								</div>
							
						</div>
						
						<!-- Modal -->
						<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
									</div>
									
									<div class="modal-body">
										¿Desea eliminar este registro?
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										<a class="btn btn-danger btn-ok">Delete</a>
									</div>
								</div>
							</div>
						</div>

                </div>
                <!--row-->
               

            </div>
            <!-- /.container-fluid -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
         <script type="text/javascript">
            $(document).ready(function(){
            $('#myTable').DataTable({
					"order": [[0, "desc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					},
				});	
            });
        </script>
        <script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
    
</body>

</html>


