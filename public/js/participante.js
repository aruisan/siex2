


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

function cargarEditParticipante(id)
{	
		var url = "../core/controllers/participantesController.php";
        var metodo = "editParticipante";
        var di = "id="+id;

        $.post(url,{metodo:metodo, id:id}, function(data){
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
        $("#page-wrapper").html(data);
        });
}


function  updateParticipante(id)
{
	var datos = $('#form-create').serialize();
	var metodo = "metodo=updateParticipante";
	var url = "../core/controllers/participantesController.php";

	  $.post(url,datos+'&'+metodo+'&'+'id='+id, function(data){
        $("#page-wrapper").html(data);
        });
}


/////////////vistas  roles //////////////

function cargarUsuariosParticipantes()
{
        var url = "../core/controllers/participantesController.php";
        var metodo = "indexUsuariosParticipante";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}