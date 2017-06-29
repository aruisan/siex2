$(document).ready(function(){
	//cargarProcesos();
});


//------------------------function botonesdel menu------------
$('#procesos').click(function(event){event.preventDefault(); cargarProceso(); });
$('#storeUsuario').click(function(event){event.preventDefault(); storeUsuario(); });




    ////////vistas de usuarios////////

    function cargarProceso()
    {
        var url = "../core/controllers/usuariosController.php";
        var metodo = "index";
        var id = $('#id').val();

        $.post(url,{metodo:metodo, id:id}, function(data){
        $("#page-wrapper").html(data);
        });
    }

    ////////crud de usuarios////////

    function storeUsuario()
    {
        var url = "../core/controllers/usuariosController.php";
        var datos = $('#wizard_with_validation').serialize();
        var metodo = "metodo=storeUsuario";
        var id = $('#id').val();

        $.post(url,datos+'&'+metodo, function(data){
        $("#page-wrapper").html(data);
        });
    }


 