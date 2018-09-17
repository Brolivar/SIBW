<html>
    <?php include("cabeceraPortada.php");?>

    <!-- Contenido de la portada -->
	<body>
	    <!-- Encapsulamos la página completa para que al cambiar el tamaño de ventana o al aplicar zoom se aplique a toda la página
	        en vez de a cada elemento por separado.-->
	    <div id="pagina">
	        <!-- Incluimos los ficheros .php que generan los elementos de la portada: cabecera con el título
	            del museo y su menú de navegación, la zona auxiliar con los enlaces, la zona central con las 
	            9 obras y el pie de página--> 
	        <?php
	            include("header.php");
	            include("sidebar.php");
	            require("listaObras.php");
	            include("footer.php");
	        ?>
	    </div>
	</body>
</html>