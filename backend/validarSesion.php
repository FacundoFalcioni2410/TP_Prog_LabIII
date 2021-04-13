<?php
    session_start();
    function ValidarSesion()
    {
        if($_SESSION["DNIEmpleado"] == FALSE)
        {
            header("Location: ../login.html");
        }
    }

    ValidarSesion();
?>