<html>
    <!-- Encapsulamos todas las obras en una misma clase para aplicarles a todas el mismo estilo -->

	<?php include("cabeceraObra.php"); ?>

	<body>
	    <!-- Encapsulamos la página completa para que al cambiar el tamaño de ventana o al aplicar zoom se aplique a toda la página
	        en vez de a cada elemento por separado.-->
	    <div id="pagina">

	    	<?php
	    		include("header.php");
            	include("sidebar.php");
			?>

			<h3 id="titulo_coleccion">
				<?php echo $nombreColeccionSeleccionada; ?> 
			</h3>

			<div class="bloque_obras_colecciones">
				<?php
					for ($i=0; $i < count($coleccionSeleccionada); $i++)
						echo $coleccionSeleccionada[$i];
				?>
			</div>

			<?php include("footer.php");?>
		</div>
	</body>
</html>