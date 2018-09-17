
<?php

// Clase que recoge de la base de datos los comentarios existentes
class ModeloComentarios {

    public $conexionBD;
    public $numComentarios;

    // Constructor que recibe la conexión abierta con la BD
    public function __construct() {
        $this->conexionBD = ConexionBD::abrirConexion();
    }

    // Función que devuelve la variable que contiene la conexión actual abierta con la base de datos
    public function getConexionBD() {
        return ($this->conexionBD);
    }


    // Método para añadir aquellos comentarios validados introducidos por el formulario
    public function aniadirComentario() {

        // Introducimos los datos rellenados del formulario en la tabla Comentarios
        // Comprobamos si los campos del formulario han sido rellenados
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["text_comentario"])) {

            // A continuación verificamos estos campos para evitar la inserción de código malicioso en la bd
            $nombre = trim($_POST["nombre"]);
            $nombre = stripslashes($nombre);
            $nombre = htmlspecialchars($nombre);

            $email = trim($_POST["email"]);
            $email = stripslashes($email);
            $email = htmlspecialchars($email);

            $comentario = trim($_POST["text_comentario"]);
            $comentario = stripslashes($comentario);
            $comentario = htmlspecialchars($comentario);

            // Obtenemos la IP del usuario que ha comentado
            $ip = $_SERVER['REMOTE_ADDR'];


            ///////////// PREVENCIÓN DE INYECCIONES DE CÓDIGO A LA HORA DE INTRODUCIR LOS COMENTARIOS /////////////

            // A continuación preparamos la inserción de la fila sin especificar aún los valores de cada campo
            $nuevo_comentario = ($this->conexionBD)->prepare("INSERT INTO Comentarios (Comentario,
             Direccion_IP, Email, Nombre) VALUES (?, ?, ?, ?)");

            // Especificamos el tipo de los campos a introducir y las variables que albergarán su contenido
            $nuevo_comentario->bind_param("ssss", $comentario_usuario, $direccionIP, $email_usuario, $nombre_usuario);

            // Establecemos el contenido de las variables
            $nombre_usuario = '<p><strong>Autor: '.$nombre.'</strong></p>';
            $email_usuario = '<p>E-mail: '.$email.'</p>';
            $comentario_usuario = '<p>Comentario: '.$comentario.'</p>';
            $direccionIP = '<p>Dirección IP: '.$ip.'</p>';

            // Introducimos el comentario
            $nuevo_comentario->execute();
        }
    }

    // Método que devuelve el número de comentarios que hay en la bd
    // Sirve para recorrer dichos comentarios e ir mostrándolos
    public function getNumeroComentarios() {
        return ($this->numComentarios);
    }

    // Método para recuperar los comentarios
    public function getComentarios() {

    	// Ejecutamos una consulta donde los comentarios estarán ordenados por la fecha y la hora de forma ascendente
        // Es decir, el primer comentario será el más antiguo
        $seleccion = 'SELECT  Nombre, Comentario, FechaYHora  FROM  Comentarios ORDER BY FechaYHora ASC';  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Averiguamos cuántas filas ha devuelto la consulta  
        $this->numComentarios = mysqli_num_rows($resultado); 

        // Creamos la variable donde se almacenarán los comentarios obtenidos
        $comentarios = array();

        // Si la consulta ha devuelto filas, las procesamos  
        if ($this->numComentarios > 0) { 

            while ( $fila = mysqli_fetch_array ($resultado) ) {
                $comentarios[] = $fila;
            }
        } 

        return $comentarios;
    }

    // Método para obtener las palabras prohibidas
    public function getProhibidas() {

        // Ejecutamos una consulta  
        $seleccion = 'SELECT  id  FROM  prohibidas';  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        $numFilas = mysqli_num_rows($resultado); 

        // Creamos la variable donde se almacenarán los palabras prohibidas obtenidas
        $lista = array();

        // Si la consulta ha devuelto filas, las procesamos  
        if ($numFilas > 0) { 

            while ( $fila = mysqli_fetch_array ($resultado) ) {
                $lista[] = $fila[0];
            }
        } 
        return $lista;
    }

}

?>