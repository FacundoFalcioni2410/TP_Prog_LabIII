<?php
    interface IBaseDeDatos
    {
        public function TraerDeBaseDeDatos();
        public function AltaBaseDeDatos($empleado);
        public function ModificarBaseDeDatos($empleado);
        public function EliminarDeBaseDeDatos($empleado);
    }
?>