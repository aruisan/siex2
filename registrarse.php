<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Registro | SIEX</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
     <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css">

     <!-- Waves Effect Css -->
    <link href="public/assets/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="public/assets/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="public/assets/sweetalert/sweetalert.css" rel="stylesheet" />

   <!-- Custom Css -->
    <link href="public/css/style.css" rel="stylesheet">

  
</head>

<body class="theme-red" style="background-color:#00BCD4;">

    <section class="content">
        
        
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">CREACION DE USUARIO</h2>
                            <a href="entrar.php" class="btn btn-link bg-pink">Ingresar Ahora!</a>
                            <a href="index.php" class="btn btn-link bg-blue">Inicio</a>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST">
                                <h3>INFORMACION DE CUENTA</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                           
                                            <input type="text" class="form-control" name="nick" placeholder="usuario" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="confirm" placeholder="confirmar password" required>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>INFORMACION DE PERFIL</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="nom" class="form-control" placeholder="NOMBRE COMPLETO" required> 
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="dc" class="form-control" placeholder="NUMERO IDENTIFICACION" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="persona" class="form-control">
                                                    <option value="NATURAL">NATURAL</option>
                                                    <option value="JURIDICA">JURIDICA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control" placeholder="EMAIL" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="direccion" class="form-control" placeholder="DIRECCION" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" name="telefono" class="form-control" placeholder="TELEFONO" required>
                                        </div>
                                    </div>
                                </fieldset>

                                <h3>TEMINOS Y CONDICIONES</h3>
                                <fieldset>
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">ACEPTO LOS TERMINOS Y CONDICIONES.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
    </section>

    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>




    <!-- Select Plugin Js -->
    <script src="public/assets/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="public/assets/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="public/assets/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="public/assets/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="public/assets/sweetalert/sweetalert.min.js"></script>




 <!-- Waves Effect Plugin Js -->
    <script src="public/assets/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="public/assets/sb-admin/js/logueo.js"></script>
    <script src="public/assets/sb-admin/js/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="public/assets/sb-admin/js/demo.js"></script>

     <!-- my Js -->
    <script src="public/js/usuarios.js"></script>
</body>
</html>