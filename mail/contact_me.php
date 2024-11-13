<?php
// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   echo "¡No se proporcionan argumentos!";
   return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Crea el correo electrónico y envía el mensaje
$to = 'susanacasadeycba@gmail.com'; // Dirección de correo donde recibes el mensaje
$email_subject = "Formulario de contacto del sitio web: $contact_me";
$email_body = "Ha recibido un nuevo mensaje desde el formulario de contacto de su sitio web.\n\n" . "Aquí están los detalles:\n\nNombre: $name\n\nCorreo electrónico: $email_address\n\nMensaje:\n$message";
$headers = "From: susanacasadeycba@susanacasadey.com.ar\n"; // Cambia esto por un correo válido desde tu dominio
$headers .= "Reply-To: $email_address";

if (mail($to, $email_subject, $email_body, $headers)) {
   echo "¡Mensaje enviado con éxito!";
   return true;
} else {
   echo "Error al enviar el mensaje.";
   return false;
}
