<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\all.css">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\main.css">
    <link rel="stylesheet" href="css\styles-panel.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Yanone+Kaffeesatz:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Facturador</title>
</head>

<body>
    <main class="menu__panel">
        <ul class="menu__panel-opciones">
            <li><a href="facturador.php">Cobros y Consultas</li>
            <li><a href="productos.php">Articulos ABM</li>
            <li><a href="php.includes/logout.php ">Salir</a></li>
        </ul>
    </main>
    <div class="facturador contenedor">
        <div class="search__usuario">
            <label class="search__usuario-label" for="usuario">Cliente:</label>
            <input class="search__usuario-input" id="usuario" type="text" placeholder="Ingrese el dni">
            <div class="search__usuario-table">
                <table id="usuario_info">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Puntos</th>
                    </tr>

                </table>
            </div>
        </div>
        <div class="list__seleccionados-table">
            <table id="lista_seleccion">
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </table>
        </div>
        <div class="list__seleccionados-inputs">
            <div>
                <label class="list__seleccionados-labelInput" for="total">Total:</label>
                <input class="list__seleccionados-total" type="text" placeholder="Total" id="total">
            </div>
            <div>
                <label class="list__seleccionados-labelInput" for="puntos">Canjear:</label>
                <input type="text" class="list__seleccionados-msjCanje" placeholder="canjear puntos" id="canje" disabled>
                <!--  <button type="submit" id="canjear">Canjear</button> -->
                <p id="msj_canje" class="list__seleccionados-msjCanje-texto">No puede ser mayor a 50 y/o no tiene los puntos necesarios.</p>
            </div>
            <div>
                <label class="list__seleccionados-labelInput" for="totalPagar">Total Pagar:</label>
                <input type="text" id="totalPagar" disabled>
                <button type="submit" id="cobrar">Cobrar</button>
            </div>
            <div>
                <label class="list__seleccionados-labelInput" for="puntos">Puntos:</label>
                <input type="text" placeholder="Puntos Obtenidos" id="puntos" name="puntos" disabled>
                <!--  <button type="submit" id="canjear">Asignar</button> -->
            </div>
        </div>
    </div>
    </div>
    <div class="facturador-busquedaArticulos ">
        <div class="search__productos">
            <label for="buscar">Buscar:</label>
            <input class="search__productos-input" type="text" id="buscar" name="producto" placeholder="Ingrese nombre">
            <button class="search__productos-button" type="button" id="agregar">Agregar(enter)</button>
        </div>
        <div class="list__resultados" id="resultado">
            <table class="list__resultados-table">
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Medida</th>
                    <th>Precio</th>
                </tr>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="js/functions_fact.js">
    </script>
</body>

</html>