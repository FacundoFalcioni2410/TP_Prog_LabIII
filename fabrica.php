<?php
    class Fabrica
    {
        private $_cantidadMaxima;
        private $_empleados;
        private $_razonSocial;

        public function __construct($razonSocial)
        {
            $this->_cantidadMaxima = 5;
            $this->_empleados = array();
            $this->_razonSocial = $razonSocial;
        }

        public function AgregarEmpleado($empleado)
        {
            $retorno = false;

            if(is_object($empleado) && get_class($empleado) == "Empleado")
            {
                if($this->_cantidadMaxima > count($this->_empleados))
                {
                    array_push($this->_empleados, $empleado);
                    $this->EliminarEmpleadosRepetidos();
                    return true;
                }
            }
            return $retorno;
        }

        public function CalcularSueldos()
        {
            $total = 0;

            foreach($this->_empleados as $item)
            {
                $total += $item->GetSueldo(); 
            }

            return $total;
        }

        public function EliminarEmpleado($empleado)
        {
            $retorno = false;

            foreach($this->_empleados as $key => $value)
            {
                if($value === $empleado)
                {
                    unset($this->_empleados[$key]);
                    return true;
                }
            }
            
            return $retorno;
        }

        private function EliminarEmpleadosRepetidos()
        {            
            $this->_empleados = array_unique($this->_empleados, SORT_REGULAR);
        }
        
        public function ToString()
        {
            $resultado = "Cantidad maxima de empleados: $this->_cantidadMaxima <br> $this->_razonSocial <br>";

            foreach($this->_empleados as $item)
            {
                $resultado .= $item->ToString();
            }

            $resultado .= "Sueldo total a pagar: " . $this->CalcularSueldos() . "<br>";

            return $resultado;
        }
    }
?>