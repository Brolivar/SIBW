
<h2> Lista de Obras: </h2>

<?php 

	if (isset($todasObras)) {

		$c = 0;		//Contador que usaremos exclusivamente para movernos por el array de IDs de videos.
		$g = 0;		//Contador que usaremos exclusivamente para movernos por el array de IDs de galerias.

		// Variable para conocer el número de obras que hay guardadas en la base de datos
		// La utilizaremos para esconder todos aquellos formulares de edición del resto de obras excepto de la que se va a modificar
		$numObras = count($todasObras);
		?>
		<div id="listaObras">
		<?php
	        for ($i = 0; $i < count($todasObras); $i++) {

        		echo "<div id='obraEnLaLista'> ".($i+1). ": <a href='?obra=" . $todasObras[$i]["ID"]. "'>" . $todasObras[$i]["Titulo"] . "</a></div>"; 
				
				$colecciones =  $modeloObra->getColeccionDeObra($todasObras[$i]["ID"]);
	    		$todasVideos[] = $modeloObra->getVideosObra($todasObras[$i]["ID"]);
				$todasGalerias[] = $modeloObra->getGaleria($todasObras[$i]["ID"]); 

	        	// Si el rol de usuario es gestor o superusuario
	        	if (($_SESSION['rol']) == "gestor" || ($_SESSION['rol']) == "superusuario") { ?>

	        		<!-- BOTÓN EDICION OBRAS: muestra el formulario de edición de la obra seleccionada y cierra los formularios de edición
	        			del resto de obras para que solo haya un formulario de edición disponible. Así evitamos confusiones -->
					<input type="image" id="botonEdicionObras" src="../Imagenes/iconoeditarObra.png" onclick="mostrarFormularioEdicionObras(<?php echo $i; ?>, <?php echo $numObras; ?>)"></button>

					<!-- BOTÓN BORRAR OBRAS: muestra el formulario de borrado de la obra seleccionada y cierra los formularios de borrado
    	    			del resto de obras para que solo haya un formulario de borrado disponible. Así evitamos confusiones -->
					<input type="image" id="botonBorrar" src="../Imagenes/borrarObra.png" onclick="mostrarFormularioBorrarObras(<?php echo $i; ?>, <?php echo $numObras; ?>)"></button>

					<?php echo "<div id='editObra" . $i . "' style='display:none' >"; ?>

						<!-- Botón para abrir el formulario de adición de vídeos -->
			    		<input type="button" id="botonAniadirVideo" value="Añadir Vídeo" onclick="mostrarFormularioAniadirVideo(<?php echo $i ?>)"></button>

			    		<!-- Formulario para añadir vídeos a una obra específica -->
		    			<form name="formularioAniadirVideo" id="formularioAniadirVideo" method="POST" >
							<!-- DIV QUE SE MUESTRA AL PULSAR EL BOTON DE AÑADIR VIDEO, AL DARLE A AÑADIR, SE ENVIARA UN POST Y SE AGREGARA DESDE EL MODELO-->
							<?php 
								echo "<div id='añadirVideo" . $i . "' style='display:none' >"; 
							?>
								<p> <input type="text"  name="urlVideonuevo" ID="urlVideonuevo" placeholder="Introduzca la url del video" required ></p>
								<p><input type="text" style='display:none' name="IdObraVideoNuevo" ID="IdObraVideoNuevo" value="<?php echo $todasObras[$i]["ID"] ?>" readonly></p>
	       						
	       						<input type="submit" ID ="botonConfirmarAdicionVideo" name="botonConfirmarAdicionVideo" value="Añadir" />
							</div>
						</form>


						<!-- Botón para abrir el formulario para añadir fotos a la galería de una obra en concreto -->
			    		<input type="button" id="botonAniadirGaleria" value="Añadir foto a la galeria" onclick="mostrarFormularioAniadirGaleria(<?php echo $i ?>)"></button>
			    	
			    		<!-- Formulario para añadir fotos a una galería de una obra -->
			    		<form name="formularioAniadirFotoGaleria" id="formularioAniadirFotoGaleria" method="POST" >
							<!-- DIV QUE SE MUESTRA AL PULSAR EL BOTON DE AÑADIR Galeria, AL DARLE A AÑADIR, SE ENVIARA UN POST Y SE AGREGARA DESDE EL MODELO-->
							<?php 
								echo "<div id='añadirGaleria" . $i . "' style='display:none' >"; 
							?>
								<p> <input type="text"  name="urlFotoNueva" ID="urlFotoNueva" placeholder="Introduzca la ruta de la imagen" required ></p>
								<p><input type="text" style='display:none' name="IdObraFotoNueva" ID="IdObraFotoNueva" value="<?php echo $todasObras[$i]["ID"] ?>" readonly></p>
	       						
	       						<input type="submit" ID ="botonConfirmarAdicionFoto" name="botonConfirmarAdicionFoto" value="Añadir" />
							</div>
						</form>


						<!-- FORMULARIO EDICION OBRAS -->	
						<form name="formularioEdicionObras" id="formularioEdicionObras" method="POST" >

							<!-- NO MOSTRAMOS EL ID, solo lo dejamos para identificar la obra -->
			    			<p><input type="text" style='display:none' name="ModIdObra" ID="ModIdObra" value="<?php echo $todasObras[$i]["ID"] ?>" readonly></p>
			    			<p> Título de la obra:  <input type="text" name="ModTitulo" ID="ModTitulo" value="<?php echo $todasObras[$i]["Titulo"]  ?>" required></p>

			    			<p> Colección Actual:  <input type="text" name="ActualColeccion" ID="ActualColeccion" value="<?php echo $colecciones ?>" readonly></p>	
							
							<p>Lista de Colecciones a Escoger: </p>
							<select id="ModColeccion" name="ModColeccion">    
						       <option value="Prehistórica" selected="selected">Prehistórica</option>
						       <option value="Preclásica">Preclásica</option>
						       <option value="Romana">Romana</option>
						   </select>

			    			<p> Imagen:  <input type="text" name="ModImagen" ID="ModImagen" value="<?php echo $todasObras[$i]["Imagen"]  ?>" required></p>

			    			<p> Descripción de la obra: <textarea name="ModDescripcion" ID="ModDescripcion" required>
								<?php echo htmlspecialchars($todasObras[$i]["descripcion"])?>
			    			</textarea> </p>


			    			<!-- ZONA DE VÍDEOS -->
			    			<?php

							for ($j=0; $j < count($todasVideos[$i]); $j++) { 

								if( isset($todasVideos[$i][$j]) )
								{ 
									// Mostramos el campo donde esta la url de los videos de la obra, y tambien un boton para borrar dicho video 
									echo "<p>Vídeo número " .($j+1). " : </p>"; ?>
									<p> <input type="text" style="width: 100%; height: 5%; box-sizing: border-box; border: 1px solid lightseagreen; 
										border-radius: 4px;" name="ModVideos[]" ID="ModVideos[]" value="<?php echo $todasVideos[$i][$j] ?>" required> </p>

									<!-- A partir de aqui, añadimos un boton para borrar videos de una obra--> 
				    				<input type="button" id="botonBorrarVideos" src="../Imagenes/borrarvideo.png" onclick="mostrarFormularioEdicionVideos(<?php echo $c ?>)"></button></p>
				    				
			    					<p><input type="text" style='display:none' name="ModIdVideo[]" ID="ModIdVideo[]" value="<?php echo $idVideos[$c]?>"></p>

									<!-- DIV QUE SE ABRE AL PULSAR EL BOTON DE BORRAR VIDEO -->
									<?php echo "<div id='borrarVideo" . $c . "' style='display:none' >"; ?>
										<p> <input type="text" style='display:none' name="idvBorrar" ID="idvBorrar" value="<?php echo $idVideos[$c]?>"></p>
       									<input type="submit" ID ="botonConfirmarBorrarVideos" name="botonConfirmarBorrarVideos" value="Borrar Vídeo" />
									</div>

								<?php
									$c++;		// Incrementa el contador que identificara el ID de los videos de las obras
								}	
							} ?>


							<!-- ZONA DE FOTOS DE LAS GALERÍAS -->
							<?php

							// Recorremos todas las galerias, mostrando la ruta de la imagen y SU ID
							for ($k=0; $k < count($todasGalerias[$i]); $k++) { 		

								if( isset($todasGalerias[$i][$k]) )
								{
									echo "<p>Foto número " .($k+1). " de la galería: </p>"; ?>
									<p> <input type="text" style="width: 100%; height: 5%; box-sizing: border-box; border: 1px solid lightseagreen; 
										border-radius: 4px;"name="ModVideoGaleria[]" ID="ModVideoGaleria[]" value="<?php echo $todasGalerias[$i][$k] ?>" required> </p>

				    				 <!-- A partir de aqui, añadimos un boton para borrar fotos de la galería de una obra--> 
				    				<input type="button" id="botonBorrarFoto" src="../Imagenes/borrarfoto.png" onclick="mostrarFormularioEdicionFotos(<?php echo $g ?>)"></button>
									<p><input type="text" style='display:none' name="ModIdGaleria[]" ID="ModIdGaleria[]" value="<?php echo $idGalerias[$g]?>"></p>


									<!-- DIV QUE SE ABRE AL PULSAR EL BOTON DE BORRAR FOTO -->
									<?php echo "<div id='borrarFoto" . $g . "' style='display:none' >"; ?>
											<p> <input type="text" style='display:none' name="idgBorrar" ID="idgBorrar" value="<?php echo $idGalerias[$g]?>"></p>
	       									<input type="submit" ID ="botonConfirmarBorrarFoto" name="botonConfirmarBorrarFoto" value="Borrar Foto" />
									</div>
						
								  <?php
									  $g++;	// Incrementa el contador que identificara el ID de las galerías de las obras
								}
							} ?> 

		    				<input type="submit" ID ="modifObra" value="Actualizar Obra" name="modifObra" />
		    			</form>

		    		</div> <!-- Fin del formulario de edición de las obras -->

		    		<!-- FORMULARIO BORRAR OBRAS -->	
					<?php 
						echo "<div id='borrarObra" . $i . "' style='display:none' >"; 
					?>

					<form name="BorraObraForm" method="POST">
						<p> <input type="text" style='display:none' name="idObraBorrar" ID="idObraBorrar" value="<?php echo $todasObras[$i]["ID"]?>" readonly></p>
	       				<input type="submit" ID ="BorrarObra" name="BorrarObra" value="Borrar" />
					</form>

					<?php echo "</div>";
	        	
				}

	        }?>

        </div>

    <?php } 


    if (($_SESSION['rol']) == "gestor" || ($_SESSION['rol']) == "superusuario") { ?>
      
		<!--Botones para abrir los paneles de añadir Obras y Buscarlas -->
		<button id="botonBuscarObras" onclick="mostrarFormularioBuscarObras()">Buscar obras</button>
		<button id="botonAniadirObras" onclick="mostrarFormularioAniadirObra()">Añadir nueva obra</button>

		<!-- Panel de BUSQUEDA DE OBRAS -->
		<div id="buscaObra">

			<form name="formularioBuscarObra" method="POST">
				<textarea placeholder="Escribe la descripcion de la obra a buscar" name="buscarDescripcionObra" ID="buscarDescripcionObra" required></textarea> 
				<input type="submit" ID ="botonBuscar" name="botonBuscar" value="Buscar" />
			</form>

			<!-- Si hemos encontrado una obra buscada previamente, la mostramos -->	
			<?php 
			
				require("controladores/controlador_Obras.php");

				// Al encontrar la obra buscada mostramos un mensaje con su ID y su Titulo.
				// Si no la encontramos mostramos un mensaje de error
				if (isset($listaObrasBusc)) { ?>

					<h4>Búsqueda con éxito. Las obras que coinciden con la búsqueda son: </h4>

					<?php for($i = 0; $i < count($listaObrasBusc); $i++) {

						echo "<p><strong>Titulo de obra buscada: </strong>" .$listaObrasBusc[$i]["Titulo"]. "</p>";
						echo "<a href='?obra=".$listaObrasBusc[$i]['ID']."'> Visitar la obra </a>" ;
					}	
				}	

				else {

					?> <h4>Búsqueda sin éxito</h4> <?php
				}

			?> <h4> -- Fin de Búsqueda -- </h4>
		</div>

		<!-- Panel de AÑADIR OBRAS -->
		<div id="aniadirObra">
			<form name="aniadirObraForm" method="POST">

				<p> Título de la obra:  <input type="text" name="nuevaObraTitulo" ID="nuevaObraTitulo" placeholder="Escriba el Título de la obra" required></p>			
				<p>Eliga una colección: </p>
				<select id="nuevaObraColeccion" name="nuevaObraColeccion">    
			       <option value="Prehistórica" selected="selected">Prehistórica</option>
			       <option value="Preclásica">Preclásica</option>
			       <option value="Romana">Romana</option>
			   </select>

				<p> Imagen:  <input type="text" name="nuevaObraImagen" ID="nuevaObraImagen" placeholder="Indique el nombre de la imagen" required></p>
				<p> Descripción de la obra: </p>
				<textarea placeholder="Escribe la descripcion de la obra a añadir(usar etiquetas <p> y <h> para formatear)" name="DescripcionObraAniadir" ID="DescripcionObraAniadir"   required></textarea> 
				<input type="submit" ID ="aniadirObraConfirmar" name="aniadirObraConfirmar" value="Añadir" />

			</form>
		</div>
		

	<?php } ?>


<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>

