<?php
if($_POST['email'] != '' && $_POST['name'] !='' && $_POST['message'] != '') {

	// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
	$email_para = "info@altaespecialidad.co";
	$email_asunto = "Contacto desde la pagina web siex.com.co";
	
	 $nombre = $_POST["name"];
	$email = $_POST["email"];
	 $mensaje = $_POST["message"];
	
	$contenido= "Nombre: " . $nombre . "\nCorreo: " . $email . "\nMensaje: " . $mensaje;
	
	mail($email_para,$email_asunto, $contenido);


?>

	<div class="alert alert-success text-center">Correo enviado</div>


<?php  
}else{
?>
	<div class="alert alert-danger text-center">error al enviar datos</div>

<?php 
}
?>