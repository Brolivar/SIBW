<?php

	// Llama al modelo para realizar las operaciones con la base de datos
	require_once("modelos/modelo_InfoGeneral.php");
	// Creamos un objeto del modelo para las páginas de información general
	$modelo = new ModeloInfoGeneral();

	$nombresMenus = $modelo->getMenus();
	$urlMenus = $modelo->getURLMenus();
	
	// Redireccionamiento de las páginas de información general al pulsar las opciones del menú
	// correspondientes a las susodichas
	// Verificamos que en ninguna de las URL de las páginas se introduce ningún tipo de parámetro adicionales

    if(isset($_GET["horario"])) {			
		
    	if ($_GET["horario"] == "") {
			// Recabamos los datos de horario
			$datos_horario = $modelo->getHorario();
			// Actualizamos la vista de horario
			require_once("vistas/vista_horario.php");
		}

		// En caso de que existan parámetros adicionales en la URL se mostrará la portada
		else
			require_once("vistas/plantillaPortada.php");
 	}

 	else if(isset($_GET["entradas"])){

 		if ($_GET["entradas"] == "") {
	 		// Recabamos los datos de entradas
			$datos_entrada = $modelo->getEntradas();
			// Actualizamos la vista de entradas
			require_once("vistas/vista_entradas.php");
		}

		// En caso de que existan parámetros adicionales en la URL se mostrará la portada
		else
			require_once("vistas/plantillaPortada.php");
 	}

 	else if(isset($_GET["localizacion"])){

 		if ($_GET["localizacion"] == "") {
			// Recabamos los datos de localización
			$datos_localizacion = $modelo->getLocalizacion();
			// Actualizamos la vista de localización
			require_once("vistas/vista_localizacion.php");
		}

		// En caso de que existan parámetros adicionales en la URL se mostrará la portada
		else
			require_once("vistas/plantillaPortada.php");
 	}

 	else if(isset($_GET["contacto"])){

 		if ($_GET["contacto"] == "") {
			// Recabamos los datos de contacto
			$datos_contacto = $modelo->getContacto();
			// Actualizamos la vista de contacto
			require_once("vistas/vista_contacto.php");
		}

		// En caso de que existan parámetros adicionales en la URL se mostrará la portada
		else
			require_once("vistas/plantillaPortada.php");
 	}


 	// Cerramos la conexión al realizar todas las consultas para todas las páginas de información general
	//ConexionBD::cerrarConexion($modelo->getConexionBD());

?>

