<?php
if (isset($_GET["id"])) {
    $id_persona = $_GET["id"];
    $db = conectaDB();
    $sql = $db->query("DELETE FROM persona WHERE id_persona='$id_persona'");
    if ($sql == false) {
        echo "<div class='alert alert-danger'>Error al eliminar registro</div>";
    } else {
        echo "<div class='alert alert-success'>Registro eliminado correctamente</div>";
    }
}
?>