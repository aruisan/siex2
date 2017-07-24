		(function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));


		
    $("#buscar").click(function(event){
                event.preventDefault();
               var url = "core/controllers/principalController.php";
               var datos = $('#datos').val();
               var metodo = "buscar";

               $.post(url,{datos:datos, metodo:metodo},function(data){
                   $('.modal-body-respuesta').html(data);
               });
          

         });

         $('#cerrar_tabla').click(function(){
                  $('#resultado').hide('low');
         });


    $('#contactenos').click(function(event){event.preventDefault(); cargarContactenos(); });
    $('#enviarCorreo').click(function(event){event.preventDefault(); enviarContactenos(); });

  function cargarContactenos()
  {
       var url = "contactenos.php";
               $.post(url,function(data){
                   $('.modal-body-contactenos').html(data);
               });
  }

  function enviarContactenos()
  {
           var url = "enviar.php";
               $.post(url,function(data){
                  console.log(data);
                  if(data == 1){
                    $('#caja_respuesta').show().html('<div class="alert alert-success text-center">Correo enviado</div>');
                  }else{
                   $('#caja_respuesta').show().html('<div class="alert alert-danger text-center">error al enviar datos</div>');
                  }
                  setTimeout(function(){ $('#caja_respuesta').hide(); }, 3000);
               });
  }