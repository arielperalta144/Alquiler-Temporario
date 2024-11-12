<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "arielperalta144@gmail.com";
    $subject = "Nuevo mensaje de contacto";
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $email_content = "Nombre: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    $email_headers = "From: $email";

    if (mail($to, $subject, $email_content, $email_headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Hubo un problema al enviar el mensaje. Inténtalo de nuevo.";
    }
}
