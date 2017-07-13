
var url = "../core/controllers/prediosController.php";

/////////////// vistas participantes /////////////////////////////
function cargarPredios()
{       
        var url = "../core/controllers/prediosController.php";
        var metodo = "indexPredio";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}

function cargarCreatePredio()
{
        var metodo = "createPredio";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}

function cargarEditPredio(id)
{	
        var metodo = "editPredio";
        var di = "id="+id;

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });

}

function agregarPropietarioPredio(id)
{
       
        var metodo = "indexPropietarioPredio";
        $.post(url,{id:id, metodo:metodo}, function(data){
        $(".modal-body-1").html(data);
        $('#storeParticipantePredioProceso').hide();
        });
}



////////crud participantes////////

function storePredio()
{
	var datos = $('#form-create').serialize();
	var metodo = "metodo=storePredio";

	  $.post(url,datos+'&'+metodo, function(data){
        $("#page-wrapper").html(data);
        });
}



function  updatePredio(id)
{
	var datos = $('#form-create').serialize();
	var metodo = "metodo=updatePredio";

	  $.post(url,datos+'&'+metodo+'&'+'id='+id, function(data){
        $("#page-wrapper").html(data);
        });
}


function storeParticipantePredio(id)
{
        var datos = $('#form-create-dueno').serialize();
        var metodo = "metodo=storeParticipantePredio";
        var carga =  "carga=predio"; 
        alert(datos);

          $.post(url,datos+'&'+carga+'&'+metodo+'&id='+id, function(data){
        $(".modal-body-1").html(data);
        console.log(data);
        });
}

/////////////vistas  roles //////////////

function cargarUsuariosParticipantes()
{
        var url = "../core/controllers/participantesController.php";
        var metodo = "indexUsuariosPredio";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}

///////////////otras funciones

