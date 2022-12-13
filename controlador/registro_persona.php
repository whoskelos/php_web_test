<?php
if (isset($_POST['enviar'])) {
    $errores = [];
    if (isset($_POST['txtNombre']) && $_POST['txtNombre']!= "" ) {
        $nombre = $_POST['txtNombre'];
    }else {
        $errores[] = "Campo nombre vacio";
    }
    if (isset($_POST['txtApellido']) && $_POST['txtApellido']!= "" ) {
        $apellido = $_POST['txtApellido'];
    }else {
        $errores[] = "Campo apellido vacio";
    }
    if (isset($_POST['txtDNI']) && $_POST['txtDNI']!= "" ) {
        $dni = $_POST['txtDNI'];
    }else {
        $errores[] = "Campo dni vacio";
    }
    if (isset($_POST['txtFechaNac']) && $_POST['txtFechaNac']!= "" ) {
        $fechNac = $_POST['txtFechaNac'];
    }else {
        $errores[] = "Campo fecha nacimiento vacio";
    }
    if (isset($_POST['txtCorreo']) && $_POST['txtCorreo']!= "" ) {
        $correo = $_POST['txtCorreo'];
    }else {
        $errores[] = "Campo correo vacio";
    }

    //foto
    if (isset($_FILES['foto']) && $_FILES['foto']['tmp_name'] != "") {
        $foto = file_get_contents($_FILES['foto']['tmp_name']);
    }else {
        $errores[] = "Error en la foto " .$_FILES['foto']['error'];
    }

    
    if (empty($errores)) {
        include "./modelo/subida_imagen.php";
        copiarImagen();
        $db = conectaDB();
        $sql = "INSERT INTO persona (nombre,apellido,dni,fecha_nac,correo,foto) VALUES (?,?,?,?,?,?)";
        $resultado = $db->prepare($sql);
        $query = $resultado->execute(array($nombre,$apellido,$dni,$fechNac,$correo,$foto));
        if ($query == false) {
            echo "<div class='alert alert-danger'>Error al crear registro</div>";
        }else {
            echo "<div class='alert alert-success mx-2'>Registro creado correctamente</div>";
            header("Refresh: 2, url=../crud_php/index.php");
        }
    }else {
        include "./modelo/fichero_errores.php";
        $strErrores = implode("\r\n",$errores);
        generarFichero($strErrores);
        echo "<div class='alert alert-danger mx-2'>Rellene todos los campos</div>";
        header("Refresh: 2, url=../crud_php/index.php");
        
    }
}
?>