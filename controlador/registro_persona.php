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
    
    if (empty($errores)) {
        $db = conectaDB();
        $sql = "INSERT INTO persona (nombre,apellido,dni,fecha_nac,correo) VALUES (?,?,?,?,?)";
        $resultado = $db->prepare($sql);
        $query = $resultado->execute(array($nombre,$apellido,$dni,$fechNac,$correo));
        if ($query == false) {
            echo "<div class='alert alert-danger'>Error al crear registro</div>";
        }else {
            echo "<div class='alert alert-success'>Registro creado correctamente</div>";
        }
    }else {
        echo "<div class='alert alert-danger'>Rellene todos los campos</div>";
    }
}
?>