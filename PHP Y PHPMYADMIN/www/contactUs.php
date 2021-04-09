<?php

//  _________                __                 __   ____ ___                       .__.__  .__                 ___________       ____ ___       
//  \_   ___ \  ____   _____/  |______    _____/  |_|    |   \______   _____ _____  |__|  | |__| ____    ____   \__    ___/___   |    |   \______
//  /    \  \/ /  _ \ /    \   __\__  \ _/ ___\   __\    |   /  ___/  /     \\__  \ |  |  | |  |/    \  / ___\    |    | /  _ \  |    |   /  ___/
//  \     \___(  <_> )   |  \  |  / __ \\  \___|  | |    |  /\___ \  |  Y Y  \/ __ \|  |  |_|  |   |  \/ /_/  >   |    |(  <_> ) |    |  /\___ \ 
//   \______  /\____/|___|  /__| (____  /\___  >__| |______//____  > |__|_|  (____  /__|____/__|___|  /\___  /    |____| \____/  |______//____  >
//          \/            \/          \/     \/                  \/        \/     \/                \//_____/                                 \/ 
	
    require_once("functions.php");
    require_once("dbconnect.php");	
		
		
    $nameInput = $emailInput = $messageInput = "";
	
	
    if (isset($_POST["newContactUs"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $mensaje="";
        //empezamos a validar campos:
        //NOMBRE - NAME
        if (empty($_POST["nameInput"])) {
            $mensaje.= "<div class='msg-error'>Nombre no puede estar vacío</div>";
        } else {
            $name = test_input($_POST["nameInput"]);
            // check if name only contains letters and whitespace
        }
        //FNACIMIENTO
        if (empty($_POST["messageInput"])) {
            $mensaje .= "<div class='msg-error'>Debes escribir un mensaje.</div>";
        } else {
            $message = $_POST["messageInput"];
			// check if name only contains letters and whitespace
        }
        //EMAIL
        if(empty($_POST["emailInput"])){
            $mensaje.="<div class='msg-error'>E-mail es obligatorio.</div>";
        }else{
            $email = test_input($_POST["emailInput"]);    
        }     
    }
    
    //si mensaje llega vacío, es que no ha habido errores de validación
    if(isset($mensaje) && $mensaje==""){
        //se guarda el nuevo mensaje en la BD:
        $sql = "INSERT INTO messages (name,email,message) VALUES ('".$name."','".$email."','".$message."')";
        if ($connect->query($sql) === TRUE) {
            $mensaje = "<div class='msg-ok'>Tu mensaje ha sido enviado.</div>";
            //se le envía el e-mail de activación
            if(sendMailContactUs('proyectoyana@gmail.com',$email,$name,"Mensaje de Contactanos","email_contactUs.phtml",$message))
			{
                $mensaje.="<div class='msg-ok'></div>";
				echo "<script>alert('El mensaje se ha enviado correctamente');</script>";
			}
            else
			{
                $mensaje.="<div class='msg-error'></div>";
				echo "<script>alert('El mensaje no se ha enviado');</script>";
			}
        } else {
            $mensaje = "<div class='msg-error'>Error: " . $connect->errno . ". " . $connect->error."</div>";
            include_once("index.php");
        }                       
    }else
        include_once("index.php");

?>

