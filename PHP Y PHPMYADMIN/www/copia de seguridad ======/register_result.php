    <!-- Contact Section -->
    <section class="page-section" id="result">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="" src="img/emailthanks.gif" alt="">
                </div>
                <div class="col-md-8" style="vertical-align:middle">
                    <!-- Contact Section Heading -->
                    <h4 class="text-center text-uppercase text-secondary mb-0">Gracias por tu registro, <?php echo $name ?>!</h4>

                    <!-- Icon Divider -->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <p>Hemos enviado un e-mail a <?php echo $email;?> para verificar tu dirección y asegurarnos de que te llegan las notificaciones. Por favor, revisa tu correo y haz clic en el link que hemos enviado para validar tu e-mail y comenzar a conectar con personas de tu misma ciudad!</p>
                    <p><a class="btn btn-primary" href="register.php">Volver a registro</a></p>
                    <?php
                    echo $mensaje;
                    ?>
                </div>
                <div class="col-12">
                    <p>Estos son tus datos:</p>
                    <table>
                        <tr>
                            <td>Bienvenido <?php echo $name . " " . $surname;?>! </td>
                        </tr>
                        <tr>
                            <td colspan="2">Naciste el <?php echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($born))); ?>, así que tienes <?php echo $edad;?> años</td>
                        </tr>
                        <tr>
                            <td colspan="2">y vives en <?php echo $city . " (" . $country . ")"?> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

