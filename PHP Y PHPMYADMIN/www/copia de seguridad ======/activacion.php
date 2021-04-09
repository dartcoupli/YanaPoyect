<?php 

    require_once("dbconnect.php");
    require_once("functions.php");

    //ACTUALIZACIÓN DEL PASSWORD
    if (isset($_POST["activeUser"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        //PASSWORD
        $password=trim($_POST["password"]);
        if (empty($password)) {
            $mensaje.= "<div class='msg-error'>Tu password no puede estar vacío</div>";
        } else {
            $password = test_input($_POST["password"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
                $mensaje.= "<div class='msg-error'>Solo se admiten letras y números.</div>";
            }else{
                $sql="UPDATE users SET uspassword='".encriptarPassword($password)."', usactive=1 WHERE usemail='".$_POST["email"]."'";
                if ($connect->query($sql) === TRUE) {
                    $mensaje= "<div class='msg-ok'>Enhorabuena! Se ha actualizado tu password y tu cuenta ya se encuentra activa. Ahora podrás crear y acceder a todos los eventos en tu ciudad.</div>";
                } else {
                    $mensaje.= "<div class='msg-error'>Error: " . $connect->errno . ". " . $connect->error."</div>";
                }
            }
        }        
    }

    include("header.php"); 
    if(preg_match("/msg-ok/",$mensaje)==1){
        include("login.php");
    }else{
        include("activacion_form.php");
    }

    include("footer.php"); 
?>
