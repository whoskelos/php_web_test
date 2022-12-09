<?php
if (isset($_POST['enviar'])) {
    // session_name("login");
    // session_start();
    $errores = [];
    if (isset($_POST['txtUsername']) && $_POST['txtUsername'] != "") {
        $username = $_POST['txtUsername'];
    } else {
        $errores[] = "El campo usuario esta vacio"; 
    }
    if (isset($_POST['txtPassword']) && $_POST['txtPassword'] != "") {
        $password = $_POST['txtPassword'];
    } else {
        $errores[] = "El campo password esta vacio";
    }

    if (empty($errores)) {
        //conectamos a la base de datos
        $db = conectaDB();
        $sql = $db->prepare("SELECT * FROM usuario WHERE `username` = ? AND `password` = ?");
        $sql->execute(array($username,$password));
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            echo "<div class='alert alert-danger'>Usuario no valido</div>";
        } else {
            $_SESSION['username'] = $username;
            header("Location: ./index.php");
        }
    }else {
        echo "<div class='alert alert-danger'>Rellene todos los campos</div>";
    }
}
?>