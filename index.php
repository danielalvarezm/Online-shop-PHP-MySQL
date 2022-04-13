<?php
    //Etapa1. Crear la variable $db y asignar a la cadena de conexión
    require 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestionar clientes</title>

        <!-- Compiled and minified CSS -->   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="./custom.css">
        
    </head>
    <body>
        <div class="container">
            <h3 class="center"><b>Desarrollo de Aplicaciones</b></h3><hr><br>
            <div class="row">
                <p><b>Autor:</b> Daniel Álvarez Medina (<a href="mailto:alu0101216126@ull.edu.es">alu0101216126@ull.edu.es</a>)</p>
                <div class="col s6">
                    <h5 class="center"><b>Índice de tablas:</b></h5>
                    <ul class="collection with-header">
                        <a href="./index.php" class="center collection-item active blue darken-3">Clientes</a>
                        <a href="./products/products.php" class="center collection-item black-text ">Productos</a>
                        <a href="./purchases/purchases.php" class="center collection-item black-text">Compras</a>
                    </ul>
                </div>
                <div class="col s6">
                    <h5 class="center"><b>Información:</b></h5>
                    <p>Esta tabla muestra los datos almacenados de todos los clientes de la tienda </p>
                    <p>Si desea insertar un nuevo cliente, haga clic en el siguiente botón:</p>
                    <a href="./clients/create/createClient.php" class="center waves-effect waves-light btn blue darken-3">Insertar cliente</a>
                </div>          
            </div>
            <hr>
            <form class="row" action="index.php" method="post"> 
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
                            <label class="black-text" for="surname">Apellidos</label>
                            <input id="surname" name="surname" type="text">
                        </div>
                        <div class="input-field col s6">
                            <label class="black-text" for="email">Email</label>
                            <input id="email" name="email" type="text">
                        </div>
                        <div class="input-field col s6">
                            <label class="black-text" for="dni">DNI</label>
                            <input id="dni" name="dni" type="text">
                        </div>
                        <div class="input-field col s6">
                            <label class="black-text" for="phone">Teléfono</label>
                            <input id="phone" name="phone" type="text">
                        </div>
                        <div class="input-field col s6">
                            <label class="black-text" for="address">Dirección</label>
                            <input id="address" name="address" type="text">
                        </div>
                        <div class="input-field col s6">
                            <label class="black-text" for="postal_code">Código postal</label>
                            <input id="postal_code" name="postal_code" type="text">
                        </div>
                    </div>      
                    <div class="col s5">
                    <p>Puede indicar por qué campo desea ordenar la tabla, y si dicha ordenación debe ser ascendente o descendente:</p>
                        <div class="col s12">
                            <label>Ordenar por (id por defecto):</label>
                            <select class="browser-default" name="order">
                                <option sected="true" value="id">id</option>
                                <option value="nombre">Nombre</option>
                                <option value="apellidos">Apellidos</option>
                                <option value="email">Email</option>
                                <option value="dni">DNI</option>
                                <option value="telefono">Teléfono</option>
                                <option value="direccion">Dirección</option>
                                <option value="codigo_postal">Código postal</option>
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
                        <a href="index.php" class="undo_button btn waves-effect waves-light blue darken-3">Deshacer búsqueda
                            <i class="material-icons right">undo</i>
                        </a>
                    </div>
                </div>   
            </form>
            <hr>
            <h5><b>Tabla Clientes:</b></h5>
            
            <table class="highlight centered responsive-table">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Código postal</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </tr>
                </thead>                   
                <tbody>
                    <?php
                        include './clients/search/searchClient.php';
                
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['eliminada'] != 1) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['dni']."</td>";
                            echo "<td>".$row['nombre']."</td>";
                            echo "<td>".$row['apellidos']."</td>";
                            echo "<td>".$row['telefono']."</td>";
                            echo "<td>".$row['direccion']."</td>";
                            echo "<td>".$row['codigo_postal']."</td>";
                            echo "<td><a href='./clients/modify/modifyClient.php?id=".$row['id']."' class='btn-floating btn-small waves-effect waves-light blue darken-3'><i class='material-icons'>edit</i></a></td>";
                            echo "<td><a href='./clients/delete/deleteClient.php?id=".$row['id']."' class='btn-floating btn-small waves-effect waves-light red darken-3'><i class='material-icons'>delete</i></a></td>";
                            echo "</tr>";
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