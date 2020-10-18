<?php
    session_start();

    error_reporting(0);
    $user = $_SESSION['logeado'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

    <form class="formulario" action="login.php" method="post">      
        
        <?php
            //En caso de haber sesión activa
            if($user != ""){
        ?>
                <h3>Ya existe una sesión activa.</h3>
                <br>
                <button class="btn-registro"><a href="cerrarsesion.php">SALIR</a></button>
        <?php    
            //En caso de no haber iniciado sesión    
            }else{
        ?>
        <div class="cuadro">
            <h1>Registro</h1>
            <br>
            <input class="campo-texto-registro" type="text" name="user" placeholder="Nombre Usuario" autocomplete="off">
            <br><br>
            <input class="campo-texto-registro" type="password" name="pass" placeholder="Contraseña">
            <br><br>
            <input class="btn-registro" type="submit" name='btn-logeo' value='INGRESAR'>
            <br>
            </div>
        
        
        <?php
            }
            if(isset($_POST['btn-logeo'])){
                
                include('conexion.php');
                $usuario = $_POST['user'];
                $contra = $_POST['pass'];
                

                if($usuario == "" || $contra == ""){
                    echo"<h6>Por favor llene todos los campos para ingresar</h6>";
                }else{
                    $buscar=0;
                    $datos = mysqli_query($conectar, "SELECT * FROM $admin WHERE usuario = '$usuario' AND clave ='$contra'");
                    while($consulta = mysqli_fetch_array($datos)){
                        $buscar++;
                    }

                    if($buscar == 0){
                        echo "<h6>Datos incorrectos</h6>";
                    }else{
                        session_start();
                        $_SESSION['logeado']= $usuario;
                        
                        header("location:citas.php");
                    }
                    mysqli_free_result($datos);
                }
                mysql_close($conectar);
            }
            
        ?>
    </form>
    
</body>
</html>