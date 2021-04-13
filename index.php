<?php
    require_once("./backend/fabrica.php");
    require_once("./backend/empleado.php");
    include_once("./backend/validarSesion.php");
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : 0; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if($dni != 0)
        {
            echo "<title>HTML 5 Formulario Modificar Empleado</title>";
        }
        else
        {
            echo "<title>HTML 5 - Formulario Alta Empleado</title>";
        }
    ?>
    <script src="javascript/funciones.js"></script>
</head>
<body>
        <?php
            if($dni !== 0)
            {
                echo "<h2>Modificar Empleado</h2>";
            }
            else
            {
                echo "<h2>Alta de Empleado</h2>";
            }
            $path = "./archivos/empleados.txt";
            $fabrica = new Fabrica("",7);
            $fabrica->TraerDeArchivo($path);

            foreach($fabrica->GetEmpleados() as $item)
            {
                if($item->GetDni() == $dni)
                {
                    $empleado = $item;
                    break;
                }
            }
        ?>
    <table align="center">
        <form action="./backend/administracion.php" method="POST" enctype="multipart/form-data">

            <tr>
                <th style="text-align:left;padding-left:15px" colspan="2">
                    <h4>Datos personales</h4>
                </th>
                <tr>
                    <td style="text-align:left;padding-left:15px" colspan="2"><hr></td>
                </tr>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" >DNI: </td>
                <td style="text-align:left;padding-left:15px">
                    <input type="number" name="txtDni" id="txtDni" min="1000000" 
                    <?php
                        echo "value=$dni readonly";
                    ?>
                    >
                    <span id="spanTxtDni" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Apellido: </td>
                <td style="text-align:left;padding-left:15px">
                    <input type="text" name="txtApellido" id="txtApellido">
                    <span id="spanTxtApellido" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Nombre: </td>
                <td style="text-align:left;padding-left:15px">
                    <input type="text" name="txtNombre" id="txtNombre">
                    <span id="spanTxtNombre" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Sexo: </td>
                <td style="text-align:left;padding-left:15px">
                    <select name="cboSexo" id="cboSexo">
                        <option value="---">Seleccione</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                    <span id="spanCboSexo" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <th style="text-align:left;padding-left:15px" colspan="2">
                    <h4>Datos laborales</h4>
                </th>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Legajo: </td>
                <td style="text-align:left;padding-left:15px">
                    <input type="number" name="txtLegajo" id="txtLegajo" min="100">
                    <span id="spanTxtLegajo" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Sueldo: </td>
                <td style="text-align:left;padding-left:15px">
                    <input type="number" step="500" name="txtSueldo" id="txtSueldo" min="8000">
                    <span id="spanTxtSueldo" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Turno: </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:60px">
                    <input type="radio" name="rdoTurno" value="0" checked>
                </td>
                <td>Mañana</td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:60px">
                    <input type="radio" name="rdoTurno" value="1">
                </td>
                <td>Tarde</td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:60px">
                    <input type="radio" name="rdoTurno" value="2">
                </td>
                <td>Noche</td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px">Foto:</td>
                <td style="text-align:left;padding-left:15px">
                    <input type="file" name="file" id="file">
                    <span id="spanFile" style= display:none>*</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;padding-left:15px" colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="reset" value="Limpiar">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" onClick="AdministrarValidaciones(event)" name="btnEnviar" id="btnEnviar" value="Enviar">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>