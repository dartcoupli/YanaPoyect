
<!-- Contact Section -->
<section class="page-section" id="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="vertical-align:middle">
                <!-- Contact Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Activar tu cuenta</h2>

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
                <img class="" src="img/woman_guino_ojo.png" alt="" style="max-width:400px;">
            </div>    
            <div class="col-md-8">
                <p>Vaya! me alegra verte por aquí de nuevo ;). Para activar tu cuenta en YANA solo tienes que introducir el PIN que te enviamos por e-mail y escribir el password que deseas en el siguiente cuadro.";</p>                
                <?php 
                    if(isset($mensaje)) echo "<p>".$mensaje."</p>";
                    if(!isset($_GET["email"])) $_GET["email"]=NULL;
                ?>
                <div class="col-12">
                    <!-- Contact Section Form -->
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->

                    <form name="sentActivation" id="activationForm" novalidate="novalidate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?email=".$_GET['email']);?>" method="post">
                        <div class="row">
                            <div class="col-3">
                                <img class="" src="img/password.jpg" alt="" style="max-width:150px;float:left;">
                            </div>
                            <div class="col-9">
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>Tu password</label>
                                        <input class="form-control" name="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your password.">
                                    </div>
                                </div>
                                <input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
                                <br>
                                <div id="success"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-xl" name="activeUser">Cambiar password y activar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>