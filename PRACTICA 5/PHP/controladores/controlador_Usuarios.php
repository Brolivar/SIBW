<?php

    // Llama al modelo para realizar las operaciones con la base de datos
    require_once("modelos/modelo_Usuarios.php");

    // Creamos un objeto del modelo para los comentarios
    $modeloUsuarios = new ModeloUsuarios();

    // Si los campos del formulario de iniciar sesión están completados quiere decir
    // que un usuario está intentando iniciar sesión
    // Para permitírselo comprobaremos si su correo y su clave existen
    if (isset($_POST['correo'])) {

    	$validarEmail = $modeloUsuarios->existeUsuario($_POST['correo']);

    	// Si el usuario está registrado comprobamos si su contraseña es válida 
    	if ($validarEmail) {

    		$validarClave = $modeloUsuarios->validarClave($_POST["correo"], $_POST['clave']);

    		if ($validarClave) {

    			// Si el inicio de sesión es correcto le damos la bievenida al usuario
    			$datosUsuario = $modeloUsuarios->getDatosUsuario($_POST["correo"]);

                // Guardamos el nickname, el correo y la clave en variables de sesión
                $_SESSION["nickname"] = $datosUsuario[0]["nickname"];
                $_SESSION['correo'] = $datosUsuario[0]["email"];
                $_SESSION['clave'] = $datosUsuario[0]["clave"];
                $_SESSION['rol'] = $datosUsuario[0]["rol"];
    		}
    		else
    			echo "<script>alert('Contraseña incorrecta');</script>";

            // Cerramos la conexión al realizar todas las consultas de los comentarios
            ConexionBD::cerrarConexion($modeloUsuarios->getConexionBD());
    	}

    	// Si el email no está en la bd es que el usuario no está registrado
    	// En este caso lanzamos una ventana emergente informándole sobre dicho incidente
    	else
    		echo "<script>alert('USUARIO NO REGISTRADO');</script>";
    }

    // Si son los campos del formulario registro los que están rellenos quiere decir que hay un
    // usuario anónimo intentando registrarse
    else if (isset($_POST['nickname'])) {

        // Comprobamos que realmente no está ya este usuario registrado a través de su correo
        $validarEmail = $modeloUsuarios->existeUsuario($_POST['email']);

        // Solo añadimos al usuario si su email no está en la bd
        if (!$validarEmail) {

            //Añadimos el usuario. NOTA: por defecto todos los usuarios al registrados tienen el rol de "registrado"
            $modeloUsuarios->aniadirUsuario($_POST['nickname'], $_POST['contrasenia'],
                $_POST['email'], $_POST['nombre'], $_POST['apellidos'], "registrado");

            // Actualizamos las variables de sesión
            $_SESSION["nickname"] = $_POST['nickname'];
            $_SESSION['correo'] = $_POST['email'];
            $_SESSION['clave'] = $_POST['contrasenia'];
            $_SESSION['rol'] = "registrado";
        }
        else 
            echo "<script>alert('Este e-mail ya está registrado en la base de datos.');</script>";

        // Cerramos la conexión al realizar todas las consultas de los comentarios
        ConexionBD::cerrarConexion($modeloUsuarios->getConexionBD());
    }

    // Si obtenemos los datos completados del formulario de edición de datos quiere decir que hay un
    // usuario identificado intentando modificar sus datos personales
    else if (isset($_POST["nicknameNuevo"])) {

        // Le pasamos a la función set el email con el que el usuario abrió la sesión para poder buscar sus
        // datos en la bd y reemplazarlos por los nuevos introducidos
        $modeloUsuarios->setDatosUsuario($_SESSION["correo"], $_POST['nicknameNuevo'], $_POST['claveNueva'], $_POST['emailNuevo'],
            $_POST['nombreNuevo'], $_POST['apellidosNuevos'], $_POST['rolUsuario']);

        // Actualizamos las variables de sesión con los nuevos datos
        $_SESSION["nickname"] = $_POST['nicknameNuevo'];
        $_SESSION['correo'] = $_POST['emailNuevo'];
        $_SESSION['clave'] = $_POST['claveNueva'];
        $_SESSION['rol'] = $_POST['rolUsuario'];

        // Cerramos la conexión al realizar todas las consultas de los comentarios
        ConexionBD::cerrarConexion($modeloUsuarios->getConexionBD());
    }

    // Caso en el que un superusuario haya modificado los roles
    else if (isset($_POST["nuevoRol"])) {

        // Actualizamos el rol para el usuario
        $estadoModificacion = $modeloUsuarios->setRolUsuario($_POST['emailUsuario'], $_POST['nuevoRol']);

        if ($estadoModificacion == false)
            echo "<script>alert('El sistema no puede quedarse sin ningún superusuario. Modificación no permitida.');</script>";
        else
            echo "<script>alert('El rol del usuario ha sido modificado correctamente.');</script>";
    }


    ///////////////////// REDIRECCIONES ////////////////////////////

    // Si se ha pulsado en la opción "Gestionar permisos" incluimos su correspondiente vista
    // en la que aparecerá la lista de usuarios existentes en la base de datos y un botón al lado
    // de cada uno de ellos para mostrar su correspondiente rol y poder modificarlo
    if(isset($_GET["plantillaGestionPermisos"])) {           
        
        if ($_GET["plantillaGestionPermisos"] == "") {
            require_once("vistas/plantillaGestionPermisos.php");
        }

        // En caso de que existan parámetros adicionales en la URL se mostrará la portada
        else
            require_once("vistas/plantillaPortada.php");
    }

    // Si se ha pulsado en la opción "Modificar mis datos" incluimos su correspondiente vista
    // en la que aparecerá un formulario con todos los datos guardados en la base de datos para 
    // el usuario identificado en el momento, con la posibilidad de cambiarlos
    else if(isset($_GET["plantillaEdicionDatos"])) {           
        
        if ($_GET["plantillaEdicionDatos"] == "") {
            require_once("vistas/plantillaEdicionDatos.php");
        }

        // En caso de que existan parámetros adicionales en la URL se mostrará la portada
        else
            require_once("vistas/plantillaPortada.php");
    }


    // Cerramos la conexión al realizar todas las consultas para todas las páginas de las obras
    //ConexionBD::cerrarConexion($modeloUsuarios->getConexionBD());
?>