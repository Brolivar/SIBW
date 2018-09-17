<!-- Incluye la descripcion de la obra, asi como la imagen y el footer de esta -->
<div class = "Contenido">
	<!-- Con esta etiqueta conseguimos establecer el texto en dos columnas en el formato de impresión -->
	<div class="dos_columnas">
		<?php
			// Si se pulsa en una de las obras de la portada deberá mostrar el contenido y la foto de dicha obra
			// Para ello el contenido será extraido por el modelo y el controlador llama a esta vista para que lo muestre
			if(isset($_GET["obra"])){
				echo "$descripcion";

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

				echo "$fecha_publicacion";
				// Con esta función ejecutamos el código PHP referente a obtener la fecha de la última modificación
				// que está almacenado en un campo de la tabla Obras
				eval($fecha_modificacion);
			}
		?>
	</div>
</div>