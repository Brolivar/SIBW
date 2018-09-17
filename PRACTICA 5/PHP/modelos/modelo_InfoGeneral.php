<?php

	// Clase encargada de extraer la información de la base de datos para las páginas de información general
	class ModeloInfoGeneral {
		
		public $conexionBD;

	    // Constructor que recibe la conexión abierta con la BD
	    public function __construct() {

    	    $this->conexionBD = ConexionBD::abrirConexion();
	    }

	    // Función que devuelve la variable que contiene la conexión actual abierta con la base de datos
	    public function getConexionBD() {
	        return ($this->conexionBD);
	    }

	    // Función que obtiene la información de contacto
	    public function getContacto() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT Pagina FROM InfoGeneral WHERE ID="contacto"';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado);
	        
	        // Si la consulta ha devuelto filas, las procesamos 
	        if ($numFilas> 0) { 

		 	    while ( $fila = mysqli_fetch_array ($resultado) ) {  
		 	    	return $fila[0];  
		 	    }
	        }
	    }

	   	// Función que obtiene la información de la localización del museo
	    public function getLocalizacion() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT Pagina FROM InfoGeneral WHERE ID="localizacion"';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                return $fila[0];    
	            }

	        } 
	    }

	   	// Función que obtiene la información de las entradas
	    public function getEntradas() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT Pagina FROM InfoGeneral WHERE ID="entradas"';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                return $fila[0];    
	            }

	        } 
	    }

	   	// Función que obtiene la información del horario del museo
	    public function getHorario() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT Pagina FROM InfoGeneral WHERE ID="horario"';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                return $fila[0];    
	            }

	        } 
	    }

	    //FUNCION PARA LA GESTION DE MENUS DINAMICOS
	    //Devuelve el nombre del menu. Ej "Contacto"
	    public function getMenus(){
	        // Ejecutamos una consulta  
	        $seleccion = 'SELECT opciones FROM menus';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 

	        $menu = array();

	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                $menu [] = $fila['opciones'];
	            }
	        } 

	        return $menu;
	    }

	    //Devuelve la url a la que redirige el menu. Ej ?contacto
	    public function getURLMenus() {
	        // Ejecutamos una consulta  
	        $seleccion = 'SELECT URL FROM menus';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 

	        $url = array();

	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                $url [] = $fila['URL'];
	            }
	        } 

	        return $url;
	    }

	// Método para buscar todas las paginas de información general publicadas o no a través de título y su contenido
    function buscarTodasPaginas ($terminoBusqueda, $publicacion) {

        if ($publicacion == "publicadas") {
        	// Seleccionamos las páginas que contienen la cadena en su título o contenido
            $seleccion = "SELECT ID FROM infogeneral INNER JOIN infogeneralpublicadas ON infogeneral.ID=infogeneralpublicadas.id_infogen 
                WHERE ID LIKE '%$terminoBusqueda%' OR Pagina LIKE '%$terminoBusqueda%'";
        }
        else {
	        // Seleccionamos todas las paginas de info general
	        $seleccion = "SELECT ID FROM infogeneral WHERE ID LIKE '%$terminoBusqueda%' OR Pagina LIKE '%$terminoBusqueda%'";
	    }

        // Resultado de buscar las páginas de info general
        $resultado = mysqli_query($this->conexionBD, $seleccion);

        // Solo si hay datos devueltos se procede a guardarlos para mostrarlos
        if ($resultado != null) {
            $numFilas = mysqli_num_rows($resultado);

            // Si la consulta ha devuelto filas, las procesamos  
            if ($numFilas > 0) { 

                while ( $fila = mysqli_fetch_array ($resultado) ) {
                    $lista[] = $fila;
                }
                return $lista;
            }
        }
    }
}
?>