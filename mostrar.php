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
        require_once("fabrica.php");
        $path = "./archivos/empleados.txt";
        $fabrica = new Fabrica(" ",); 
        $fabrica = $fabrica->TraerDeArchivo($path);
        $archivo = fopen($path,"r");

        if($archivo != null)
        {
            do
            {
                echo(fgets($archivo) . "<br>");
            }while(!feof($archivo));
            fclose($archivo);
        }
    ?>
</body>
</html>