<?php

    // Llama al modelo para realizar las operaciones con la base de datos
    require_once("modelos/modelo_Comentarios.php");

    // Creamos un objeto del modelo para los comentarios
    $modeloComentarios = new ModeloComentarios();

    // Si se ha realizado algún POST entonces es que se ha introducido un nuevo comentario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $modeloComentarios->aniadirComentario();
    }

    // Obtenemos los comentarios a partir del método getComentarios() del modelo
    $comentarios = $modeloComentarios->getComentarios();
    
    // Obtenemos elnúmero de comentarios guardados en la base de datos para recorrerlos y mostrarlos en la vista con un bucle
    $n_comentarios = $modeloComentarios->getNumeroComentarios();

    // Obtenemos las palabras prohibidas almacenadas en la bd para constratarlas con las palabras
    // que vaya introduciendo el usuario en el campo Comentario
    $prohibidas = $modeloComentarios->getProhibidas();


    // Recibimos la llamada de modificar un comentario(IDENTIFICADO POR LA FECHA)
    // Añadimos la linea de modificado por el moderador y llamamos a la funcion
    if (isset($_POST["fechaComent"])) {
       
        $fecha = $_POST["fechaComent"];
        $comentariofinal = $_POST["comentarioNuevo"];

        // Para evitar añadir varias veces el mensaje de edición comprobamos que no lo lleve incorporado ya
        if (substr_count($comentariofinal, "editado por el moderador") == 0)
            $comentariofinal .= "<p> <font color=red> Mensaje editado por el moderador.</font> </p>";

        // Funcion que modificara el comentario de la bd en funcion de su fecha.
        $modeloComentarios->modificarComentario($fecha, $comentariofinal);

        echo "<script>alert('Comentario modificado correctamente');</script>";

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }


    // Recibimos una llamada del formulario para borrar el comentario
    if(isset($_POST["fechaComentBorrar"])) {

        $nombre = $_POST["nombreBorrar"];
        $fecha = $_POST["fechaComentBorrar"];
        $comentario = $_POST["comentarioBorrar"];
        $modeloComentarios->borrarComentario($nombre, $comentario, $fecha);

        echo "<script>alert('Comentario eliminado correctamente');</script>";

        // Refrescamos la página actual para ver las modificaciones
        $page = $_GET["ref"];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }

    //En caso de buscar los comentarios, se recoge el POST del formulario de busqueda
    if(isset($_POST["comentarioBuscar"])) {

        $comentarioBuscado = $_POST["comentarioBuscar"];
        //Almacenamos los comentarios en nuestra variable
        $listaComent = $modeloComentarios->buscarComentario($comentarioBuscado);
    }

    // Cerramos la conexión al realizar todas las consultas de los comentarios
    ConexionBD::cerrarConexion($modeloComentarios->getConexionBD());
?>