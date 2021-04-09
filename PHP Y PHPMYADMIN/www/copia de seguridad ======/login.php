<?php 

    require_once("dbconnect.php");
    require_once("functions.php");
    //COMPROBACIÓN DEL PASSWORD
    if (isset($_POST["loginUser"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $mensaje="";
        if(!empty($_POST["email"]) && !empty($_POST["password"])){
            $sql="SELECT * FROM users WHERE usemail='".$_POST["email"]."'";
            if ($resultado = $connect->query($sql)) {
                $reg = $resultado->fetch_assoc();
                //Es lo mismo que: $reg = mysqli_fetch_assoc($resultado);
                //$mensaje.=$reg["usemail"]." ".$reg["uspassword"];
                if($_POST["password"] == $reg["uspassword"]){
                    //$mensaje.="<div class='msg-ok'>El password es correcto.</div>";
                    setcookie("yana_user_cookie", $_POST["email"], time() + (86400 * 30), "/"); // 86400 = 1 day              
                    session_start();
                    $_SESSION["username"]=$reg["usname"];
                    header("Status: 301 Moved Permanently");
                    header("Location: http://localhost/yana");
                    exit;
                }else{
                    $mensaje.= "<div class='msg-error'>El password no es correcto.<div>";
                }
            }else{
                $mensaje.= "<div class='msg-error'>Error: " . $connect->errno . ". ".$sql."<br>" . $connect->error."</div>";
            }
        }else{
            $mensaje.="<div class='msg-error'>Rellene todos los datos para loguearse.</div>";
        }
    }

?>

<?php include("header.php"); ?>
<!-- Contact Section -->
<section class="page-section" id="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="vertical-align:middle">
                <!-- Contact Section Heading -->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Acceso a tu cuenta</h2>

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
                                        <input class="form-control" name="email" type="email" placeholder="email" required="required" data-validation-required-message="Please enter your e-mail.">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>Tu password</label>
                                        <input class="form-control" name="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your password.">
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