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
                <form action="./processClient.php" method="post" name="clientForm" class="col s12">
                    <h5 class="center"><b>Crear nuevo cliente</b></h5>
                    <div class="row">
                        <div class="col s6">
                            <label class="black-text" for="name">Nombre</label>
                            <input id="name" name="name" type="text" class="validate" required>
                        </div>
                        <div class="col s6">
                          <label class="black-text" for="dni">DNI</label>
                            <input id="dni" name="dni" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label class="black-text" for="first_surname">Primer apellido</label>
                            <input id="first_surname" name="first_surname" type="text" class="validate" required>
                        </div>
                        <div class="col s6">
                            <label class="black-text" for="second_surname">Segundo apellido</label>
                            <input id="second_surname" name="second_surname" type="text" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label class="black-text" for="email">Email</label>
                            <input id="email" name="email" type="email" class="validate" required>
                        </div>
                        <div class="col s6">
                            <label class="black-text" for="phone_number">Número de teléfono</label>
                            <input id="phone_number" name="phone_number" type="number" class="validate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label class="black-text" for="address">Dirección</label>
                            <input id="address" name="address" type="text" class="validate" required>
                        </div>
                        <div class="col s6">
                            <label class="black-text" for="postal_code">Código postal</label>
                            <input id="postal_code" name="postal_code" type="number" class="validate" required>
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



