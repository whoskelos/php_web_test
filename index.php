<?php
session_name("login");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/7eb3f4316d.js" crossorigin="anonymous"></script>
    <script>
        function eliminar() {
            var respuesta = confirm("Estas seguro que deseas eliminar?");
            return respuesta;
        }
    </script>
</head>

<body>
    <?php
    include "./modelo/conexion.php";
    if (isset($_GET["id"])) {
        header("Refresh: 2; url='index.php'");
    }
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1 text-white">Panel Admin</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php if (isset($_SESSION['username'])) {
                        echo "<a class='btn btn-primary btn-usuario dropdown-toggle fw-bold' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>" . $_SESSION['username'] . "</a>
                        <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='controlador/cerrar_sesion.php'>Cerrar Sesion</a></li>
                        </ul>";
                    }
                    ?>

</div>
</div>
</nav>
</header>
<div class="container-fluid">
    <div class="row">
        <h1 class="text-center p-2">Gestion de personal</h1>
        <?php include "./controlador/borrar_persona.php";?>
        <div class="col-4 p-3">
            <form class="bg-dark text-white rounded" method="POST" enctype="multipart/form-data">
                <h3 class="text-center  p-3">Registro de personas</h3>
                <?php
                    include "./controlador/registro_persona.php";
                    ?>
                    <div class="m-3">
                        <label for="txtNombre" class="form-label fw-bold">Nombre persona</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="emailHelp">
                    </div>
                    <div class="m-3">
                        <label for="txtApellido" class="form-label fw-bold">Apellido persona</label>
                        <input type="text" class="form-control" id="txtApellido" name="txtApellido" aria-describedby="emailHelp">
                    </div>
                    <div class="m-3">
                        <label for="txtDNI" class="form-label fw-bold">DNI persona</label>
                        <input type="text" class="form-control" id="txtDNI" name="txtDNI" aria-describedby="emailHelp">
                    </div>
                    <div class="m-3">
                        <label for="txtFechaNac" class="form-label fw-bold">Fecha nacimiento persona</label>
                        <input type="date" class="form-control" id="txtFechaNac" name="txtFechaNac" aria-describedby="emailHelp">
                    </div>
                    <div class="m-3">
                        <label for="txtCorreo" class="form-label fw-bold">Correo persona</label>
                        <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" aria-describedby="emailHelp">
                    </div>
                    <div class="m-3">
                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1000"> -->
                        <label for="foto" class="form-label fw-bold">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary m-3" name="enviar">Registrar</button>
                </form>

            </div>
            <div class="col-8 p-2">
                <table class="table ">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRES</th>
                            <th scope="col">APELLIDOS</th>
                            <th scope="col">DNI</th>
                            <th scope="col">FECHAS DE NAC</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = conectaDB();
                        //EJECUTO LA QUERY Y LA ALMACENO EN LA VARIABLE registros PARA ACCEDER A SUS PROPIEDADES
                        $registros = $db->query("SELECT * FROM persona")->fetchAll(PDO::FETCH_OBJ);
                        foreach ($registros as $persona) : ?>
                            <tr>
                                <td><?php echo $persona->id_persona ?></td>
                                <td><?php echo $persona->nombre ?></td>
                                <td><?php echo $persona->apellido ?></td>
                                <td><?php echo $persona->dni ?></td>
                                <td><?php echo $persona->fecha_nac ?></td>
                                <td><?php echo $persona->correo ?></td>
                                <td>
                                    <a href="./modificar.php?id=<?php echo $persona->id_persona ?>" class="btn btn-small btn-warning">Editar</a>
                                    <a onclick="return eliminar()" href="index.php?id=<?php echo $persona->id_persona ?>" class="btn btn-small btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>