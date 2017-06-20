


/////////////// vistas participantes /////////////////////////////
function cargarParticipantes()
{
        var url = "../core/controllers/participantesController.php";
        var metodo = "indexParticipante";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}

function cargarCreateParticipante()
{
        var url = "../core/controllers/participantesController.php";
        var metodo = "createParticipante";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}


////////crud participantes////////

function storeParticipante()
{
	var datos = $('#form-create').serialize();
	var metodo = "metodo=storeParticipante";
	var url = "../core/controllers/participantesController.php";

	  $.post(url,datos+'&'+metodo, function(data){
	  	console.log(data);
        $("#page-wrapper").html(data);
        });
}

