<?php
//ELIMINA CARACTERES ESPECIALES DE UNA CADENA
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//DEVUELVE LA EDAD A PARTIR DE LA FECHA
function calculaEdad($fnacimiento)
{
    list($ano,$mes,$dia) = explode("-", $fnacimiento);
    $ano_diferencia = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
    return $ano_diferencia;
}

//GENERA PASSWORD ALEATORIO
function genPass(){
    $psswd = substr( md5(microtime()), 1, 4);
    return $psswd;
}
//FUNCION DE EDISON PARA GENERAR PASSWORD ALEATORIO
function genPass2(){
    $car = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
    return substr($car, rand(0, 62-4), 4); 
}

//ENCRIPTA EL PASSWORD
function encriptarPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
}

//DESENCRIPTA EL PASSWORD
function comprobarPassword($password, $hash) {
    return password_verify($password, $hash);
}


//ENVIAR E_MAIL
function sendMail($destinatario,$nombre,$asunto,$template,$data=NULL)
{
	// ## INICIAMOS SESSION
	session_start();
	
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';
    
    $template="email_templates/".$template;

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    /** Configurar SMTP, Mirar configuración de gmail **/ 
    $mail->isSMTP();                                      // Indicamos que use SMTP
    $mail->Host = 'smtp.gmail.com';  // Indicamos los servidores SMTP
    $mail->SMTPAuth = true;                               // Habilitamos la autenticación SMTP
    $mail->Username = 'proyectoyana@gmail.com';                  // SMTP username  proyectoyana@gmail.com
    $mail->Password = 'proyectoYANA99';                         // SMTP password proyectoYANA99
    $mail->SMTPSecure = 'tls';                            // Habilitar encriptación TLS o SSL
    $mail->Port = 587;                                    // TCP port
	$mail->CharSet = 'UTF-8';                             //<============= NUEVO AÑADIDO PARA FORMATEAR A UTF DESDE PHPMAILER, FUENTE https://es.stackoverflow.com/questions/104901/problema-con-acentos-en-env%C3%ADo-de-correos-electr%C3%B3nicos
	
    /** Configurar cabeceras del mensaje **/
    $mail->From = 'proyectoyana@gmail.com';                       // Correo del remitente
    $mail->FromName = 'Proyecto YANA';           // Nombre del remitente
    $mail->Subject = $asunto;                // Asunto
    $body=file_get_contents($template);
    $body=str_replace("%nombre%", $nombre, $body);
    $body=str_replace("%email%", $destinatario, $body);
    $body=str_replace("%data%", $data, $body);
	$body=str_replace("%born%", $_SESSION['born'], $body);
    $mail->msgHTML($body);
    /** Incluir destinatarios. El nombre es opcional **/
    $mail->addAddress($destinatario, $nombre);
    //$mail->addAddress('destinatario2@correo.com', 'Nombre2');
    //$mail->addAddress('destinatario3@correo.com', 'Nombre3');

    /** Con RE, CC, BCC **/
    //$mail->addReplyTo('info@correo.com', 'Informacion');
    //$mail->addCC('cc@correo.com');
    //$mail->addBCC('bcc@correo.com');

    /** Incluir archivos adjuntos. El nombre es opcional **/
    //$mail->addAttachment('/archivos/miproyecto.zip');        
    //$mail->addAttachment('/imagenes/imagen.jpg', 'nombre.jpg');

    /** Enviarlo en formato HTML **/
    $mail->isHTML(true);                                  

    /** Configurar cuerpo del mensaje **/
    //$mail->Body    = 'Este es el mensaje en HTML <b>en negrita!</b>';
    //$mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';

    /** Para que use el lenguaje español **/
    $mail->setLanguage('es');

    /** Enviar mensaje... **/
    if(!$mail->send()) {
        //echo '<center style="color:#f00">El mensaje no pudo ser enviado.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo.'</center>';
        return false;
    } else {
        //echo '<center style="color:#0f0">Mensaje enviado correctamente</center>';
        return true;
    }
	
	
	// ## CIERRE DE SESSIÓN
	session_destroy();
}

//ENVIAR E_MAIL DE CONSTACTANOS
function sendMailContactUs($destinatario,$email, $nombre,$asunto,$template,$message=NULL){
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';
    
    $template="email_templates/".$template;

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    /** Configurar SMTP, Mirar configuración de gmail **/ 
    $mail->isSMTP();                                      // Indicamos que use SMTP
    $mail->Host = 'smtp.gmail.com';  // Indicamos los servidores SMTP
    $mail->SMTPAuth = true;                               // Habilitamos la autenticación SMTP
    $mail->Username = 'proyectoyana@gmail.com';                  // SMTP username  proyectoyana@gmail.com
    $mail->Password = 'proyectoYANA99';                         // SMTP password proyectoYANA99
    $mail->SMTPSecure = 'tls';                            // Habilitar encriptación TLS o SSL
    $mail->Port = 587;                                    // TCP port

    /** Configurar cabeceras del mensaje **/
    $mail->From = 'proyectoyana@gmail.com';                       // Correo del remitente
    $mail->FromName = 'Proyecto YANA';           // Nombre del remitente
    $mail->Subject = $asunto;                // Asunto
    $body=file_get_contents($template);
    $body=str_replace("%name%", $nombre, $body);
    $body=str_replace("%email%", $email, $body);
	$body=str_replace("%message%", $message, $body);
    $mail->msgHTML($body);
    /** Incluir destinatarios. El nombre es opcional **/
    $mail->addAddress($destinatario, $nombre);
    //$mail->addAddress('destinatario2@correo.com', 'Nombre2');
    //$mail->addAddress('destinatario3@correo.com', 'Nombre3');

    /** Con RE, CC, BCC **/
    //$mail->addReplyTo('info@correo.com', 'Informacion');
    //$mail->addCC('cc@correo.com');
    //$mail->addBCC('bcc@correo.com');

    /** Incluir archivos adjuntos. El nombre es opcional **/
    //$mail->addAttachment('/archivos/miproyecto.zip');        
    //$mail->addAttachment('/imagenes/imagen.jpg', 'nombre.jpg');

    /** Enviarlo en formato HTML **/
    $mail->isHTML(true);                                  

    /** Configurar cuerpo del mensaje **/
    //$mail->Body    = 'Este es el mensaje en HTML <b>en negrita!</b>';
    //$mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';

    /** Para que use el lenguaje español **/
    $mail->setLanguage('es');

    /** Enviar mensaje... **/
    if(!$mail->send()) {
        //echo '<center style="color:#f00">El mensaje no pudo ser enviado.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo.'</center>';
        return false;
    } else {
        //echo '<center style="color:#0f0">Mensaje enviado correctamente</center>';
        return true;
    }

}

?>