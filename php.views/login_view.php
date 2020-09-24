<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Panadería La Noble Igualdad.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>


    <!--   <div class="header-main-background"> -->
    <header class="header">
        <div class="header-title">
            <h1>La Noble Igualdad</h1>
            <img src="img/logo-lanoble.png">
        </div>
        <nav class="header-nav">
            <ul class="header-nav__list">
                <li><a href="index.html">Home</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="locales.html">Locales</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li class="header-nav-mobile"><i class="fas fa-bars"></i></i>
                    <ul class="header-nav-mobile__list">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="nosotros.html">Nosotros</a></li>
                        <li><a href="locales.html">Locales</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="header-login">
            <ul class="header-login__list">
                <li><a href="login.php"><i class="fas fa-user"></i>Iniciar Sesión</a></li>
                <li><a href="registro.php">Registrarme</a></li>
            </ul>
        </div>
    </header>
    <div class="grid-conteiner">
        <main class="main">
            <form class="main-form" name="form" action="#" method="POST">
                <?php
                if(isset($_GET['msj']))
                {
                    echo '<p class="main-form-msj">Registrado Exitosamente. Por favor inicie sesión.';
                }
                ?>
                    <div class="main-form-input">
                        <i id="user" class="fas fa-user"></i>
                        <input type="text" name="dni" placeholder="ingrese su dni" size="10">
                    </div>
                    <div class="main-form-input">
                        <i id="key" class="fas fa-key"></i>
                        <input type="password" name="password" placeholder="ingrese su contraseña" size="10">
                    </div>
                    <button class="submit-login" type="submit" name="submit" id="submit-login">Ingresar</button>
                    <?php if($error==1): ?>
                    <p class="main-form-input-error main-form-input-error-activo">DNI y/o Constraseña incorrecto.</p>
                    <?php endif; ?>
            </form>

        </main>
        <!--  </div> -->

        <footer class="footer">
            <div class="footer-logo">
                <img src="img/logo-lanoble.png">
            </div>
            <div>
                <ul class="footer-secciones">

                    <li><a href="#">Home</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Locales</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
                <p class="footer-seccion-cpr" style="color: wheat;">Copyright 2020 La Noble Igualdad. Todos los derechos reservados. Diseño Daniel Agüero</p>
            </div>
        </footer>

    </div>
    <script>
        const user = document.getElementById('user');
        const key = document.getElementById('key');
        document.querySelector('.main-form-input input').addEventListener('click', (e) => {
            user.style.color = "#fcbf49";
            key.style.color = "black";
        });

        document.querySelector('.main-form-input input[type="password"]').addEventListener('click', (e) => {
            key.style.color = "#fcbf49"
            user.style.color = "black";
        });
    </script>


</body>

</html>