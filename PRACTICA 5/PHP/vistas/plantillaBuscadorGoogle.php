<html>
    <?php
        include("cabeceraObra.php");
    ?>
    <!-- Contenido de las páginas de las obras -->
	<body>
	    <!-- Encapsulamos la página completa para que al cambiar el tamaño de ventana o al aplicar zoom se aplique a toda la página
	        en vez de a cada elemento por separado.-->
	    <div id="pagina">
	    	<!-- Incluimos los ficheros .php que generan los elementos de la portada: cabecera con el título
	            del museo y su menú de navegación, la zona auxiliar con los enlaces y el pie de página-->
	        <?php

	            include_once("header.php");
	            include_once("sidebar.php"); ?>

	            <!-- Formulario para buscar las obras al estilo Google -->
	            <h3>Buscador</h3>

				<form id="formPaginasObrasGoogle" name="formPaginasObrasGoogle" action=""> 
					<p> <input type="text" id="textoBuscado" onkeyup="buscarPaginasEstiloGoogle(this.value)"> </p>
					<div id="paginasEncontradas"></div>
				</form>

	            <?php 

	            require("buscadorPaginas.php");
	            include_once("footer.php"); ?>
	    </div>

	</body>
</html>

<!-- FUNCIONES JAVASCRIPT -->
<script src="../JavaScript/funciones.js"></script>