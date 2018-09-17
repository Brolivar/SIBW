<?php

	//Si la sesion no esta iniciada, la inicia. Es necesario para los scripts de php en los que vamos a leer variables
	//de sesion
	if(!session_id()) session_start();


	// Si se envía una petición desde ajax con el identificador='busqueda' es que se están buscando obras o páginas
	// de información general en el buscador estilo Gogle
	if (isset($_GET['busqueda'])) {

		// Especificamos la ruta donde se encuentra el fichero de conexión de la base de datos y los modelos
		// para acceder desde esta vista
		require_once("../bd/ConexionBD.php");
		require_once("../modelos/modelo_Obras.php");
		require_once("../modelos/modelo_InfoGeneral.php");

		// Creamos un objeto modelo para la gestion de obras
		$modeloObra2 = new ModeloObras();
		// Creamos un objeto modelo para la gestión de páginas de información general
		$modeloInfoGeneral = new ModeloInfoGeneral();

		// Solo se buscarán obras publicadas si el usuario registrado no es un gestor o superusuario, es decir, para usuarios
		// anónimos, registrados y moderadores
		if (!isset($_SESSION['rol']) || (isset($_SESSION['rol']) && ( $_SESSION['rol'] != "gestor" && $_SESSION['rol'] != "superusuario") )) {

			// Buscamos por descripción y título las obras que coincidan con el término de búsqueda
			$obrasBuscadas = $modeloObra2->buscarObrasGoogle($_GET["busqueda"], "publicadas");

			// Mostramos los títulos de las obras que coincidan con la búsqueda 
			if (is_array($obrasBuscadas)) {

				for($i = 0; $i < count($obrasBuscadas); $i++) {
					echo	"<a href='?obra=".$obrasBuscadas[$i]['ID']."'>" ;
					echo	"<p> ".$obrasBuscadas[$i]['Titulo']."</p>";
					echo	"</a>";
				}	
			}

			// Solo busca páginas de información general que han sido publicadas
			$paginasPublicadas = $modeloInfoGeneral->buscarTodasPaginas($_GET["busqueda"], "publicadas");

			// Mostramos las páginas de información general coincidentes con la búsqueda y publicadas
			if (is_array($paginasPublicadas)) {

				for($i = 0; $i < count($paginasPublicadas); $i++) {
					echo	"<a href='?".$paginasPublicadas[$i]['ID']."'>" ;
					echo	"<p> ".$paginasPublicadas[$i]['ID']."</p>";
					echo	"</a>";
				}	
			}


			// Si no hay coincidencias se muestra un mensaje de advertencia
			if (!is_array($obrasBuscadas) && !is_array($paginasPublicadas)){
				echo "<p><strong>No se encontraron coincidencias </strong> </p>";
			}
		}

		// Los gestores y superusuarios podrán buscar entre obras y páginas de información general publicadas y no publicadas
		else if (isset($_SESSION['rol']) && ($_SESSION['rol'] == "superusuario" || $_SESSION['rol'] == "gestor")) {

			// Buscamos por descripción y título todas las obras que coincidan con el término de búsqueda
			$obrasBuscadas = $modeloObra2->buscarObrasGoogle($_GET["busqueda"], "todas");

			// Mostramos los títulos de las obras que coincidan con la búsqueda 
			if (is_array($obrasBuscadas)) {

				for($i = 0; $i < count($obrasBuscadas); $i++) {
					echo	"<a href='?obra=".$obrasBuscadas[$i]['ID']."'>" ;
					echo	"<p> ".$obrasBuscadas[$i]['Titulo']."</p>";
					echo	"</a>";
				}
			}

			// Busca las páginas de información general publicadas y no publicadas
			$paginasBuscadas = $modeloInfoGeneral->buscarTodasPaginas($_GET["busqueda"], "todas");

			// Mostramos las páginas de información general que coincidan con la búsqueda
			if (is_array($paginasBuscadas)) {

				for($i = 0; $i < count($paginasBuscadas); $i++) {
					echo	"<a href='?".$paginasBuscadas[$i]['ID']."'>" ;
					echo	"<p> ".$paginasBuscadas[$i]['ID']."</p>";
					echo	"</a>";
				}	
			}


			// Si no hay coincidencias se muestra un mensaje de advertencia
			if (!is_array($obrasBuscadas) && !is_array($paginasBuscadas)) {
				echo "<p><strong>No se encontraron coincidencias </strong> </p>";
			}
		}

	}
?>