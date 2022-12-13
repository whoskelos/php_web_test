<?php
function generarFichero($datos){
    $manejador = fopen("errores.txt","a+");
    fwrite($manejador,$datos."\r\n");
}
?>