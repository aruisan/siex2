

/////////////// vistas Archivos /////////////////////////////
    function cargarAdjuntarArchivo(id){
        var url = "../core/controllers/secretariasController.php";
        var metodo = "indexArchivo";

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    }

     function cargarCreateArchivo()
    {
         var url = "../core/controllers/secretariasController.php";
        var metodo = "createArchivo";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
    }

    function cargarEditArchivo(id)
    {
        var url = "../core/controllers/secretariasController.php";
        var metodo = "editArchivo";

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    
    }

   



/////////////// crud Archivos /////////////////////////////