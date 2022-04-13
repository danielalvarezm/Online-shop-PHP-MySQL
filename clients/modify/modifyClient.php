<?php
    //Etapa1. Crear la variable $db y asignar a la cadena de conexión
    require '../../connection.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM CLIENTES WHERE id = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
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
                        <a href="../../purchases/purchases.php" class="center collection-item black-text">Compras</a>
                    </ul>
                </div>         
            </div>
            <div class="row">
                <form action="./processModify.php" method="post" name="clientForm" class="col s12">
                    <h5 class="center"><b>Modificar cliente</b></h5>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="id" name="id" type="text" value="<?php echo $row['id']?>" readonly>
                            <label class="black-text" for="id">id</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="name" name="name" type="text" value="<?php echo $row['nombre']?>" class="validate" required>
                            <label class="black-text" for="name">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="dni" name="dni" type="text" value="<?php echo $row['dni']?>" class="validate" required>
                          <label class="black-text" for="dni">DNI</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="surnames" name="surnames" type="text" value="<?php echo $row['apellidos']?>" class="validate" required>
                            <label class="black-text" for="surnames">Apellidos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="email" name="email" type="email" value="<?php echo $row['email']?>" class="validate" required>
                            <label class="black-text" for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone_number" name="phone_number" type="text" value="<?php echo $row['telefono']?>" class="validate" required>
                            <label class="black-text" for="phone_number">Número de teléfono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="address" name="address" type="text" value="<?php echo $row['direccion']?>" class="validate" required>
                            <label class="black-text" for="address">Dirección</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="postal_code" name="postal_code" type="text" value="<?php echo $row['codigo_postal']?>" class="validate" required>
                            <label class="black-text" for="postal_code">Código postal</label>
                        </div>
                    </div>
                    <div class="center col s12">
                        <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="action">Actualizar</button>
                    </div>
                </form>
              </div>
        </div>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>


