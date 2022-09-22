<?php
class accesos_MO
{
    private $conexion;
    
    function __construct($conexion)
    {
        $this->conexion=$conexion;
    }

    function iniciarSesion($usuario,$clave)
    {
        $sql="SELECT acc_codigo FROM acceso WHERE acc_correo='$usuario' AND acc_clave='$clave'";
        $this->conexion->consultar($sql);
        return $this->conexion->extraerRegistro();
    }
}
?>