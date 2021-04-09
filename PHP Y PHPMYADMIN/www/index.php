<?php 

    require_once("functions.php");
    require_once("dbconnect.php");
    require_once("contactUs.php");	
	

	echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
    $name = $surname = $phone = $email = $city = $country = $born = "";
    if (isset($_POST["newUser"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

        $mensaje="";
		
        //empezamos a validar campos:
        //NOMBRE
        if (empty($_POST["name"])) {
            $mensaje.= "<div class='msg-error'>Nombre no puede estar vacío</div>";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $mensaje.= "<div class='msg-error'>Solo se admiten letras y espacios en blanco.</div>";
            }
        }
        //FNACIMIENTO
        if (empty($_POST["dateborn"])) {
            $mensaje .= "<div class='msg-error'>Debes indicar tu fecha de nacimiento.</div>";
        } else {
            $born = $_POST["dateborn"];
            //calculamos la edad a partir de la fecha de nacimiento
            $edad=calculaEdad($born);
            setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
            if ($edad<18) {
                $mensaje.= "<div class='msg-error'>Debes ser mayor de 18 años para inscribirte.</div>";
            }
        }
        //EMAIL
        if(empty($_POST["email"])){
            $mensaje.="<div class='msg-error'>E-mail es obligatorio.</div>";
        }
		else
		{
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
                $mensaje.= "<div class='msg-error'>Formato de e-mail no es correcto.</div>";
            }        
        }
        
    }

    //si mensaje llega vacío, es que no ha habido errores de validación
    if(isset($mensaje) && $mensaje=="")
	{
	
	
        // ## SE GUARDA EL NUEVO USUARIO EN LA BD.
		
        $password=genPass();
        $sql = "INSERT INTO users (usname,ussurname,usalias,usemail,uspassword,usphone,usdborn,usciid,usactive) VALUES
		('".$name."','".$surname."','USUARIO DE PRUEBA','".$email."','".$password."','".$phone."','".$born."',28,false)";
		
        if ($connect->query($sql) === TRUE) {
            $mensaje = "<div class='msg-ok'>Se ha creado un nuevo registro en la base de datos.</div>";
			
			
            // ## SE LE ENVÍA EL E-MAIL DE ACTIVACIÓN.
			
            if(sendMail($_POST["email"],$name,"Activa tu cuenta","email_activacion.phtml",$password))
			{
                $mensaje.="<div class='msg-ok'>Mensaje enviado correctamente.</div>";
				// ## echo "<script>console.log(' $xx ');</script>"; 																// <================== tester
				
				// ## SE ABRE SESIÓN.
				session_start();
				$_SESSION["name"] = $name;
				$_SESSION['surname'] = $surname;
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['phone'] = $phone;
				$_SESSION['born'] = $born;
				$_SESSION['edad'] = $edad;
				$_SESSION['city'] = $city;
				$_SESSION['country'] = $country;				
				
				
				header("Location: http://localhost/register_result.php");
				// ## include_once("register_result.php"); 
			}
            else
			{
                $mensaje.="<div class='msg-error'>No se ha podido enviar e-mail. Pruebe de nuevo.</div>";
				// ## echo "<script>console.log(' $xx ');</script>"; 																	// <===================== tester
			}	
			
			
        // ## SE MUESTRAN LOS RESULTADOS.
			
        }
		else
		{
            $mensaje = "<div class='msg-error'>Error: " . $connect->errno . ". " . $connect->error."</div>";
            // ## include_once("register_form.php");
			include_once("index.php");
        }                       
    }
	else
	{
        //include_once("register_form.php");
		include_once("index.php");
	}
		include_once("index_html.php");
	
    require("footer.php");
?>

