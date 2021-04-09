<html>
    <head>
        <title>Bucle while, 29 -21</title>
    </head>
    <body>
        <h1>Bucle While</h1>
                <?php
                /* Declaramos una variable de muestra */
                if (isset($_POST['number']))
                {
                    $number = $_POST['number'];
                    
                    if($renglon % 2)
                    {
                        $fondo = "#ffffff00";
                    }
                    else
                    {
                        $fondo = "ffffff"; 
                    }
                    
                    if($valor < 0.5)
                        $color = "red";
                    else
                        $color = "blue";
                    echo "<td bgcolor='$fondo'><p style='color:$color'>$valor</font></td>\n";
                }
        
                ?>
                <tabla border="1">
                <?php
                $renglon = 0;                
                  for($x = 0; $x <= 2; $x += 0.01)
                  {
                      echo "<tr>";
                      muestra($x);
                      muestra(sin($x));
                      muestra(cos($x));
                      echo "</tr>";
                  }
                ?>
                </tabla>
            </p>
    </body>
</html>