
<?php
    // INICIO DE SESION Y REGISTRO
    // Panel de control donde se mostrará el nickname y el correo del usuario identificado
    if (isset($_SESSION['correo'])) {

        echo "<p>Usuario actual identificado como: <strong>".$_SESSION['nickname']."</strong></p>";
        echo "<p>Correo electrónico: <strong> ".$_SESSION['correo']."</strong></p>";
       
?>
        <!-- Botón para ir a la portada -->
        <form action="index.php" >
            <input type="submit" ID ="botonInicio" value="Volver al Inicio" />
        </form>

        <!-- Botón para cerrar la sesión del usuario identificado actual -->
        <form action="vistas/logout.php" method="POST">
            <input type="submit" ID ="botonCerrarSesion" value="Cerrar sesión" />
        </form>

    <?php       
    } 

    // Si no hay ningún usuario registrado actualmente se mostrarán los formularios de inicio de sesión o registro
    else {
     echo "<p><strong>Usted no se ha identificado. Por favor inicie sesión o regístrese:</strong></p>";
   ?> 

            <!-- Formulario para iniciar sesión si el usuario ya está registrado en la base de datos-->
            <form id ="inicioSesion" action ="?login" method="POST">
                <p><strong>Introduzca su correo y su clave para iniciar sesión.</strong></p>

                <p>Correo electrónico: <input ID ="correo" type="text"  placeholder="Escriba su correo" name="correo" required /></p>
                <p>Contraseña: <input  ID ="clave" type="text" placeholder="Escriba su contraseña" name="clave"  required /></p>
   
                <input type = "submit" ID ="iniciarSesion" onclick="return validarEstructuraEmail(correo.value)" value="Iniciar sesión" />

            </form>

            <!-- Formulario para registrarse en caso de que no se tengan los datos almacenados en la bd-->
            <form id ="registro" action ="?login" method="POST">
                <p><strong>Complete los siguientes campos para darse de alta como usuario.</strong></p>

                <p>Nickname o nombre de usuario: <input ID ="nickname" type="text"  placeholder="Escriba su nickname" name="nickname" required /></p>
                <p>Contraseña: <input  ID ="contrasenia" type="text" placeholder="Escriba su contraseña" name="contrasenia"  required /></p>
                <p>Correo electrónico: <input  ID ="email" type="text" placeholder="Escriba su e-mail" name="email"  required /></p>
                <p>Nombre: <input  ID ="nombre" type="text" placeholder="Escriba su nombre" name="nombre"  required /></p>
                <p>Apellidos: <input  ID ="apellidos" type="text" placeholder="Escriba sus apellidos" name="apellidos"  required /></p>
   
                <input type = "submit" ID ="registrarse" onclick="return validarEstructuraEmail(email.value)" value="Registrarse" />

            </form>
        <?php

    }
          
?>
<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>