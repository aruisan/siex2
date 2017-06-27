
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
    function storeProceso()
    {
        var url = "../core/controllers/procesosController.php";
        var metodo = "metodo=storeProceso";
        var datos = $('#form-create').serialize();

        $.post(url,datos+'&'+metodo, function(data){
        $("#page-wrapper").html(data);
        });
    }

        function updateProceso(di)
    {
        var url = "../core/controllers/procesosController.php";
        var metodo = "metodo=updateProceso";
        var id = "id="+di;
        var datos = $('#form-create').serialize();

        $.post(url,datos+'&'+metodo+'&'+id, function(data){
            console.log(data);
        $("#page-wrapper").html(data);
        });
    }
