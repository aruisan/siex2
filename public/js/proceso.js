
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
        $("#page-wrapper").html(data);
        });
    }

    function cargarFormParticipantes()
    {
        var url = "../core/controllers/participantesController.php";
        var metodo = 'createParticipante';

        $.post(url,{metodo:metodo}, function(data)
        {
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

        $('#demandado, #dueno').val(nom+' ID: '+dc);
        $('input[name=demandado], input[name=dueno]').val(id);
    }

    function storeParticipanteProceso()
    {
            var datos = $('#form-create').serialize();
            var metodo = "metodo=storeParticipanteProceso";
            var url = "../core/controllers/participantesController.php";

            $.post(url,datos+'&'+metodo, function(data){
            datos = jQuery.parseJSON(data);

            $('#demandado, #dueno').val(datos.nom_datos+' ID: '+datos.num_dc);
            $('input[name=demandado], input[name=dueno]').val(datos.id_datos);
            });
    }


    function indexPredioProceso(id, expediente)
    {
        var url = "../core/controllers/procesosController.php";
        var metodo = "indexPredioProceso";

        $.post(url,{metodo:metodo, id:id, exp:expediente}, function(data){
        $("#page-wrapper").html(data);
        $('#createPredio').hide();
        $('#createPredioProceso').show();
        });
    }
/*
    function agregarPropietarioPredioProceso(id)
    {
        var metodo = "indexPropietarioPredio";
        var url = "../core/controllers/prediosController.php";
        $.post(url,{id:id, metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        $('#storeParticipantePredio').hide();
        });
    }

    function storeParticipantePredioProceso(id)
    {
        var datos = $('#form-create-dueno').serialize();
        var url = "../core/controllers/prediosController.php";
        var metodo = "metodo=storeParticipantePredio";
        var carga =  "carga=proceso";   

          $.post(url,datos+'&'+carga+'&'+metodo+'&id='+id, function(data){
        $("#page-wrapper").html(data);
        });
    }*/