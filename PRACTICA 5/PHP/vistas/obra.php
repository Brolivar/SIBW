<!-- Incluye la descripcion de la obra, asi como la imagen y el footer de esta -->
<div class = "Contenido">
	<!-- Con esta etiqueta conseguimos establecer el texto en dos columnas en el formato de impresión -->
	<div class="dos_columnas">
		<?php
			// Si se pulsa en una de las obras de la portada deberá mostrar el contenido y la foto de dicha obra
			// Para ello el contenido será extraido por el modelo y el controlador llama a esta vista para que lo muestre
			if(isset($_GET["obra"])){
				
				echo "<div class='img_obra'>";
				echo "<img src='../Imagenes/" .$imagen_obra. "'>";
				echo "<div class='pie_foto'>" .$nombre_obra. "</div>";
				echo "</div>";

				echo "<div class ='Descripcion'>";
				echo "<p> $descripcion </p>";
				echo "</div>";
				// Recorremos las imagenes asociadas a la galería de la obra seleccionada
				// SOLO EN EL CASO EN EL QUE ESTA OBRA TENGA UNA GALERÍA ASOCIADA
				if (count($galeria_obra) > 0) { ?>
					<div class="galeria">
				        <?php
				          for ($i=0; $i < count($galeria_obra); $i++) {
				            ?>
				            <div class = "obras_galeria">
				            	<?php echo '<img src="../Imagenes/' .$galeria_obra[$i]. '"/>';?>
				            </div>
			          	<?php } ?>
					</div>

				<?php }				
				// Mostramos todos los vídeos que existan de la obra a mostrar
				for ($j=0; $j < count($videos_obra); $j++) {
					$n_video = $j+1;
					echo "<p>Enlace al vídeo número $n_video del hallazgo: <a href='$videos_obra[$j]' target='_blank'>$videos_obra[$j]</a></p>";
				}

       			// Formateamos la fecha antes de mostrarla para que tenga este aspecto: dia/mes/año hora:minutos:segundos
       			$fechaPubl_formateada = date('d/m/y H:i:s', strtotime($fecha_publicacion));
				echo "<p>Fecha de publicación: ".$fechaPubl_formateada."</p>";

				// Formateamos también la fecha de la última modificación antes de mostrarla
				$fechaModif_formateada = date('d/m/y H:i:s', strtotime($fecha_modificacion));
				echo "<p>Fecha de modificación: ".$fechaModif_formateada."</p>";
			}
		?>
	</div>
</div>