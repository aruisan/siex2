
<?php
	require '../../cp/conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM documento WHERE id_documento = '$id'";
	$resultado = $conexion->query($sql);
	$datos = $resultado->fetch_object();
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

       <link rel="stylesheet" type="text/css" href="../../../resources/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../../resources/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="../../../resources/app/css/myStilo.css">
        <link rel="stylesheet" type="text/css" href="../../../resources/app/css/sb-admin.css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SIEX</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../../../index.php"><i class="fa fa-fw fa-dashboard"></i> Procesos </a>
                    </li>
                    <li>
                        <a href="../../../usuarios.php"><i class="fa fa-fw fa-bar-chart-o"></i> Usuarios </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Archivos <small>Nuevo Archivo</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="../"><i class="fa fa-dashboard"></i> Procesos </a>
                            </li>
                            <li >
                            <a href="../../">Archivos de Procesos</a>
                            </li>
                            <li class="active">
                            	Editar Archivo
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
						<div class="row">
							<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
						</div>
						
						<form class="form-horizontal" method="POST" action="../crud/update.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="nombre" class="col-sm-2 control-label">Nombre</label>
								<div class="col-sm-10">
									<input type="hidden" name="id" value="<?= $datos->id_documento; ?>">
									<input type="hidden" name="ruta" value="<?= $datos->ruta; ?>">
									<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nom_documento; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">FECHA</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="fecha" value="<?= $datos->ff_file; ?>">
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="archivo" class="col-sm-2 control-label">Archivo</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="archivo" name="archivo">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<a href="../../index.php" class="btn btn-default">Regresar</a>
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</div>
						</form>
					</div>
                </div>
                <!--row-->
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

       	<script src="../../js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../../resources/bootstrap/js/bootstrap.min.js"></script>
        
</html>
