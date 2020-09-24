<?php

?>
    <!doctype html>
    <html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title>Panadería La Noble Igualdad.agregar mas descripcion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css\all.css">

        <link rel="stylesheet" href="css\normalize.css">
        <link rel="stylesheet" href="css\main.css">
        <link rel="stylesheet" href="css\styles.css">
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
                <div class="main__sesion-info">
                    <h2 class="main__sesion-info-nombre">Hola
                        <?php echo ($userSession->getCurrentName()).'!!!' ?>
                    </h2>
                    <p class="main__sesion-info-puntos">Tus puntos son<span> <?php echo ($cod_user->getPuntos()) ?></span></p>
                    <p class="main__sesion-info-puntos2">Acércate a nuestro local y podes canjear tus puntos por descuentos.</p>
                </div>
                <div class="main__sesion-invitacion">
                    <?php if(($cod_user->getCount()<3)): ?>
                    <h3 class="main__sesion-invitacion-titulo">Sumá 20 puntos de descuento!!!</h3>
                    <p class="main__sesion-invitacion-invitacion">Si invitás a 3 personas a que se registren en nuestra página podés ganar 20 puntos!!!</p>
                    <p class="main__sesion-invitacion-invitacion_num">Total de personas restante que podes invitar:<span> <?php echo (3-$cod_user->getCount())?> </span></p>
                    <a target=_blank class="main__sesion-invitacion-icono_whatsapp" href="https://api.whatsapp.com/send?text=Hola!%20ayudame%20a%20ganar%20puntos%20,%20registrate%20y%20tambien%20obtené%20descuentos!!!%20http://localhost/lanobleigualdad/index.html <?php echo 'UTILZA MI CODIGO '.$cod_user->getCodigo() ?> ">Envíales un <i class="fab fa-whatsapp"></i></a>
                    <a target=_blank class="main__sesion-invitacion-link" href="https://api.whatsapp.com/send?text=Hola!%20ayudame%20a%20ganar%20puntos%20,%20registrate%20y%20tambien%20obtené%20descuentos!!!%20http://localhost/lanobleigualdad/index.html <?php echo 'UTILZA MI CODIGO '.$cod_user->getCodigo() ?>" ">Enviar Invitación</a>
                <?php endif; ?>
                <a class="main__sesion-invitacion-salir " href="php.includes/logout.php ">Salir</a>
            </div>    
            <div class="main__sesion-panel ">
                
                    <div class="main__sesion-panel-option ">
                        <a href="# "><i class="fas fa-money-check-alt "></i></a>
                        <a class="main__sesion-panel-user " href="# ">Puntos</a>
                    </div>
                
                    <div class="main__sesion-panel-option ">
                        <a href="datos.php "><i class="fas fa-id-card "></i></a>
                        <a class="main__sesion-panel-user " href="datos.php ">Tus datos</a>
                        </div>
                    <div  class="main__sesion-panel-option ">
                       <a href="simulador.php "> <i class="fas fa-calculator "></i></a>
                        <a class="main__sesion-panel-user " href="simulador.php ">Simulador</a>
                    </div>

                    <div  class="main__sesion-panel-option ">
                        <i class="fas fa-door-closed "></i>
                        <a class="main__sesion-panel-user " href="php.includes/logout.php ">Salir</a>
                    </div>
            </div>
        </div>
    </main>
    <!--  </div> -->

    <footer class="footer ">
        <div class="footer-logo ">

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


</body>

</html>