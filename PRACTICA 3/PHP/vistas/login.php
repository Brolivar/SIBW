
<?php
    // PARTE DE INICIO DE SESION Y REGISTRO
    // En caso de que se acceda a la web por primera vez o se haga click en la opción Inicio
    // del menú se cargará la portada
    if(isset($_SESSION['usuario'])){
        echo "<p><strong>Panel de control:</strong></p>";
        echo "<p>Identificado como: <strong>".$_SESSION['usuario']."</strong></p>";
        echo "<p>Correo electrónico: <strong> ".$_SESSION['correo']."</strong></p>";
       
?>
            <form action="index.php" >
                <input type="submit" ID ="register" value="Volver al Inicio" />
            </form>
            <br/>
            <form action="vistas/logout.php" method="POST">
                <input type="submit" ID ="register" value="Cerrar sesión" />
            </form>

<?php       

            } else{
             echo "<p><strong>Usted no se ha identificado. Por favor regístrese:</strong></p>";
           ?> 

                    <!-- Si el usuario accede a la pag sin estar identificado se muestra un formulario-->
                    <form id ="userform" action ="?registro" method="POST">
                            <p>Nombre de usuario: <input  ID ="register" type="text" placeholder="Escriba su nombre" name="usuario"  required /></p>
                            <p>Correo electrónico: <input ID ="correo" type="text"  placeholder="Escriba su correo" name="correo" required /></p>
               
                            <input type = "submit" ID ="register" onclick="return validarRegistro()" value="Pulse aqui para registrarse" />

                    </form>
                <?php

            }
                  

        // PARTE DE INICIO DE SESION Y REGISTRO
?>
<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>