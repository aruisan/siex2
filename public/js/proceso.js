
    ////////function Vistas proceso////////

    function cargarProcesos()
    {
        var url = "../core/controllers/procesosController.php";
        var metodo = "indexProceso";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
    
    }

    function cargarCreateProceso()
    {
	    var url = "../core/controllers/procesosController.php";
        var metodo = "createProceso";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
	}

    function cargarEditProceso(id)
    {
        var url = "../core/controllers/procesosController.php";
        var metodo = "editProceso";

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    }


////////crud proceso////////