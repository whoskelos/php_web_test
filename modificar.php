<?php
$id = $_GET['id'];
include '../crud_php/modelo/conexion.php';
$db = conectaDB();
$sql = $db->query("SELECT * FROM persona WHERE id_persona='$id'");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Modificar Persona</title>
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST" enctype="multipart/form-data">
        <h3 class="text-center alert alert-warning p-3">Editar datos</h3>
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <?php
        include "../crud_php/controlador/modificar_persona.php";
        while ($datos = $sql->fetchObject()) { ?>
            <div class="d-flex justify-content-center">
                <img width="80" src="data:image/png;base64,<?php echo base64_encode($datos->foto); ?>" alt="foto de persona">
            </div>
            <div class="mb-3">
                <label for="txtNombre" class="form-label fw-bold">Nombre persona</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="emailHelp" value="<?php echo $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="txtApellido" class="form-label fw-bold">Apellido persona</label>
                <input type="text" class="form-control" id="txtApellido" name="txtApellido" aria-describedby="emailHelp" value="<?php echo $datos->apellido ?>">
            </div>
            <div class="mb-3">
                <label for="txtDNI" class="form-label fw-bold">DNI persona</label>
                <input type="text" class="form-control" id="txtDNI" name="txtDNI" aria-describedby="emailHelp" value="<?php echo $datos->dni ?>">
            </div>
            <div class="mb-3">
                <label for="txtFechaNac" class="form-label fw-bold">Fecha nacimiento persona</label>
                <input type="date" class="form-control" id="txtFechaNac" name="txtFechaNac" aria-describedby="emailHelp" value="<?php echo $datos->fecha_nac ?>">
            </div>
            <div class="mb-3">
                <label for="txtCorreo" class="form-label fw-bold">Correo persona</label>
                <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" aria-describedby="emailHelp" value="<?php echo $datos->correo ?>">
            </div>
            <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" aria-describedby="emailHelp">
            </div>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-warning" name="enviar">Guardar Cambios</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>