<?php 
    require("functions.php");
    if(session_status() === PHP_SESSION_NONE) session_start();
    if(!isset($_SESSION["username"])){
        header("Status: 301 Moved Permanently");
        header("Location: close.php?closeSession");
        exit;
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    include("header.php"); 

    

    if (isset($_POST["subirImagen"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $mensaje="";
        
        //Principio de modulo de insertar id con imagen
        require("dbconnect.php");
        $sql="SELECT * FROM users WHERE ussurname='".$_SESSION["username"]."'";
        $resultado = $connect->query($sql);
        $reg = $resultado->fetch_assoc();
        //Fin de modulo de insertar id con imagen
        
        $target_dir = "uploads/";
        $target_file = $target_dir . $reg["usid"] . "_" .basename($_FILES["fileToUpload"]["name"]) ;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image    
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $mensaje.="<div class='msg-ok'>File is an image - " . $check["mime"] . ".</div>";
            $uploadOk = 1;
        } else {
            $mensaje.= "<div class='msg-error'>File is not an image.</div>";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $mensaje.= "<div class='msg-error'>Sorry, file already exists. Renómbralo, por favor.</div>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 200000) {
            $mensaje.= "<div class='msg-error'>Sorry, your file is too large.</div>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $mensaje.= "<div class='msg-error'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $mensaje.= "<div class='msg-error'>Sorry, your file was not uploaded.</div>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $mensaje.= "<div class='msg-ok'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</div>";
            } else {
                $mensaje.= "<div class='msg-error'>Sorry, there was an error uploading your file.</div>";
            }
        }
    }
?>

<!-- Contact Section -->
<section class="page-section" id="result">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                if(isset($uploadOk) && $uploadOk==1){
                    echo "<img class='' src='".$target_file."' style='max-width:200px'>";
                }else{
                    echo "<img class='' src='img/avatar_contact.jpg' alt=''>";
                }
                ?>
                
            </div>
            <div class="col-md-8" style="vertical-align:middle">
                <!-- Contact Section Heading -->
                <h4 class="text-center text-uppercase text-secondary mb-0">Cambio de avatar!</h4>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <p style="text-align:center">Actualiza tu foto de avatar. Sube un fichero de imagen de tu disco y lo guardaremos en nuestro servidor.</p>
                <ul>
                    <li>El fichero no debe superar los 2Mb de tamaño.</li>
                    <li>El fichero debe estar en formato .jpg, .png o .gif.</li>
                    <li>El fichero debe tener el mismo ancho y alto, por ejemplo 200x200px.</li>
                </ul>
                <?php if(isset($mensaje)) echo "<p>".$mensaje."</p>";?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    Selecciona una imagen:
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Ruta local del archivo</label>
                            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" name="subirImagen">Subir imagen</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php  include("footer.php"); ?>












