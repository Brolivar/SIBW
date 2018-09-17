<?php

	// LLamamos al modelo de las obras para realizar las operaciones con la base de datos
	require_once("modelos/modelo_Obras.php");

	// Creamos un objeto modelo para la gestion de obras
	$modeloObra = new ModeloObras();

	// Obtenemos las imágenes de las obras con sus pies de página
	$miniatura = $modeloObra->getMiniaturaObras();
	$listaObras = $modeloObra->getTodasObras();

	// Si se pulsa en una de las obras de la portada deberá mostrar el contenido de dicha obra
	// Para mostrarla obtendremos sus datos y luego llamaremos a la vista plantillaObra.php para mostrarlos
	if (isset($_GET["obra"])) {

		// Verificamos que el número de la obra almacenado en la variable GET sea válido
        // Para ello obtenemos los ids de todas las obras y comprobamos si el parámetro se corresponde con alguno de ellos
        $idsObras = $modeloObra->getIDObras();
        
        if (in_array($_GET["obra"], $idsObras)) {
			
		 	$descripcion = $modeloObra->getDescripcion($_GET["obra"]);

			// En este caso pasamos el número de la obra sin restar uno porque el rango de la clave externa
			// a la obra que tiene asociado cada video está entre 1 y 9
		 	$galeria_obra = $modeloObra->getGaleria($_GET["obra"]);

		 	$nombre_obra = $modeloObra->getNombre($_GET["obra"]);
			$imagen_obra = $modeloObra->getImagen($_GET["obra"]);

			// En este caso pasamos el número de la obra sin restar uno porque el rango de la clave externa
			// a la obra que tiene asociado cada video está entre 1 y 9
			$videos_obra = $modeloObra->getVideos($_GET["obra"]);

			$fecha_publicacion = $modeloObra->getFechaPublicacion($_GET["obra"]);
			$fecha_modificacion = $modeloObra->getFechaModificacion($_GET["obra"]);

			// Visualizamos el contenido de la obra una vez se haya obtenido
	 		require_once("vistas/plantillaObra.php");

 			// Cerramos la conexión al realizar todas las consultas para todas las páginas de las obras
			ConexionBD::cerrarConexion($modeloObra->getConexionBD());
        }

        // En caso de que no sea correcto el id de la obra se mostrará la página principal
        else {
            require_once("vistas/plantillaPortada.php");

        }
	}


    ///////////////////// REDIRECCIONES ////////////////////////////

    // Si el usuario pulsa el menu Gestionar Obras, se le redirige a la plantilla de Gestion de Obras
    // que a su vez incluye los formularios con las obras
    if(isset($_GET["gestionarobras"])) {           
        
        if ($_GET["gestionarobras"] == "") {

            //Obtenemos todas las obras con sus datos
            //Obtenemos los IDs de los videos, para poder modificarlos en el form
            //Obtenemos los IDS de las galerias, para poder modificarlos en el form
        	$todasObras = $modeloObra->getTodasObras();

            $idVideos = $modeloObra->getIDVideos();
            $idGalerias = $modeloObra->getIDGalerias();
            
            require_once("vistas/plantillaGestionarObras.php");
        }

        // En caso de que existan parámetros adicionales en la URL se mostrará la portada
        else
            require_once("vistas/plantillaPortada.php");
    }


    // Si recibimos la variable modifObra significa que hemos enviado el formulario de Modificar Obra
    if (isset($_POST['modifObra'])) {

    	//Almacenamos todos los campos enviados en el formulario
    	$idM = $_POST['ModIdObra'];
    	$descripcionM = $_POST['ModDescripcion'] ;
    	$tituloM = $_POST['ModTitulo'];
    	$imagenM = $_POST['ModImagen'];
    	$fecha_publicacionM = $_POST['ModPublicacion'];
    	$coleccionM = $_POST['ModColeccion'];
        $publicacion = $_POST['ModPublicarObra'];

    	$modeloObra->modificarObra($idM, $descripcionM, $tituloM, $imagenM, $fecha_publicacionM, $coleccionM, $publicacion);


        // Recibimos por POST los videos de la obra(y su id), y en este bucle los recogemos y llamamos a la funcion que actualizara
        // el campo videos
    	if(isset($_POST['ModIdVideo'])){
    		$numerodevideos = $_POST['ModIdVideo'];
    		for ($i=0; $i < count($numerodevideos); $i++) { 		
		    	$idv = $_POST['ModIdVideo'][$i];
                $video = $_POST['ModVideos'][$i];

                $modeloObra->modificarVideo($idv, $video);               
	    	}   		
    	}


        // Recibimos por POST la galeria de la obra(y su id), y en este bucle los recogemos y llamamos a la funcion que actualizara
        // el campo ruta imagen de la galeria
        if (isset($_POST['ModIdGaleria'])) {
            $numerodegalerias = $_POST['ModIdGaleria'];
            for ($i=0; $i < count($numerodegalerias); $i++) {         
                $idg = $_POST['ModIdGaleria'][$i];
                $nuevaGaleria = $_POST['ModVideoGaleria'][$i];

                $modeloObra->modificarGaleria($idg, $nuevaGaleria);               
            }           
        }

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }


    // Si recibimos la variable botonConfirmarBorrarVideos significa que le hemos dado al boton de borrarvideo
    if (isset($_POST['botonConfirmarBorrarVideos'])) {
        $idVideoBorrar = $_POST['idvBorrar'] ;
        $modeloObra->borrarVideo($idVideoBorrar);

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }

    // Si recibimos la variable botonConfirmarBorrarFoto significa que le hemos dado al boton de borrarvideo
    if (isset($_POST['botonConfirmarBorrarFoto'])) {
        $idFotoBorrar = $_POST['idgBorrar'] ;
        $modeloObra->borrarFotoGaleria($idFotoBorrar);

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }

    // Si recibimos el POST añadir video, significa que alguien ha completado y enviado el input para añadir un video a una obra(obtenmos id)
    if(isset($_POST['botonConfirmarAdicionVideo'])) {

        $urlVideoNuevo = $_POST['urlVideonuevo'] ;
        $IdObraVideoNuevo = $_POST['IdObraVideoNuevo'] ;
           
        $modeloObra->aniadirVideo($urlVideoNuevo, $IdObraVideoNuevo);

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }

    // Si recibimos el POST añadir video, significa que alguien ha completado y enviado el input para añadir una foto a la galeria de una obra(obtenmos id)
    if(isset($_POST['botonConfirmarAdicionFoto'])) {

        $rutaFotoNueva = $_POST['urlFotoNueva'] ;
        $IdObraFotoNueva = $_POST['IdObraFotoNueva'] ;
        $modeloObra->aniadirFotoGaleria($rutaFotoNueva , $IdObraFotoNueva);

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }


    // Si redibimos el POST de botonBuscar significa que alguien ha enviado el form de buscar obra
    if (isset($_POST['botonBuscar'])) {
     
        // Buscamos la obra por descripcion, y devolvemos una lista con los titulos de las obras que contienen la cadena
        $descricionBuscada = $_POST['buscarDescripcionObra'];
        $listaObrasBusc = $modeloObra->buscarObraPorDescripcion($descricionBuscada);
    }

    // Si recibimos este POST significa que se ha completado y enviado el formulario de añadir una nueva obra
    if(isset($_POST['aniadirObraConfirmar'])) {

        $tituloNuevaObra = $_POST['nuevaObraTitulo'];
        $coleccionNuevaObra = $_POST['nuevaObraColeccion'];
        $ImagenNuevaObra = $_POST['nuevaObraImagen'];
        $descripcionNuevaObra = $_POST['DescripcionObraAniadir'];
        $publicacionNuevaObra = $_POST['PublicarObra'];

        $modeloObra->aniadirObra($tituloNuevaObra, $coleccionNuevaObra, $ImagenNuevaObra, $descripcionNuevaObra, $publicacionNuevaObra);

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }


    // Si recibimos este post significa que hemos seleccionado y enviado para borrar esta obra
    // llamamos a la funcion del modelo que se encarga del borrado
    if (isset($_POST['BorrarObra'])) {

        $idObraBorrar = $_POST['idObraBorrar'];
        $prueba = $modeloObra->borrarObra($idObraBorrar);

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }

    // Cerramos la conexión al realizar todas las consultas para todas las páginas de las obras
    ConexionBD::cerrarConexion($modeloObra->getConexionBD());

?>

