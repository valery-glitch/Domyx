function eliminar(txt){
    let msj = confirm("Desea eliminar el registro " + txt + "?");
    return msj;
}

function mostrarSec(idSec){
    document.getElementById("pendientes").style.display = "none";
    document.getElementById("resenas").style.display = "none";
    document.getElementById(idSec).style.display = "block";
    sessionStorage.setItem("seccionActiva", idSec);
    
}

document.addEventListener("DOMContentLoaded", function () {
    let sec = sessionStorage.getItem("seccionActiva");
    if (!sec) {
        sec = "pendientes";
    }
    mostrarSec(sec);
});