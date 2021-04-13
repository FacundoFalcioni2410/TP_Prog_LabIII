<?php
    require_once("empleado.php");
    require_once("fabrica.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            $dni = isset($_POST["txtDni"]) ? $_POST["txtDni"] : 0;
            $nombre = isset($_POST["txtNombre"]) ? $_POST["txtNombre"] : 0;
            $apellido = isset($_POST["txtApellido"]) ? $_POST["txtApellido"] : 0;
            $sexo = isset($_POST["cboSexo"]) ? $_POST["cboSexo"] : 0;
            $legajo = isset($_POST["txtLegajo"]) ? $_POST["txtLegajo"] : 0;
            $turno = isset($_POST["rdoTurno"]) ? $_POST["rdoTurno"] : 0;
            $sueldo = isset($_POST["txtSueldo"]) ? $_POST["txtSueldo"] : 0;
            $file = isset($_FILES["file"]) ? $_FILES["file"] : 0;

            switch($turno)
            {
                case "0":
                    $turno = "M";
                    break;
                case "1":
                    $turno = "T";
                    break;
                case "2":
                    $turno = "N";
                    break;
            }

            $pathDestino = "../fotos/" . $file["name"];

            if(getimagesize($file["tmp_name"]) != FALSE)
            {
                $fotoOk = FALSE;
                $tipoDeArchivo = pathinfo($pathDestino,PATHINFO_EXTENSION);
                $pathDestino = "../fotos/" . $dni . "-" . $apellido . "." . $tipoDeArchivo;

                if(!file_exists($pathDestino))
                {
                    if($tipoDeArchivo == "jpg" || $tipoDeArchivo == "bmp" || $tipoDeArchivo == "gif" || $tipoDeArchivo == "png" || $tipoDeArchivo == "jpeg")
                    {
                        if($file["size"] <= 1000000)
                        {
                            $fotoOk = TRUE;
                        }
                    }
                }
            }
            
            
            if($fotoOk)
            {
                $path = "../archivos/empleados.txt";
                $empleado = new Empleado($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno);
                $fabrica = new Fabrica("X",7);
                
                move_uploaded_file($file["tmp_name"],$pathDestino);
                $empleado->SetPathFoto($pathDestino);
            

                if(!file_exists($path))
                {
                    $archivo = fopen($path,"w");
                    fclose($archivo);
                }
                $fabrica->TraerDeArchivo($path);
                if($fabrica->AgregarEmpleado($empleado))
                {
                    $fabrica->GuardarArchivo($path);
                    echo "<a href='mostrar.php'>Mostrar empleados</a>";
                }
                else
                {
                    echo "Hubo un error <a href='../index.html'>Alta de empleados</a>";
                }
            }
        ?>
    </div>
</body>
</html>