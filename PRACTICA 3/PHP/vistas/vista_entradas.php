<!-- Contenido de la vista de la página de entradas-->
<html>
	<?php include("cabeceraObra.php"); ?>

	<body>
	    <!-- Encapsulamos la página completa para que al cambiar el tamaño de ventana o al aplicar zoom se aplique a toda la página
	        en vez de a cada elemento por separado.-->
	    <div id="pagina">
			<?php
				include("header.php");
            	include("sidebar.php");

            	// Mostramos los datos de entradas devueltos por el modelo
            	echo "$datos_entrada";
            	
	            include("footer.php");
			?>
		</div>
	</body>
</html>