<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\all.css">
    <link rel="stylesheet" href="css\normalize.css">
    <!--  <link rel="stylesheet" href="..\css\main.css"> -->
    <link rel="stylesheet" href="css\styles-panel.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Yanone+Kaffeesatz:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <form class="login__admin" method="POST" action="#">
        <div class="login__admin-contenedor">
            <div class="login__admin-input">
                <i class="fas fa-user-circle"></i>
                <input type="text" name="user" placeholder="usuario">
            </div>
            <div class="login__admin-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="contraseña" value="">
            </div>
        </div>
        <button type="submit" value="submit">Entrar</button>
        <?php if($error==1):?>
        <label class="login__admin-error login__admin-error-active">Usuario/Contraseña inválidos.</label>
        <?php endif; ?>
    </form>


</body>

</html>