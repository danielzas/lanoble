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
            <li><a class="main__sesion-invitacion-salir " href="php.includes/logout.php ">Salir</a></li>
         </ul>
    </main>
    <div class="abmArticulos ">
        <div class="amb__searchArticulos ">
            <div class="search__productos">
                <label for="buscar">Buscar:</label>
                <input class="search__productos-input" type="text" id="buscar" placeholder="Ingrese nombre">
                <button class="search__productos-button" type="submit" id="Buscar">Buscar</button>
            </div>
            <div class="list__resultados" id="resultado">
                <table id="table" class="list__resultados-table">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th>Medida</th>
                        <th>Precio</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
        <p id="mensajes"></p>

        <label>Agregar producto:</label>
        <form class="form__nuevoProducto" id="form__nuevoProducto" method="POST" action="php.includes/productos.php">

            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombreN" name="nombre">
            </div>
            <div>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcionN" name="descripcion">
            </div>
            <div>
                <label for="tipo">Tipo:</label>
                <select id="selectTipo" name="tipo">
                      <option disabled selected>seleccionar</option>
                </select>
            </div>
            <div>
                <label for="medida">Medida:</label>
                <select name="medida" id="medidaN">
            <option disabled selected>seleccionar</option>
            <option value="unidad">Unidad</option>
            <option value="cantidad">Cantidad</option>
            <option value="kilogramo">Kg</option>
        </select>
            </div>
            <div>
                <label for="precio">Precio:</label>
                <input type="text" id="precioN" name="precio">
            </div>
            <div>
                <input type="submit" name="submit" id="submit" value="Guardar">
                <p id="mensaje_form"></p>
            </div>
        </form>
    </div>
    <script src="js/functions_prod.js">
    </script>

</body>

</html>



<!-- <tr>
    <td id='codigo' name='codigo'></td>
    <td><input type='text' id='nombre' value=''></td>
    <td><input type='text' id='descripcion' value=''></td>
    <td><select onchange='cambiarTipo(event)' id='tipo'><option></option></select></td>
    <td><select id='medida'><option></option></select></td>
    <td><input type='text' id='precio' value=''></td>
    <td><i class='far fa-trash-alt' id='iconGarbage' onclick='eliminar(event)'></i></td>
    <td><i class='fas fa-edit' id='iconEdit' onclick='habilitar(event)'></i></td>
    <td><i class='far fa-check-square' id='iconEdit' onclick='guardar(event)'></i></td>
</tr> -->