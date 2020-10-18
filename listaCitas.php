<?php
    session_start();

    error_reporting(0);
    $user = $_SESSION['logeado'];

    if($user != ""){
?>
        <a href="cerrarsesion.php">SALIR</a><br><br>
        <a href="citas.php">Volver</a>
<?php        
    }else{
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lista.css">
    <title>Vista Citas</title>
</head>
<body>
    
<!-- Tabla de citas -->
    <?php
        include('conexion.php');

    echo "<div class='tabla_citas'>";        
            echo  "<form action='listaCitas.php' method='POST'>
                    <table>
                    <tr>
                        <td>Seleccion</td>
                        <td>Especialista</td>
                        <td>Paciente</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                    </tr>";
                $lista = mysqli_query($conectar, "SELECT * FROM $pacientes");/** */
                while($consultaLista = mysqli_fetch_array($lista)){
                    $id = $consultaLista['Documento'];/** */
                    $idEspecialista= $consultaLista['cc_especialista'];
                    $idPaciente = $consultaLista['Documento'];
                    $fecha = $consultaLista['Fecha'];
                    $hora = $consultaLista['Hora'];

                    echo "<tr>
                            <td> <input type='radio' name='identificador' value=$id> </td>
                            <td>$idEspecialista</td>
                            <td>$idPaciente</td>
                            <td>$fecha</td>
                            <td>$hora</td>
                        </tr>";
                }                
            echo "  </table>
                    <input type='submit' name='editar' value='Editar'>
                    <input type='submit' name='eliminar' value='Eliminar'>
                 </form>";

        if (isset($_POST['editar'])) {
            $idEditar = $_POST['identificador'];
            $editar = mysqli_query($conectar, "SELECT * FROM $pacientes WHERE Documento = $idEditar");/* */
            while($consultaEditar = mysqli_fetch_array($editar)){
                // $idCita = $consultaEditar['Documento']; /*** */
                $idEspecialista= $consultaEditar['cc_especialista'];
                $idPaciente = $consultaEditar['Documento'];
                $fecha = $consultaEditar['Fecha'];
                $hora = $consultaEditar['Hora'];
                echo "<form action='listaCitas.php' method='post'>
                        <input type='hidden' name='id' value='$idPaciente'>   
                        <input type='text' name='idEsp' value='$idEspecialista'>
                        <input type='text' name='nombreP' value='$idPaciente'>
                        <input type='date' name='fechaN' value='$fecha'>
                        <select name='horaN'>
                            <option value='$hora'>$hora</option>
                            <option value='08:00am'>8:00am</option>
                            <option value='10:00am'>10:00am</option>
                            <option value='02:00pm'>2:00pm</option>
                            <option value='04:00pm'>4:00pm</option>
                        </select>
                        <input type='submit' name='actualizar' value='Actualizar'>
                    </form>";
            }
        }
        if (isset($_POST['eliminar'])) {
            $idEliminar = $_POST['identificador'];
            mysqli_query($conectar, "DELETE FROM $pacientes WHERE Documento = '$idEliminar'");/**** */
            header("location:listaCitas.php");
        }
        if (isset($_POST['actualizar'])) {
            $id = $_POST['id'];
            $idEsp= $_POST['idEsp'];
            $nombreP = $_POST['nombreP'];
            $fechaN = $_POST['fechaN'];
            $horaN = $_POST['horaN'];

            mysqli_query($conectar, "UPDATE $pacientes SET cc_especialista='$idEsp', Documento='$nombreP', Fecha='$fechaN', Hora='$horaN' WHERE Documento = '$id'");
            header("location:listaCitas.php");
        }
     echo "</div>";
    ?>
<!-- Tabla de Pacientes -->

    <?php
        echo "<div class='tabla_pacientes'>";        
        echo  "<form action='listaCitas.php' method='POST'>
                <table>
                <tr>
                    <td>Seleccion</td>
                    <td>Documento</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Telefono</td>
                    <td>Dirección</td>
                </tr>";
            $listaP = mysqli_query($conectar, "SELECT * FROM $pacientes");
            while($consultaListaP = mysqli_fetch_array($listaP)){
                $doc = $consultaListaP['Documento'];
                $nombrePac= $consultaListaP['Nombre'];
                $apellidoPac= $consultaListaP['Apellido'];
                $tel = $consultaListaP['Telefono'];
                $dir = $consultaListaP['Direccion'];

                echo "<tr>
                        <td> <input type='radio' name='identificadorP' value=$doc> </td>
                        <td>$doc</td>
                        <td>$nombrePac</td>
                        <td>$apellidoPac</td>
                        <td>$tel</td>
                        <td>$dir</td>
                    </tr>";
            }                
        echo "  </table>
                <input type='submit' name='editarP' value='Editar'>
                <input type='submit' name='eliminarP' value='Eliminar'>
             </form>";

        if (isset($_POST['editarP'])) {
            $idEditarP = $_POST['identificadorP'];
            $editar = mysqli_query($conectar, "SELECT * FROM $pacientes WHERE Documento = $idEditarP");
            while($consultaEditar = mysqli_fetch_array($editar)){
                $doc = $consultaEditar['Documento'];
                $nombrePac= $consultaEditar['Nombre'];
                $apellidoPac = $consultaEditar['Apellido'];
                $tel = $consultaEditar['Telefono'];
                $dir = $consultaEditar['Direccion'];
                echo "<form action='listaCitas.php' method='post'>
                        <input type='hidden' name='docP' value='$doc'>
                        <input type='text' name='nombrep' value='$nombrePac'>
                        <input type='text' name='apellidop' value='$apellidoPac'>
                        <input type='text' name='telp' value='$tel'>
                        <input type='text' name='dirp' value='$dir'>
                        <input type='submit' name='actualizarP' value='Actualizar'>
                    </form>";
            }
        }
        if (isset($_POST['eliminarP'])) {
            $idEliminar = $_POST['identificadorP'];
            mysqli_query($conectar, "DELETE FROM $pacientes WHERE Documento = '$doc'");
            mysqli_query($conectar, "DELETE FROM $citas WHERE Id_paciente = '$doc'");
            header("location:listaCitas.php");
        }
        if (isset($_POST['actualizarP'])) {
            $docp = $_POST['docP'];
            $nombrep= $_POST['nombrep'];
            $apellidop = $_POST['apellidop'];
            $telp = $_POST['telp'];
            $dirp = $_POST['dirp'];

            mysqli_query($conectar, "UPDATE $pacientes SET Nombre='$nombrep', Apellido='$apellidop', Telefono='$telp', Direccion = '$dirp' WHERE Documento = '$docp'");
            // echo "<p> Se actualizó el registro </p>";
            header("location:listaCitas.php");
        }
    echo "</div>";
    ?> 

<!-- Tabla de Especialistas -->
    
    <?php
        echo "<div class='tabla_especialistas'>";        
        echo  "<form action='listaCitas.php' method='POST'>
                <table>
                <tr>
                    <td>Seleccion</td>
                    <td>Documento</td>
                    <td>Especialidad</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                </tr>";
            $listaE = mysqli_query($conectar, "SELECT * FROM $especialista");
            while($consultaListaE = mysqli_fetch_array($listaE)){
                $identificion = $consultaListaE['Cc'];
                $especialidad= $consultaListaE['IdE_Especialidad'];
                $nombreE= $consultaListaE['Nombre'];
                $apellidoE = $consultaListaE['Apellido'];

                echo "<tr>
                        <td> <input type='radio' name='identificadorE' value=$identificion> </td>
                        <td>$identificion</td>
                        <td>$especialidad</td>
                        <td>$nombreE</td>
                        <td>$apellidoE</td>
                    </tr>";
            }                
        echo "  </table>
                <input type='submit' name='editarE' value='Editar'>
                <input type='submit' name='eliminarE' value='Eliminar'>
             </form>";

        if (isset($_POST['editarE'])) {
            $idEditarE = $_POST['identificadorE'];
            $editar = mysqli_query($conectar, "SELECT * FROM $especialista WHERE Cc = $idEditarE");
            while($consultaEditar = mysqli_fetch_array($editar)){
                $identificion = $consultaEditar['Cc'];
                $especialidad= $consultaEditar['IdE_Especialidad'];
                $nombreE = $consultaEditar['Nombre'];
                $apellidoE = $consultaEditar['Apellido'];

                echo "<form action='listaCitas.php' method='post'>
                        <input type='hidden' name='idE' value='$identificion'>
                        <input type='text' name='especialidad' value='$especialidad' readonly>
                        <input type='text' name='nomrbeE' value='$nombreE'>
                        <input type='text' name='apellidoE' value='$apellidoE'>
                        <input type='submit' name='actualizarE' value='Actualizar'>
                    </form>";
            }
        }
        if (isset($_POST['eliminarE'])) {
            $idEliminar = $_POST['identificadorE'];
            mysqli_query($conectar, "DELETE FROM $especialista WHERE Cc = '$idEliminar'");
            mysqli_query($conectar, "DELETE FROM $citas WHERE cc_especialista = '$idEliminar'");
            header("location:listaCitas.php");
        }
        if (isset($_POST['actualizarE'])) {
            $docE = $_POST['idE'];
            $especialidad= $_POST['especialidad'];
            $nombre = $_POST['nomrbeE'];
            $apellido = $_POST['apellidoE'];

            mysqli_query($conectar, "UPDATE $especialista SET Cc='$docE', IdE_Especialidad='$especialidad', Nombre='$nombre', Apellido = '$apellido' WHERE Cc = '$docE'");
            header("location:listaCitas.php");
        }
    echo "</div>";
    ?>

</body>
</html>