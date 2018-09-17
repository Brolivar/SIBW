<?php

// Clase encargada de la gestión de los distintos usuarios permitidos en el sistema
class ModeloUsuarios {

	public $conexionBD;

    // Constructor que recibe la conexión abierta con la BD
    public function __construct() {
        $this->conexionBD = ConexionBD::abrirConexion();
    }

    // Función que devuelve la variable que contiene la conexión actual abierta con la base de datos
    public function getConexionBD() {
        return ($this->conexionBD);
    }

    // Método para comprobar si existe un usuario a través de su correo electrónico
    public function existeUsuario($emailIntroducido) {

    	// Ejecutamos una consulta comprobando si el email pasado por parámetro ya se encuentra en la bd
        $seleccion = "SELECT * FROM usuarios WHERE email='$emailIntroducido'";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Si la consulta tiene filas quiere decir que sí existe el usuario  
        if (mysqli_num_rows($resultado) > 0)
        	return true;

        return false;
    }

    // Método para comprobar si la contraseña introducida en el inicio de sesión es válida
    public function validarClave ($email, $claveIntroducida) {

    	// Ejecutamos una consulta comprobando si la clave pasada por parámetro es válida
        $seleccion = "SELECT * FROM usuarios WHERE email='$email' AND clave='$claveIntroducida'";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Si la consulta tiene filas quiere decir que sí existe el usuario  
        if (mysqli_num_rows($resultado) > 0)
        	return true;

        return false;
    }

    // Método para comprobar que un campo no contiene código malicioso
    public function testCampos($campo) {

    	$campoVerificar = trim($campo);
        $campoVerificar = stripslashes($campoVerificar);
        $campoVerificar = htmlspecialchars($campoVerificar);

        return $campoVerificar;
    }

    // Método para añadir un usuario a la base de datos siempre y cuando este usuario no esté en la bd previamente
    public function aniadirUsuario($nickname, $clave, $email, $nombre, $apellidos, $rol) {

        // A continuación verificamos todos los campos para evitar la inserción de código malicioso en la bd
        $nickname = $this->testCampos($nickname);
        $clave = $this->testCampos($clave);
        $email = $this->testCampos($email);
        $nombre = $this->testCampos($nombre);
        $apellidos = $this->testCampos($apellidos);

        ///////////// PREVENCIÓN DE INYECCIONES DE CÓDIGO A LA HORA DE INTRODUCIR LOS COMENTARIOS /////////////

        // A continuación preparamos la inserción de la fila sin especificar aún los valores de cada campo
        $nuevo_usuario = $this->conexionBD->prepare("INSERT INTO Usuarios (nickname,
         clave, email, rol, nombre, apellidos) VALUES (?, ?, ?, ?, ?, ?)");

        // Especificamos el tipo de los campos a introducir y las variables que albergarán su contenido
        $nuevo_usuario->bind_param("ssssss", $nickname, $clave, $email, $rol, $nombre, $apellidos);

        // Introducimos el comentario
        $nuevo_usuario->execute();
    }

    // Método para obtener los datos de un usuario en concreto
    public function getDatosUsuario($emailUsuario) {

    	// Ejecutamos una consulta para obtener los datos de un usuario
        $seleccion = "SELECT * FROM usuarios WHERE email='$emailUsuario'";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 

        // Vector donde se almacenarán los datos del usuario
        $datos = array();
        
        // Si la consulta ha devuelto filas, las procesamos 
        if ($numFilas> 0) { 
        	// Es la primera fila la que contiene el campo Contacto
	 	    while ( $fila = mysqli_fetch_array ($resultado) ) {  
	 	    	$datos[] = $fila;
	 	    }
        }

        return $datos;
    }

    // Método para modificar los datos de un usuario en concreto. Para identificarlo utilizamos
    // el email introducido antes de realizar cualquier modificación
    public function setDatosUsuario($emailAntiguo, $nickname, $clave, $email, $nombre, $apellidos, $rol) {

        // Eliminamos la fila correspondiente al usuario
        $eliminarUsuario = "DELETE FROM usuarios WHERE email='$emailAntiguo'";
        mysqli_query($this->conexionBD, $eliminarUsuario);

        // A continuación introducimos los nuevos datos como si fuese un usuario nuevo
        $this->aniadirUsuario($nickname, $clave, $email, $nombre, $apellidos, $rol);
    }

    // Método para obtener los datos de todos los usuarios
    public function getDatosUsuarios() {

        // Ejecutamos una consulta para obtener los datos de un usuario
        $seleccion = "SELECT * FROM usuarios";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 

        // Vector donde se almacenarán los datos del usuario
        $datos = array();
        
        // Si la consulta ha devuelto filas, las procesamos 
        if ($numFilas> 0) { 
            // Es la primera fila la que contiene el campo Contacto
            while ( $fila = mysqli_fetch_array ($resultado) ) {  
                $datos[] = $fila;
            }
        }

        return $datos;
    }

    // Método que comprueba el número de superusuarios que existen en la bd
    public function numeroSuperusuarios() {

        // Ejecutamos una consulta para obtener los datos de un usuario
        $seleccion = "SELECT * FROM usuarios WHERE rol='superusuario'";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);
        
        // Averiguamos cuántas filas ha devuelto la consulta  
        $numFilas = mysqli_num_rows($resultado); 

        return $numFilas;
    }

    // Método que modifica el rol de un usuario determinado
    public function setRolUsuario($emailUsuario, $nuevoRol) {

        // Comprobamos si el usuario al que se le va a modificar el rol es un superusuario
        $datosUsuario = $this->getDatosUsuario($emailUsuario);

        // En caso afirmativo comprobamos el número de superusuarios que hay
        if ($datosUsuario[0]['rol'] == "superusuario") {

            $n_superusuarios = $this->numeroSuperusuarios();

            // Si hay solo un superusuario y el rol al que se le va a cambiar es otro distinto al de superusuario
            // no realizamos la modificación
            if ($n_superusuarios == 1 && $nuevoRol != "superusuario") 
                return false;
        }

        // En otro cualquier caso se permite la actualización
        $seleccion = "UPDATE usuarios SET rol='$nuevoRol' WHERE email='$emailUsuario'";  
        $resultado = mysqli_query ($this->conexionBD, $seleccion);

        return true;
    }
}

?>