$(document).ready(function(){
	cargarProcesos();
});


//------------------------function botonesdel menu------------
$('#procesos').click(function(event){event.preventDefault(); cargarProcesos(); });
$('#participantes').click(function(event){event.preventDefault(); cargarParticipantes(); });
$('#relaciones').click(function(event){event.preventDefault(); cargarRelaciones(); });
//$('#usuarios').click(function(event){event.preventDefault(); cargarusuarios(); });
//$('#createProceso').click(function(){ cargarCreateProcesos(); });



