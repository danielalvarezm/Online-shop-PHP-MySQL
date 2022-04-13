<?php
    require '../../connection.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $family = $_POST['family'];
    $stock = $_POST['stock'];
    $pvp = $_POST['pvp'];
    $description = $_POST['description'];
    $dimensions = $_POST['dimensions'];
    $weight = $_POST['weight'];
    $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));

    $insert = "INSERT INTO PRODUCTOS (id, nombre, familia, stock, pvp, descripcion, dimensiones, peso, imagen) VALUES ('$id', '$name', '$family', '$stock', '$pvp', '$description', '$dimensions', '$weight', '$image')";

    $query = mysqli_query($db, $insert);

    if($query) {
        echo "<script>alert('Se ha insertado el producto correctamente');
        location.href='../products.php';
        </script>";
    } else {
        echo "<script>alert('No se ha podido insertar el producto. \"ERROR: " . mysqli_error($db) . "\"');
        window.history.go(-1);
        </script>";
    }
    
    mysqli_close($db);
?>