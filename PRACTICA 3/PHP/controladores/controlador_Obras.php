<?php

	// LLamamos al modelo de las obras para realizar las operaciones con la base de datos
	require_once("modelos/modelo_Obras.php");

	// Creamos un objeto modelo para la gestion de obras
	$modeloObra = new ModeloObras();

	// Obtenemos las imágenes de las obras con sus pies de página
	$miniatura = $modeloObra->getMiniaturaObras();

	// Si se pulsa en una de las obras de la portada deberá mostrar el contenido de dicha obra
	// Para mostrarla obtendremos sus datos y luego llamaremos a la vista plantillaObra.php para mostrarlos
	if (isset($_GET["obra"])) {

		// Verificamos que el número de la obra almacenado en la variable GET sea válido (entre 1 y 9)
		if ($_GET["obra"] >= 1 && $_GET["obra"] <= 9) {
			
		 	$descripcion = $modeloObra->getDescripcion($_GET["obra"]-1);

			// En este caso pasamos el número de la obra sin restar uno porque el rango de la clave externa
			// a la obra que tiene asociado cada video está entre 1 y 9
		 	$galeria_obra = $modeloObra->getGaleria($_GET["obra"]);

		 	$nombre_obra = $modeloObra->getNombre($_GET["obra"]-1);
			$imagen_obra = $modeloObra->getImagen($_GET["obra"]-1);

			// En este caso pasamos el número de la obra sin restar uno porque el rango de la clave externa
			// a la obra que tiene asociado cada video está entre 1 y 9
			$videos_obra = $modeloObra->getVideos($_GET["obra"]);

			$fecha_publicacion = $modeloObra->getFechaPublicacion($_GET["obra"]-1);
			$fecha_modificacion = $modeloObra->getFechaModificacion($_GET["obra"]-1);

			// Visualizamos el contenido de la obra una vez se haya obtenido
	 		require_once("vistas/plantillaObra.php");

 			// Cerramos la conexión al realizar todas las consultas para todas las páginas de las obras
			ConexionBD::cerrarConexion($modeloObra->getConexionBD());
	 	}
	 	
	 	// Si el número de la obra no es válido se mostrará la portada
	 	else {
	 		require_once("vistas/plantillaPortada.php");
	 	}
	}
?>

