<!DOCTYPE html>
<html>
   <head>
      <title>Siex</title>
      <meta charset="utf-8">
      <meta name="description" content="Traveling HTML5 Template" />
      <meta name="author" content="Design Hooks" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      
      <!-- Latest compiled and minified CSS -->
      <link href="public/assets/bootstrap/css/bootstrap.min.css">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="public/assets/font-awesome/css/font-awesome.min.css">
      <link href="public/img/logo.png" type="image/x-icon" rel="shortcut icon" />
      <link href="public/css/screen.css" rel="stylesheet" />
      <link href="public/css/miStilo.css" rel="stylesheet" />
   </head>
   <body class="home" id="page">
      <!-- Header -->
      <header class="main-header">
         <div class="container">
            <div class="header-content">
               <a href="index.html">
                  <img src="public/img/logo.png" width="150" alt="site identity" /><h5 style="color: white;">Sistema Integral de EXpedientes</h5>
               </a>

               <nav class="site-nav">
                  <ul class="clean-list site-links">
                     <li>
                        <a href="#">Contactenos</a>
                     </li>
                  </ul>

                  <a href="#" class="btn btn-outlined">Entrar</a>
               </nav>
            </div>
         </div>
      </header>
      <!-- Main Content -->
      <div class="content-box">
         <!-- Hero Section -->
         <section class="section section-hero">
            <div class="hero-box">
               <div class="container">
                  <div class="hero-text align-center">
                     <h1>Busca tu Proceso</h1>
                  </div>
                  <div class="destinations-form">
                     <div class="input-line">
                        <input type="text"  id="datos" class="form-input check-value" placeholder="Nombre, Identificacion o Proceso" />
                        <button id="buscar" class="form-submit btn btn-special">Buscar <i class="fa fa-search fa-2x"></i> </button>
                     </div>
                      <div id="resultado">      
                        <button id="cerrar_tabla" class="btn btn-danger pull-right">X</button>
                        <div id="tabla"> 
                        </div>
                      </div>
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-7">
                  <center><h4>EVENTOS</h4></center>
                  <div class="fb-page" 
                    data-href="https://www.facebook.com/Siexcomco/" 
                    data-tabs="events" 
                    data-small-header="true" 
                    data-adapt-container-width="true" 
                    data-hide-cover="false"
                    data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/Siexcomco/" class="fb-xfbml-parse-ignore">
                      <a href="https://www.facebook.com/Siexcomco/">Siex.com.co</a>
                    </blockquote>
                  </div>
              </div>
              <div class="col-md-7">
                    <center><h4>MURO</h4></center>
                   <div class="fb-page" 
                    data-href="https://www.facebook.com/Siexcomco/" 
                    data-tabs="timeline" 
                    data-small-header="true" 
                    data-adapt-container-width="true" 
                    data-hide-cover="false"
                    data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/Siexcomco/" class="fb-xfbml-parse-ignore">
                      <a href="https://www.facebook.com/Siexcomco/">Siex.com.co</a>
                    </blockquote>
                  </div>
              </div>

              <div class="col-md-7">
                    <center><h4>DEJAR MENSAJE</h4></center>
                   <div class="fb-page" 
                    data-href="https://www.facebook.com/Siexcomco/" 
                    data-tabs="messages" 
                    data-small-header="true" 
                    data-adapt-container-width="true" 
                    data-hide-cover="false"
                    data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/Siexcomco/" class="fb-xfbml-parse-ignore">
                      <a href="https://www.facebook.com/Siexcomco/">Siex.com.co</a>
                    </blockquote>
                  </div>
              </div>
            </div>
         </section>
      </div>   
   </body>

      <!-- Scripts -->
      <script src="public/js/jquery.js"></script>
      <script src="public/js/functions.js"></script>
      <div id="fb-root"></div>
      <script src="public/js/principal.js"></script>
</html>
