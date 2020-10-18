
<?php
    $host = "localhost"; //servidor al que se conecta
    $usuario = "root"; //Usuario con el que se ingresa a la base de datos
    $contraseña = ""; //Contraseña de acceso
    $baseDatos= "calendario"; //Nombre de la base de datos

    //Variables donde se guardan las tablas que están en la base de datos
    $publicacion = "publicacion";
    $admin = "administrador";
    $especialista = "especialista";
    $pacientes = "pacientes";
    $citas = "citas";

    error_reporting(0); //No permite que aparezcan errores (en caso de haberlos)

    $conectar = new mysqli($host, $usuario, $contraseña, $baseDatos); //Variable "$conectar" donde se guarda la conexión a la base de datos

    //En caso de presentar errores, saldrá el mensaje del "echo" y se detiene todo proceso que haya después (línea 17)
    if($conectar->connect_errno){
        echo "Lo sentimos, Ha ocurrido un problema y no se puede conectar";
        exit();
    }
?>