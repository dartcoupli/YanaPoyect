<!--  .____                                __         ____. _________  -->
<!--  |    |    ____   ____   ____  __ ___/  |_      |    |/   _____/  -->
<!--  |    |   /  _ \ / ___\ /  _ \|  |  \   __\     |    |\_____  \   -->
<!--  |    |__(  <_> ) /_/  >  <_> )  |  /|  |   /\__|    |/        \  -->
<!--  |_______ \____/\___  / \____/|____/ |__|   \________/_______  /  -->
<!--          \/    /_____/                                       \/   -->

<!-- ## NOS DELOGUEAMOS SI HAY UNA SESIÖN INICIADA, ANTES DE LOGUEARNOS. RESETEA LAS COOKIES -->
<script>
	function getCookie(name) {
		var conversion = decodeURIComponent(document.cookie);
		var arrayCookie = conversion.split(';');
		var cookieName = name + "=";
		var c;

		for (var i = 0; i < arrayCookie.length; i += 1)
		{
			
			
			if (arrayCookie[i].indexOf(name, 0) > -1)
			{


				// #console.log("valore en bruto:" + arrayCookie[i]);                                                           //<==== TESTD
				arrayCookie[i] = arrayCookie[i].replace(cookieName, '');
				c = arrayCookie[i].replace(' ', '');
				// #console.log("valore cookie:" + c);                                                                			 //<==== TESTD
				return c;
			}
			
			
		}
		return "";
		
		
	  }

	//COMPROBAMOS QUE COOKIES NO EXISTEN; SI EXISTE SE RESETEA Y REFRESCA, UNA VEZ HECHO; VUELVE A COMPROBAR AL NO EXISTIR, NO VUELVE A RESETEAR NI REFRESCAR.
	var myCookie = getCookie("yana_user_cookie");
	
	if (myCookie != '')
	{
		var expiry = new Date();
		expiry.setTime(expiry.getTime() - 3600);
		document.cookie = 'yana_user_cookie' + "=''; expires=" + expiry.toGMTString() + "; path=/";                      
		document.cookie = 'yana_password_cookie' + "=''; expires=" + expiry.toGMTString() + "; path=/";
	
			
		// REFRESCA LA PÁGINA DE LOGIN.
		location.reload(true);
		
	}
</script>

<?php

//  .____                 .__          ____ ___         ____________________ ________      _____    __________  ___ _____________ 
//  |    |    ____   ____ |__| ____   |    |   \_____   \_   _____|______   \\_____  \    /     \   \______   \/   |   \______   \
//  |    |   /  _ \ / ___\|  |/    \  |    |   |____ \   |    __)  |       _/ /   |   \  /  \ /  \   |     ___/    ~    \     ___/
//  |    |__(  <_> ) /_/  >  |   |  \ |    |  /|  |_> >  |     \   |    |   \/    |    \/    Y    \  |    |   \    Y    /    |    
//  |_______ \____/\___  /|__|___|  / |______/ |   __/   \___  /   |____|_  /\_______  /\____|__  /  |____|    \___|_  /|____|    
//          \/    /_____/         \/           |__|          \/           \/         \/         \/                   \/           

	require_once("dbconnect.php");
    require_once("functions.php");
	
	echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";
    	
		
    // ## COMPROBACIÓN DEL PASSWORD
	
    if (isset($_POST["loginUser"]) && $_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		
		$mensaje="";
		
		if(!empty($_POST["email"]) && !empty($_POST["password"]))
		{
			
			
			// ## COMPROBAMOS PRIMERO QUE EL MAIL INTRODUCIDO EXISTE PARA QUE NO NOS SALTE ERROR DE PHP. Trying to access array offset on value of type null
			
			
			$sql="SELECT * FROM users";
			$resultado = $connect->query($sql);	
			
			
			// ## RECORREMOS TODA LA COLUMNA DE EMAIL Y COMPROBAMOS QUE COINCIDE CON EL EMAIL INTRODUCIDO MEDIANTE EL FORMULARIO DE LOGIN.
			
			while($reg = $resultado->fetch_assoc())
			{
				if($reg["usemail"] == $_POST["email"])
				{
					$validate = true;
				}
			}
			
			
			// ## SI EMAIL EXISTE SE PROCEDE A COMPROBAR COMPROBAR CONTRASEÑA.
			
			if($validate == true)
			{
			
				
				// ## UNA VEZ COMPROBAMOS, PASAMOS A VALIDAR LA CONTASEÑA, INTRODUCIDA CON LA QUE HAY EN LA BD.

				$sql="SELECT * FROM users WHERE usemail='".$_POST["email"]."'";
				
				if ($resultado = $connect->query($sql))
				{
					
					
					$reg = $resultado->fetch_assoc();
					//Es lo mismo que: $reg = mysqli_fetch_assoc($resultado);
					//$mensaje.=$reg["usemail"]." ".$reg["uspassword"];
					$s=$_POST["password"];
					$f=$reg["uspassword"];
					/*echo("<script>console.log('$s');</script>");
					echo("<script>console.log('$f');</script>");
					$n=password_verify ($s,$f);
					echo("<script>console.log('$n');</script>");*/ 													// <========== TESTED
					//if($_POST["password"] == $reg["uspassword"]){ 												// <========== ANTIGUO
					if(password_verify ($s,$f) == 1)
					{	
				
				
						// ## CREANDO LAS COOKIES.
						
						//$mensaje.="<div class='msg-ok'>El password es correcto.</div>";
						setcookie("yana_user_cookie", $_POST["email"], time() + (86400 * 30), "/"); // 86400 = 1 day   
						setcookie("yana_password_cookie", $reg["uspassword"], time() + (86400 * 30), "/"); // 86400 = 1 day 
						
						
						// ## REINICIANDO EL INDEX.
						
						session_start();                                                                          // <======== DESHABILITADO
						$_SESSION["username"]=$reg["usname"];                                                     // <======== DESHABILITADO			
						header("Status: 301 Moved Permanently");                                                  // <======== DESHABILITADO
						header("Location: http://localhost/index.php");
						//echo "<div style='position:relative;width:150px;height:150px;'><img src='img/fuentes/avatar_hombre.png'></img></div>";
						exit;
					}
					else
					{
						
						
						// ## COMPROBACIÓN -> EMAIL CORRECTO, PASSWORD INCORRECTO.
						
						$mensaje.= "<div class='msg-error '>El password no es correcto.<div>";
					}
				}
				else
				{
					
					
					$mensaje.= "<div class='msg-error'>Error: " . $connect->errno . ". ".$sql."<br>" . $connect->error."</div>";
				}
			

			}
			else
			{
				
				// ## COMPROBACIÓN -> EMAIL INCORRECTO.
				
				$mensaje.= "<div class='msg-error titleTemplate'>Los credenciales son incorrectas.<div>";
			
			}
			
			
        }
		else
		{
            $mensaje.="<div class='msg-error titleTemplate'>Rellene todos los datos para loguearse.</div>";
        }
    }
	
	header('Access-Control-Allow-Origin: *');
	// class Result {}

	$response1 = 'dddd';
	//$response->resultado = 'OKggg';
?>

<?php include("header.php"); ?>

<!-- Contact Section -->
<section class="page-section" id="register">
    <div class="container">
        <div class="row">
		
            <div class="col-md-12" style="vertical-align:middle">
                <!-- Contact Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 titleTemplate">Acceso a tu cuenta</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img class="" src="img/avatar_contact.jpg" alt="" style="max-width:300px;">
            </div>    
            <div class="col-md-8">
                
                <?php if(isset($mensaje)) echo "<p>".$mensaje."</p>";?>
                <div class="col-12">
                    <!-- Contact Section Form -->
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->

                    <form name="sentLogin" id="activationLogin" novalidate="novalidate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="row">
                            <div class="col-3">
                                <img class="" src="img/password.jpg" alt="" style="max-width:150px;float:left;">
                            </div>
                            <div class="col-9">
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>Tu e-mail</label>
                                        <input class="form-control" name="email"
										type="email" placeholder="email" required="required" data-validation-required-message="Please enter your e-mail.">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>Tu password</label>
                                        <input class="form-control" name="password"
										type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your password.">
                                    </div>
                                </div>                             
                                <br>
                                <div id="success"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-xl" name="loginUser">Entrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include("footer.php");  ?>