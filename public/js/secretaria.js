$(document).ready(function(){
	cargarProcesos();
});


//------------------------function botonesdel menu------------
$('#participantes').click(function(event){event.preventDefault(); cargarParticipantes(); });
$('#relaciones').click(function(event){event.preventDefault(); cargarRelaciones(); });

$('#proceso_predial').click(function(event){event.preventDefault(); cargarProcesos(); });
$('#predios').click(function(event){event.preventDefault(); cargarPredios(); });
//$('#usuarios').click(function(event){event.preventDefault(); cargarusuarios(); });
//$('#createProceso').click(function(){ cargarCreateProcesos(); });



