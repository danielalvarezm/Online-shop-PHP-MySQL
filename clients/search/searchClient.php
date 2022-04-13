<?php
    $order_type = $_POST['orderType'];
    $order = $_POST['order'];

    if (!isset($_POST['id']) && !isset($_POST['name']) && !isset($_POST['surname']) && !isset($_POST['email']) && !isset($_POST['dni']) && !isset($_POST['phone']) && !isset($_POST['address']) && !isset($_POST['postal_code'])) {
        $query = "SELECT * FROM CLIENTES ORDER BY id";
        
    } else {
        $query = "SELECT * FROM CLIENTES WHERE ";

        if ($_POST['id']) $query .=  "id LIKE '" . $_POST['id'] . "' AND ";
        if ($_POST['name']) $query .=  "nombre LIKE '%" . $_POST['name'] . "%' AND ";
        if ($_POST['surname']) $query .=  "apellidos LIKE '%" . $_POST['surname'] . "%' AND ";
        if ($_POST['email']) $query .=  "email LIKE '%" . $_POST['email'] . "%' AND ";
        if ($_POST['dni']) $query .=  "dni LIKE '%" . $_POST['dni'] . "%' AND ";
        if ($_POST['phone']) $query .=  "telefono LIKE '%" . $_POST['phone'] . "%' AND ";
        if ($_POST['address']) $query .=  "direccion LIKE '%" . $_POST['address'] . "%' AND ";
        if ($_POST['postal_code']) $query .=  "codigo_postal LIKE '%" . $_POST['postal_code'] . "%' AND ";

        $query = substr($query, 0, -5);
        $query .= " ORDER BY $order $order_type";
    }

    $result = mysqli_query($db, $query);
?>