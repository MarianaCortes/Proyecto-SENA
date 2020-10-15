<?php
    session_start();

    error_reporting(0);
    $user = $_SESSION['logeado'];

    if($user != ""){
?>
        <a href="cerrarsesion.php">SALIR</a>
        <a href="citas.php">Agendar Citas</a>
<?php        
    }else{
        // echo "<a href='login.php'>Administrar sitio</a>";
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="catalogo1.css">
    <link rel="stylesheet" href="catalogoP.css">
    <title>Catalogo</title>
</head>
<body>
<div class="ventana3" id="ventana1">
        <div class="ventanita">
            <h2>Rostro corazón</h2>
            <a href="javascript:cerrarAnimacion('ventana1')"title="cerrar"> <img src="imagenes/close.png" > </a>
            <img src="imagenes/corazon.jpg">
            <p>Las personas con rostro corazón deben usar gafas de tamaño mediano, sin alcanzar las mejillas. Así se conseguirá equilibrar las facciones.</p>
        </div>
    </div>

    <div class="ventana3" id="ventana2">
        <div class="ventanita">
            <h2>Rostro cuadrado</h2>
            <a href="javascript:cerrarAnimacion('ventana2')"title="cerrar"> <img src="imagenes/close.png" > </a>
            <img src="imagenes/cuadrado.jpg">
            <p>Para las personas que tienen un rostro cuadrado son favorecedoras las gafas con forma ovalada o redonda, para suavizar las líneas faciales.</p>
        </div>
    </div>
    

    <div class="ventana3" id="ventana3">
        <div class="ventanita">
            <h2>Rostro ovalado</h2>
            <a href="javascript:cerrarAnimacion('ventana3')"title="cerrar"> <img src="imagenes/close.png" > </a>
            <img src="imagenes/ovalado.jpg">
            <p>A las personas con rostro ovalado le sientan bien, prácticamente, cualquier tipo de gafas, ya que las proporciones de su cara son consideradas ideales.</p>
        </div>
    </div>

    <div class="ventana3" id="ventana4">
        <div class="ventanita">
            <h2>Rostro redondo</h2>
            <a href="javascript:cerrarAnimacion('ventana4')"title="cerrar"> <img src="imagenes/close.png" > </a>
            <img src="imagenes/redondo.jpg">
            <p>Para las personas de rostro redondo, lo más recomendable son unas gafas que tengan su ancho y alto proporcionado. Se deben evitar monturas redondas, ya que harían aún más circular la forma de la cara.</p>
        </div>
    </div>

    <div class="ventana3" id="ventana5">
        <div class="ventanita">
            <h2>Rostro rectangular</h2>
            <a href="javascript:cerrarAnimacion('ventana5')"title="cerrar"> <img src="imagenes/close.png" > </a>
            <img src="imagenes/rectangular.jpg">
            <p>A las personas con rostro rectangular les favorecen unas gafas que consigan acortar la largura que aporta esta forma facial. Es indispensable evitar gafas alargadas horizontalmente.</p>
        </div>
    </div>
    
    <div class="ventana3" id="ventana6">
        <div class="ventanita">
            <h2>Rostro triángulo</h2>
            <a href="javascript:cerrarAnimacion('ventana6')"title="cerrar"> <img src="imagenes/close.png" > </a>
            <img src="imagenes/triangulo.jpg">
            <p>Las personas con rostro en forma de trapecio o triángulo deben usar gafas de monturas ovaladas o estilo mariposa para resaltar los pómulos y mantener el equilibrio del rostro.</p>
        </div>
    </div>

<div class="menu">

     <div class="logo">
        <img src="imagenes/logo.jpg">
    </div>
 
    <input type="checkbox" id="Checkmenu">
    <label for="Checkmenu"><img src="imagenes/menu-abierto.png"></label>
<input type="checkbox" id="Checkmenu">
        <!-- <label for="Checkmenu"><img src="imagenes/menu-abierto.png"></label> -->
    
        <nav class="cajitas">
             <ul>
            <li><a href="pagina1.html">Inicio</a></li>
            <li><a href="pagina2.html">Nosotros</a></li>
            <li><a href="formulario.html">Contáctenos</a></li>
            <li><a href="#">Calendario</a></li>
            <li><a href="catalogo1.php">Catalogo</a></li>
        
            </ul>
        </nav>
     </div>
    
     <header>
        <h1>Grandes marcas en nuestra óptica.</h1>
        <p class="primerParrafo">Cada detalle de tu salud visual es importante para nosotros.</p>
        <p>En nuestra óptica encuentras monturas de calidad para brindar confort en tu día a día. </p>
        <img src="imagenes/gafas.JPG"> 

        <div class="contenedor1">

</div>
    </header>

    <div class="contenedor">
            <div class="contenedorparrafo">
                <p>La forma de tu rostro se convierte en un factor clave a la hora de elegir las gafas adecuadas. <br> ¡Aquí te damos algunos tips para que escojas las gafas perfectas para ti!</p>
            </div>

        <div class="imagenes">
            <a href="javascript:abrirAnimacion('ventana1')" class="imagen1">
                <p>Rostro corazón</p>
            </a>
            <a href="javascript:abrirAnimacion('ventana2')" class="imagen2">
                <p>Rostro cuadrado</p>
            </a>
            <a href="javascript:abrirAnimacion('ventana3')" class="imagen3">
                <p>Rostro ovalado</p>
            </a>
            <a href="javascript:abrirAnimacion('ventana4')" class="imagen4">
                <p>Rostro redondo</p>
            </a>
            <a href="javascript:abrirAnimacion('ventana5')" class="imagen5">
                <p>Rostro rectangular</p>
            </a>
            <a href="javascript:abrirAnimacion('ventana6')" class="imagen6">
                <p>Rostro triángulo</p>
            </a>
        </div>
        </div>

    <?php
        if($user != ""){      //si existe un usuario con sesión activa        
    ?>
            <form class="formulario_publicar" action="catalogo1.php" method="post" enctype="multipart/form-data">
                <label>
                    Nombre Artículo:<br>
                <input type="text" name="titulo" placeholder="Nombre..." autocomplete="off">
                </label>
                <br>
                <label>
                    Descripción: <br>
                    <textarea name="decripcion_articulo" cols="80" rows="5" placeholder="Detalles del artículo..."></textarea>
                </label>
                <br>
                <label>
                    Precio:
                    <input type="text" name="precio">
                </label>
                <br>
                <input type="hidden" name="MAX_TAM" value="2097152">
                <label>
                    Seleccionar imagen: <br>
                    <input type="file" name="imagen_articulo">
                </label>
                <br>
                <input type="submit" value="PUBLICAR" name="btn_publicar">
            </form>
    <?php
        }
    ?>
<?php
    include("conexion.php"); //conectarse a base de datos

    if(isset($_POST['btn_publicar'])){

    //Condicional en caso de que ocurra algún tipo de error con php al momento de cargar la imagen
    if($_FILES['imagen_articulo']['error']){
        
        switch ($_FILES['imagen_articulo']['error']) {
            case 1: //Errpr exceso de tamaño
                echo "El tamaño de la imagen supera lo permitido por el servidor";
                break;

            case 2: //Errpr exceso de tamaño (superior a 2MB)
                echo "El tamaño de la imagen supera los 2MB permitidos por PHP";
                break;

            case 3: //Corrupcion del archivo
                echo "La operación ha sido interrumpida";
                break;
                
            case 4: //No existe archivo
                echo "No se ha cargado ningún archivo";
                break;
        }
    }else{
        if ((isset($_FILES['imagen_articulo']['name']) && ($_FILES['imagen_articulo']['error']== UPLOAD_ERR_OK))) { //Si la imagen cargó correctamente
            
            $ruta_almacenamiento = "imagenes/";
            $ext = $_FILES['imagen_articulo']['type']; //se obtiene el tipo de imagen
            echo $ext;

            //en esta condicional, se asigna un valor a $extension segun el tipo de imagen
            $extension = "";
            if ($ext =="imagenes/jpeg") {
                $extension = ".jpg";
            }elseif ($ext =="imagenes/png") {
                $extension = ".png";
            }elseif ($ext =="imagenes/gif") {
                $extension = ".gif";
            }

            $nuevoNombre = mktime(); //Se obtiene la fecha actual en numeros (número único)
            
            move_uploaded_file($_FILES['imagen_articulo']['tmp_name'], $ruta_almacenamiento.$_FILES['imagen_articulo']['name']); //guardela en esta dirección y con el nombre original de ella
            rename($ruta_almacenamiento.$_FILES['imagen_articulo']['name'], $ruta_almacenamiento.$nuevoNombre.$extension );
            //Se le cambia el nombre al archivo en caso que varios usuarios le pongan el mismo nombre a sus imagenes
            // echo"El archivo ".$_FILES['imagen_evento']['name']." se guardó exitosamente en la carpeta del servidor";
        }else{
            echo"El archivo no se pudo guardar";
        }
    }

    //Variables que almacenan lo que recibe del formulario de publicación
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['decripcion_articulo'];
    $precio = $_POST['precio'];
    $imagen = $nuevoNombre.$extension; //se guarda en esta variable el nuevo nombre de la imagen para luego almacenarlo en bases de datos y que conincida con el nombre de la imagen en la carpeta

    //inserción a base de datos
    $conectar->query("INSERT INTO $publicacion (IdPublicacion, precio, imagen, titulo, descripcion)VALUES ('', '$precio', '$imagen', '$titulo', '$descripcion')");
    echo"$precio $imagen $titulo $descripcion";

}
?>

    <div class="contenedorPrincipal">
        <?php

            $datos = mysqli_query($conectar, "SELECT * FROM $publicacion ORDER BY IdPublicacion DESC");
            //Se crea un while que recorra la variable $datos y cada registro que encuetre lo guarda en la variable $consulta
            while($consulta = mysqli_fetch_array($datos)){
                $idpublicacion = $consulta['IdPublicacion'];
                $titulo = $consulta['titulo'];
                $descripcion = $consulta['descripcion'];
                $precio = $consulta['precio'];
                $imagenEvento = $consulta['imagen'];
        ?>
                <div class="cuadro_articulos">
                    <?php
                        if($user != ""){ //Si el usuario administrador ha ingresado
                    ?>
                    <form action="catalogo1.php" method="post">
                        <input type="hidden" name="idPublicacion" value="<?php echo $idpublicacion;?>">
                        <input type="submit" name="eliminar_articulo" class="icon-eliminar" value="X" title="Eliminar">
                    </form>

                    <?php
                            if(isset($_POST['eliminar_articulo'])){
                                $idarticulo = $_POST['idPublicacion'];
        
                                mysqli_query($conectar, "DELETE FROM $publicacion WHERE idPublicacion = '$idarticulo'");
                                header("location:catalogo1.php");
                            }
                            
                        }
                    ?>

                    <!-- titulo o nombre del articulo -->
                    <h2><?php echo $titulo; ?></h2>

                    <?php
                        if($imagenEvento != ""){ //si fue cargada la imagen, muestrela
                    ?>
                            <img src="imagenes/<?php echo $imagenEvento; ?>">
                    <?php
                        }
                    ?>
                    

                    <!-- manera en que se muestra la informacion del evento -->                      
                        <h5>$<?php echo $precio;?></h5>
                        <p><?php echo $descripcion; ?></p>
                </div>
                
        <?php
            }
        ?>

        <div class="lentes">
            <p>En Corvisión Óptica somos expertos en el cuidado de tus ojos. Tenemos diferentes tipos de lentes para ti.</p>
        </div>
        </div>
        
         <div class="fondoVideo">
         <video src="videos/transitions.mp4" autoplay muted loop></video> 
         <div class="texto">
         <h1>Lentes Transitions</h1>
         <p>Los lentes Transitions integran la tecnología fotocromática que permite una rápida y gradual adaptación para que tus ojos reciban la cantidad óptima de luz. Estos lentes pasan de manera rápida a un tono oscuro en exteriores y vuelven a aclararse totalmente en interiores.</p> 
         </div>
    </div>

    <div class="fondoVideo">
         <video src="videos/zeiss.mp4" autoplay muted loop></video> 
         <div class="texto">
         <h1>Lentes Zeiss</h1>
         <p>Los lentes ZEISS ofrecen una ayuda óptima a los ojos para pasar de cerca a lejos. Estos lentes están hechas a medida y se adaptan perfectamente al usuario, lo que garantiza una mayor tolerancia de uso, una adaptación más rápida y una visión clara en todas las distancias.</p> 
         </div>
    </div>

    <div class="fondoVideo">
    <video src="videos/crizal.mp4" autoplay muted loop></video> 
         <div class="texto">
         <h1>Lentes Crizal</h1>
         <p>La capa antirreflejo de los Lentes Crizal hace que se disminuyan los molestos reflejo, permitiendo una visión más óptima. El antirreflejo Crizal está formado por capas nanoscópicas, que son hasta 500 veces más delgadas que una hebra de cabello.</p> 
         </div>
    </div>

    <div class="fondoVideo">
    <video src="videos/futurex.mp4" autoplay muted loop></video>
        <div class="texto"> 
         <h1>Lentes Futurex</h1>
         <p>Los lentes Futurex están dotados con tecnologías de protección contra la luz azul dañina, para prevenir la fatiga visual digital, reflejando un segmento importante de la luz azul, reduciendo la dispersión cromática y la fatiga ocular, mientras proporciona una visión clara.</p> 
         </div>
    </div>

    <div class="fondoVideo">
    <video src="videos/eyezen.mp4" autoplay muted loop></video> 
         <div class="texto"> 
         <h1>Lentes Eyezen</h1>
         <p>Eyezen es una gama de lentes de protección ocular diseñados para aquellos que viven una vida conectada. Si trabajas en un ambiente digital, te entusiasmas por maratonear, jugar videojuegos o te la pasas conectado a redes sociales, los lentes Eyezen te ayudarán a reducir la fatiga ocular durante todo el día.</p> 
         </div>
    </div>
<script src= 'pagina1.js'></script>
    
</body>
</html>
<!-- comentario -->