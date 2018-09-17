
<?php
	require("controladores/controlador_Comentarios.php");

	// Si el rol del usuario es moderador o superusuario, podrá buscar comentarios
	if (isset($_SESSION['rol'])) {
		
	    if (($_SESSION['rol']) == "moderador" || ($_SESSION['rol']) == "superusuario") { 
	    	?>
	    	<!-- Boton para buscar comentarios: abre y cierra el formulario -->	
			<button id="botonBuscarComentarios" onclick="mostrarFormularioBuscarComentarios()">Buscar Comentario</button>

			<!-- Contenedor que incluye la zona del output -->	
			<div id="buscaComentarios">

				<form name="BuscarCommentForm" method="POST">
					<p> <input type="text" name="comentarioBuscar" ID="comentarioBuscar" placeholder="Introduzca el comentario a buscar" required></p>	
					<input type="submit" ID ="buscarComent" value="Buscar" />
				</form>

				<!-- Si hemos encontrado un comentario buscado previamente, lo mostramos -->	
				<?php 

				//Si existe una lista de comentarios encontrados se muestra, si no 
				// se muetra un mensaje para indicar que la busqueda no ha tenido exito.
				//Todo esto se muestra al abrir la pestaña de búsqueda de comentarios
				//En un Futuro se implementará los botones para estos
				if(isset($listaComent)){
					?> <h4>Búsqueda con éxito. Los comentarios son: </h4>  <?php
					for($i = 0; $i < count($listaComent); $i++){
						echo $listaComent[$i]["Nombre"];
		       			$fecha_formateada = date('d/m/y H:i:s', strtotime($listaComent[$i]["FechaYHora"]));
		      		  	echo "<p>Fecha y hora: ".$fecha_formateada."</p>";
		      		  	echo $listaComent[$i]["Comentario"];
					}	
				}	
				else{
					?> <h4>Búsqueda sin éxito</h4> <?php
				}

				?> <h4> -- Fin de Búsqueda -- </h4>
				
			</div>
		<?php 
	    }
	}		
?>

<!-- Botón que una vez pulsado ejecuta la función mostrarPanelComentarios que se
	encarga de hacer visible el panel de comentarios-->
<button id="botonComentarios" onclick="mostrarPanelComentarios()">Comentarios</button>

<!-- Panel de BUSQUEDA DE COMENTARIOS -->
<div id="panelComentarios">

	<div class="comentario">
		<?php

			// Mostramos los comentarios almacenados en la bd dentro del panel
	        for ($i = 0; $i < $n_comentarios; $i++) {
	        	echo $comentarios[$i]["Nombre"];
       			echo $comentarios[$i]["Comentario"];

       			// Formateamos la fecha antes de mostrarla para que tenga este aspecto: dia/mes/año hora:minutos:segundos
       			$fecha_formateada = date('d/m/y H:i:s', strtotime($comentarios[$i]["FechaYHora"]));
      		  	echo "<p>Fecha y hora: ".$fecha_formateada."</p>";


      		  if (isset($_SESSION['rol'])){

      		  	// Si el usuario es moderador, tendra un panel para modificar o borrar comentarios
				if (($_SESSION['rol']) == "moderador" || ($_SESSION['rol']) == "superusuario") { 
				?>
					<!-- BOTON EDICION COMENTARIOS: muestra y cierra el formulario -->	
					<input type="image" id="botonEdicionComentarios" src="../Imagenes/iconoEdicionComentario.png" onclick="mostrarFormularioEdicionComentarios(<?php echo $i ?>)"></button>
					<!-- BOTON BORRAR COMENTARIO: muestra el botón para confirmar la acción -->	
					<input type="image" id="botonBorrarComentarios" src="../Imagenes/iconoBorrarComentario.png" onclick="mostrarFormularioBorrarComentarios(<?php echo $i ?>)"></button>

						
					<!-- FORMULARIO EDICION COMENTARIOS -->	
					<?php 
						echo "<div id='editcomentario" . $i . "' style='display:none' >"; 
					?>

						<form name="EditCommentForm" method="POST">
							<!-- NO MOSTRAMOS LA FECHA PORQUE NO SE VA A MODIFICAR -->
			    			<p><input type="text" style='display:none' name="fechaComent" ID="fechaComent" value="<?php echo $comentarios[$i]["FechaYHora"] ?>" readonly></p>	
			    			<p> <input type="text" name="comentarioNuevo" ID="comentarioNuevo" value="<?php echo $comentarios[$i]["Comentario"]  ?>" required></p>
           					
           					<input type="submit" ID ="modifComent" value="Editar comentario" />
						</form>
					<?php echo "</div>" ?>

					<!-- FORMULARIO BORRAR COMENTARIOS -->	
					<?php echo "<div id='borrarcomentario" . $i . "' style='display:none' >"; ?>
						<!-- Formulario DE BORRAR COMENTARIOS -->
						<form name="BorrarComentForm" method="POST">

							<!-- NO MOSTRAMOS LOS CAMPOS PORQUE NO HAY QUE MOSTRAR NINGÚN FORMULARIO EN BORRAR-->
							<p> <input type="text" style='display:none' name="nombreBorrar" ID="nombreBorrar" value="<?php echo $comentarios[$i]["Nombre"]  ?>" readonly></p>
			    			<p> <input type="text" style='display:none' name="comentarioBorrar" ID="comentarioBorrar" value="<?php echo $comentarios[$i]["Comentario"]  ?>" readonly></p>
			    			<p> <input type="text" style='display:none' name="fechaComentBorrar" ID="fechComent" value="<?php echo $comentarios[$i]["FechaYHora"]  ?>" readonly></p>	
           					
           					<input type="submit" ID ="BorrarComent" value="Borrar comentario" />
						</form>
					<?php echo "</div>" ?>

        		<?php
      		  	}		// == moderador
      		  } 		// isset(...)
		    }
		?>
	</div>

<?php 

	// La acción de comentar solo estará disponible para aquellos usuarios que se hayan registrado previamente
	if (isset($_SESSION['nickname'])) {
	?>
		<!-- Formulario para los comentarios: contiene un nombre para identificarlo
	    y el evento que permite ejecutar una función cuando se pulse el botón "Enviar".
	    En este caso la función comprobará los datos introducidos y añadirá o no el comentario.-->
		<h3>Añadir comentario</h3>

	 	    <!-- Para enviar los datos sin que se vean en la URL utilizamos post-->
			<form name="miFormulario" method="POST">
			    <!-- Campos del formulario -->
			    <p>Nombre</p>
			    <p> <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nickname'] ?>" readonly></p>
			    <p>E-mail</p>
			    <p> <input type="text" name="email" id="email" value="<?php echo $_SESSION['correo'] ?>" readonly></p>
			    <p>Comentario</p>
			    <!--- Cada vez que tecleamos, se realiza una comprobación de vocabulario, usamos json encode para pasar la lista de palabras prohibidas como parametro de la funcion -->
			    <p><textarea id="text_comentario" name="text_comentario" onkeyup='checkPalabras(<?php echo json_encode($prohibidas); ?>)' required></textarea></p>
				
			    <!-- Botón para enviar el contenido -->
			    <input type="submit" id="botonEnviarComentarios" value="Enviar">
			</form>


	<?php
	}
?>
</div>

<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>