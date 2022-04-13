<?php
    //Etapa1. Crear la variable $db y asignar a la cadena de conexión
    $db = mysqli_connect('fdb34.awardspace.net','4014766_tienda',
    '4014766_tienda#','4014766_tienda') or die('Error al conectar al servidor MySQL.');
    $db->set_charset('utf8');
?>