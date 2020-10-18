<?php

    // Verifica si existe un usuario administrador con sesion activa
    session_start();

    error_reporting(0);
    $user = $_SESSION['logeado'];

    if($user != ""){
?>
        <a href="cerrarsesion.php">SALIR</a>
<?php        
    }else{
        // Si no existe lo envía a login para que inicie sesion 
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="citas.css">
    <title>Citas</title>
</head>
<body>

<div class="contenedor1">
             <div class="contenedorr">
                 
             </div>

    <form action="citas.php" method="post">
        <!-- Informacion del paciente  -->
        <fieldset>
            <legend><h1>Información del paciente</h1></legend>
            <div class="contenedor">
                <div class="labels">
                    <label>Número de Documento</label>
                    <label>Nombre(s)</label>
                    <label>Apellidos</label>
                    <label>Teléfono</label>
                    <label>Dirección</label>
                </div>
                <div class="inputs">
                    <input type="text" name="Documento_paciente" required>
                    <input type="text" name="Nombre_paciente" required>
                    <input type="text" name="Apellido_paciente" required>
                    <input type="text" name="Tel_paciente" required>
                    <input type="text" name="Dir_paciente" required>
                </div>
            </div>
        </fieldset>
        <!-- Informacion de la cita  -->
        <fieldset>
            <legend><h1>Información de la cita</h1></legend>
            <div class="contenedor">
                <div class="labels">

                    <label>Especialidad</label>
                    <label>Fecha de la cita</label>
                    <label>Hora</label>
                </div>
                <div class="inputs">
                    <select name="especialista">
                        <?php
                            // Se busca en base de datos, en la tabla especialista, cuantos especialistas hay para mostrarlos en el selector
                            include('conexion.php');
                            $datosEspecialista = mysqli_query($conectar, "SELECT * FROM $especialista");
                            while($consultaEspecialista = mysqli_fetch_array($datosEspecialista)){
                                $documentoEsp = $consultaEspecialista['Cc'];
                                $nombreEsp = $consultaEspecialista['Nombre']." ".$consultaEspecialista['Apellido'];
                        ?>
                                <!-- Se muestra uno a uno en las opciones del selector -->
                                <option value='<?php echo $documentoEsp; ?>'> <?php echo $nombreEsp; ?> </option>      
                        <?php 
                            }
                        ?>                    
                    </select>
                    <input type="date" name="Fecha" required>
                    <select name="Hora">
                        <option value="08:00am">8:00am</option>
                        <option value="09:30am">9:30am</option>
                        <option value="10:00am">10:00am</option>
                        <option value="02:00pm">2:00pm</option>
                        <option value="04:00pm">4:00pm</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <input type="submit" value="Agendar Cita" name="Agendar" class="agendar">
    </form>

    <?php
        if(isset($_POST['Agendar'])){
            $documentoP = $_POST['Documento_paciente'];
            $nombreP = $_POST['Nombre_paciente'];
            $apellidoP = $_POST['Apellido_paciente'];
            $telefono = $_POST['Tel_paciente'];
            $direccion = $_POST['Dir_paciente'];
            $especialista = $_POST['especialista'];
            $fecha = $_POST['Fecha'];
            $hora = $_POST['Hora'];

            $encuentra = 0;
            //$datosCita = mysqli_query($conectar, "SELECT * FROM $citas WHERE Fecha = '$fecha' && Hora = '$hora' && cc_especialista = '$especialista' " ); //si existe una fecha, hora y especialista identicos, no se asigna la cita
            $datosCita = mysqli_query($conectar, "SELECT * FROM $pacientes WHERE Fecha = '$fecha' && Hora = '$hora' && cc_especialista = '$especialista' " ); //si existe una fecha, hora y especialista identicos, no se asigna la cita
            while($consultaCita = mysqli_fetch_array($datosCita)){
                $encuentra++;
            }

            if ($encuentra!=0) {
                echo "<h2>Ya existe una cita en este horario</h2>";
            }else{
                // Se guarda la informacion en la tabla citas y pacientes 
                //$conectar->query("INSERT INTO $pacientes VALUES ('$documentoP', '$nombreP', '$apellidoP', '$telefono', '$direccion')");
                //$conectar->query("INSERT INTO $citas VALUES ('', '$especialista', '$documentoP', '$fecha', '$hora')");
                //echo "<h2> Se agendó la cita exitosamente</h2>";
                
                //$insertarP = "INSERT INTO pacientes(Documento, Nombre, Apellido, Telefono, Direccion,cc_especialista,Fecha,Hora) VALUES ('$documentoP', '$nombreP', '$apellidoP', '$telefono', '$direccion', '$especialista', '$fecha', '$hora')";
                $insertarP = "INSERT INTO `pacientes`(`Documento`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `cc_especialista`, `Fecha`, `Hora`) VALUES ('$documentoP', '$nombreP', '$apellidoP', '$telefono', '$direccion', '$especialista', '$fecha', '$hora')";
                //$insertarC = "INSERT INTO cita(id, cc_especialista, Id_paciente, Fecha, Hora) VALUES ('', '$especialista', '$documentoP', '$fecha', '$hora')";

                $consultP = mysqli_query($conectar, $insertarP);
                /*$consultC = mysqli_query($conectar, $insertarC);*/

                if(!$consultP){
                    echo"error al guardar paciente <br>";
                }else{
                    echo"exito al guardar paciente <br>";
                }
           
                /*if(!$consultC){
                    echo"error al guardar cita";
                }else{
                    echo"exito al guardar cita";
                }*/
            }
        }
    ?>
    <a href="listaCitas.php">Ver tablas</a>
    
</body>
</html>