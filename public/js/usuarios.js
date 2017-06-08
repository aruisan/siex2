$(document).ready(function(){
	cargarProcesos();
});


//------------------------function botonesdel menu------------
$('#procesos').click(function(event){event.preventDefault(); cargarProceso(); });




    ////////function de cargar section////////

    function cargarProceso()
    {
        var url = "../core/controllers/usuariosController.php";
        var metodo = "index";
        var id = $('#id').val();

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    
    }



 