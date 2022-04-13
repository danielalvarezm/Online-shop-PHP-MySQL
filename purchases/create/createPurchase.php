<?php
    //Etapa1. Crear conexión
    require '../../connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desarrollo de aplicaciones</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../custom.css">
    </head>
    <body>
        <div class="container">
            <h3 class="center"><b>Desarrollo de Aplicaciones</b></h3><hr><br>
            <div class="row">
                <p><b>Autor:</b> Daniel Álvarez Medina (alu0101216126@ull.edu.es)</p>
                <div class="col s6 offset-s3">
                    <h5 class="center"><b>Índice de tablas:</b></h5>
                    <ul class="collection with-header">
                        <a href="../../index.php" class="center collection-item black-text">Clientes</a>
                        <a href="../../products/products.php" class="center collection-item black-text ">Productos</a>
                        <a href="../purchases.php" class="center collection-item black-text">Compras</a>
                    </ul>
                </div>         
            </div>
            <form action="./processPurchase.php" method="post" name="purchaseForm">
                <h5 class="center"><b>Realizar una compra</b></h5>
                <div class="row">
                    <label class="black-text">Seleccione el id de un cliente de la tienda:</label>
                    <select class="browser-default" name="client" required>
                        <option value="" disabled selected>Seleccione un cliente</option>
                        <?php
                            //Etapa 2. Consulta a la base de datos
                            $query = "SELECT * FROM CLIENTES";
                            mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

                            //Etapa3. Mostramos el id y el nombre de los clientes
                            $result = mysqli_query($db, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['eliminada'] != 1)
                                echo '<option value="' . $row['id'] . '"> id: ' . $row['id'] . ', Cliente: ' . $row['nombre'] . ' ' . $row['apellidos'] . '</option>';     
                            }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <label class="black-text"> Indique que productos desea comprar:</label>
                    <div class="col s12">
                        <?php
                            //Etapa 2. Consulta a la base de datos
                            $query = "SELECT * FROM PRODUCTOS";
                            mysqli_query($db, $query) or die('Error al buscar en la base de datos.');

                            //Etapa3. Mostramos el id y el nombre de los clientes
                            $result = mysqli_query($db, $query);

                            echo '<div class="row">';
                            while ($row = mysqli_fetch_array($result)) {
                                if (($row['eliminada'] != 1) && ($row['stock'] > 0)) {
                                    echo '<div class="card white col s5 offset-s1 pull-s1"><div><p>';
                                        echo '<label class="black-text"><input type="checkbox" name="products[]" value="' . $row['id'] . '"><span>' . $row['nombre']  . '</span></label>';
                                    echo '</p></div>';

                                    echo '<div class><p><b>Características del producto: </b></p></div>';

                                    echo '<div class><ul>
                                            <li><b>id:</b> ' . $row['id'] . '</li>
                                            <li><b>Precio:</b> ' . $row['PVP'] . '€</li>
                                            <li><b>Stock:</b> ' . $row['stock'] . '</li>
                                            <li><b>Descripción:</b> ' . $row['descripcion'] . '</li>
                                        </ul></div>';
                                        
                                    echo '<div class="center"><img src="data:image; base64, ' . base64_encode($row['imagen']) . '" height="100px" ></div>';
                                    echo '<div class="center"><b>Unidades:</b><div class="input-field inline"><input id="units" type="number" name="units[]"></div></div></div>';  
                                }   
                            }
                            echo '</div';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="center input-field col s12">
                        <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="action">Realizar compra</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            //Etapa 3. Cierre conexión
            mysqli_close($db);
        ?>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>