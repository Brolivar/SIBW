<?php

    // Clase para gestionar la apertura y el cierre de la conexión con la base de datos
    class ConexionBD {

        public function __construct() {
        }

        // Es un método estático para que en los controladores solo haya que llamarlo una sola vez
        // y obtener la variable que contiene la conexión ya abierta
        public static function abrirConexion() {
    	    // Conectamos con el servidor con un usuario que no es el root
    	    $conexion = new mysqli('localhost', 'sibw1718', 'sibw1718') or exit('No se pudo conectar con el servidor'); 

    	    // Abrimos la base de datos     
    	    mysqli_select_db($conexion,'p4_sibw_bd') or die ( "No se ha podido conectar a la base de datos" );

    	    // Le indicamos la codificación del texto
        	mysqli_set_charset($conexion, 'utf8');

        	return $conexion;
        }

        // Método estático para cerrar las conexiones abiertas    
        public static function cerrarConexion($conexionAbierta) {
        	// Cerramos la conexión con el servidor 
        	mysqli_close ($conexionAbierta);   
        }
    }
?>