<?php
    require_once("persona.php");

    class Empleado extends Persona
    {
        protected $_legajo; 
        protected $_sueldo; 
        protected $_turno; 
        
        public function __construct($nombre,$apellido,$dni,$sexo,$legajo,$sueldo,$turno)
        {
            parent::__construct($nombre,$apellido,$dni,$sexo);
            $this->_legajo = $legajo;
            $this->_sueldo = $sueldo;
            $this->_turno = $turno;
        }
        
        public function GetLegajo()
        {
            return $this->_legajo;
        }

        public function GetSueldo()
        {
            return $this->_sueldo;
        }

        public function GetTurno()
        {
            return $this->_turno;
        }


        public function Hablar($idioma)
        {
            $cadena = "El empleado habla: ";
            $resultado = "";

            foreach($idioma as $item)
            {
                if($resultado == "")
                {
                    $resultado = $resultado . $item;
                }
                else
                {
                    $resultado = $resultado . ", " . $item;
                }
            }

            return $cadena . $resultado;
        }

        public function ToString()
        {
            return parent::ToString() . " - " . $this->GetLegajo() . " - " . $this->GetSueldo() . " - " . $this->GetTurno();
        }
    }
?>