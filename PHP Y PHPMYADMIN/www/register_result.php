<?php require("header_result.php"); ?>
<?php session_start(); ?>

<?php


	// ## SI LAS VARIABLES DE SESSIÓN HAN CADUCADO, VA A LA PÁGINA PRINCIPAL
	
	if(!isset($_SESSION['email']) && !isset($_SESSION['name']))
	{
		header("Location: http://localhost/index.php");
	}
?>
	<!-- Contact Section -->
    <section class="page-section" id="result">
	<br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="" src="img/emailthanks.gif" alt="">
                </div>
                <div class="col-md-8" style="vertical-align:middle">
                    <!-- Contact Section Heading -->
                    <h4 class="text-center text-uppercase text-secondary mb-0 titleTemplate">
						Gracias por tu registro,
							<span class="msgResult">
								<?php if(isset($_SESSION['name'])) { echo $_SESSION['name']; } ?>
						!
							</span>
					</h4>

                    <!-- Icon Divider -->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <p>
						Hemos enviado un e-mail a 
						<span class="msgResult">
							<?php
								if(isset($_SESSION['email']))
								{
									echo $_SESSION['email'];
								}
							?>
						</span>
						para verificar tu dirección y asegurarnos de que te llegan las notificaciones. Por favor, revisa tu correo y haz clic en el link que hemos enviado para validar tu e-mail y comenzar a conectar con personas de tu misma ciudad!
					</p>
                    <p>
						<a class="btn btn-primary" href="http://localhost/index.php#register">
							Volver a registro
						</a>
					</p>
                    <?php
						if(isset($_SESSION['mensaje']))
						{
							echo $_SESSION['mensaje'];
						}
					?>
                </div>
                <div class="col-12 titleTemplate">
                    <p>Estos son tus datos:</p>
                    <table>
                        <tr>
                            <td>Bienvenido 
								<span class="msgResult">
									<?php
									if(isset($_SESSION['name']) && isset($_SESSION['surname']))
									{
										echo $_SESSION['name'] . " " . $_SESSION['surname'] ."!";
									};
									?>
								</span>
							</td>
                        </tr>
                        <tr>
							<td colspan="2">
								Naciste el
									<span class="msgResult">
										<?php if(isset($_SESSION['born']))
										{
											echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($_SESSION['born'])));
										}
										?>
									</span>
								, así que tienes
									<span class="msgResult">
										<?php
										if(isset($_SESSION['edad']))
										{
											echo $_SESSION['edad'];
										};
										?>
									</span>
								años
							</td>
                        </tr>
                        <tr>
							<!-- Deshabilitado -->
                            <!-- <td colspan="2">
								y vives en
								<span class="msgResult">
									<?php 
										# echo $_SESSION['city']  . " (" . $_SESSION['country'] . ")";
									?>
								</span>								
							</td>
							-->
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php require("footer.php"); ?>

