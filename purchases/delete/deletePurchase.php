<?php
include("../../connection.php");

$id = $_GET['id'];

$delete = "UPDATE COMPRAS SET eliminada=1 WHERE id='$id'";

if (mysqli_query($db, $delete)) {
    echo "<script>alert('La compra se ha eliminado correctamente');
    location.href='../purchases.php';
    </script>";
} else {
    echo "<script>alert('No se ha podido eliminar la compra. \"ERROR: " . mysqli_error($db) . "\"');
    location.href='../purchases.php';
    </script>";
}

mysqli_close($db);
?>