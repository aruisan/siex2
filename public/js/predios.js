
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

          $.post(url,datos+'&'+metodo+'&id='+id, function(data){
        $("#page-wrapper").html(data);
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

function validarDC()
{
        var url = "../core/controllers/participantesController.php";
        var metodo = "validarDcPredio";
        var dc = $('#dc').val();

        $.post(url,{metodo:metodo, dc:dc}, function(data){
        console.log(data);
                if(data == 0)
                {
                        
                }else{
                        datos = jQuery.parseJSON(data);
                        $('input[name=id]').val(datos.id_datos);
                        $('input[name=nom]').val(datos.nom_datos);
                        $('input[name=email]').val(datos.email);
                        $('input[name=direccion]').val(datos.direccion);
                        $('input[name=telefono]').val(datos.telefono);
                                if(datos.tipo_persona=='NATURAL')
                                {      
                                        $('#persona').find("option[value='NATURAL']").remove();
                                        $('#persona').append('<option value="'+datos.tipo_persona+'" selected="selected">'+datos.tipo_persona+'</option>');                 
                                }else if(datos.tipo_persona=='JURIDICA')
                                {
                                        $('#persona').find("option[value='JURIDICA']").remove();
                                        $('#persona').append('<option value="'+datos.tipo_persona+'" selected="selected">'+datos.tipo_persona+'</option>');
                                }
                        $('#storeParticipante, #relacionar2').hide();
                        $('#cancelarStoreParticipante, #relacionar').show();
                }  
        });
}
