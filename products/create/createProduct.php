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
                <form action="./processProduct.php" method="post" enctype= "multipart/form-data" name="productForm" class="col s12">
                    <h5 class="center"><b>Crear nuevo producto</b></h5>
                    <div class="row">
                        <div class="col s2">
                            <label class="black-text" for="id">id</label>
                            <input id="id" name="id" type="text" class="validate" required>
                        </div>
                        <div class="col s5">
                            <label class="black-text" for="name">Nombre</label>
                            <input id="name" name="name" type="text" class="validate" required>
                        </div>
                        <div class="col s5">
                            <label class="black-text" for="family">Familia</label>
                            <input id="family" name="family" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col s6">
                            <label class="black-text" for="stock">Stock</label>
                            <input id="stock" name="stock" type="number" class="validate" required>
                        </div>
                        <div class="col s6">
                            <label class="black-text" for="pvp">Precio de venta al público (PVP)</label>
                            <input id="pvp" name="pvp" type="number" class="validate" step="any" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label class="black-text" for="description">Descripción</label>
                            <input id="description" name="description" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label class="black-text" for="dimensions">Dimensiones del producto</label>
                            <input id="dimensions" name="dimensions" type="text" class="validate" required>
                        </div>
                        <div class="col s6">
                            <label class="black-text" for="weight">Peso</label>
                            <input id="weight" name="weight" type="number" class="validate" step="any" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label class="black-text" for="img" required>Seleccione una imagen para el producto:</label><br><br>
                            <input type="file" class="input-file" name="img" id="img">
                        </div>
                    </div>
                    <div class="center col s12">
                        <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="action">Crear</button>
                    </div>
                </form>
              </div>
        </div>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>