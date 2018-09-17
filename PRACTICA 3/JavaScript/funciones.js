/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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


function validarRegistro(){

    var email = document.getElementById("correo").value;

    // En primer lugar buscamos los dos caracteres especiales que todo e-mail debe tener: el arroba (@) y el punto
    // En el caso de este último buscamos la última aparición puesto que el nickname puede contener puntos
    var pos_arroba = email.indexOf("@");
    var pos_punto = email.lastIndexOf(".");

    // VERIFICACIÓN DE LA ESTRUCTURA DEL E-MAIL
    // Para que la estructura sea correcta debe cumplir una serie de requisitos. 
    // En otro caso se le mandará un mensaje al usuario
        // 1.- El carácter @ debe estar a partir de la posición 1 ya que antes de este caracter debe de existir 
            // una cadena que sea distinta del espacio en blanco o tabulación (/\s/)
        // 2.- El punto debe estar como mínimo dos posiciones más adelante que el @, de esta manera nos aseguramos que
            // antes del punto y después del @ hay una cadena distinta del espacio en blanco o tabulación (/\s/)
        // 3.- Además verificamos que tras el punto exista algún carácter que represente la extensión y que sea
            // distinto del espacio en blanco o tabulación (/\s/)
    if (pos_arroba < 1 || pos_punto < pos_arroba+2 || pos_punto+1 >= email.length || (/\s/).test(email)) {
        alert("La dirección de e-mail introducida no es válida");
        return false;
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