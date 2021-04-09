<!-- Autor: Carlos Cuellar -->
<!-- Fecha: 13/01/2020 Repaso php para el proyecto -->
<html>
    <script>
    var totalTime = 10;
        
    function updateClock() {
        document.getElementById('countdown').innerHTML = totaltime;
        if (totalTime == 0)
            {
                document.location.href="http://localhost/yana/ejercicios/pagina3.php";
            } else {
                totalTime--;
                setTimeout("updateClock()", 1000);
            }
    }
    </script>
    <body>
        <h1>Estas en pagina 1</h1>
        <?php 
        # Solución al error#1.    
        if(isset($_POST["nombre"]))
        {
            echo "hola".$_POST["nombre"]; #Si se ejecuta está código, antes que la pagina1.php salta un error, error #1
        }
        else
        {
            echo "No has pasado por <a href='pagina3.php'>pagina3.php</a>";
            header("Status: 301 Moved Permanently");
            header("Location:
            http://localhost/yana/ejercicios/pagina3.php");
            echo "<p>Será redirigido en <span id='countdown'></span> segundos</p>";
        }

        ?>
    </body>
</html>
