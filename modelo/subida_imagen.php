<?php
function copiarImagen()
{
    if (is_dir("copia")) {
        $nombreFichero = $_FILES['foto']['name'];
        $nombreDirectorio = "copia/";
        $nombreCompleto = $nombreDirectorio . $nombreFichero;
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
            $nombreCompleto = $nombreDirectorio . $nombreFichero;
            move_uploaded_file($_FILES['foto']['tmp_name'], $nombreCompleto);
        }
    } else {
        mkdir("copia/");
        $nombreFichero = $_FILES['foto']['name'];
        $nombreDirectorio = "copia/";
        $nombreCompleto = $nombreDirectorio . $nombreFichero;
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
            $nombreCompleto = $nombreDirectorio . $nombreFichero;
            move_uploaded_file($_FILES['foto']['tmp_name'], $nombreCompleto);
        }
    }
}
