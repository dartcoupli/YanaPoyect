<!DOCTYPE html>
<html lang="es">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <title>Yana</title>

	  <!-- Custom fonts for this theme -->
	  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	   <!-- Material Google -->
	  <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
	  <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet" />
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"  />
		
	  <!-- Theme CSS -->
	  <link href="css/freelancer.css" rel="stylesheet">
	  <link href="css/costumize.css" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css2?family=Sniglet&display=swap" rel="stylesheet"> 
	  <!-- Formulario de Contacto -->
	  <!-- Vacío, incompatible -->
	</head>

	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav" style="height:90px;">
		<div class="container">
		  <a class="navbar-brand js-scroll-trigger" href="index.php#page-top">Yana</a>
			  <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarResponsive" >
				<ul class="navbar-nav ml-auto">
				  <li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger linksMenu" href="index.php#portfolio" >Actividades</a>
				  </li>
				  <li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger linksMenu" href="index.php#about">Sobre nosotros</a>
				  </li>
				  <li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger linkMMenuContact" data-toggle="modal" data-target="#contactForm">Contacto</a>
				  </li>
				  <li class="nav-item mx-0 mx-lg-1 registerMenu">
					<a class="py-3 px-0 px-lg-3 rounded" href="index.php#register">Registro</a>
					<a class="py-3 px-0 px-lg-3 rounded" style="visibility:hidden;" href="http://localhost:4200/listado">
					<span id="LoginMenuPanelControl">PANEL DE CONTROL</span>
					</a>
					<a class="py-3 px-0 px-lg-3 rounded" style="visibility:visible;" href="login.php">
						<span id="LoginMenuBar">/ Login</span>
					</a>
				  </li>		
				  
					<!-- Loggin dinamico con JAVASCRIPT y PHP -->
					<!-- DESLOQUEARSE -->
					
					
					<script>
						function logout()
						{
							var expiry = new Date();
							expiry.setTime(expiry.getTime() - 3600);
							document.cookie = 'yana_user_cookie' + "=''; expires=" + expiry.toGMTString() + "; path=/";                      
							document.cookie = 'yana_password_cookie' + "=''; expires=" + expiry.toGMTString() + "; path=/";
							location.reload(true);	
						}
					</script>
						<li id="AvatarLoginMenuBar" class="nav-item mx-0 mx-lg-1" style="margin-top:-6px;">	  
							<div class="avatarClass" style="margin-left:-100px !important;">
								<img src="img/fuentes/avatar_hombre.png"/>
							</div>
							<p id="emailInput" class="emailInputClass"><!-- Alias del usuario, dinámico--></p>
								<button type="button" class="btn-xs btn-primary mt-5" id="linkInput" class="linkClass" onclick="logout();" href="#">
									Salir
								</button>
						</li>
					<!-- Loggin dinamico con JAVASCRIPT y PHP -->
		
				</ul>
			  </div>
			</div>
	  </nav>

<?php

#  .___  _____  ___________      .__         __    _________                __   .__                ___________      .____                 .__          ____ ___        
#  |   |/ ____\ \_   _____/__  __|__| ______/  |_  \_   ___ \  ____   ____ |  | _|__| ____   ______ \__    ___/___   |    |    ____   ____ |__| ____   |    |   \_____  
#  |   \   __\   |    __)_\  \/  /  |/  ___|   __\ /    \  \/ /  _ \ /  _ \|  |/ /  |/ __ \ /  ___/   |    | /  _ \  |    |   /  _ \ / ___\|  |/    \  |    |   |____ \ 
#  |   ||  |     |        \>    <|  |\___ \ |  |   \     \___(  <_> |  <_> )    <|  \  ___/ \___ \    |    |(  <_> ) |    |__(  <_> ) /_/  >  |   |  \ |    |  /|  |_> >
#  |___||__|    /_______  /__/\_ \__/____  >|__|    \______  /\____/ \____/|__|_ \__|\___  >____  >   |____| \____/  |_______ \____/\___  /|__|___|  / |______/ |   __/ 
#                       \/      \/       \/                \/                   \/       \/     \/                           \/    /_____/         \/           |__|  

	# ACCEDEMOS A LAS COOKIES DE LOGIN
	# echo 'EMAIL ' . htmlspecialchars($_COOKIE["yana_password_cookie"]) . '!';                             //<== TESTED
	# echo 'USER ' . htmlspecialchars($_COOKIE["yana_user_cookie"]) . '!';                                  //<== TESTED
		

	require('dbconnect.php');
	$connect->set_charset("utf8");

	
	if(array_key_exists('yana_user_cookie', $_COOKIE))
	{
		#PRIMERO COMPROBAMOS QUE LA COOKIE USER, POR EJEMPLO, EXISTE, HA SIDO CREADA.
		#SI EXISTE ACCEDEMOS A LOS DATOS DEL USUARIO CON EL EMAIL QUE APARECE EN LA COOKIE.
		
		
		$cookieEmailCookie = htmlspecialchars($_COOKIE['yana_user_cookie']);
		$query = "SELECT * FROM users WHERE usemail='$cookieEmailCookie'";
		$result = $connect->query($query) or die ("EL LOGIN A SIDO NO HA SIDO MANIPULADO");
		$reg = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if(isset($reg['usalias']))
		{
			#SI LA COOKIE USER "NO" A SIDO MANIPULADA, SUCEDEN LAS SIGUIENTES CONDICIONES.
			#echo("<script>console.log('EL LOGIN A SIDO NO HA SIDO MANIPULADO');</script>");                 //<== TESTED	
			
			
			$alias = $reg['usalias'];	
			
			
			if($reg['uspassword'] == $_COOKIE["yana_password_cookie"])
			{	
				#SI LA CONTRASEÑA DE LA COOKIE ES CORRECTA, ES DECIR, COINCIDE CON EL DE LA BD, 
				#MUESTRA EL CUADRO DE LOGIN CON EL "ALIAS" Y OCULTA LA PALABRA LOGIN DEL MENÚ.
				#echo("<script>console.log('TRUE');</script>");                                              //<== TESTED
				
				
				echo("<script>document.getElementById('LoginMenuBar').style.visibility='hidden'; document.getElementById('AvatarLoginMenuBar').style.visibility='visible';</script>");
				echo("<script>document.getElementById('emailInput').innerHTML='$alias';</script>");
				##echo("<script></script>");
				
				# SE AÑADE EL LINK AL PANEL, QUE INICIARÁ DE FORMA OCULTA.
				echo("<script>document.getElementById('LoginMenuPanelControl').style.visibility='visible';</script>");
			}
			else if($reg['uspassword'] != $_COOKIE["yana_password_cookie"])
			{	
				#SI LA CONTRASEÑA DE LA COOKIE NO ES CORRECTA, O HA SIDO MANIPULADA, NO MUESTRA EL CUADRO DE LOGIN
				#Y MUESTRA LA PALABRA LOGIN DEL MENÚ.
				#echo("<script>console.log('FALSE');</script>");                                             //<== TESTED
				#echo("<script>console.log('LA CONTRASEÑAN HA SIDO NO HA SIDO MANIPULADO');</script>");      //<== TESTED			
					 
					 
				echo("<script>document.getElementById('LoginMenuBar').innerHTML='LOGIN'; document.getElementById('AvatarLoginMenuBar').style.visibility='hidden';</script>");
				##echo("<script></script>");
				
				# SE AÑADE EL LINK AL PANEL, Y SE OCULTARÁ SI LAS COOKIES, SON ALTERADAS.
				echo("<script>document.getElementById('LoginMenuPanelControl').style.visibility='hidden';</script>");
			}		
		}
		else
		{	
			##SI LA COOKIE USER "SI" A SIDO MANIPULADA, INDEX PERMANECE IGUAL.
			#echo("<script>console.log('EL LOGIN A SIDO MANIPULADO');</script>");           			     //<== TESTED (SECURITY)
			#echo("<script>console.log('$cookieEmailCookie');</script>");                 			         //<== TESTED (SECURITY)		
				
			
			echo("<script>document.getElementById('LoginMenuBar').innerHTML='LOGIN'; </script>");	
			echo("<script>document.getElementById('AvatarLoginMenuBar').style.visibility='hidden';</script>");
			
			# SE AÑADE EL LINK AL PANEL, QUE INICIARÁ DE FORMA OCULTA.
			echo("<script>document.getElementById('LoginMenuPanelControl').style.visibility='hidden';</script>");
		}

	}
	else
	{
		#SI LA COOKIE USER "SI" A SIDO MANIPULADA, DEJA EL INDEX COMO SI NO SE HUBIERA
		#LOGUEADO NADIE.
		#echo '<script>console.log("NO EXISTE COOKIE")</script>';                                             //<== TESTED
		
		
		echo("<script>document.getElementById('LoginMenuBar').innerHTML='LOGIN'; </script>");	
		echo("<script>document.getElementById('AvatarLoginMenuBar').style.visibility='hidden';</script>");

		# SE AÑADE EL LINK AL PANEL, QUE INICIARÁ DE FORMA OCULTA.
		echo("<script>document.getElementById('LoginMenuPanelControl').style.visibility='hidden';</script>");		
	}
?>