<?php
    require("header.php");
    $name = $surname = $phone = $email = $city = $country = $born = "";
    if (isset($_POST["newUser"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("functions.php");
        require_once("dbconnect.php");
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
        }else{
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensaje.= "<div class='msg-error'>Formato de e-mail no es correcto.</div>";
            }        
        }     
    }
    
    //si mensaje llega vacío, es que no ha habido errores de validación
    if(isset($mensaje) && $mensaje==""){
        //se guarda el nuevo usuario en la BD:
        $password=genPass();
        $sql = "INSERT INTO users (usname,ussurname,usemail,uspassword,usphone,usdborn,usciid,usactive) VALUES ('".$name."','".$surname."','".$email."','".$password."','".$phone."','".$born."',28,false)";
        if ($connect->query($sql) === TRUE) {
            $mensaje = "<div class='msg-ok'>Se ha creado un nuevo registro en la base de datos.</div>";
            //se le envía el e-mail de activación
            if(sendMail($_POST["email"],$name,"Activa tu cuenta","email_activacion.phtml",$password))
                $mensaje.="<div class='msg-ok'>Mensaje enviado correctamente.</div>";
            else
                $mensaje.="<div class='msg-error'>No se ha podido enviar e-mail. Pruebe de nuevo.</div>";
            //se muestran los resultados
            include_once("register_result.php"); 
        } else {
            $mensaje = "<div class='msg-error'>Error: " . $connect->errno . ". " . $connect->error."</div>";
            include_once("register_form.php");
        }                       
    }else
        include_once("register_form.php");

    require("footer.php");
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type = "text/javascript">
        //window.onload = function() {
            function showCities(query){
                console.log(query);
                //var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#countryList').fadeIn();
                            $('#countryList').html(data);
                        }
                    });
                }
            }
        
 document.addEventListener('click',function(e){
    if(e.target.tagName== 'LI'){
        console.log(e);
        $('#country').val(e.target.innerText);
        $('#countryList').fadeOut();
          //do something
     }
 });
        

    </script>

