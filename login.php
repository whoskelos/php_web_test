<?php
session_name("login");
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body {
            background: #ffe259;
            background: linear-gradient(to right, #ffa751, #ffe259);
        }

        .bg {
            background-image: url(img/fondo.jpg);
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body>
    <div class="container w-75 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-6 col-xl-6 rounded">

            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="text-end">
                    <img src="img/logo-hacker.png" width="60" alt="logo login">
                </div>
                <h2 class="fw-bold text-center py-5">Bienvenido</h2>
                <?php
                include "./modelo/conexion.php";
                include "./controlador/accion_login.php";
                ?>
                <!-- Login -->

                <form method="post">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="whoskelos">
                        <label for="txtUsername">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password">
                        <label for="txtPassword">Password</label>
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" name="connected" id="inputConectado" class="form-check-input">
                        <label for="inputConectado" class="form-check-label">Mantenerme conectado</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="enviar">Iniciar Sesion</button>
                    </div>
                    <div class="my-3">
                        <span>No tienes cuenta? <a href="#">Registrate</a></span>
                    </div>
                </form>

                <!-- LOGIN CON REDES SOCIALES -->
                <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Inciar sesion</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2 d-none d-md-block">
                                        <img src="img/fb-logo.png" width="32" alt="facebook logo">
                                    </div>
                                    <div class="col-12 col-md-10">Facebook</div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2 d-none d-md-block">
                                        <img src="img/ggl-logo.png" width="32" alt="google logo">
                                    </div>
                                    <div class="col-12 col-md-10">Google</div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>