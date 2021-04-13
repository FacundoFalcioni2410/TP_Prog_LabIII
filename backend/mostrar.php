<?php
    require_once("fabrica.php");
    include_once("validarSesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML 5 – Listado de Empleados</title>
    <script src="../javascript/funciones.js"></script>
</head>
<body>
    <h2>Listado de empleados</h2>
    <table style="margin-left:50px">
        <form action="../index.php" id="formMostrar" method="POST">
        <tr>
            <th style="text-align:left;padding-left:15px">
                <h4>Info</h4>
            </th>
        </tr>
        <tr>
            <td style="text-align:left;padding-left:15px" colspan="3">
                <hr>
            </td>
        </tr>
    <?php
        ValidarSesion("../login.html");
        $path = "../archivos/empleados.txt";
        $archivo = fopen($path,"r");
        $fabrica = new Fabrica(".", 7);
        $fabrica->TraerDeArchivo($path);

        foreach($fabrica->GetEmpleados() as $item)
        {
            echo "<tr>
                <td style=text-align:left;padding-left:15px colspan=2>
                    " . $item->__toString() . "   <img src=". $item->GetPathFoto() . " alt=fotoUsuario height=90px widht=90px>
                </td style=text-align:left;padding-left:15px colspan=2>
                <td style=text-align:left;padding-left:15px colspan=2>
                <a href=eliminar.php?legajo=" . $item->GetLegajo() . ">Eliminar</a>
                <input type=button value=Modificar onClick=AdministrarModificar(".$item->GetDni().")>
                </td>
                </tr>";
            }
            echo "<input type=hidden name=dni id=hiddenInput>"
    ?>
        <tr>
            <td style="text-align:left;padding-left:15px" colspan="3">
                <hr>
            </td>
        </tr>
        </form>
        </table>
        <a href='../index.php'>Alta de empleados</a> <br>
        <a href="cerrarSesion.php">Cerrar sesion</a>
</body>
</html>