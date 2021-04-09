<?php
    require_once("empleado.php");
    require_once("persona.php");
    require_once("empleado.php");
    require_once("fabrica.php");

    $obj1 = new Fabrica("El Tornillero");
    $objA= new Empleado("Facundo", "Falcioni", 42998536, "Masculino", 109714, 35000, "Mañana");
    $objB= new Empleado("Tomas", "Perez", 40588632, "Masculino", 109520, 30000, "Noche");
    $objC= new Empleado("Juana", "Diaz", 43500672, "Femenino", 109854, 40000, "Noche");
    
    #Metodos clase Empleado
    echo($objA->__toString());
    echo($objA->Hablar(["Ingles","Español"]) . "<br> <br>");

    #Metodos clase Fabrica
    $obj1->AgregarEmpleado($objA);
    $obj1->AgregarEmpleado(4);
    $obj1->AgregarEmpleado($objC);
    $obj1->EliminarEmpleado($objB);

    echo($obj1->ToString());
?>