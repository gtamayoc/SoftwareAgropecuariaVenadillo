<?php
require_once "modelos/accesos_MO.php";
require_once "vistas/accesos_VI.php";

class accesos_CO
{
    function iniciarSesion()
    {
        $accesos_VI=new accesos_VI();
        $accesos_VI->iniciarSesion();
    }
    
    function validateFormSession($array)
    {
        $con=new ('sel');
         
        $email=$array['email'];
        $password=$array['password'];

        if(empty($email)){exit("El usuario es obligatorio");}
        if(empty($password)){exit("La clave es obligatoria");}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){exit("Correo mal estructurado");}

        $accesos_MO=new accesos_MO($con);

        $array_access=$accesos_MO->iniciarSesion($email,$password);

        if($array_access)
        {
            $_SESSION['pers_id']=$array_access[0]->pers_id;
            $_SESSION['auth']='OK'; 
        }

        header('Location: index.php');
    }

    function closeSession()
    {
        $array_response=array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $array_response['message']='Que tenga un buen dìa';

        exit(json_encode($array_response));
    }
}
?>