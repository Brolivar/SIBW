<?php
    //Recupera sesion abierta
    session_start();


	// require solo una vez para abrir la conexión con la bd una vez
    require_once("bd/ConexionBD.php");
    // include porque es menos importante que cargue las páginas de información general
    include("controladores/controlador_InfoGeneral.php");
    // require porque es importante que cargue las obras
    require("controladores/controlador_Obras.php");
    // require para obtener las colecciones
    require("controladores/controlador_Colecciones.php");
    // include para los comentarios
    include("controladores/controlador_Comentarios.php");


    if ((count($_GET) == 0) || isset($_GET["portada"])){
        require_once("vistas/plantillaPortada.php");
    }
    else if(isset($_GET["login"])){
        require_once("vistas/plantillalogin.php");
    }
    else if(isset($_GET["registro"])){
        require_once("vistas/registro.php");
    }

?>