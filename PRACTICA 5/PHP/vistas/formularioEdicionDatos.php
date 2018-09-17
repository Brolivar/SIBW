
<!-- Botón para desplegar el formulario de edición de los datos del usuario identificado actual -->
<!--<button id="botonEdicionDatos" onclick="mostrarFormularioEdicion()">Modificar mis datos</button> -->

<!-- Panel de comentarios -->
<div id="panelEdicionDatos">

	<?php 

		// La acción de editar los datos solo estará disponible cuando haya un usuario registrado
		if(isset($_SESSION['correo'])) {
		?>
			<!-- El formulario estará compuesto por todos los campos que se almacenan en la base de datos
				acerca de los usuarios. Además tendrán el contenido que se haya guardado con la posibilidad
				de que el usuario pueda modificarlos.-->
			<h3>Mis datos personales</h3>


	 	    <!-- Para enviar los datos sin que se vean en la URL utilizamos post-->
			<form id="formularioDatos" action ="?login" method="POST">
				<?php 
			    	$datosUsuarioActual = $modeloUsuarios->getDatosUsuario($_SESSION["correo"]);
			    ?>
		    	<p>Nickname o nombre de usuario: <input type="text" name="nicknameNuevo" id="nicknameNuevo" value="<?php echo $datosUsuarioActual[0]['nickname']?>" required></p>
        		<p>Contraseña: <input type="text" name="claveNueva" id="claveNueva" value="<?php echo $datosUsuarioActual[0]['clave']?>" required></p>
        		
				<p>Correo electrónico: <input ID ="emailNuevo" type="text" value="<?php echo $datosUsuarioActual[0]['email']?>" name="emailNuevo"  required></p>
        		<p>Nombre: <input type="text" name="nombreNuevo" id="nombreNuevo" value="<?php echo $datosUsuarioActual[0]['nombre']?>" required ></p>
        		<p>Apellidos: <input type="text" name="apellidosNuevos" id="apellidosNuevos" value="<?php echo $datosUsuarioActual[0]['apellidos']?>" required></p>
        		<p>Rol: <input type="text" name="rolUsuario" id="rolUsuario" value="<?php echo $datosUsuarioActual[0]['rol']?>" readonly></p>

			    <!-- Botón para actualizar los datos -->
			    <input type = "submit" ID ="actualizarDatos" onclick="return validarEstructuraEmail(emailNuevo.value)" value="Actualizar" />
			</form>
		<?php
		}
	?>
</div>

<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>