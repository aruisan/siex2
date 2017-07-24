<?php
//if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_para = "soporte@altaespecialidad.co";
$email_asunto = "Contacto desde la pagina web siex.com.co";

$nombre = $_POST["name"];
$email = $_POST["email"];
$mensaje = $_POST["message"];

$contenido= "Nombre: " . $nombre . "\nCorreo: " . $email . "\nMensaje: " . $mensaje;

mail($email_para,$email_asunto, $contenido);

if(mail())
{
	echo 1;
}else{
	echo 0;
}
?>