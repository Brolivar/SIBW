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
	        $seleccion = 'SELECT  *  FROM  InfoGeneral';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos 
	        if ($numFilas> 0) { 

	        	// Es la primera fila la que contiene el campo Contacto
		 	    while ( $fila = mysqli_fetch_array ($resultado) ) {  
		 	    	return $fila[0];  
		 	    }
	        }
	    }

	   	// Función que obtiene la información de la localización del museo
	    public function getLocalizacion() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT  *  FROM  InfoGeneral';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	        	// La fila segunda es la que contiene el campo Localizacion
	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                return $fila[1];    
	            }

	        } 
	    }

	   	// Función que obtiene la información de las entradas
	    public function getEntradas() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT  *  FROM  InfoGeneral';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	        	// Es la tercera fila la que contiene el campo Entradas
	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                return $fila[3];    
	            }

	        } 
	    }

	    /////////////// COSA EXTRA: HORARIO ////////////////////
	   	// Función que obtiene la información del horario del museo
	    public function getHorario() {

	    	// Ejecutamos una consulta  
	        $seleccion = 'SELECT  *  FROM  InfoGeneral';  
	        $resultado = mysqli_query ($this->conexionBD, $seleccion);
	        
	        // Averiguamos cuántas filas ha devuelto la consulta  
	        $numFilas = mysqli_num_rows($resultado); 
	        
	        // Si la consulta ha devuelto filas, las procesamos  
	        if ($numFilas> 0) { 

	        	// Es la fila cuarta la que contiene el campo Horario
	            while ( $fila = mysqli_fetch_array ($resultado) ) {
	                return $fila[2];    
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
	        //print_r($menu);
	        return $menu;
	    }

	    //Devuelve la url a la que redirige el menu. Ej ?contacto
	    public function getURLMenus(){
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
	        //print_r($url);
	        return $url;
	    }

	}
?>