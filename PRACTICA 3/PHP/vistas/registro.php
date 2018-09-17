
<!-- Contenido de la vista de la página del registro-->
<html>
    <?php include("cabeceraObra.php"); ?>

    <body>
        <!-- Encapsulamos la página completa para que al cambiar el tamaño de ventana o al aplicar zoom se aplique a toda la página
            en vez de a cada elemento por separado.-->
        <div id="pagina">
            <?php
                include("header.php");
                include("sidebar.php");

            // Si se ha enviado el nombre del usuario correctamente se le muestra el mensaje de que está ya registrado
			if (isset($_POST['usuario'])){

                // A continuación verificamos estos campos para evitar la inserción de código malicioso
                $usuario = trim($_POST["usuario"]);
                $usuario = stripslashes($usuario);
                $usuario = htmlspecialchars($usuario);

                $correo = trim($_POST["correo"]);
                $correo = stripslashes($correo);
                $correo = htmlspecialchars($correo);

                // Tras verificar el contenido que hemos recibido lo almacenamos en una sesión
				$_SESSION['usuario'] = $usuario;
                $_SESSION['correo'] = $correo;
                echo "<p>Registrado como:<strong> ".$_SESSION['usuario']."</strong></p>";
                echo "<p>Correo electrónico:<strong> ".$_SESSION['correo']."</strong></p>";
            ?>
           	<form action="index.php" >
                <input type="submit" ID ="register" value="Volver al Inicio" />
            </form>
            <br/>
            <?php

			}
                include("footer.php");
            ?>


        </div>
    </body>
</html>




