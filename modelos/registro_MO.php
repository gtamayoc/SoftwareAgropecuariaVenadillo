<?php
class accesos_MO
{
    private $conexion;
    
    function __construct($con)
    {
        $this->conexion=$con;
    }

    function Registro($usuario,$clave)
    {

            $sql="INSERT INTO accesos (email,contrasena) VALUES ('$usuario','$clave')";
    
            $this->conexion->consultar($sql);
        }
    }

?>