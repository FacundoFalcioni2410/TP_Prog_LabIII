<?php
    $dni = isset($_POST["dni"]) ? $_POST["dni"] : 0;
    $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : 0;
    
    $path = "../archivos/empleados.txt";
    
    if(file_exists($path))
    {
        $archivo = fopen($path,"r");
        $flag = FALSE;
        do
        {
            $cadena = fgets($archivo);
            $cadena = is_string($cadena) ? trim($cadena) : false;
            if($cadena != false)
            {
                $arr = explode(" - ", $cadena);
                if($arr[0] == $dni && $arr[2] == $apellido)
                {
                    $flag = TRUE;
                    break;
                }                
            }
        }while(!feof($archivo));
        
        if($flag)
        {
            session_start();
            $_SESSION["DNIEmpleado"] = $dni;
            header("Location: mostrar.php");
        }
        else
        {
            echo "No se encontro un empleado con esos datos. <br>
            <a href=../login.html>Login</a>";
        }
    }
?>