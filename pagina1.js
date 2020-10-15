 function abrir(ventana){
    document.getElementById(ventana).style.display="block";
 }

function cerrar(vent){
    document.getElementById(vent).style.display="none";
 }

 function abrirAnimacion(numVentana){
    var ventana=document.getElementById(numVentana);

    ventana.classList.add("activar");
}

function cerrarAnimacion(numVentana) {
    var ventana = document.getElementById(numVentana);
   ventana.classList.remove("activar");
 }

window.addEventListener("scroll", mostrarElementos);
