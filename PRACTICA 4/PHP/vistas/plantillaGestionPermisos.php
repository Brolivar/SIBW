<html>
    <!-- Encapsulamos la página en una misma clase para aplicarle el estilo -->
	<?php include("cabeceraObra.php"); ?>

	<body>
	    <!-- Encapsulamos la página completa para que al cambiar el tamaño de ventana o al aplicar zoom se aplique a toda la página
	        en vez de a cada elemento por separado.-->
	    <div id="pagina">
			<?php
				include("header.php");
            	include("sidebar.php");
            	require("formularioGestionarPermisos.php");
				include("footer.php");
			?>
		</div>
	</body>
</html>