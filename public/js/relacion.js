

/////////////// vistas participantes /////////////////////////////
function cargarRelaciones()
{
        var url = "../core/controllers/relacionesController.php";
        var metodo = "indexRelacion";

        $.post(url,{metodo:metodo}, function(data){
        $("#page-wrapper").html(data);
        });
}

////////crud participantes////////

