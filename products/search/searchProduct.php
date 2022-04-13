<?php

    $order_type = $_POST['orderType'];
    $order = $_POST['order'];
    
    if (!isset($_POST['id']) && !isset($_POST['name']) && !isset($_POST['family']) && !isset($_POST['description']) && !isset($_POST['stock']) && !isset($_POST['dimensions']) && !isset($_POST['weight']) && !isset($_POST['price'])) {
        $query = "SELECT * FROM PRODUCTOS ORDER BY id";
    } else {
        $query = "SELECT * FROM PRODUCTOS WHERE "; 
        
        if ($_POST['id']) $query .=  "id LIKE '" . $_POST['id'] . "' AND ";
        if ($_POST['name']) $query .=  "nombre LIKE '%" . $_POST['name'] . "%' AND ";
        if ($_POST['family']) $query .=  "familia LIKE '%" . $_POST['family'] . "%' AND ";
        if ($_POST['description']) $query .=  "descripcion LIKE '%" . $_POST['description'] . "%' AND ";
        if ($_POST['stock'] >= 0 && $_POST['stock'] != '') $query .=  "stock LIKE '" . $_POST['stock'] . "' AND ";
        if ($_POST['dimensions']) $query .=  "dimensiones LIKE '" . $_POST['dimensions'] . "' AND ";
        if ($_POST['weight']) $query .=  "peso LIKE '" . $_POST['weight'] . "' AND ";
        if ($_POST['price']) $query .=  "PVP LIKE '" . $_POST['price'] . "' AND ";

        $query = substr($query, 0, -5);
        $query .= " ORDER BY $order $order_type";

    }

    $result = mysqli_query($db, $query);  
?>