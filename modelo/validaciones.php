<!-- funciones para validar los campos -->
<?php
//patron solo letras
function validarSoloLetras($var){
    $patronLetras = "/^[a-z ]{30}$/i";
    if (preg_match($patronLetras,$var)) {
        return $var;
    }
}

function validarSoloNumeros($var){
    $patronNumeros = "/^[0-9]+$/";
    if (preg_match($patronNumeros,$var)) {
        return $var;
    }
}

function validarNomApe($var){
    $patronNomApe = "/^[A-Z]{1}[a-záéíóúñ ]{3,30}+$/";
    if (preg_match($patronNomApe,$var)) {
        return $var;
    }
}

?>