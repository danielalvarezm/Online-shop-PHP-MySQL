<?php
include("../../connection.php");

$id = $_GET['id'];

$delete = "UPDATE CLIENTES SET eliminada=1 WHERE id='$id'";

if (mysqli_query($db, $delete)) {
    echo "<script>alert('El cliente se ha eliminado correctamente');
    location.href='../../index.php';
    </script>";
} else {
    echo "<script>alert('No se ha podido eliminar el cliente');
    location.href='../../index.php';
    </script>";
}

mysqli_close($db);
?>