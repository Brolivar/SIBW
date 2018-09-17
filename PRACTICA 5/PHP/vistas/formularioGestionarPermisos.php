
<!-- Botón para desplegar el formulario de edición de los datos del usuario identificado actual -->
<!--<button id="botonEdicionDatos" onclick="mostrarFormularioEdicion()">Modificar mis datos</button>-->

<!-- Panel de comentarios -->
<div id="panelGestionPermisos">

	<?php 
		// La acción de editar los datos solo estará disponible cuando haya un usuario registrado
		if(isset($_SESSION['rol']) && $_SESSION['rol'] == "superusuario") {
		?>
			<!-- El formulario estará compuesto por el nickname y el correo de todos los usuarios registrados en la bd
				y su rol para poder modificarlo.-->
			<h3>Lista de usuarios existentes y sus roles</h3>

	 	    <!-- Para enviar los datos sin que se vean en la URL utilizamos post-->
			
			<?php 
				// Obtenemos los datos de todos los usuarios
		    	$datosUsuarios = $modeloUsuarios->getDatosUsuarios();

		    	// Recorremos todos los usuarios mostrando su email y un botón para permitir la modificación de su respectivo rol
		    	for ($i=0; $i < count($datosUsuarios); $i++) { ?>
		
					<p>Correo electrónico: <input ID ="emailUsuario" type="text" value="<?php echo $datosUsuarios[$i]['email']?>" name="emailUsuario" readonly></p>
					<input type="image" id="botonEditarRol" src="../Imagenes/iconoEditarRol.png" onclick="mostrarRolUsuario(<?php echo $i ?>)"></button>
				
					<!-- Generamos un formulario que estará oculto hasta que se pulse el botón asociado a un usuario -->
					<?php 
						echo "<div id='editarRol" . $i . "' style='display:none' >"; 
					?>
						<form id="formularioPermisos" action="?plantillaGestionPermisos" method="POST">

							<!-- Añado en el formulario el campo de email pero sin visualizar para poder identificar al usuario al que se le ha modificado el rol -->
							<input id="emailUsuario" style='display:none' type="text" value="<?php echo $datosUsuarios[$i]['email']?>" name="emailUsuario" readonly>
							<!-- Mostramos el rol actual en solo lectura para que el superusuario siempre tenga claro qué rol corresponde al usuario -->
							<p>Rol actual del usuario: <input id="rolActual" type="text" value="<?php echo $datosUsuarios[$i]['rol']?>" name="rolActual" readonly></p>

							<!-- Lista con distintas opciones correspondientes a los diferentes roles válidos que hay en nuestra bd -->
							<p>Lista de roles disponibles para escoger</p>
							<select id="nuevoRol" name="nuevoRol">    
						       <option value="registrado" selected="selected">Registrado</option>
						       <option value="gestor">Gestor</option>
						       <option value="moderador">Moderador</option>
						       <option value="superusuario">Superusuario</option>
						   </select>

						    <!-- Botón para actualizar los datos -->
						    <input type = "submit" id="botonActualizarRol" value="Actualizar rol" />
						</form>
					<?php echo "</div>" ?>
			<?php } 
		}
	?>
</div>

<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>