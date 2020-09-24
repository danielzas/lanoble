<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Panadería La Noble Igualdad.agregar mas descripcion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="theme-color" content="#fafafa">
</head>

<body>


    <!--   <div class="header-main-background"> -->
    <header class="header">
        <div class="header-title">
            <h1>La Noble Igualdad</h1>

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
                <li><a href="registro.php">Registrarte</a></li>
            </ul>
        </div>
    </header>
    <div class="grid-conteiner">
        <main class="main__sesion">
            <div class="main__sesion-simulador">
                <div class="main__sesion-simulador-item">
                    <i class="fas fa-dollar-sign"></i>
                    <input id="monto" type="text" placeholder="monto de la compra">
                </div>
                <div class="main__sesion-simulador-item">
                    <i class="fas fa-trophy"></i>
                    <input id="puntos" type="text" placeholder="puntos a canjear">
                </div>
                <div class="main__sesion-simulador-item">
                    <i class="fas fa-calculator"></i>
                    <input id="total" disabled type="text" placeholder="total a pagar con descuento">
                </div>
                <p class="main__sesion-simulador-mensaje">Recuerda que canjeando puntos seguis sumando puntos!!!</p>
            </div>
            <div class="main__sesion-panel ">

                <div class="main__sesion-panel-option ">
                    <div class="main__sesion-panel-option ">
                        <a href="# "><i class="fas fa-money-check-alt "></i></a>
                        <a class="main__sesion-panel-user " href="login.php ">Puntos</a>
                    </div>

                    <div class="main__sesion-panel-option ">
                        <a href="datos.php "><i class="fas fa-id-card "></i></a>
                        <a class="main__sesion-panel-user " href="datos.php ">Tus datos</a>
                    </div>

                    <div class="main__sesion-panel-option ">
                        <a href="simulador.php "> <i class="fas fa-calculator "></i></a>
                        <a class="main__sesion-panel-user " href="#">Simulador</a>
                    </div>

                    <div class="main__sesion-panel-option ">
                        <i class="fas fa-door-closed "></i>
                        <a class="main__sesion-panel-user " href="php.includes/logout.php ">Salir</a>
                    </div>

                </div>

            </div>


        </main>
        <!--  </div> -->

        <footer class=" footer ">
            <div class="footer-logo">
                <img src="img/logo-lanoble.png">
            </div>
            <div>
                <ul class="footer-secciones ">

                    <li><a href="# ">Home</a></li>
                    <li><a href="# ">Nosotros</a></li>
                    <li><a href="# ">Locales</a></li>
                    <li><a href="# ">Contacto</a></li>


                </ul>
                <p class="footer-seccion-cpr " style="color: wheat; ">Copyright 2020 La Noble Igualdad. Todos los derechos reservados. Diseño Daniel Agüero</p>
            </div>
        </footer>

    </div>
    <script>
        let monto = document.getElementById('monto');
        let puntos = document.getElementById('puntos');
        let total = document.getElementById('total');

        monto.addEventListener('keyup', (e) => {
            if (puntos.value <= 50 && puntos.value >= 0) {
                total.value = parseFloat(e.target.value - (e.target.value * (puntos.value * 0.01)));
                puntos.style.border = "none";
            } else {
                alert("Tope máximo 50 puntos para canjear.");
                puntos.style.border = "1px solid red";
            }
        });
        puntos.addEventListener('keyup', (e) => {
            if (puntos.value <= 50 && puntos.value >= 0) {
                total.value = parseFloat(monto.value - (monto.value * (e.target.value * 0.01)));
                e.target.style.border = "none";
            } else {
                alert("Tope máximo 50 puntos para canjear.");
                e.target.style.border = "1px solid red";
            }
        });
    </script>

</body>

</html>