

/////////////// vistas Archivos /////////////////////////////
    

     function cargarCreateArchivo()
    {
        var url = "../core/controllers/archivosController.php";
        var metodo = "createArchivo";

        $.post(url,{metodo:metodo}, function(data){
        $(".modal-body-2").html(data);
        });
    }

    function cargarEditArchivo(id)
    {
        var metodo = "editArchivo";

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    
    }

    function storeArchivo(id)
    {
        var url = "../core/controllers/archivosController.php";
        var datos = new FormData($("#form-archivo")[0]);
        datos.append("metodo", "storeArchivo");
        datos.append("id", id);
        alert(datos);

        $.ajax({
              type: "POST",
              url: url,
              data: datos,
              contentType: false, //importante enviar este parametro en false
              processData: false, //importante enviar este parametro en false
              success: function(data){    
                 $(".modal-body-2").html(data);
              },
              error: function (r) {
                  
                  alert("Error del servidor");
              }
          });


    }

   



/////////////// crud Archivos /////////////////////////////