<?php
require '../../connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];
$surnames = $_POST['surnames'];

$update = "UPDATE CLIENTES SET email='$email', dni='$dni', nombre='$name', apellidos='$surnames', telefono='$phone_number', direccion='$address', codigo_postal='$postal_code' WHERE id='$id'";

$query = mysqli_query($db, $update);

if($query) {
    echo "<script>alert('Se ha actualizado el cliente correctamente');
    location.href='../../index.php';
    </script>";
} else {
    echo "<script>alert('No se ha podido actualizar el cliente. \"ERROR: " . mysqli_error($db) . "\"');
    window.history.go(-1);
    </script>";
}
?>