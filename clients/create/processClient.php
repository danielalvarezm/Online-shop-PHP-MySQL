<?php
require '../../connection.php';

$name = $_POST['name'];
$dni = $_POST['dni'];
$first_surname = $_POST['first_surname'];
$second_surname = $_POST['second_surname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];
$surnames = $first_surname . " " . $second_surname;

$insert = "INSERT INTO CLIENTES (nombre, apellidos, dni, email, telefono, direccion, codigo_postal) VALUES ('$name', '$surnames', '$dni', '$email', '$phone_number', '$address', '$postal_code')";

$result = mysqli_query($db, $insert);

if($result) {
    echo "<script>alert('Se ha insertado el cliente correctamente');
    location.href='../../index.php';
    </script>";
} else {
    echo "<script>alert('No se ha podido insertar el cliente. \"ERROR: " . mysqli_error($db) . "\"');
    window.history.go(-1);
    </script>";
}

mysqli_close($db);

?>