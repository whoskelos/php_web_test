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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/7eb3f4316d.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar() {
            var respuesta = confirm("Estas seguro que deseas eliminar?");
            return respuesta;
        }
    </script>
    <h1 class="text-center">Crud PHP Y MySQL</h1>
    <?php
    include "./modelo/conexion.php";
    include "./controlador/borrar_persona.php";
    if (isset($_GET["id"])) {
        header("Refresh: 2; url='index.php'");
    }
    ?>
    <div class="container-fluid row">
        <div class="sesionLogin d-flex">
            <?php if (isset($_SESSION['username'])) {
                echo "<h4 class='mx-3'>" . $_SESSION['username'] . "</h4>";
                echo "<a href='./controlador/cerrar_sesion.php' class='btn btn-danger'>Cerrar Sesion</a>";
            }
            ?>
        </div>
        
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary p-3">Registro de personas</h3>
            <?php
            include "./controlador/registro_persona.php";
            ?>
            <div class="mb-3">
                <label for="txtNombre" class="form-label">Nombre persona</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="txtApellido" class="form-label">Apellido persona</label>
                <input type="text" class="form-control" id="txtApellido" name="txtApellido" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="txtDNI" class="form-label">DNI persona</label>
                <input type="text" class="form-control" id="txtDNI" name="txtDNI" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="txtFechaNac" class="form-label">Fecha nacimiento persona</label>
                <input type="date" class="form-control" id="txtFechaNac" name="txtFechaNac" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="txtCorreo" class="form-label">Correo persona</label>
                <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>