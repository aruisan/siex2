
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
        var datos = $('#form-create-proceso').serialize();

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

    function cargarFormParticipantes()
    {
        var url = "../core/controllers/participantesController.php";
        var metodo = 'createParticipante';

        $.post(url,{metodo:metodo}, function(data)
        {
            console.log(data);
        $(".modal-body").html(data);
        $('#cancelarStoreParticipante, #migas, #storeParticipante').remove();
        $('#relacionar2').show();
        $('#relacionar').hide();
        });
    }

    function relacionar()
    {
        var id = $('input[name=id]').val();
        var nom = $('input[name=nom]').val();
        var dc = $('input[name=dc]').val();

        $('#demandado').val(nom+' ID: '+dc);
        $('input[name=demandado]').val(id);
    }

    function storeParticipanteProceso()
    {
            var datos = $('#form-create').serialize();
            var metodo = "metodo=storeParticipanteProceso";
            var url = "../core/controllers/participantesController.php";

            $.post(url,datos+'&'+metodo, function(data){
                console.log(data);
            datos = jQuery.parseJSON(data);

            $('#demandado').val(datos.nom_datos+' ID: '+datos.num_dc);
            $('input[name=demandado]').val(datos.id_datos);
            });
    }