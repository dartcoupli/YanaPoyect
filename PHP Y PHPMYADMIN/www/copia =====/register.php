<?php include("header.php") ?>
<?php 

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

    require("footer.html");
?>

<br><br>
<section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Registro</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <form name="sentMessage" id="contactForm" novalidate="novalidate">
      <div class="row">

        <div class="col-lg-4 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
 
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" id="name" type="text" placeholder="Nombre" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Surname</label>
                <input class="form-control" id="email" type="email" placeholder="Surname" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" id="phone" type="text" placeholder="Número de teléfono" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" id="message" type="text" placeholder="Email" required="required" data-validation-required-message="Please enter a message.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>

        <div class="col-lg-4 mx-auto">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" id="name" type="text" placeholder="Fecha de nacimiento" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Surname</label>
                <input class="form-control" id="email" type="email" placeholder="País" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" id="phone" type="text" placeholder="Distrito" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" id="message" type="text" placeholder="Ciudad" required="required" data-validation-required-message="Please enter a message.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Registrar!</button>
            </div>
          </div>
      </div>
    </form>
    </div>
  </section>
<?php include("footer.php") ?>