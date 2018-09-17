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

// Función que añade los datos ya validados introducidos en el formulario
// al resto de comentarios existentes.
function escribirComentario(nombre, comentario) {

    // Obtenemos un objeto de la clase Date por el cual accederemos a la fecha
    // y la hora actual
    var date = new Date();
    var fecha_hora_actual = date.toLocaleString();
    
    // Obtenemos el nodo que representa el panel de comentarios buscando desde
    // la raiz del html (document)
    var panel = document.getElementById("panelComentarios");
    
    // Elaboramos el código HTML necesario para incluir el comentario como un
    // nodo más en el html
    var nuevoComentario = 
            '<div class="comentario">'+
            '<p><strong>Autor: '+nombre+'</strong></p>'+
            '<p>Fecha y hora: '+fecha_hora_actual+'</p>'+
            '<p>Comentario: '+comentario+'</p>'+
            '</div>';
    
    // Con la función insertAdjacentHTML añadimos el código HTML anterior
    // de modo que el nuevo comentario estará por encima de los anteriores
    // Por lo que los primeros comentarios serán los más recientes
    panel.insertAdjacentHTML('afterbegin', nuevoComentario);
    
    // Mensaje de agradecimiento por introducir el comentario
    alert("¡Gracias por dejar su comentario!");
            
}

// Función que se ejecuta tras pulsar el botón "Enviar" y cuyo fin es comprobar
// la validez de los datos introducidos y si se han completado todos los campos 
function validarDatos() {

    // En primer lugar obtenemos los valores correspondientes a los nodos que contengan
    // el nombre, el e-mail y el texto del comentario del formulario
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    var texto_comentario = document.getElementById("text_comentario").value;

    // A continuación comprobamos si alguno de los campos no se ha completado, bien porque
    // no se haya introducido o porque se haya completado con espacios en blanco o tabuladores.
    // Para ello usaremos la siguiente función:
        // trim(): devuelve la cadena introducida y le quita los espacios en blanco. Por lo que si alguno de los
            // tres campos han sido rellenados con espacios en blanco o tabulaciones al quitarlos resultará la cadena vacía.
    // En caso de no superar alguna de estas tres condiciones se le avisará al usuario a través de una ventana
    if (nombre.trim() == "") {
        alert("Debe escribir el nombre");
        return false;
    }

    if (email.trim() == "") {
        alert("Debe escribir el e-mail");
        return false;
    }

    if (texto_comentario.trim() == "") {
        alert("Debe escribir el comentario");
        return false;
    }
    
    // Si se ha introducido contenido en el campo e-mail verificamos que su
    // estructura sea correcta: cadena@cadena.extensión
    else {

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
        
        // Llegados a este punto todos los campos han sido rellenados correctamente y solo queda añadir el comentario
        // a través de la función escribirComentario
        escribirComentario(nombre, texto_comentario);

        // Tras haber escrito el comentario se borran los campos para ser rellenados de nuevo
        document.getElementById('nombre').value = "";
        document.getElementById('email').value = "";
        document.getElementById('text_comentario').value = "";
    }
}

// Función que se ejecutará cada vez que tecleemos para comprobar que no hemos escrito ninguna palabra prohibida 
function checkPalabras() {

    // Guardamos en esta variable las palabras prohibidas.
    var prohibidas = ['caca','idiota', 'imbecil'];

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


