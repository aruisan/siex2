
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>siex</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">

    <!-- Optional theme 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

     <!-- Bootstrap Material Design -->
    <link href="../public/assets/materialize/css/bootstrap-material-design.css" rel="stylesheet">
    <link href="../public/assets/materialize/css/ripples.min.css" rel="stylesheet">  

     <!-- Dropdown.js -->
    <link href="//cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../public/assets/metisMenu/metisMenu.min.css" rel="stylesheet">

     <!-- DataTables CSS -->
    <link href="../public/assets/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../public/assets/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../public/assets/sb-admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../public/assets/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../public/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Mi Estilo -->
    <link href="../public/css/miStilo.css" rel="stylesheet" type="text/css">

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
                <a id="titulo_menu" class="navbar-brand" href="#"><?= $_GET['nom_user']?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="perfil">
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
                        <li class="active">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> General<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse in" aria-expanded="true">
                                <li>
                                    <a href="" id="participantes"><i class="fa fa-address-card-o"></i> Participantes </a>
                                </li>
                                <li>
                                    <a href="" id="relaciones"><i class="fa fa-sitemap fa-fw"></i> Relaciones </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li class="active">
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Cobro Predial<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse in">
                                <li>
                                    <a href="" id="proceso_predial"><i class="fa fa-indent fa-fw"></i> Proceso Predial </a>
                                </li>
                                <li>
                                    <a href="" id="predios"><i class="fa fa-indent fa-fw"></i> Predios </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>            
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           
           
        </div>
        <!-- /#page-wrapper -->
         <!-- Modal -->
        <div class="modal fade" id="modal-dueno" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dueños del Predio</h4>
              </div>
              <div class="modal-body">
                <!--  formulario de participantes -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary ocultar" data-dismiss="modal" id="relacionar">Relacionar</button>
                <button type="button" class="btn btn-primary " data-dismiss="modal" id="relacionar2">Relacionar y Guardar</button>
              </div>
            </div>
          </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function(){$('#myInput').focus(); });
    </script>

    <!-- Material Design for Bootstrap -->
    <script src="../public/assets/materialize/js/material.js"></script>
    <script src="../public/assets/materialize/js/ripples.min.js"></script>
    <script>
    $.material.init();
    </script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../public/assets/metisMenu/metisMenu.min.js"></script>

     <!-- DataTables JavaScript -->
    <script src="../public/assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../public/assets/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../public/assets/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../public/assets/raphael/raphael.min.js"></script>
    <script src="../public/assets/morrisjs/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../public/assets/sb-admin/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../public/js/secretaria.js"></script>
    <script type="text/javascript" src="../public/js/proceso.js"></script>
    <script type="text/javascript" src="../public/js/archivo.js"></script>
    <script type="text/javascript" src="../public/js/participante.js"></script>
    <script type="text/javascript" src="../public/js/relacion.js"></script>
    <script type="text/javascript" src="../public/js/predios.js"></script>
    

    
</body>

</html>
