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

    // Método para buscar obras a través de su descripción
    function buscarObraPorDescripcion ($descripcionBuscada) {

        // Seleccionamos las obras que contienen la cadena en su descripcion
        $seleccion = "SELECT Titulo, ID FROM obras WHERE descripcion LIKE  '%".$descripcionBuscada."%'  ";
        $resultado = mysqli_query($this->conexionBD, $seleccion);

        // Solo si hay datos devueltos se procede a guardarlos para mostrarlos
        if ($resultado != null) {
            $numFilas = mysqli_num_rows($resultado); 
            $lista = array();

            // Si la consulta ha devuelto filas, las procesamos  
            if ($numFilas > 0) { 

                while ( $fila = mysqli_fetch_array ($resultado) ) {
                    $lista[] = $fila;
                }

                return $lista;
            } 
        }
    }

    // Función que obtiene el título de una determinada obra
    public function getNombre ($id_obra) {
        $seleccion = "SELECT Titulo FROM obras WHERE ID = $id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $nombre = array();

        // Es la primera fila la que contiene el campo miniatura
        while ( $fila = mysqli_fetch_array ($resultado) ) {  
            $nombre = $fila[0];
        }

        return $nombre;
    }


    // Función que obtiene la imagen que se sitúa al lado de la descripción
    public function getImagen ($id_obra) {
        $seleccion = "SELECT Imagen FROM obras WHERE ID = $id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);


        // Es la primera fila la que contiene el campo imagen
        while ( $fila = mysqli_fetch_array ($resultado) ) {  
            $imagen = $fila[0];
        }

        return $imagen;
    }

    // Función que recopila el contenido dependiendo de la obra que se haya clickado
    // Para saber cuál es le pasamos por parámetro la variable $_GET["obra"]-1 porque
    // el primer elemento del array es el 0
    public function getDescripcion ($id_obra) {
        $seleccion = "SELECT descripcion FROM obras WHERE ID = $id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        // Es la primera fila la que contiene el campo descripción
        while ( $fila = mysqli_fetch_array ($resultado) ) {  
            $descripcion = $fila[0];
        }

        return $descripcion;
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

    //Funcion que devuelve el id de cada galeria
    public function getIDGalerias(){

        $seleccion = "SELECT id FROM galerias";

        $resultado = mysqli_query ($this->conexionBD, $seleccion);


        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $IdGaleria[] = $fila["id"];

        }

        //rint_r($IdGaleria);

        return $IdGaleria;
    }


    // Método para  modificar una galeria con ID concreto
    public function modificarGaleria($idg, $img){

         // Ejecutamos una consulta  

        $seleccion = "UPDATE galerias SET ruta_imagen= '$img' WHERE $idg = id";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

    }

    // Método para borrar una foto de una galeria
    public function borrarFotoGaleria($idg){
        $seleccion = "DELETE FROM galerias WHERE id='$idg'";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
    }


    //Funcion que añade a la BD una fila con un nuevo video asociado a el id de la obra parametro
    public function aniadirVideo($urlVideonuevo, $IdObraVideoNuevo){
        $nuevo_video = "INSERT INTO videos (url_video, obra_asociada) VALUES ('$urlVideonuevo', '$IdObraVideoNuevo')";
        $resultado = mysqli_query ($this->conexionBD, $nuevo_video);
    }


    //Funcion que añade a la BD una fila con una nueva foto asociada a el id de la obra parametro
    public function aniadirFotoGaleria($rutaFotoNueva , $IdObraFotoNueva){
        $nueva_foto = "INSERT INTO galerias (ruta_imagen, obra_asociada) VALUES ('$rutaFotoNueva', '$IdObraFotoNueva')";
        $resultado = mysqli_query ($this->conexionBD, $nueva_foto);       
    }


    // Funcion para insertar una nueva obra en la bd siempre y cuando esta no exista ya 
    public function aniadirObra ($tituloNuevaObra, $coleccionNuevaObra, $ImagenNuevaObra, $descripcionNuevaObra) {

        // Antes de insertar la obra comprobamos si esta ya existe
        $consulta = "SELECT * FROM obras WHERE Titulo='$tituloNuevaObra' AND Imagen='$ImagenNuevaObra' AND descripcion='$descripcionNuevaObra'";
        $resultadoConsulta = mysqli_query ($this->conexionBD, $consulta);

        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultadoConsulta); 

        // Solo si no existe una obra con similares campos se podrá añadir
        if ($numFilas == 0) { 

            $fechaActual = date ("Y/m/d H:i:s.", time());

            // La fecha de publicación será la fecha del momento en el que se inserte la obra
            $nuevaObra = "INSERT INTO obras (Titulo, descripcion, Imagen, Fecha_Publicacion, Fecha_Modificacion) VALUES ('$tituloNuevaObra', '$descripcionNuevaObra',
             '$ImagenNuevaObra', '$fechaActual', '$fechaActual')";
            $resultado = mysqli_query ($this->conexionBD, $nuevaObra);   

            // Obtenemos el ultimo ID insertado(el de la obra recien insertada) que nos servira para añadir la obra a una coleccion
            $obtenerIDobra = "SELECT LAST_INSERT_ID()";
            $resultado2 = mysqli_query ($this->conexionBD, $obtenerIDobra);   

            // Es la primera fila la que contiene el campo fecha de publicación
            while ( $fila = mysqli_fetch_array ($resultado2) ) {  
                $id = $fila[0];
            }

            $aniadirAColeccion = "INSERT INTO colecciones(nombre_coleccion, obra_asociada) VALUES ('$coleccionNuevaObra', '$id')";
            $resultado3 = mysqli_query ($this->conexionBD, $aniadirAColeccion);   
        }

    }

    // FUNCION PARA BORRAR OBRAS
    public function borrarObra($idObraBorrar){ 

        // En primer lugar borramos todos aquellos objetos relacionados con la obra
        // Borramos la colección a la que pertenece
        $borrarObraColecciones = "DELETE FROM colecciones WHERE obra_asociada='$idObraBorrar'";
        $resultado2 = mysqli_query ($this->conexionBD, $borrarObraColecciones);

        // Luego borramos sus vídeos asociados
        $borrarObraVideos = "DELETE FROM videos WHERE obra_asociada='$idObraBorrar'";
        $resultado3 = mysqli_query ($this->conexionBD, $borrarObraVideos);

        // Después borramos su galería asociada
        $borrarObraGalerias = "DELETE FROM galerias WHERE obra_asociada='$idObraBorrar'";
        $resultado4 = mysqli_query ($this->conexionBD, $borrarObraGalerias);

        // Y por último borramos la propia obra
        $borrarObra = "DELETE FROM obras WHERE id='$idObraBorrar'";
        $resultado = mysqli_query ($this->conexionBD, $borrarObra);
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

    // Método para modificar el video con ID concreto.
    public function modificarVideo($idv, $video){

         // Ejecutamos una consulta  

        $seleccion = "UPDATE videos SET url_video = '$video' WHERE $idv = id";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

    }

    // Método para obtener la fecha de publicación de una obra concreta
    public function getFechaPublicacion($id_obra) {

        $seleccion = "SELECT Fecha_Publicacion FROM obras WHERE ID = $id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);


        // Es la primera fila la que contiene el campo fecha de publicación
        while ( $fila = mysqli_fetch_array ($resultado) ) {  
            $fecha_publ = $fila[0];
        }

        return $fecha_publ;        
    }

    // Método para obtener la fecha de modificación de una obra concreta
    public function getFechaModificacion($id_obra) {

        $seleccion = "SELECT Fecha_Modificacion FROM obras WHERE ID = $id_obra";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        // Es la primera fila la que contiene el campo fecha de modificación
        while ( $fila = mysqli_fetch_array ($resultado) ) {  
            $fecha_mod = $fila[0];
        }

        return $fecha_mod;       
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

    //Function que devuelve en un array asociativo los videos de una obra
   public function getVideosObra($id_obra){

        $seleccion = "SELECT url_video FROM videos INNER JOIN
            obras ON videos.obra_asociada=obras.ID WHERE videos.obra_asociada='$id_obra'";

        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $videosObra = array();

        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $videosObra[] = $fila["url_video"];

        }

        return $videosObra;
    }


    //Function que devuelve en un array asociativo los IDS de los videos de una obra
   public function getIDVideos(){

        $seleccion = "SELECT id FROM videos";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $Idvideos = array();

        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $Idvideos[] = $fila["id"];

        }

        return $Idvideos;
    }


    public function borrarVideo($idv) {

        $seleccion = "DELETE FROM videos WHERE id='$idv'";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
    }


    //Funcion que devuelve el nombre de la coleccion de una obra DETERMINADA
    public function getColeccionDeObra($id_obra) {
        $seleccion = "SELECT nombre_coleccion FROM colecciones INNER JOIN
            obras ON colecciones.obra_asociada=obras.ID WHERE colecciones.obra_asociada='$id_obra'";

        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $nombreColeccion = array();

        // Obtenemos los id de las obras pertenecientes a la colección
        while ( $fila = mysqli_fetch_array ($resultado) ) {  
            $nombreColeccion = $fila["nombre_coleccion"];
        }
        return $nombreColeccion;
    }

    //Funcion que devuelve en un array todos los nombres e ids, fechas, .... TODO de las obras
    public function getTodasObras () {

        $seleccion = 'SELECT * FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        $nombreObras = array();

        // Es la primera fila la que contiene el campo miniatura
        while ( $fila = mysqli_fetch_array ($resultado, MYSQLI_ASSOC) ) {  
            $nombreObras[]  = $fila;
        }

        return $nombreObras;
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
        $obrasColeccion_todo = array();
        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 
        $indice = 0;

        while ($indice < $numFilas) {
            // Realizamos una consulta para obtener la miniatura de cada obra asociada a la colección
            $consulta2 = "SELECT * FROM obras WHERE ID='$obrasColeccion[$indice]' ";
            $resultado2 = mysqli_query ($this->conexionBD, $consulta2);

            // Es la primera fila la que contiene el campo miniatura
            while ( $fila2 = mysqli_fetch_array ($resultado2, MYSQLI_ASSOC) ) {  
                $obrasColeccion_todo[] = $fila2;
            }
            $indice = $indice + 1;
        }

        return $obrasColeccion_todo;
    }

    //Funcion que se encarga de actualizar los campos de la obra tras enviar el formulario
    //de modificar obra.
     public function modificarObra($idM, $descripcionM, $tituloM, $imagenM, $fecha_publicacionM, $coleccionM){

        // Obtenemos el momento actual en el que se modifica la obra
        $fechaActual = date ("Y/m/d H:i:s.", time());

        // Ejecutamos una consulta  
        $seleccion = "UPDATE obras SET titulo = '$tituloM', descripcion = '$descripcionM', Imagen ='$imagenM',
            Fecha_Publicacion = '$fecha_publicacionM', Fecha_Modificacion ='$fechaActual'  WHERE $idM = ID";
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        // Una vez modificada la obra, es necesario añadirla a una coleccion
        $seleccion2 = "UPDATE colecciones SET nombre_coleccion = '$coleccionM' WHERE $idM = obra_asociada";
        $resultado2 = mysqli_query ($this->conexionBD, $seleccion2);
        

     }

    // Método que obtiene los identificadores de las obras almacenadas
    // Se utiliza para verificar que el id obtenido en la variable $_GET["obra"] es válido y corresponde a una obra existente
    public function getIDObras () {

        // Ejecutamos una consulta extrayendo todo
        $seleccion = 'SELECT ID FROM obras';
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 

        $ids = array();

        // Si la consulta ha devuelto filas, las procesamos  
        if ($numFilas > 0) { 

            while ( $fila = mysqli_fetch_array ($resultado) ) {
                $ids[] = $fila["ID"];
            }
        } 

        return $ids;
    }
}

?>