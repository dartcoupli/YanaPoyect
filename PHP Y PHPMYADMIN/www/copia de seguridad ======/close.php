<?php 

    if (isset($_GET["closeSession"])) {
        session_start();
        session_unset();
        session_destroy();
    }

    include("header.php"); 
?>
<br>
    <!-- Contact Section -->
    <section class="page-section" id="result">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="" src="img/bye.gif" alt="">
                </div>
                <div class="col-md-8" style="vertical-align:middle">
                    <!-- Contact Section Heading -->
                    <h4 class="text-center text-uppercase text-secondary mb-0">Hasta la vista!</h4>

                    <!-- Icon Divider -->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <p style="text-align:center">Te echaremos de menos. Esperamos verte pronto de nuevo por aquí.</p>
                </div>
            </div>
        </div>
    </section>




<?php  include("footer.php"); ?>
