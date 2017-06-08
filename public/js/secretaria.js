$(document).ready(function(){
	cargarProcesos();
});


//------------------------function botonesdel menu------------
$('#procesos').click(function(event){event.preventDefault(); cargarProcesos(); });
//$('#usuarios').click(function(event){event.preventDefault(); cargarusuarios(); });
//$('#createProceso').click(function(){ cargarCreateProcesos(); });



    ////////function Vistas proceso////////

    function cargarProcesos()
    {
        var url = "../core/controllers/secretariasController.php";
        var metodo = "indexProceso";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
    
    }

    function cargarCreateProceso()
    {
	    var url = "../core/controllers/secretariasController.php";
        var metodo = "createProceso";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
	}

    function cargarEditProceso(id)
    {
        var url = "../core/controllers/secretariasController.php";
        var metodo = "editProceso";

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    }


////////crud proceso////////

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