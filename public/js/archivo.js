

/////////////// vistas Archivos /////////////////////////////
    

     function cargarCreateArchivo()
    {
        var url = "../core/controllers/archivosController.php";
        var metodo = "createArchivo";

        $.post(url,{metodo:metodo}, function(data){
          $('#updateArchivo').hide();
          $('#storeArchivo').show();
        $(".modal-body-2").html(data);
        });
    }

    function cargarEditArchivo(id)
    {
        var url = "../core/controllers/archivosController.php";
        var metodo = "editArchivo";

        $.post(url,{metodo:metodo, id:id}, function(data){
          $('#updateArchivo').show();
          $('#storeArchivo').hide();
        $(".modal-body-2").html(data);
        });
    
    }

    function storeArchivo(id)
    {
        var url = "../core/controllers/archivosController.php";
        var datos = new FormData($("#form-archivo")[0]);
        datos.append("metodo", "storeArchivo");
        datos.append("id", id);

        $.ajax({
              type: "POST",
              url: url,
              data: datos,
              contentType: false, //importante enviar este parametro en false
              processData: false, //importante enviar este parametro en false
              success: function(data){ 
              console.log(data);   
                 $("#page-wrapper").html(data);
              },
              error: function (r) {
                  
                  alert("Error del servidor");
              }
          });


    }

    function updateArchivo(id)
    {
      var url = "../core/controllers/archivosController.php";
        var datos = new FormData($("#form-archivo")[0]);
        datos.append("metodo", "updateArchivo");
        datos.append("id", id);

        $.ajax({
              type: "POST",
              url: url,
              data: datos,
              contentType: false, //importante enviar este parametro en false
              processData: false, //importante enviar este parametro en false
              success: function(data){ 
              console.log(data);   
                 $("#page-wrapper").html(data);
              },
              error: function (r) {
                  
                  alert("Error del servidor");
              }
          });


    }

   



/////////////// impulsos /////////////////////////////
 function cargarCreateImpulso(id)
    {
        var url = "../core/controllers/archivosController.php";
        var metodo = "createImpulso";

        $.post(url,{metodo:metodo, id:id}, function(data){
          console.log(data);
        $("#formulario-impulso").html(data);
        });
    }

    function cargarEditImpulso(id)
    {
        var url = "../core/controllers/archivosController.php";
        var metodo = "editImpulso";

        $.post(url,{metodo:metodo, id:id}, function(data){
          $('#updateArchivo').show();
          $('#storeArchivo').hide();
        $(".modal-body-2").html(data);
        });
    
    }
  ////////crud impulso


   function storeImpulso(id)
    {
        var url = "../core/controllers/archivosController.php";
        var metodo = "&metodo=storeImpulso";
        var di = "&id="+id;
        var data = $('#form-create-impulso').serialize();
        alert(id);

        $.post(url,data+metodo+di, function(data){
          console.log(data);
        $("#formulario-impulso").html(data);
        });
    }