<?php
    $order = $_POST['order'];
    $orderType = $_POST['orderType'];

    if (!isset($_POST['id']) and !isset($_POST['client_id']) and !isset($_POST['product_id']) and !isset($_POST['date_time'])) {
        if (isset($_POST['order'])) {         
            $query = "SELECT * FROM COMPRAS ORDER BY $order $orderType";
        } else {
            $query = "SELECT * FROM COMPRAS ORDER BY id";
        }       
    } else {
        $query = "SELECT * FROM COMPRAS WHERE ";

        if ($_POST['id']) $query .=  "id LIKE '" . $_POST['id'] . "' AND ";                   
        if ($_POST['client_id']) $query .=  "id_cliente LIKE '" . $_POST['client_id'] . "' AND ";                 
        if ($_POST['product_id'])$query .=  "id_producto LIKE '" . $_POST['product_id'] . "' AND ";  
        if ($_POST['date_time']) $query .=  "fecha_hora LIKE '%" . $_POST['date_time'] . "%' AND ";

        $query = substr($query, 0, -5); 
        $query .= " ORDER BY $order $orderType";
    }

    $result = mysqli_query($db, $query);
?>