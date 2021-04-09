<!-- Autor: Carlos Cuerllar Fecha: 16-01-2020 -->
<!-- Solución: Librería + COnfiguración del servidor -->
<?php

/* Crear una pagina que permita introducir un destinatario, un asunto, y un mensaje, y que al pulsar un botón se utilizé la cuenta proyectoyana@gmail.com para que llegue el mail al destinatario */
require '../header.php';
require '../functions.php';
if( isset($_POST["enviar"]) )
{
   if(sendMail($_POST["email"],$_POST["name"],"Registro"))
   {
       echo "bien";
   }
   else
   {
       echo "error";
   }
}

?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <br><br><br><br>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <form name="formDatos" action="pagina6.php"  method="POST">
              <div class="form-group">
                <label for="exampleFormControlInput1">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="nombre">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Teléfono</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensaje</label> 
                <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
              </div>
            <div class="form-group row">
              <div class="col-sm-10">
                  <button type="submit" name="enviar" id="enviar" class="btn btn-primary">Enviar</button>
              </div>
                </div>
            </form>
        </div>
        <div class="col-2">
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php

require '../footer.php';

?>