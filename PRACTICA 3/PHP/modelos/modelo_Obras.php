<?php 

// Clase que gestiona la obtención de los datos de las obras y de las colecciones
class ModeloObras{

	public $conexionBD;

    // Constructor que recibe la conexión abierta con la BD
    public function __construct() {

	    $this->conexionBD = ConexionBD::abrirConexion();
    }

    // Función que devuelve la variable que contiene la conexión actual abierta con la base de datos
    public function getConexionBD() {
        return ($this->conexionBD);
    }

    // Función que recoge la foto y el pie de foto para mostrar las obras
    // en la portada
    public function getMiniaturaObras () {

    	$seleccion = 'SELECT miniatura FROM obras';
	    $resultado = mysqli_query ($this->conexionBD, $seleccion);

	    $miniatura = array();

    	// Es la primera fila la que contiene el campo miniatura
 	    while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
 	    	$miniatura[]  = $fila['miniatura'];
 	    }

	    return $miniatura;
    }

    // Función que obtiene el título de una determinada obra
    public function getNombre ($id_obra) {
        $seleccion = 'SELECT Titulo FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $nombre = array();

        // Es la primera fila la que contiene el campo miniatura
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $nombre[] = $fila['Titulo'];
        }

        return $nombre["$id_obra"];
    }


    // Función que obtiene la imagen que se sitúa al lado de la descripción
    public function getImagen ($id_obra) {
        $seleccion = 'SELECT Imagen FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $imagen = array();

        // Es la primera fila la que contiene el campo imagen
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $imagen[] = $fila['Imagen'];
        }

        return $imagen["$id_obra"];
    }

    // Función que recopila el contenido dependiendo de la obra que se haya clickado
    // Para saber cuál es le pasamos por parámetro la variable $_GET["obra"]-1 porque
    // el primer elemento del array es el 0
    public function getDescripcion ($id_obra) {
        $seleccion = 'SELECT descripcion FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $descripcion = array();

        // Es la primera fila la que contiene el campo descripción
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $descripcion[] = $fila['descripcion'];
        }

        return $descripcion["$id_obra"];
    }

    // Función que recopila las galerías de las obras que dispongan de ella
    public function getGaleria ($id_obra) {
        $seleccion = "SELECT ruta_imagen FROM galerias WHERE obra_asociada=$id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $galeria = array();

        // Es la primera fila la que contiene el campo galería
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $galeria[] = $fila['ruta_imagen'];
        }

        return $galeria;
    }

    // Método para obtener los vídeos asociados a una obra en concreto
    public function getVideos($id_obra) {

        $seleccion = "SELECT url_video FROM videos WHERE obra_asociada=$id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $videos = array();

        // Es la primera fila la que contiene el campo fecha de publicación
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $videos[] = $fila['url_video'];
        }

        return $videos;
    }

    // Método para obtener la fecha de publicación de una obra concreta
    public function getFechaPublicacion($id_obra) {

        $seleccion = 'SELECT Fecha_Publicacion FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $fecha_publ = array();

        // Es la primera fila la que contiene el campo fecha de publicación
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $fecha_publ[] = $fila['Fecha_Publicacion'];
        }

        return $fecha_publ["$id_obra"];        
    }

    // Método para obtener la fecha de modificación de una obra concreta
    public function getFechaModificacion($id_obra) {

        $seleccion = 'SELECT Fecha_Modificacion FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $fecha_mod = array();

        // Es la primera fila la que contiene el campo fecha de modificación
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $fecha_mod[] = $fila['Fecha_Modificacion'];
        }

        return $fecha_mod["$id_obra"];       
    }

    // Funcion que devuelve el nombre de todas las colecciones en un array
    public function getNombresColecciones(){

        // Ejecutamos una consulta  
        $seleccion = 'SELECT nombre_coleccion FROM colecciones';  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 

        $nombres = array();

        // Si la consulta ha devuelto filas, las procesamos  
        if ($numFilas> 0) { 

            while ( $fila = mysqli_fetch_array ($resultado) ) {
                $nombres [] = $fila['nombre_coleccion'];
            }
        } 

        return $nombres;

    }


    // Función que extrae las obras pertenecientes a una determinada colección
    public function getColeccion($id_coleccion) {

        // Para extraer las obras pertenecientes a una determinada colección emparejamos los valores
        // de la clave externa con los de la clave primaria de la tabla 'obras'. Para ello usamos el operador
        // JOIN con el modificador INNER para que los valores en ambas claves coincidan
        $seleccion = "SELECT obra_asociada FROM colecciones INNER JOIN
            obras ON colecciones.obra_asociada=obras.ID WHERE nombre_coleccion='$id_coleccion'";
            
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $obrasColeccion = array();

        // Obtenemos los id de las obras pertenecientes a la colección
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $obrasColeccion[] = $fila['obra_asociada'];
        }

        // Una vez tenemos las obras asociadas a la colección pinchada buscamos sus miniaturas
        $miniaturas_obrasColeccion = array();
        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 
        $indice = 0;

        while ($indice < $numFilas) {
            // Realizamos una consulta para obtener la miniatura de cada obra asociada a la colección
            $consulta2 = "SELECT miniatura FROM obras WHERE ID='$obrasColeccion[$indice]' ";
            $resultado2 = mysqli_query ($this->conexionBD, $consulta2);

            // Es la primera fila la que contiene el campo miniatura
            while ( $fila2 = mysqli_fetch_array ($resultado2, MYSQLI_ASSOC) ) {  
                $miniaturas_obrasColeccion[] = $fila2['miniatura'];
            }
            $indice = $indice + 1;
        }

        return $miniaturas_obrasColeccion;
    }
}

?>