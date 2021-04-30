<?php
    class AccesoDatos
    {
        private static $accesoDatos;
        private $objetoPDO;

        public function __construct()
        {
            try
            {
                $user = 'id16712003_empleadobd';
                $pass = '0Op3^bu(SwbMc5}q';

                // $user = 'root';
                // $pass = '';
                $this->objetoPDO = new PDO("mysql:host=localhost; dbname=id16712003_empleados",$user,$pass);
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function RetornarConsulta($sql)
        {
            return $this->objetoPDO->prepare($sql);
        }

        public static function ObjetoAccesoDatos()
        {
            if(!isset(self::$accesoDatos))
            {
                return self::$accesoDatos = new AccesoDatos();
            }

            return self::$accesoDatos;
        }

        public function __clone()
        {
            trigger_error('La clonacion de este objeto no esta permitida.',E_USER_ERROR);
        }
    }
?>