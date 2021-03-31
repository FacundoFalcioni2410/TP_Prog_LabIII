<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar empleados</title>
</head>
<body>
    <form action="eliminar.php" method="GET">
    <?php
        require_once("fabrica.php");
        $path = "archivos/empleados.txt";
        $fabrica = new Fabrica(" ",7); 
        $fabrica = $fabrica->TraerDeArchivo($path);
        $archivo = fopen($path,"r");

        if($archivo != null)
        {
            do
            {
                $cadena = fgets($archivo);
                if($cadena != false)
                {
                    $arr = explode(" - ",$cadena);
                    echo($cadena . "<input type='hidden' name='legajo' value='$arr[4]'> <input type='submit' value='Eliminar'>" . "<br>");
                }
            }while(!feof($archivo));
            fclose($archivo);
            echo("<br><a href='index.html'>Inicio</a>");
        }
    ?>
    </form>
</body>
</html>