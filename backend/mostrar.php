<?php
    require_once("fabrica.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML 5 – Listado de Empleados</title>
</head>
<body>
    <h2>Listado de empleados</h2>
    <table style="margin-left:50px">
        <tr>
            <th style="text-align:left;padding-left:15px">
                <h4>Info</h4>
            </th>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:15px">
                <hr>
            </td>
        </tr>
    <?php
        $path = "../archivos/empleados.txt";
        $archivo = fopen($path,"r");
        
        if($archivo != null)
        {
            do
            {
                $cadena = fgets($archivo);
                $cadena = is_string($cadena) ? trim($cadena) : false;
                if($cadena != false)
                {
                    $arr = explode(" - ",$cadena);
                    echo "<tr>
                            <td style=text-align:left;padding-left:15px colspan=2>
                              $cadena
                            </td style=text-align:left;padding-left:15px colspan=2>
                          </tr>
                          <tr>
                            <td style=text-align:left;padding-left:15px colspan=2>
                                <a href=eliminar.php?legajo=$arr[4]>Eliminar</a>
                            </td>
                          </tr>";
                }
            }while(!feof($archivo));
            fclose($archivo);
            echo 
                "<tr>
                    <td style=text-align:left;padding-left:15px>
                        <hr>
                    </td>
                </tr>
            </table>";
            echo(" <br> <a href='index.html'>Alta de empleados</a>");
        }
    ?>
</body>
</html>