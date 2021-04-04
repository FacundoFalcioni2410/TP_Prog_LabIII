<?php
    require_once("fabrica.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar empleados</title>
</head>
<body>
    <?php
        $path = "archivos/empleados.txt";
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
                    echo($cadena . " <a href=eliminar.php?legajo=$arr[4]>Eliminar</a>" . "<br>");
                }
            }while(!feof($archivo));
            fclose($archivo);
            echo("<a href='index.html'>Inicio</a>");
        }
    ?>
</body>
</html>