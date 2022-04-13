<?php
    require '../../connection.php';
    $old_id = $_GET['old_id'];

    $id = $_POST['id'];
    $name = $_POST['name'];
    $family = $_POST['family'];
    $stock = $_POST['stock'];
    $pvp = $_POST['pvp'];
    $description = $_POST['description'];
    $dimensions = $_POST['dimensions'];
    $weight = $_POST['weight'];


    if($_FILES['img']['size'] == 0 && $_FILES['cover_image']['error'] == 0) {
        $update = "UPDATE PRODUCTOS SET id='$id', nombre='$name', familia='$family', stock='$stock', PVP='$pvp', descripcion='$description', dimensiones='$dimensions', peso='$weight' WHERE id='$old_id'";
    } else {
        $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $update = "UPDATE PRODUCTOS SET id='$id', nombre='$name', familia='$family', stock='$stock', PVP='$pvp', descripcion='$description', dimensiones='$dimensions', peso='$weight', imagen='$image' WHERE id='$old_id'";
    }
    
    $query = mysqli_query($db, $update);
    
    if($query) {
        echo "<script>alert('Se ha actualizado el producto correctamente');
        location.href='../products.php';
        </script>";
    } else {
        echo "<script>alert('No se ha podido actualizar el producto. \"ERROR: " . mysqli_error($db) . "\"');
        window.history.go(-1);
        </script>";
    }
?>