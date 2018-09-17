
// Funcion que dependiendo si el panel de edicion de obras esta desplegado o no, lo 
// asocia al botón "botonEdicionObras" la funcionalidad de abrirlo o cerrarlo, respectivamente.
function mostrarFormularioEdicionObras(i, numObras) {

    var isHidden = document.getElementById("editObra" + i);
    
    // Si el panel está desplegado se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("editObra" + i).style.display = "none";
    }
    // Si no está desplegado se despliega y se esconde el de borrar obra
    else if (isHidden.style.display == "none") {

        // Además se cerrarán todos aquellos paneles de edición de las otras obras
            // para que solo hay uno disponible en cada momento
        for (var x = 0; x < numObras; x++) {
            if (i != x) 
                document.getElementById("editObra" + x).style.display = "none";
        }

        document.getElementById("editObra" + i).style.display = "block";
        document.getElementById("borrarObra"+i).style.display = "none";
    }
}

// Funcion que dependiendo si el panel de borrar obras esta desplegado o no, lo 
// asocia al botón "botonBorrarObras" la funcionalidad de abrirlo o cerrarlo, respectivamente.
function mostrarFormularioBorrarObras(i, numObras) {

    var isHidden = document.getElementById("borrarObra" + i);
    
    // Si el panel de ediccion de comentarios está desplegado al pulsar el botón "botonEdicionComentario"
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("borrarObra" + i).style.display = "none";
    }
    else if (isHidden.style.display == "none") {

        // Además se cerrarán todos aquellos paneles de edición de las otras obras
            // para que solo hay uno disponible en cada momento
        for (var x = 0; x < numObras; x++) {
            if (i != x) 
                document.getElementById("borrarObra" + x).style.display = "none";
        }

        document.getElementById("borrarObra" + i).style.display = "block";
        document.getElementById("editObra"+i).style.display = "none";
    }
}


// Funcion que muestra/oculta el panel de borrar videos
function mostrarFormularioEdicionVideos(i) {

    var isHidden = document.getElementById("borrarVideo" + i);
    
    // Si el panel de ediccion de comentarios está desplegado al pulsar el botón "botonEdicionComentario"
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("borrarVideo" + i).style.display = "none";
    }
    else if (isHidden.style.display == "none"){
      document.getElementById("borrarVideo" + i).style.display = "block";
      //document.getElementById("borrarcomentario"+i).style.display = "none";
    }
}


// Funcion que muestra/oculta el panel de borrar foto
function mostrarFormularioEdicionFotos(i) {

    var isHidden = document.getElementById("borrarFoto" + i);
    

    if (isHidden.style.display == "block") {
        document.getElementById("borrarFoto" + i).style.display = "none";
    }
    else if (isHidden.style.display == "none"){
      document.getElementById("borrarFoto" + i).style.display = "block";
      //document.getElementById("borrarcomentario"+i).style.display = "none";
    }
}


// Funcion que muestra/oculta el panel de añadir videos
function mostrarFormularioAniadirGaleria(i) {

    var isHidden = document.getElementById("añadirGaleria" + i);
    

    if (isHidden.style.display == "block") {
        document.getElementById("añadirGaleria" + i).style.display = "none";
    }
    else if (isHidden.style.display == "none"){
      document.getElementById("añadirGaleria" + i).style.display = "block";
      document.getElementById("añadirVideo" + i).style.display = "none";
    }
}
// Funcion que muestra/oculta el panel de añadir videos
function mostrarFormularioAniadirVideo(i) {

    var isHidden = document.getElementById("añadirVideo"+ i);
    

    if (isHidden.style.display == "block") {
        document.getElementById("añadirVideo"+ i).style.display = "none";
    }
    else if (isHidden.style.display == "none"){
      document.getElementById("añadirVideo"+ i).style.display = "block";
      document.getElementById("añadirGaleria"+ i).style.display = "none";
    }
}

// Función que dependiendo de si el panel de comentarios está desplegado o no
// asocia al botón "Comentarios" la funcionalidad de cerrarlo o abrirlo, respectivamente.
function mostrarPanelComentarios() {
    
    // Buscamos en el nodo raiz "document" el nodo cuyo id es "panelComentarios"
    // para modificarle el parámetro de despliegue
    var isHidden = document.getElementById("panelComentarios");
    
    // Si el panel de comentarios está desplegado al pulsar el botón "Comentarios"
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("panelComentarios").style.display = "";
    }
    // Si el panel de comentarios no está desplegado entonces al pulsar el botón "Comentarios"
        // se desplegará
    else{
      document.getElementById("panelComentarios").style.display = "block";

    }
}

//Funcion que dependiendo si el panel de edicion de comentarios esta desplegado o no, lo 
//asocia al botón "botonEdicionComentario" la funcionalidad de abrirlo o cerrarlo, respectivamente.
function mostrarFormularioEdicionComentarios(i) {
    
    // Buscamos en el nodo raiz "document" el nodo cuyo id es "editcomentario"
    // para modificarle el parámetro de despliegue
    var isHidden = document.getElementById("editcomentario" + i);
    
    // Si el panel de ediccion de comentarios está desplegado al pulsar el botón "botonEdicionComentario"
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("editcomentario" + i).style.display = "none";
    }
    // Si el panel de ediccion de comentarios no está desplegado entonces al pulsar el botón "botonEdicionComentario"
        // se desplegará y se cerrará el del borrado para que solo uno de los dos esté activo
    else if (isHidden.style.display == "none"){
      document.getElementById("editcomentario" + i).style.display = "block";
      document.getElementById("borrarcomentario"+i).style.display = "none";
    }
}

//Funcion que dependiendo si el panel de borrar de comentarios esta desplegado o no, lo 
//asocia al botón "botonBorrarComentario" la funcionalidad de abrirlo o cerrarlo, respectivamente.
function mostrarFormularioBorrarComentarios(i) {
    
    var isHidden = document.getElementById("borrarcomentario" + i);
    
    // Si el panel de ediccion de comentarios está desplegado al pulsar el botón "botonBorrarComentarios"
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("borrarcomentario" + i).style.display = "none";
    }
    // Si el panel de ediccion de comentarios no está desplegado entonces al pulsar el botón "botonBorrarComentarios"
        // se desplegará y cerrará el de editar comentarios si está abieto
    else if (isHidden.style.display == "none"){
      document.getElementById("borrarcomentario" + i).style.display = "block";
      document.getElementById("editcomentario"+i).style.display = "none";
    }
}

//Funcion que mostrara el formulario de buscar comentarios
function mostrarFormularioBuscarComentarios() {
 
    var isHidden = document.getElementById("buscaComentarios");
    
    // Si el panel de comentarios está desplegado al pulsar el botón Buscar Comentario
        // se cerrará
    if (isHidden.style.display == "inline-block") {
        document.getElementById("buscaComentarios").style.display = "";
    }
    // Si el panel de  buscar comentarios no está desplegado entonces al pulsar el botón "Buscar Comentarios"
        // se desplegará
    else{
      document.getElementById("buscaComentarios").style.display = "inline-block";

    }

}

//Funcion que mostrara el formulario de añadir OBRAS NUEVAS
function mostrarFormularioAniadirObra() {
 
    var isHidden = document.getElementById("aniadirObra");
    
    // Si el panel de comentarios está desplegado al pulsar el botón Buscar Comentario
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("aniadirObra").style.display = "";
    }
    // Si el panel de  buscar comentarios no está desplegado entonces al pulsar el botón "Buscar Comentarios"
        // se desplegará
    else{
      document.getElementById("aniadirObra").style.display = "block";
      document.getElementById("buscaObra").style.display = "none";

    }

}


//Funcion que mostrara el formulario de buscar Obras
function mostrarFormularioBuscarObras() {
 
    var isHidden = document.getElementById("buscaObra");
    
    // Si el panel de comentarios está desplegado al pulsar el botón Buscar Comentario
        // se cerrará
    if (isHidden.style.display == "block") {
        document.getElementById("buscaObra").style.display = "";
    }
    // Si el panel de  buscar comentarios no está desplegado entonces al pulsar el botón "Buscar Comentarios"
        // se desplegará
    else{
      document.getElementById("buscaObra").style.display = "block";
      document.getElementById("aniadirObra").style.display = "none";
    }

}




// Función que hace visible el formulario para editar el rol y le otorga el valor del rol
// dependiendo del usuario correspondiente al botón clickado
function mostrarRolUsuario (i) {

    var isHidden = document.getElementById("editarRol"+i);

    // Comprobamos si el formulario para cambiar el rol está visible o no. Si lo está se podrá cerrar
    // con el mismo botón de editar rol. Sino se activará su visualización
    if (isHidden.style.display == "block") {
        document.getElementById("editarRol"+i).style.display = "none";
    }
    else {
        document.getElementById("editarRol"+i).style.display = "block";
    }
}

// Función que valida la estructura del correo electrónico introducido, independientemente de qué formulario provenga
function validarEstructuraEmail(emailIntroducido) {

    // En primer lugar buscamos los dos caracteres especiales que todo e-mail debe tener: el arroba (@) y el punto
    // En el caso de este último buscamos la última aparición puesto que el nickname puede contener puntos
    var pos_arroba = emailIntroducido.indexOf("@");
    var pos_punto = emailIntroducido.lastIndexOf(".");

    // VERIFICACIÓN DE LA ESTRUCTURA DEL E-MAIL
    // Para que la estructura sea correcta debe cumplir una serie de requisitos. 
    // En otro caso se le mandará un mensaje al usuario
        // 1.- El carácter @ debe estar a partir de la posición 1 ya que antes de este caracter debe de existir 
            // una cadena que sea distinta del espacio en blanco o tabulación (/\s/)
        // 2.- El punto debe estar como mínimo dos posiciones más adelante que el @, de esta manera nos aseguramos que
            // antes del punto y después del @ hay una cadena distinta del espacio en blanco o tabulación (/\s/)
        // 3.- Además verificamos que tras el punto exista algún carácter que represente la extensión y que sea
            // distinto del espacio en blanco o tabulación (/\s/)
    if (pos_arroba < 1 || pos_punto < pos_arroba+2 || pos_punto+1 >= emailIntroducido.length || (/\s/).test(emailIntroducido)) {
        alert("La dirección de e-mail introducida no es válida");
        return false;
    }
    else {
        return true;
    }
}

// Función que se ejecutará cada vez que tecleemos para comprobar que no hemos escrito ninguna palabra prohibida 
function checkPalabras(forbidden) {

    var prohibidas = forbidden;

    // Guardamos en una variable el contenido del contenedor del comentario
    var text = document.getElementById('text_comentario').value;

    // Iteramos por las distintas variables prohibidas, y en caso de encontrarlas mostramos un mensaje de alerta 
    for (var x=0;x<prohibidas.length;x++) 
    {
        // Creamos una expresión regular para identificar las palabras prohibidas. 
        // Con el parámetro "i" se diferencian mayúsculas y minúsculas
        // Con el metacaracter "\\b" cubrimos los casos de palabras compuestas en las que la palabra prohibida
            // se encuentra justo al final de la palabra, por ejemplo: "huetecaca" 
        // Y con el metacaracter "\\s" evitamos que se tachen como prohibidas palabras compuestas que al comienzo contienen
            // alguna de las palabras prohibidas, como por ejemplo: "cacahuete"
        var regExp = new RegExp("\\b" + prohibidas[x] + "\\s", "i");
        
        // La palabra baneada sera sustituida por tantos asteriscos como letras contenga
        // Para ello usamos la función repeat() que repite el caracter '*' tantas veces
            // como sea la longitud de la palabra prohibida
        var stars = "*".repeat(prohibidas[x].length);

        // Mensaje de aviso al detectar la palabra prohibida
        if (text.search(regExp) !== -1) {
            alert('La palabra '+prohibidas[x]+' no esta permitida!');
        }

        // Reemplazamos la palabra prohibida
        text = text.replace(regExp,stars);

    }

    // Actualizamos el valor del texto de comentario
    document.getElementById('text_comentario').value = text;                   
}

//Funcion para abrir una ventana con una aviso de publicacion de mensaje en Twitter
function enviarMensajeTwitter(nombre, imagen)
{
    //Creamos un objeto ventana, con parametros como el tamaño definido
    //Luego la abrimos introduciendo el texto y las variables de la BD
    var myWindow = window.open("", "_blank","width=800,height=600");
    myWindow.document.write  ('<HTML><HEAD><TITLE>Centered Window</TITLE></HEAD><BODY><FORM    NAME="form1">' +
        ' <H4>Se publicara en Twitter el siguiente mensaje:</H4>Me encanta la obra "' + nombre +
        '"!! via @MuseoSubAcuaticoUGR. ' +' <br />'  + '<img src="../Imagenes/' + imagen +'">' + ' <br />'  +
        '<INPUT TYPE="button" VALUE="Aceptar"onClick="window.close();"></FORM></BODY>   </HTML>');
}

//Funcion para abrir una ventana con una aviso de publicacion de mensaje en Facebook
function enviarMensajeFacebook(nombre, imagen)
{
    //Creamos un objeto ventana, con parametros como el tamaño definido
    //Luego la abrimos introduciendo el texto y las variables de la BD
    var myWindow = window.open("", "_blank","width=800,height=600");
    myWindow.document.write  ('<HTML><HEAD><TITLE>Centered Window</TITLE></HEAD><BODY><FORM    NAME="form1">' +
        ' <H4>Se publicara en Facebook el siguiente mensaje:</H4>Me encanta la obra "' + nombre +
        '"!! via @MuseoSubAcuaticoUGR. ' +' <br />'  + '<img src="../Imagenes/' + imagen +'">' + ' <br />'  +
        '<INPUT TYPE="button" VALUE="Aceptar"onClick="window.close();"></FORM></BODY>   </HTML>');
}

//Funcion para abrir una ventana con una aviso de publicacion de mensaje en Instagram
function enviarMensajeInstagram(nombre, imagen)
{
    //Creamos un objeto ventana, con parametros como el tamaño definido
    //Luego la abrimos introduciendo el texto y las variables de la BD
    var myWindow = window.open("", "_blank","width=800,height=600");
    myWindow.document.write  ('<HTML><HEAD><TITLE>Centered Window</TITLE></HEAD><BODY><FORM    NAME="form1">' +
        ' <H4>Se publicara en Instagram el siguiente mensaje:</H4>Me encanta la obra "' + nombre +
        '"!! via @MuseoSubAcuaticoUGR. ' +' <br />'  + '<img src="../Imagenes/' + imagen +'">' + ' <br />'  +
        '<INPUT TYPE="button" VALUE="Aceptar"onClick="window.close();"></FORM></BODY>   </HTML>');
}