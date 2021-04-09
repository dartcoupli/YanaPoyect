    <!-- Contact Section -->
    <section class="page-section" id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="" src="img/people_connect1.png" alt="" style="max-height:200px;">
                </div>
                <div class="col-md-8" style="vertical-align:middle">
                    <!-- Contact Section Heading -->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Genial! comencemos..</h2>

                    <!-- Icon Divider -->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <?php if(isset($mensaje)) echo "<p>".$mensaje."</p>";?>
                </div>
            </div>
            <!-- Contact Section Form -->
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->

            <form name="sentRegister" id="registerForm" novalidate="novalidate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Surname</label>
                                <input class="form-control" name="surname" type="text" placeholder="Surname">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Phone Number</label>
                                <input class="form-control" name="phone" type="tel" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Email Address</label>
                                <input class="form-control" name="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." value="<?php echo $email;?>">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Date Born</label>
                                <input class="form-control" name="dateborn" type="date" placeholder="Date born" value="<?php echo $born;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Country</label>
                                <select class="form-control" name="country" placeholder="Country">
                                    <option value="34">ESPAÑA</option>
                                </select>
                            </div>
                        </div>
						
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>City</label>
                                <select class="form-control" name="city" placeholder="City">
                                    <option value="28">MADRID</option>
                                    <option value="01">ALAVA</option>
                                    <option value="02">ALBACETE</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>City</label>
                                <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country Name" onKeyUp="showCities(this.value)"/>
                                <div id="countryList"></div>
                            </div>
                        </div>

                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-xl" name="newUser">Registrar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <script>
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
