<?php
    include("../../connection.php");

    $client = $_POST['client'];
    $products = $_POST['products'];
    $original_units = $_POST['units'];
    $final_units = array();
    
    for ($i = 0; $i < count($original_units); $i++) {
        if ($original_units[$i] > 0) array_push($final_units, $original_units[$i]);
    }
    
    // Comprobamos que el array de productos y de unidades no estén vacíos
    if (empty($products) || empty($final_units)) {
        echo "<script>alert('Para realizar una compra debe seleccionar mínimo una compra y especificar sus unidades.');
        window.history.go(-1);</script>";

    
    } else if (count($products) != count($final_units) || empty($products) || empty($final_units) ) { // El tamaño de products debe ser el mismo al de final_units
        echo "<script>alert('Por cada producto se debe especificar sus unidades y viceversa.'); 
        window.history.go(-1);</script>";

    } else {
        // Por cada producto, realizamos una compra
        for ($i = 0; $i < sizeof($products); $i++) {
            
            $query = "SELECT PVP FROM PRODUCTOS WHERE id = '$products[$i]'";
            $import = mysqli_fetch_array(mysqli_query($db, $query));
            $import = $import['PVP'] * $final_units[$i];

            $query = "INSERT INTO COMPRAS (id_cliente, id_producto, unidades, importe_final) VALUES ('$client', '$products[$i]', '$final_units[$i]', '$import')";

            // Si se produce un error, se muestra un mensaje de error
            if (!mysqli_query($db, $query)) {
                echo "<script>alert(\"ERROR: " . mysqli_error($db) . "\");
                window.history.go(-1);</script>";
            }
        }
        echo "<script>alert('Se ha realizado la compra correctamente'); 
        location.href='../purchases.php';</script>";
    }

    mysqli_close($db);
?>