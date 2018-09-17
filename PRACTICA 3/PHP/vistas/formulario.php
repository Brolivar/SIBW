<!-- Botón que una vez pulsado ejecuta la función mostrarPanelComentarios que se
	encarga de hacer visible el panel de comentarios-->
<button id="botonComentarios" onclick="mostrarPanelComentarios()">Comentarios</button>

<!-- Panel de comentarios -->
<div id="panelComentarios">

<?php require("controladores/controlador_Comentarios.php"); ?>
	<div class="comentario">
		<?php

			// Mostramos los comentarios almacenados en la bd dentro del panel
	        for ($i = 0; $i < $n_comentarios; $i++) {
	        	echo $comentarios[$i]["Nombre"];
       			echo $comentarios[$i]["Comentario"];

       			// Formateamos la fecha antes de mostrarla para que tenga este aspecto: dia/mes/año hora:minutos:segundos
       			$fecha_formateada = date('d/m/y H:i:s', strtotime($comentarios[$i]["FechaYHora"]));
      		  	echo "<p>Fecha y hora: ".$fecha_formateada."</p>";
		    }

		?>
	</div>

<?php 

	// La acción de comentar solo estará disponible para aquellos usuarios que se hayan registrado previamente
	if(isset($_SESSION['usuario'])) {
	?>
		<!-- Formulario para los comentarios: contiene un nombre para identificarlo
	    y el evento que permite ejecutar una función cuando se pulse el botón "Enviar".
	    En este caso la función comprobará los datos introducidos y añadirá o no el comentario.-->
		<h3>Añadir comentario</h3>

	 	    <!-- Para enviar los datos sin que se vean en la URL utilizamos post-->
			<form name="miFormulario" method="POST">
			    <!-- Campos del formulario -->
			    <p>Nombre</p>
			    <p> <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario'] ?>" readonly></p>
			    <p>E-mail</p>
			    <p> <input type="text" name="email" id="email" value="<?php echo $_SESSION['correo'] ?>" readonly></p>
			    <p>Comentario</p>
			    <!--- Cada vez que tecleamos, se realiza una comprobación de vocabulario, usamos json encode para pasar la lista de palabras prohibidas como parametro de la funcion -->
			    <p><textarea id="text_comentario" name="text_comentario" onkeyup= 'checkPalabras(<?php echo json_encode($prohibidas); ?>)' required></textarea></p>
				
			    <!-- Botón para enviar el contenido -->
			    <input type="submit" value="Enviar">
			</form>


	<?php
	}
?>
</div>

<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>


<!--			    <p><strong>Nombre:  <?php  echo $_SESSION['usuario'] ?></strong></p> -->