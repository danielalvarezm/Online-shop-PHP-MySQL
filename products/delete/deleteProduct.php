<?php
include("../../connection.php");

$id = $_GET['id'];

$delete = "UPDATE PRODUCTOS SET eliminada=1 WHERE id='$id'";

if (mysqli_query($db, $delete)) {
    echo "<script>alert('El producto se ha eliminado correctamente');
    location.href='../products.php';
    </script>";
} else {
    echo "<script>alert('No se ha podido eliminar el producto. \"ERROR: " . mysqli_error($db) . "\"');
    location.href='../products.php';
    </script>";
}

mysqli_close($db);
?>