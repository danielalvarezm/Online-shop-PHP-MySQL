<?php
    //Etapa1. Crear conexión
    require '../connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestionar compras</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../custom.css">
    </head>
    <body>
        <div class="container">
            <h3 class="center"><b>Desarrollo de Aplicaciones</b></h3><hr><br>
            <div class="row">
                <p><b>Autor:</b> Daniel Álvarez Medina (<a href="mailto:alu0101216126@ull.edu.es">alu0101216126@ull.edu.es</a>)</p>
                <div class="col s6">
                    <h5 class="center"><b>Índice de tablas:</b></h5>
                    <ul class="collection with-header">
                        <a href="../index.php" class="center collection-item black-text">Clientes</a>
                        <a href="../products/products.php" class="center collection-item black-text">Productos</a>
                        <a href="#!" class="center collection-item active blue darken-3">Compras</a>
                    </ul>
                </div>
                <div class="col s6">
                    <h5 class="center"><b>Información:</b></h5>
                    <p>Esta tabla muestra los datos almacenados de todas las compras de la tienda </p>
                    <p>Si desea realizar una nueva compra, haga clic en el siguiente botón:</p>
                    <a href="./create/createPurchase.php" class="center waves-effect waves-light btn blue darken-3">Realizar compra</a>
                </div>          
            </div>
            <hr>
            <form class="row" action="purchases.php" method="post"> 
                <div class="row">
                    <div class="col s7"> 
                            <p>Realice búsquedas de compras por uno o más atributos:</p>
                            <div class="input-field col s5">
                                <label class="black-text" for="id">id</label>
                                <input id="id" name="id" type="text">
                            </div>
                            <div class="input-field col s7">
                                <label class="black-text" for="client_id">Identificador cliente</label>
                                <input id="client_id" name="client_id" type="text">
                            </div>
                            <div class="input-field col s5">
                                <label class="black-text" for="product_id">Identificador producto</label>
                                <input id="product_id" name="product_id" type="text">
                            </div>
                            <div class="input-field col s7">
                                <label class="black-text" for="date_time">Fecha y hora (YYYY-MM-DD HH:MM:SS)</label>
                                <input id="date_time" name="date_time" type="text">
                            </div>
                        </div>     
                    <div class="col s5">
                    <p>Puede indicar por qué campo desea ordenar la tabla, y si dicha ordenación debe ser ascendente o descendente:</p>
                        <div class="col s12">
                            <label>Ordenar por (id por defecto):</label>
                            <select class="browser-default" name="order">
                                <option selected="true" value="id">id</option>
                                <option value="id_cliente">id cliente</option>
                                <option value="id_producto">id producto</option>
                                <option value="fecha_hora">Fecha y hora</option>
                                <option value="importe_final">Importe final</option>
                            </select>
                        </div>
                        <div class="col s12">
                            <label>Ordenación (Ascendente por defecto):</label>
                            <select class="browser-default" name="orderType">
                                <option selected="true" value="ASC">Ascendente</option>
                                <option value="DESC">Descendente</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s2">
                        <button class="search_button btn waves-effect waves-light blue darken-3" type="submit">Buscar
                            <i class="material-icons right">search</i>
                        </button>
                    </div>
                    <div class="col s4">
                        <a href="purchases.php" class="undo_button btn waves-effect waves-light blue darken-3">Deshacer búsqueda
                            <i class="material-icons right">undo</i>
                        </a>
                    </div>
                </div>   
            </form>
            <hr>
            <h5><b>Tabla Productos:</b></h5>
            
            <table class="highlight centered responsive-table">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>id cliente</th>
                    <th>id producto</th>
                    <th>Unidades</th>
                    <th>Fecha y hora</th>
                    <th>Importe total</th>
                    <th>Eliminar</th>
                    </tr>
                </thead>                   
                <tbody>
                    <?php
                        include './search/searchPurchase.php';

                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['eliminada'] != 1) {
                                echo '<tr><td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['id_cliente'] . '</td>';
                                echo '<td>' . $row['id_producto'] . '</td>';
                                echo '<td>' . $row['unidades'] . '</td>';
                                echo '<td>' . $row['fecha_hora'] . '</td>';
                                echo '<td>' . $row['importe_final'] . '</td>';
                                echo '<td><a role="button" class="btn-floating btn-small waves-effect waves-light red darken-3" href="./delete/deletePurchase.php?id=' . $row['id'] . '" target="_self"> 
                                    <i class="material-icons small">delete</i></a></td></tr>';
                            }
                        }
                    ?>                      
                </tbody>
            </table>
        </div>
        <?php
            //Etapa 4. Cierre conexión
            mysqli_close($db);
        ?>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>