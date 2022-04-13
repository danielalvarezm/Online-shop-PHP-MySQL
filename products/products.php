<?php
    //Etapa1. Crear la variable $db y asignar a la cadena de conexión
    require '../connection.php';
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
                        <a href="#" class="center collection-item  active blue darken-3">Productos</a>
                        <a href="../purchases/purchases.php" class="center collection-item black-text">Compras</a>
                    </ul>
                </div>
                <div class="col s6">
                    <h5 class="center"><b>Información:</b></h5>
                    <p>Esta tabla muestra los datos almacenados de todos los productos de la tienda </p>
                    <p>Si desea insertar un nuevo producto, haga clic en el siguiente botón:</p>
                    <a href="./create/createProduct.php" class="center waves-effect waves-light btn blue darken-3">Insertar productos</a>
                </div>          
            </div>
            <hr>
            <form action="products.php" method="post"> 
                <div class="row">
                    <div class="col s7"> 
                            <p>Realice búsquedas de clientes por cualquier campo:</p>
                            <div class="input-field col s6">
                                <label class="black-text" for="id">id</label>
                                <input id="id" name="id" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="name">Nombre</label>
                                <input id="name" name="name" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="family">Familia</label>
                                <input id="family" name="family" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="description">Descripción</label>
                                <input id="description" name="description" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="stock">Stock</label>
                                <input id="stock" name="stock" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="dimensions">Dimensiones</label>
                                <input id="dimensions" name="dimensions" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="weight">Peso</label>
                                <input id="weight" name="weight" type="text">
                            </div>
                            <div class="input-field col s6">
                                <label class="black-text" for="price">PVP</label>
                                <input id="price" name="price" type="text">
                            </div>
                        </div>   
                    <div class="col s5">
                        <p>Puede indicar por qué campo desea ordenar la tabla, y si dicha ordenación debe ser ascendente o descendente:</p>
                        <div class="col s12">
                            <label>Ordenar por (id por defecto):</label>
                            <select class="browser-default" name="order">
                                <option value="id">id</option>
                                <option value="nombre">Nombre</option>
                                <option value="familia">Familia</option>
                                <option value="descripcion">Descripción</option>
                                <option value="stock">Stock</option>
                                <option value="peso">Peso</option>
                                <option value="PVP">PVP</option>
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
                        <a href="products.php" class="undo_button btn waves-effect waves-light blue darken-3">Deshacer búsqueda
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
                    <th>Nombre</th>
                    <th>Familia</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Dimensiones</th>
                    <th>Peso (Kg)</th>
                    <th>PVP (€)</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </tr>
                </thead>                   
                <tbody>
                    <?php
                    
                        include './search/searchProduct.php';

                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['eliminada'] != 1) {
                                echo '<tr><td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['nombre'] . '</td>';
                                echo '<td>' . $row['familia'] . '</td>';
                                echo '<td>' . $row['descripcion'] . '</td>';
                                echo '<td>' . $row['stock'] . '</td>';
                                echo '<td>' . $row['dimensiones'] . '</td>';
                                echo '<td>' . $row['peso'] . '</td>';
                                echo '<td>' . $row['PVP'] . '</td>';
                                echo '<td><img src="data:image; base64, ' . base64_encode($row['imagen']) . '" height="100px"></td>';
                                echo '<td><a role="button" class="btn-floating btn-small waves-effect waves-light blue darken-3" href="./modify/modifyProduct.php?id=' . $row['id'] . '" target="_self"> 
                                    <i class="material-icons small">edit</i></a></td>';
                                echo '<td><a role="button" class="btn-floating btn-small waves-effect waves-light red darken-3" href="./delete/deleteProduct.php?id=' . $row['id'] . '" target="_self"> 
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