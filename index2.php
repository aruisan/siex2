<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="public/css/freelancer.min.css">

    <link rel="stylesheet" href="public/assets/font-awesome/css/font-awesome.min.css">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

<style type="text/css">
  
  .rojo{
    border: 1px solid red;
  }

   .amarillo{
    border: 1px solid yellow;
  }

   .azul{
    border: 1px solid blue;
  }

  #contenedor_buscar{
    margin-top: 20%;
    color: rgba(44,62,80,.8);
  }

  #encabezado{
    height: 100%;
    width: 100%;
    position: absolute;
    background-image: url('public/img/fondo2.jpeg');
    background-repeat: no-repeat;
    background-size:100% 100%;
  }
  .text-white
  {
    color:white;
  }
</style>
</head>

<body>

    <!-- Navigation -->
  
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="public/img/logo.png" width="100"/><h5>Sistema Integral de Expedientes y archivos</h5></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="" id="contactenos" data-toggle="modal" data-target="#modal-contactenos">Contactenos</a>
                    </li>
                    <li class="page-scroll">
                        <a href="views">Entrar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
   
<div id="encabezado" class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-sm-1 col-md-1 col-lg-1 ">
                </div>
                <div id="contenedor_buscar" class="col-xs-12 col-sm-11 col-md-11 col-lg-11 ">
                 <div id="caja_respuesta"></div>
                <h2 class="text-center">BUSCA TU PROCESO</h2>
                  <form class="navbar-form " id="form-create-dueno" role="form">
                    <div class="input-group col-xs-8 col-sm-8 col-md-10 col-lg-10">
                        <input type="text"  id="datos" class="form-input form-control input-lg col-xs-4 col-sm-4 col-md-2 col-lg-2" placeholder="Nombre, Identificacion o Proceso" />
                     </div>
                     <button id="buscar" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modal-respuesta">Buscar <i class="fa fa-search"></i> </button>
                  </form>

                </div>

  </div>




 <!-- Modal -->
        <div class="modal fade" id="modal-respuesta" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Procesos </h4>
              </div>
              <div class="modal-body-respuesta">
                <!--  formulario de participantes -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

 <!-- Modal -->
        <div class="modal fade" id="modal-contactenos" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center text-primary" id="myModalLabel">CONTACTENOS</h4>
              </div>
              <div class="modal-body-contactenos">
                   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="enviarCorreo">Enviar</button>
              </div>
            </div>
          </div>
        </div>
   
   


   <!-- jQuery -->
    <script src="public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function(){$('#myInput').focus(); });
    </script>
      <div id="fb-root"></div>
      <script src="public/js/principal.js"></script>

</body>

</html>
