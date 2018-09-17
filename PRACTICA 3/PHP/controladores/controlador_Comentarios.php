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

    // Cerramos la conexión al realizar todas las consultas de los comentarios
    ConexionBD::cerrarConexion($modeloComentarios->getConexionBD());
?>