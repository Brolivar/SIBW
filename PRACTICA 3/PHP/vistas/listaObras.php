
<div class="bloque_obras">
    <!-- Encapsulamos todas las obras en una misma clase para aplicarles a todas el mismo estilo -->
    
	<?php 

		// CON ESTO SÍ QUE SE MUESTRAN LAS OBRAS EN LA PORTADA 
		require("controladores/controlador_Obras.php");

		if (isset($miniatura)) {
			foreach ($miniatura as $valor) {
				echo "$valor";
			}
		}
		else
			echo "NO EXISTE LA VARIABLE $miniatura";
	?> 
</div>