<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Logueo de SIEX</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <base href="../">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
     <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css">

     <!-- Waves Effect Css -->
    <link href="public/assets/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="public/assets/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <form  method="POST" action="core/controllers/usuariosController.php">
                    <div class="msg">Ingresa tus datos</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nick" placeholder="Usuario" required >
                            <input type="hidden" name="metodo" value="loguearse">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5">
                            <button class="btn btn-block bg-blue waves-effect" id="loguearse">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- jQuery -->
    <script src="public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>


    <!-- Waves Effect Plugin Js -->
    <script src="public/assets/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="public/assets/sb-admin/js/logueo-admin.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>