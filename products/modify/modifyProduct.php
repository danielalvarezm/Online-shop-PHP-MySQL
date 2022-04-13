<?php
    //Etapa1. Crear la variable $db y asignar a la cadena de conexión
    require '../../connection.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM PRODUCTOS WHERE id = $id";
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
                        <a href="../products.php" class="center collection-item black-text ">Productos</a>
                        <a href="../../purchases/purchases.php" class="center collection-item black-text">Compras</a>
                    </ul>
                </div>         
            </div>
            <div class="row">
                <form action="<?php echo './processModify.php?old_id=' . $row['id'] ?>" method="post" name="productForm" enctype= "multipart/form-data" class="col s12">
                    <h5 class="center"><b>Modificar productos</b></h5>
                    <div class="row">
                        <div class="input-field col s2">
                            <input id="id" name="id" type="text" class="validate" required value="<?php echo $row['id']?>">
                            <label class="black-text" for="id">id</label>
                        </div>
                        <div class="input-field col s5">
                            <input id="name" name="name" type="text" class="validate" required value="<?php echo $row['nombre']?>">
                            <label class="black-text" for="name">Nombre</label>
                        </div>
                        <div class="input-field col s5">
                            <input id="family" name="family" type="text" class="validate" required value="<?php echo $row['familia']?>">
                            <label class="black-text" for="family">Familia</label>
                        </div>
                    </div>
                    <div class="row">
                    <div class="input-field col s6">
                            <input id="stock" name="stock" type="number" class="validate" required value="<?php echo $row['stock']?>">
                            <label class="black-text" for="stock">Stock</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="pvp" name="pvp" type="number" class="validate" step="any" required value="<?php echo $row['PVP']?>">
                            <label class="black-text" for="pvp">Precio de venta al público (PVP)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="description" name="description" type="text" class="validate" required value="<?php echo $row['descripcion']?>">
                            <label class="black-text" for="description">Descripción</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="dimensions" name="dimensions" type="text" class="validate" required value="<?php echo $row['dimensiones']?>">
                            <label class="black-text" for="dimensions">Dimensiones del producto</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="weight" name="weight" type="number" class="validate" step="any" required value="<?php echo $row['peso']?>">
                            <label class="black-text" for="weight">Peso</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="black-text" for="img">Seleccione una imagen para el producto:</label><br><br>
                            <input type="file" class="input-file" name="img" id="img">
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
