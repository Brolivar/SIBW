<?php
	// LLamamos al modelo de las obras para realizar las operaciones con la base de datos
	require_once("modelos/modelo_Obras.php");

	// Creamos un objeto modelo para la gestion de obras
	$modeloObra = new ModeloObras();

	// Mostramos la página referente a las colecciones que hay
	if (isset($_GET["colecciones"])) {
		
		if ($_GET["colecciones"] == "") {
			// Devuelve todos los nombres de colecciones
			$nombres_colecciones = $modeloObra->getNombresColecciones();
			// Usamos la funcion array_unique para quitar los nombres de obras que se repiten
			// Y con la función array_values reindexamos los valores para que no haya índices vacíos
			$nombres_final = array_values(array_unique($nombres_colecciones));

			// Visualizamos las colecciones y sus respectivas obras
			require("vistas/plantillaColeccion.php");
		}

		// Si la colección lleva algún parámetro entonces la URL no es válida y se mostrará la portada
		else
			require_once("vistas/plantillaPortada.php");
	}

	// Dependiendo de en cuál se pulse se cargarán sus obras correspondientes
	if (isset($_GET["coleccion"])) {

		$nombreColeccionSeleccionada = "";

		// Colección de prehistoria
		if ($_GET["coleccion"] == "Prehistórica") {
			$coleccionSeleccionada = $modeloObra->getColeccion("Prehistórica");
			$nombreColeccionSeleccionada = "Prehistórica";
		}
		// Colección de prehistoria
		else if ($_GET["coleccion"] == "Romana") {
			$coleccionSeleccionada = $modeloObra->getColeccion("Romana");
			$nombreColeccionSeleccionada = "Romana";
		}
		// Colección de prehistoria
		else if ($_GET["coleccion"] == "Preclásica") {
			$coleccionSeleccionada = $modeloObra->getColeccion("Preclásica");
			$nombreColeccionSeleccionada = "Preclásica";
		}

		require_once("vistas/coleccion.php");
	}

	// Cerramos la conexión al realizar todas las consultas para todas las páginas de las obras
	//ConexionBD::cerrarConexion($modeloObra->getConexionBD());
?>