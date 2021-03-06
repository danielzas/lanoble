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
            <div class="main__sesion-panel ">

                <div class="main__sesion-panel-option ">
                    <a href="# "><i class="fas fa-money-check-alt "></i></a>
                    <a class="main__sesion-panel-user " href="login.php ">Puntos</a>
                </div>

                <div class="main__sesion-panel-option ">
                    <a href="datos.php "><i class="fas fa-id-card "></i></a>
                    <a class="main__sesion-panel-user " href="#">Tus datos</a>
                </div>
                <div class="main__sesion-panel-option ">
                    <a href="simulador.php "> <i class="fas fa-calculator "></i></a>
                    <a class="main__sesion-panel-user " href="simulador.php ">Simulador</a>
                </div>

                <div class="main__sesion-panel-option ">
                    <i class="fas fa-door-closed "></i>
                    <a class="main__sesion-panel-user " href="php.includes/logout.php ">Salir</a>
                </div>
            </div>
            <form class="main__sesion-info-datos" name="formulario" id="formulario" action="datos.php" method="POST">
                <!-- GRUPO:DNI -->
                <!--  <div class="formulario__grupo" id="grupo_dni">
                    <label for="dni" class="formulario__label">DNI</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="text" class="formulario__input" id="dni" name="dni" value="<?php echo $user->getUser()?>">
                        <i class="formulario__validacion-estado far fa-id-card"></i>
                    </div>
                    <p class="formulario__error">El DNI tiene que contener solo números, minimo 5 digitos y sin puntos.</p>
                </div> -->
                <!-- GRUPO:NOMBRE -->
                <div class="formulario__grupo" id="grupo_nombre">
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="text" class="formulario__input" id="nombre" name="nombre" value="<?php echo $user->getName()?>">
                        <i class="formulario__validacion-estado fas fa-signature"></i>
                    </div>
                    <p class="formulario__error">El nombre solo puede contener letras.</p>
                </div>
                <!-- GRUPO:APELLIDO -->
                <div class="formulario__grupo" id="grupo_apellido">
                    <label for="apellido" class="formulario__label">Apellido</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="text" class="formulario__input" id="apellido" name="apellido" value="<?php echo $user->getApe()?>">
                        <i class="formulario__validacion-estado fas fa-signature"></i>
                    </div>
                    <p class="formulario__error">El apellido solo puede contener letras.</p>
                </div>
                <!-- GRUPO:PASSWORD -->
                <div class="formulario__grupo" id="grupo_password">
                    <label for="password" class="formulario__label">Contraseña Nueva</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="password" class="formulario__input" id="password" name="password">
                        <i class="formulario__validacion-estado fas fa-key"></i>
                    </div>
                    <p class="formulario__error">La contraseña debe tener una longitud minima de 6 caracteres.</p>
                </div>
                <!-- GRUPO:PASSWORD2 -->
                <div class="formulario__grupo" id="grupo_password2">
                    <label for="password2" class="formulario__label">Repetir Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="password" class="formulario__input" id="password2" name="password2">
                        <i class="formulario__validacion-estado fas fa-key"></i>
                    </div>
                    <p class="formulario__error">Las contraseñas tienen que ser iguales.</p>
                </div>
                <!-- GRUPO:CELULAR -->
                <div class="formulario__grupo" id="grupo_celular">
                    <label for="celular" class="formulario__label">Celular</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="text" class="formulario__input" id="celular" name="celular" value="<?php echo $user->getTel()?>">
                        <i class="formulario__validacion-estado fab fa-whatsapp"></i>
                    </div>
                    <p class="formulario__error">El telefono tiene que contener solo números, sin 0 y sin 15.</p>
                </div>
                <!-- GRUPO:E-MAIL -->
                <div class="formulario__grupo" id="grupo_email">
                    <label for="email" class="formulario__label">Email</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="email" class="formulario__input" id="email" name="email" value="<?php echo $user->getMail()?>">
                        <i class="formulario__validacion-estado far fa-envelope"></i>
                    </div>
                    <p class="formulario__error">Debe ingresar un mail válido.</p>
                </div>
                <!-- GRUPO:SEXO -->
                <div class="formulario__grupo" id="grupo_sexo">

                    <label for="sexo" class="formulario__label">Sexo</label>
                    <div class="formulario__grupo-input-sexo">
                        <?php if($user->getSexo() == 'm'): ?>
                        <div class="formulario__grupo-input-sexo-femenino">
                            <input disabled type="radio" class="formulario__input-sexo" id="sexo" name="sexo" value="mujer" checked>
                            <i class="formulario__validacion-estado-sexo fas fa-female"></i>
                        </div>
                        <div class="formulario__grupo-input-sexo-masculino">
                            <input disabled type="radio" class="formulario__input-sexo" id="sexo" name="sexo" value="hombre">
                            <i class="formulario__validacion-estado-sexo fas fa-male"></i>
                        </div>
                        <?php endif; ?>
                        <?php if($user->getSexo() == 'h'): ?>
                        <div class="formulario__grupo-input-sexo-femenino">
                            <input disabled type="radio" class="formulario__input-sexo" id="sexo" name="sexo" value="mujer">
                            <i class="formulario__validacion-estado-sexo fas fa-female"></i>
                        </div>
                        <div class="formulario__grupo-input-sexo-masculino">
                            <input disabled type="radio" class="formulario__input-sexo" id="sexo" name="sexo" value="hombre" checked>
                            <i class="formulario__validacion-estado-sexo fas fa-male"></i>
                        </div>
                        <?php endif; ?>


                    </div>
                    <p class="formulario__error">Elija su sexo.</p>
                </div>
                <!-- GRUPO:FECHA -->
                <div class="formulario__grupo" id="grupo_nacimiento">
                    <label for="nacimiento" class="formulario__label">Nacimiento</label>
                    <div class="formulario__grupo-input">
                        <input disabled type="date" class="formulario__input" id="nacimiento" name="nacimiento" value="<?php echo $user->getDate(); ?>">
                        <i class="formulario__validacion-estado fas fa-birthday-cake"></i>
                    </div>
                    <p class="formulario__error">Elija su fecha de nacimiento. </p>
                </div>
                <!-- BOTON CAMBIAR INFO-->
                <div class="formulario__botones" id="formulario__botones">
                    <button type="button" id="button__edit">Editar</button>
                    <button type="submit" name="submit">Guardar</button>
                </div>
                <!-- MENSAJE ERROR -->
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Cambios guardados correctamente.</p>
                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i><b>Error:</b>Por favor rellene el formulario correctamente.</p>
                </div>



                <!-- BOTON ENVIAR -->
                <!--  <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="formulario__btn">Enviar</button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Registrado exitosamente!<a href="inicio.html" class="formulario__mensaje-exito">Inicie Sesión</a></p>
                </div> -->
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

    <script type="text/javascript">
    </script>
    <script type="text/javascript" src="js/functions_datos.js"></script>
</body>

</html>